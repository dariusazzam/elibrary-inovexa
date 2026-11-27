<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use RuntimeException;
use SimpleXMLElement;
use ZipArchive;

/**
 * Pembaca & pemvalidasi berkas impor data anggota (CSV / XLSX).
 *
 * Sengaja tidak memakai paket pihak ketiga: CSV dibaca dengan fgetcsv(),
 * sedangkan XLSX dibaca langsung dari arsip ZIP-nya (sharedStrings.xml +
 * xl/worksheets/sheetN.xml) memakai ekstensi zip & SimpleXML bawaan PHP.
 */
class MemberImport
{
    /** Batas jumlah baris data yang diproses dalam satu berkas. */
    public const MAX_ROWS = 500;

    /** Kata sandi awal anggota hasil impor bila kolom kata sandi dikosongkan. */
    public const DEFAULT_PASSWORD = '123456';

    /** Kolom internal yang wajib ada pada baris header berkas. */
    private const REQUIRED = ['name', 'nik'];

    /** Header berkas (setelah dinormalkan) => kunci internal. */
    private const HEADER_MAP = [
        'nama' => 'name',
        'nama lengkap' => 'name',
        'name' => 'name',
        'full name' => 'name',
        'nik' => 'nik',
        'nomor nik' => 'nik',
        'nomor induk kependudukan' => 'nik',
        'no ktp' => 'nik',
        'email' => 'email',
        'pos el' => 'email',
        'alamat email' => 'email',
        'telepon' => 'phone',
        'no telepon' => 'phone',
        'nomor telepon' => 'phone',
        'no hp' => 'phone',
        'nomor hp' => 'phone',
        'hp' => 'phone',
        'wa' => 'phone',
        'whatsapp' => 'phone',
        'phone' => 'phone',
        'kategori' => 'category',
        'kategori pemustaka' => 'category',
        'category' => 'category',
        'alamat' => 'address',
        'domisili' => 'address',
        'address' => 'address',
        'kata sandi' => 'password',
        'sandi' => 'password',
        'password' => 'password',
    ];

    /** Label manusiawi untuk pesan galat. */
    private const LABELS = [
        'name' => 'Nama / Nama Lengkap',
        'nik' => 'NIK',
        'email' => 'Email',
        'phone' => 'Telepon',
        'category' => 'Kategori',
        'address' => 'Alamat',
        'password' => 'Kata Sandi',
    ];

    /** Isi berkas templat CSV (header saja, tanpa baris contoh agar tidak ikut terimpor). */
    public static function template(): string
    {
        return implode(',', ['nama', 'nik', 'email', 'telepon', 'kategori', 'alamat'])."\n";
    }

    public static function templateFilename(): string
    {
        return 'templat-impor-anggota-inovexa.csv';
    }

    /**
     * Baca berkas lalu validasi setiap barisnya.
     *
     * @return array{rows: array<int, array<string, mixed>>, summary: array<string, int>, truncated: bool}
     */
    public function analyse(UploadedFile $file, Library $lib): array
    {
        $parsed = $this->read($file);
        $headerMap = $this->mapHeader($parsed['header']);

        foreach (self::REQUIRED as $required) {
            if (! in_array($required, $headerMap, true)) {
                throw new RuntimeException(
                    'Kolom "'.self::LABELS[$required].'" tidak ditemukan pada baris pertama berkas. '.
                    'Unduh templat impor agar susunan kolom sesuai.'
                );
            }
        }

        $seenNik = [];
        $rows = [];
        $summary = ['total' => 0, 'valid' => 0, 'duplicate' => 0, 'invalid' => 0];

        foreach ($parsed['rows'] as $row) {
            $fields = [];
            foreach ($headerMap as $cellIndex => $key) {
                if ($key === null) {
                    continue;
                }
                $fields[$key] = $this->clean((string) ($row['cells'][$cellIndex] ?? ''));
            }

            $result = $this->validate($fields, $lib, $seenNik);

            if ($result['status'] === 'valid') {
                $seenNik[$result['data']['nik']] = true;
            }

            $rows[] = ['line' => $row['line']] + $result;
            $summary['total']++;
            $summary[$result['status']]++;
        }

        if ($summary['total'] === 0) {
            throw new RuntimeException('Berkas tidak memuat satu pun baris data anggota. Isi data di bawah baris header lalu unggah kembali.');
        }

        return ['rows' => $rows, 'summary' => $summary, 'truncated' => $parsed['truncated']];
    }

