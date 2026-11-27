<?php

namespace App\Http\Controllers;

use App\Support\Library;
use App\Support\MemberImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Impor data anggota dari berkas CSV / XLSX.
 *
 * Alur dua langkah: unggah berkas → pratinjau validasi per baris → simpan baris
 * terpilih. Baris valid dikirim dari berkas yang tersimpan di server (bukan dari
 * masukan klien) dan divalidasi ulang saat penyimpanan.
 */
class MembersImportController extends Controller
{
    /** Disk penyimpanan sementara berkas unggahan. */
    private const DISK = 'local';

    private const DIR = 'imports/members';

    /** Kunci sesi untuk hasil pratinjau yang menunggu konfirmasi. */
    private const SESSION_KEY = 'members_import';

    /** Ukuran maksimum berkas unggahan (KB). */
    private const MAX_KILOBYTES = 5120;

    /** Halaman kembali setelah pratinjau / impor dibatalkan. */
    private const BACK_MENU = 'circ';

    public function downloadTemplate(): StreamedResponse
    {
        return response()->streamDownload(
            fn () => print MemberImport::template(),
            MemberImport::templateFilename(),
            ['Content-Type' => 'text/csv; charset=UTF-8']
        );
    }

    public function preview(Request $request, MemberImport $importer): RedirectResponse
    {
        $request->validate([
            'file' => 'required|file|extensions:csv,txt,xlsx|max:'.self::MAX_KILOBYTES,
        ], [
            'file.required' => 'Pilih berkas CSV atau XLSX terlebih dahulu.',
            'file.file' => 'Berkas tidak dapat diunggah. Coba pilih ulang berkasnya.',
            'file.extensions' => 'Format berkas harus .csv atau .xlsx.',
            'file.max' => 'Ukuran berkas maksimal '.intdiv(self::MAX_KILOBYTES, 1024).' MB.',
        ]);

        $file = $request->file('file');
        $lib = Library::load();

        try {
            $analysis = $importer->analyse($file, $lib);
        } catch (RuntimeException $e) {
            return $this->backToMembers()->with('import_error', $e->getMessage());
        }

        $this->forgetPending();

        $path = $file->store(self::DIR, self::DISK);

        if ($path === false) {
            return $this->backToMembers()->with('import_error', 'Berkas tidak dapat disimpan sementara di server.');
        }

        session([self::SESSION_KEY => [
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
            'summary' => $analysis['summary'],
            'rows' => $analysis['rows'],
            'truncated' => $analysis['truncated'],
        ]]);

        $summary = $analysis['summary'];

        return $this->backToMembers()->with('toast', sprintf(
            'Pratinjau selesai: %d baris valid, %d duplikat, %d perlu diperbaiki.',
            $summary['valid'],
            $summary['duplicate'],
            $summary['invalid']
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        $pending = session(self::SESSION_KEY);

        if (! is_array($pending) || empty($pending['rows'])) {
            return $this->backToMembers()->with('import_error', 'Sesi pratinjau sudah berakhir. Unggah ulang berkas impor.');
        }

        $data = $request->validate([
            'rows' => 'required|array|min:1',
            'rows.*' => 'integer|min:0',
        ], [
            'rows.required' => 'Pilih minimal satu baris anggota yang ingin disimpan.',
            'rows.min' => 'Pilih minimal satu baris anggota yang ingin disimpan.',
        ]);

        $importer = app(MemberImport::class);
        $lib = Library::load();

        $seenNik = [];
        $members = [];

        foreach (array_unique($data['rows']) as $index) {
            $row = $pending['rows'][$index] ?? null;

            if ($row === null || ($row['status'] ?? '') !== 'valid') {
                continue;
            }

            // Validasi ulang di sisi server: data selalu berasal dari berkas tersimpan.
            $result = $importer->validate($row['data'], $lib, $seenNik);

            if ($result['status'] !== 'valid') {
                continue;
            }

            $seenNik[$result['data']['nik']] = true;
            $members[] = $result['data'];
        }

        if ($members === []) {
            return $this->backToMembers()->with('import_error', 'Tidak ada baris valid yang dipilih untuk disimpan.');
        }

        $result = $lib->registerImportedMembers($members, (string) $pending['filename']);

        $this->forgetPending();

        $request->session()->flash('members_import_result', [
            'imported' => $result['imported'],
            'skipped' => $result['skipped'],
            'members' => $result['members'],
            'filename' => $pending['filename'],
        ]);

        return $this->backToMembers()->with('toast', sprintf(
            'Impor selesai: %d anggota ditambahkan%s.',
            $result['imported'],
            $result['skipped'] > 0 ? ', '.$result['skipped'].' dilewati karena NIK sudah terdaftar' : ''
        ));
    }

    public function cancel(): RedirectResponse
    {
        $this->forgetPending();

        return $this->backToMembers()->with('toast', 'Pratinjau impor dibatalkan.');
    }

    public function downloadErrorReport(MemberImport $importer): Response|RedirectResponse
    {
        $pending = session(self::SESSION_KEY);

        if (! is_array($pending) || empty($pending['rows'])) {
            return redirect()->route('dashboard', self::BACK_MENU)
                ->with('import_error', 'Tidak ada hasil pratinjau untuk diunduh.');
        }

        $rows = array_filter(
            $pending['rows'],
            fn (array $row): bool => ($row['status'] ?? '') !== 'valid'
        );

        $csv = $this->errorReportCsv($rows);

        return response()->streamDownload(
            fn () => print $csv,
            'laporan-galat-impor-'.now()->format('Ymd-His').'.csv',
            ['Content-Type' => 'text/csv; charset=UTF-8']
        );
    }

    // ---------------------------------------------------------------------
    // Internal
    // ---------------------------------------------------------------------

    private function backToMembers(): RedirectResponse
    {
        return redirect()->route('dashboard', self::BACK_MENU);
    }

    /**
     * @param  array<int, array<string, mixed>>  $rows
     */
    private function errorReportCsv(array $rows): string
    {
        $handle = fopen('php://temp', 'r+');

        if ($handle === false) {
            return '';
        }

        fputcsv($handle, ['Baris', 'Status', 'Nama', 'NIK', 'Email', 'Telepon', 'Kategori', 'Catatan']);

        foreach ($rows as $row) {
            $data = $row['data'] ?? [];

            fputcsv($handle, [
                $row['line'] ?? '',
                ($row['status'] ?? '') === 'duplicate' ? 'Duplikat' : 'Tidak valid',
                $data['name'] ?? '',
                $data['nik'] ?? '',
                $data['email'] ?? '',
                $data['phone'] ?? '',
                $data['category'] ?? '',
                implode('; ', $row['notes'] ?? []),
            ]);
        }

        rewind($handle);
        $csv = (string) stream_get_contents($handle);
        fclose($handle);

        // BOM agar Excel membaca aksen & karakter Indonesia dengan benar.
        return "\xEF\xBB\xBF".$csv;
    }

    /** Hapus berkas sementara & sesi pratinjau yang menunggu konfirmasi. */
    private function forgetPending(): void
    {
        $pending = session(self::SESSION_KEY);

        if (is_array($pending) && ! empty($pending['path'])) {
            Storage::disk(self::DISK)->delete($pending['path']);
        }

        session()->forget(self::SESSION_KEY);
    }
}