    /**
     * Validasi satu baris data (dipakai saat pratinjau maupun saat penyimpanan,
     * sehingga data yang dikirim klien selalu divalidasi ulang di server).
     *
     * @param  array<string, string>  $fields
     * @param  array<string, bool>  $seenNik  NIK yang sudah terpakai pada berkas yang sama
     * @return array{status: string, notes: array<int, string>, data: array<string, string>}
     */
    public function validate(array $fields, Library $lib, array $seenNik = []): array
    {
        $name = trim((string) ($fields['name'] ?? ''));
        $nik = $this->digits((string) ($fields['nik'] ?? ''));
        $email = trim((string) ($fields['email'] ?? ''));
        $phone = trim((string) ($fields['phone'] ?? ''));
        $category = trim((string) ($fields['category'] ?? ''));
        $address = trim((string) ($fields['address'] ?? ''));
        $password = trim((string) ($fields['password'] ?? ''));

        $data = [
            'name' => $name,
            'nik' => $nik,
            'email' => $email,
            'phone' => $phone,
            'category' => $category !== '' ? $category : 'Umum',
            'address' => $address,
            'password' => $password,
        ];

        $notes = [];
        $fatal = false;

        if (mb_strlen($name) < 3) {
            $notes[] = 'Nama minimal 3 karakter';
            $fatal = true;
        } elseif (mb_strlen($name) > 100) {
            $notes[] = 'Nama maksimal 100 karakter';
            $fatal = true;
        }

        if (! preg_match('/^\d{16}$/', $nik)) {
            $notes[] = 'NIK wajib 16 digit angka';
            $fatal = true;
        }

        if ($email !== '' && mb_strlen($email) > 100) {
            $notes[] = 'Email maksimal 100 karakter';
            $fatal = true;
        } elseif ($email !== '' && ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $notes[] = 'Format email tidak valid';
            $fatal = true;
        }

        if ($phone !== '' && mb_strlen($phone) > 30) {
            $notes[] = 'Telepon maksimal 30 karakter';
            $fatal = true;
        }

        if ($address !== '' && mb_strlen($address) > 300) {
            $notes[] = 'Alamat maksimal 300 karakter';
            $fatal = true;
        }

        if ($password !== '' && mb_strlen($password) < 6) {
            $notes[] = 'Kata sandi minimal 6 karakter';
            $fatal = true;
        }

        if ($fatal) {
            return ['status' => 'invalid', 'notes' => $notes, 'data' => $data];
        }

        if (isset($lib->accounts[$nik])) {
            return ['status' => 'duplicate', 'notes' => ['NIK sudah terdaftar pada basis data anggota'], 'data' => $data];
        }

        if (isset($seenNik[$nik])) {
            return ['status' => 'duplicate', 'notes' => ['NIK ganda di dalam berkas yang sama'], 'data' => $data];
        }

        // Peringatan non-fatal: nama sudah dipakai anggota lain (tetap boleh diimpor).
        foreach ($lib->users as $user) {
            if (strcasecmp((string) $user['n'], $name) === 0) {
                $notes[] = 'Nama sama dengan anggota yang sudah ada';
                break;
            }
        }

        $notes[] = 'Siap diimpor';

        return ['status' => 'valid', 'notes' => $notes, 'data' => $data];
    }

    // ---------------------------------------------------------------------
    // Pembacaan berkas
    // ---------------------------------------------------------------------

    /**
     * @return array{header: array<int, string>, rows: array<int, array{line: int, cells: array<int, string>}>, truncated: bool}
     */
    private function read(UploadedFile $file): array
    {
        $path = $file->getRealPath();

        if ($path === false || ! is_readable($path)) {
            throw new RuntimeException('Berkas unggahan tidak dapat dibaca. Coba unggah ulang.');
        }

        $extension = strtolower((string) $file->getClientOriginalExtension());

        $rows = match ($extension) {
            'csv', 'txt' => $this->readCsv($path),
            'xlsx' => $this->readXlsx($path),
            'xls' => throw new RuntimeException('Format .xls (Excel 97-2003) belum didukung. Simpan ulang berkas sebagai .xlsx atau .csv, lalu unggah kembali.'),
            default => throw new RuntimeException('Format berkas ".'.$extension.'" tidak didukung. Gunakan berkas .csv atau .xlsx.'),
        };

        return $this->splitHeader($rows);
    }

    /** Baris pertama yang tidak kosong dijadikan header, sisanya data. */
    private function splitHeader(array $rows): array
    {
        $header = [];
        $headerLine = 0;
        $pending = [];

        foreach ($rows as $index => $cells) {
            $cells = array_map(fn ($cell): string => trim((string) $cell), $cells);

            if ($header === [] && $this->isEmptyRow($cells)) {
                continue;
            }

            if ($header === []) {
                $header = $cells;
                $headerLine = $index + 1;

                continue;
            }

            if ($this->isEmptyRow($cells)) {
                continue;
            }

            $pending[] = ['line' => $index + 1, 'cells' => $cells];
        }

        if ($header === []) {
            throw new RuntimeException('Berkas kosong. Isi data anggota terlebih dahulu.');
        }

        $truncated = count($pending) > self::MAX_ROWS;

        return [
            'header' => $header,
            'rows' => array_slice($pending, 0, self::MAX_ROWS),
            'truncated' => $truncated,
        ];
    }

    private function isEmptyRow(array $cells): bool
    {
        foreach ($cells as $cell) {
            if (trim((string) $cell) !== '') {
                return false;
            }
        }

        return true;
    }

    /** Petakan label header berkas ke kunci internal (null bila kolom tidak dikenal). */
    private function mapHeader(array $header): array
    {
        return array_map(
            fn (string $label): ?string => self::HEADER_MAP[$this->normalizeLabel($label)] ?? null,
            $header
        );
    }

    private function normalizeLabel(string $label): string
    {
        $label = strtolower(trim($label));
        $label = preg_replace('/[^a-z0-9]+/', ' ', $label) ?? $label;

        return trim(preg_replace('/\s+/', ' ', $label) ?? $label);
    }

    /** @return array<int, array<int, string>> */
    private function readCsv(string $path): array
    {
        $content = (string) file_get_contents($path);

        if (trim($content) === '') {
            return [];
        }

        // Excel di Windows kerap menyimpan CSV sebagai Windows-1252, bukan UTF-8.
        if (! mb_check_encoding($content, 'UTF-8')) {
            $content = mb_convert_encoding($content, 'UTF-8', 'Windows-1252');
        }

        $content = (string) preg_replace('/^\xEF\xBB\xBF/', '', $content);

        $delimiter = $this->detectDelimiter($content);
        $handle = fopen('php://temp', 'r+');

        if ($handle === false) {
            throw new RuntimeException('Berkas CSV tidak dapat dibaca.');
        }

        fwrite($handle, $content);
        rewind($handle);

        $rows = [];
        while (($cells = fgetcsv($handle, 0, $delimiter)) !== false) {
            $rows[] = array_map(fn ($cell): string => (string) $cell, $cells);
        }

        fclose($handle);

        return $rows;
    }

    /** Tebak pemisah kolom: koma, titik-koma (umum pada Excel Indonesia), atau tab. */
    private function detectDelimiter(string $content): string
    {
        $firstLine = '';
        foreach (preg_split('/\r\n|\r|\n/', $content) ?: [] as $line) {
            if (trim($line) !== '') {
                $firstLine = $line;
                break;
            }
        }

        $candidates = [',' => substr_count($firstLine, ','), ';' => substr_count($firstLine, ';'), "\t" => substr_count($firstLine, "\t")];
        arsort($candidates);
        $delimiter = (string) array_key_first($candidates);

        return $candidates[$delimiter] > 0 ? $delimiter : ',';
    }

    /** @return array<int, array<int, string>> */
    private function readXlsx(string $path): array
    {
        if (! class_exists(ZipArchive::class)) {
            throw new RuntimeException('Ekstensi PHP "zip" tidak aktif sehingga berkas XLSX tidak dapat dibaca. Aktifkan ekstensi tersebut atau unggah berkas .csv.');
        }

        $zip = new ZipArchive;
        if ($zip->open($path) !== true) {
            throw new RuntimeException('Berkas XLSX tidak dapat dibuka. Pastikan berkas tidak rusak atau terlindungi kata sandi.');
        }

        try {
            $shared = $this->readSharedStrings($zip);
            $sheetPath = $this->firstSheetPath($zip);
            $sheetXml = $sheetPath === null ? false : $zip->getFromName($sheetPath);

            if ($sheetXml === false) {
                throw new RuntimeException('Struktur berkas XLSX tidak dikenali (lembar kerja tidak ditemukan).');
            }

            $xml = @simplexml_load_string($sheetXml);
            if ($xml === false || ! isset($xml->sheetData)) {
                throw new RuntimeException('Isi lembar kerja XLSX tidak dapat dibaca.');
            }

            $rows = [];
            foreach ($xml->sheetData->row as $row) {
                $cells = [];
                $fallbackIndex = 0;

                foreach ($row->c as $cell) {
                    $ref = (string) ($cell['r'] ?? '');
                    $index = $ref !== '' ? $this->columnIndex($ref) : $fallbackIndex;
                    $fallbackIndex = $index + 1;

                    $cells[$index] = $this->cellText($cell, $shared);
                }

                if ($cells === []) {
                    $rows[] = [];

                    continue;
                }

                ksort($cells);
                $width = max(array_keys($cells)) + 1;
                $line = [];
                for ($i = 0; $i < $width; $i++) {
                    $line[] = $cells[$i] ?? '';
                }

                $rows[] = $line;
            }

            return $rows;
        } finally {
            $zip->close();
        }
    }

    /** @return array<int, string> */
    private function readSharedStrings(ZipArchive $zip): array
    {
        $raw = $zip->getFromName('xl/sharedStrings.xml');

        if ($raw === false) {
            return [];
        }

        $xml = @simplexml_load_string($raw);
        if ($xml === false) {
            return [];
        }

        $strings = [];
        foreach ($xml->si as $si) {
            $strings[] = $this->richText($si);
        }

        return $strings;
    }

    /** Ambil teks dari <si>, <is>, atau <t> yang bisa terdiri dari beberapa run <r>. */
    private function richText(SimpleXMLElement $node): string
    {
        if (isset($node->t)) {
            return (string) $node->t;
        }

        $text = '';
        foreach ($node->r as $run) {
            $text .= (string) $run->t;
        }

        return $text;
    }

    private function firstSheetPath(ZipArchive $zip): ?string
    {
        if ($zip->locateName('xl/worksheets/sheet1.xml') !== false) {
            return 'xl/worksheets/sheet1.xml';
        }

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $name = (string) $zip->getNameIndex($i);
            if (str_starts_with($name, 'xl/worksheets/') && str_ends_with($name, '.xml')) {
                return $name;
            }
        }

        return null;
    }

    /** @param array<int, string> $shared */
    private function cellText(SimpleXMLElement $cell, array $shared): string
    {
        $type = (string) ($cell['t'] ?? '');

        if ($type === 's') {
            return $shared[(int) $cell->v] ?? '';
        }

        if ($type === 'inlineStr') {
            return isset($cell->is) ? $this->richText($cell->is) : '';
        }

        return isset($cell->v) ? (string) $cell->v : '';
    }

    /** "B7" / "AA2" => indeks kolom berbasis nol. */
    private function columnIndex(string $reference): int
    {
        $letters = strtoupper((string) preg_replace('/[^A-Za-z]/', '', $reference));

        if ($letters === '') {
            return 0;
        }

        $index = 0;
        foreach (str_split($letters) as $letter) {
            $index = $index * 26 + (ord($letter) - 64);
        }

        return $index - 1;
    }

    // ---------------------------------------------------------------------
    // Normalisasi nilai sel
    // ---------------------------------------------------------------------

    private function clean(string $value): string
    {
        $value = trim((string) preg_replace('/^\xEF\xBB\xBF/', '', $value));

        return $this->expandScientific($value);
    }

    /**
     * Excel menyimpan angka panjang (NIK, nomor telepon) sebagai notasi ilmiah
     * seperti "3,274090501990002E+15". Kembangkan kembali menjadi deret digit
     * tanpa kehilangan presisi akibat pembulatan bilangan pecahan.
     */
    private function expandScientific(string $value): string
    {
        $value = str_replace(',', '.', $value);

        if (! preg_match('/^([+-]?)(\d+)(?:\.(\d+))?[eE]([+-]?\d+)$/', $value, $m)) {
            return $value;
        }

        $sign = $m[1];
        $intPart = $m[2];
        $fracPart = $m[3] ?? '';
        $exponent = (int) $m[4];

        $digits = $intPart.$fracPart;
        $pointPosition = strlen($intPart) + $exponent;

        if ($pointPosition <= 0) {
            return $sign.'0.'.str_repeat('0', -$pointPosition).$digits;
        }

        if ($pointPosition >= strlen($digits)) {
            return $sign.$digits.str_repeat('0', $pointPosition - strlen($digits));
        }

        return $sign.substr($digits, 0, $pointPosition).'.'.substr($digits, $pointPosition);
    }

    /** Sisakan digit saja (untuk NIK). */
    private function digits(string $value): string
    {
        return (string) preg_replace('/\D/', '', $value);
    }
}
