<?php

namespace App\Support;

use Carbon\Carbon;

/**
 * Penyimpanan data demo berbasis session (menggantikan array JS di versi HTML).
 * Untuk produksi, ganti dengan model Eloquent + migrasi (Book, Loan, Reservation, User).
 */
class Library
{
    public const ROLES = [
        'member' => 'Anggota (Pengunjung)',
        'admin'  => 'Admin Pegawai',
        'super'  => 'Super Admin',
    ];

    /** [id, password, nama] — contoh awal yang ditampilkan di halaman login */
    public const CREDS = [
        'member' => ['INX-2026-8820', '123456', 'Herdman'],
        'admin'  => ['admin', 'admin123', 'Petugas Sirkulasi'],
        'super'  => ['super', 'super123', 'Super Admin'],
    ];

    public const NIK_DEMO = '3271040801990002';

    public const TOPICS = ['Sejarah Nusantara', 'Fiksi & Sastra', 'Sains & Data', 'Arsip Kebudayaan'];

    public const MENU = [
        'member' => [['ov', 'Dashboard'], ['loans', 'Pinjaman Saya'], ['resv', 'Reservasi'], ['cat', 'Katalog'], ['elib', 'E-Library & Baca'], ['notif', 'Notifikasi'], ['card', 'Kartu Digital']],
        'admin'  => [['ov', 'Ringkasan'], ['circ', 'Sirkulasi'], ['stock', 'Stok Buku'], ['mem', 'Anggota']],
        'super'  => [['ov', 'Ringkasan'], ['users', 'Pengguna'], ['roles', 'Hak Akses'], ['sys', 'Pengaturan']],
    ];

    /** Teks halaman login per peran */
    public const LOGIN = [
        'member' => ['Portal Layanan Anggota Perpustakaan', 'Akses peminjaman, reservasi buku, bebas denda sirkulasi, & pembacaan katalog e-library warga kota.', 'Nomor NIK (KTP) / ID Anggota Perpustakaan', 'Contoh: 3271040801990002 atau INX-2026-8820', 'Gunakan 16 digit NIK yang terdaftar pada Disdukcapil atau nomor kartu fisik perpustakaan.', 'Masuk ke Portal Anggota'],
        'admin'  => ['Meja Kerja Petugas Sirkulasi', 'Layanan sirkulasi pinjam-kembali, input denda keterlambatan, & pencatatan buku fisik perpustakaan.', 'NIP / ID Pegawai Perpustakaan', 'Contoh: 198507122010011003 atau admin', 'Gunakan NIP atau ID pegawai yang diterbitkan oleh Dinas Perpustakaan.', 'Masuk ke Meja Petugas'],
        'super'  => ['Konsol Super Admin Sistem', 'Pengaturan hak akses peran, data master pengguna, & konfigurasi sistem perpustakaan.', 'ID Super Admin', 'Contoh: SA-0001 atau super', 'Akses khusus pengelola pusat. Seluruh aktivitas dicatat dalam log audit.', 'Masuk ke Konsol Admin'],
    ];

    public array $books = [];
    public array $loans = [];
    public array $resv = [];
    public array $users = [];
    public array $cfg = ['dur' => 7, 'fine' => 1000];
    public int $lastId = 20;

    /** id/NIK => ['pw' => string, 'name' => string, 'role' => string]. Autentikasi berbasis akun ini. */
    public array $accounts = [];

    /** Penghitung untuk membuat ID anggota baru (INX-2026-####). */
    public int $memberSeq = 8820;

    public static function load(): self
    {
        $lib = new self();
        $data = session('lib');

        if (! $data) {
            $lib->seed();
            $lib->save();
        } else {
            foreach ($data as $k => $v) {
                $lib->$k = $v;
            }

            // Migrasi session dari versi demo lama yang belum memiliki akun dinamis.
            if (! $lib->accounts) {
                $lib->accounts = [
                    'INX-2026-8820' => ['pw' => '123456', 'name' => 'Herdman', 'role' => 'member'],
                    '3271040801990002' => ['pw' => '123456', 'name' => 'Herdman', 'role' => 'member'],
                    'INX-2026-0031' => ['pw' => '123456', 'name' => 'Siti Rahma', 'role' => 'member'],
                    'admin' => ['pw' => 'admin123', 'name' => 'Petugas Sirkulasi', 'role' => 'admin'],
                    'super' => ['pw' => 'super123', 'name' => 'Super Admin', 'role' => 'super'],
                ];
                $lib->save();
            }
        }

        return $lib;
    }

    public function save(): void
    {
        session(['lib' => get_object_vars($this)]);
    }

    protected function seed(): void
    {
        $this->books = [
            ['id' => 1, 't' => 'Laskar Pelangi',   'a' => 'Andrea Hirata',      'c' => 'Fiksi & Sastra',    's' => 'Rak Fiksi 02',   'h' => 30],
            ['id' => 2, 't' => 'Filosofi Teras',   'a' => 'Henry Manampiring',  'c' => 'Sains & Data',      's' => 'Rak Ref 05',     'h' => 215],
            ['id' => 3, 't' => 'Sapiens',          'a' => 'Yuval Noah Harari',  'c' => 'Sejarah Nusantara', 's' => 'Rak Sejarah 01', 'h' => 35],
            ['id' => 4, 't' => 'Bumi Manusia',     'a' => 'Pramoedya A. Toer',  'c' => 'Fiksi & Sastra',    's' => 'Rak Fiksi 04',   'h' => 10],
            ['id' => 5, 't' => 'Arsip Majapahit',  'a' => 'Tim Arsip Daerah',   'c' => 'Arsip Kebudayaan',  's' => 'Rak Arsip 03',   'h' => 160],
            ['id' => 6, 't' => 'Dasar Ilmu Data',  'a' => 'R. Santoso',         'c' => 'Sains & Data',      's' => 'Rak Sains 07',   'h' => 260],
        ];
        $this->loans = [
            ['b' => 3, 'w' => 'Herdman',    'd' => $this->due(5)],
            ['b' => 6, 'w' => 'Siti Rahma', 'd' => $this->due(-4)],
        ];
        $this->users = [
            ['n' => 'Herdman',           'i' => 'INX-2026-8820', 'r' => 'Anggota',       'on' => true],
            ['n' => 'Siti Rahma',        'i' => 'INX-2026-0031', 'r' => 'Anggota',       'on' => true],
            ['n' => 'Petugas Sirkulasi', 'i' => 'admin',         'r' => 'Admin Pegawai', 'on' => true],
            ['n' => 'Super Admin',       'i' => 'super',         'r' => 'Super Admin',   'on' => true],
        ];

        $this->accounts = [
            'INX-2026-8820' => ['pw' => '123456', 'name' => 'Herdman', 'role' => 'member'],
            '3271040801990002' => ['pw' => '123456', 'name' => 'Herdman', 'role' => 'member'],
            'INX-2026-0031' => ['pw' => '123456', 'name' => 'Siti Rahma', 'role' => 'member'],
            'admin' => ['pw' => 'admin123', 'name' => 'Petugas Sirkulasi', 'role' => 'admin'],
            'super' => ['pw' => 'super123', 'name' => 'Super Admin', 'role' => 'super'],
        ];
    }

    public function due(int $days): string
    {
        return Carbon::today()->addDays($days)->toDateString();
    }

    public function book(int $id): ?array
    {
        foreach ($this->books as $b) {
            if ($b['id'] === $id) {
                return $b;
            }
        }
        return null;
    }

    public function out(int $id): bool
    {
        foreach ($this->loans as $l) {
            if ($l['b'] === $id) {
                return true;
            }
        }
        return false;
    }

    public function filter(string $q = '', string $topic = ''): array
    {
        return array_values(array_filter($this->books, function ($b) use ($q, $topic) {
            $okTopic = $topic === '' || $b['c'] === $topic;
            $okQ = $q === '' || mb_stripos($b['t'] . $b['a'] . $b['c'], $q) !== false;
            return $okTopic && $okQ;
        }));
    }

    public function fine(array $loan): int
    {
        $late = intdiv(Carbon::today()->timestamp - Carbon::parse($loan['d'])->startOfDay()->timestamp, 86400);
        return max(0, $late) * $this->cfg['fine'];
    }

    public function rp(int $n): string
    {
        return 'Rp' . number_format($n, 0, ',', '.');
    }

    public function hasReservation(int $bookId, string $who): bool
    {
        foreach ($this->resv as $r) {
            if ($r['b'] === $bookId && $r['w'] === $who) {
                return true;
            }
        }
        return false;
    }

    public function cancelReservation(int $bookId, string $who): void
    {
        $this->resv = array_values(array_filter($this->resv, fn ($r) => ! ($r['b'] === $bookId && $r['w'] === $who)));
    }

    public function lend(string $who, int $bookId): void
    {
        $this->loans[] = ['b' => $bookId, 'w' => $who, 'd' => $this->due($this->cfg['dur'])];
    }

    /** @return int denda (Rp) yang harus dibayar */
    public function giveBack(int $bookId): int
    {
        $fine = 0;
        $this->loans = array_values(array_filter($this->loans, function ($l) use ($bookId, &$fine) {
            if ($l['b'] === $bookId) {
                $fine = $this->fine($l);
                return false;
            }
            return true;
        }));
        return $fine;
    }

    public function addBook(string $title, string $author): void
    {
        $id = ++$this->lastId;
        $this->books[] = ['id' => $id, 't' => $title, 'a' => $author, 'c' => 'Fiksi & Sastra', 's' => 'Rak Baru', 'h' => ($id * 47) % 360];
    }

    // ---------------------------------------------------------------------
    // Autentikasi, pendaftaran, & reset kata sandi
    // ---------------------------------------------------------------------

    public function findAccount(string $id): ?array
    {
        return $this->accounts[$id] ?? null;
    }

    public function verify(string $id, string $password, string $role): bool
    {
        $acc = $this->findAccount($id);
        if (! $acc || $acc['role'] !== $role) {
            return false;
        }
        if (! $this->isActive($id)) {
            return false;
        }
        return hash_equals($acc['pw'], $password);
    }

    /** Cek apakah akun/id terdaftar aktif (tidak dinonaktifkan super admin). */
    public function isActive(string $id): bool
    {
        if (! isset($this->accounts[$id])) {
            return false;
        }
        foreach ($this->users as $u) {
            if ($u['i'] === $id) {
                return (bool) $u['on'];
            }
        }
        // Akun tanpa baris user (mis. NIK) dianggap aktif selama orangnya punya baris aktif.
        $name = $this->accounts[$id]['name'];
        foreach ($this->users as $u) {
            if ($u['n'] === $name) {
                return (bool) $u['on'];
            }
        }
        return true;
    }

    public function nextMemberId(): string
    {
        do {
            $this->memberSeq++;
            $id = 'INX-2026-' . $this->memberSeq;
        } while (isset($this->accounts[$id]));
        return $id;
    }

    /**
     * Mendaftarkan anggota baru.
     * @return array{id:string,name:string}
     */
    public function registerMember(string $name, string $nik, string $password): array
    {
        $id = $this->nextMemberId();

        $this->users[] = ['n' => $name, 'i' => $id, 'r' => 'Anggota', 'on' => true];
        $this->accounts[$id] = ['pw' => $password, 'name' => $name, 'role' => 'member'];
        // NIK juga bisa dipakai untuk login.
        $this->accounts[$nik] = ['pw' => $password, 'name' => $name, 'role' => 'member'];

        $this->save();

        return ['id' => $id, 'name' => $name];
    }

    public function memberTaken(string $nik): bool
    {
        if (isset($this->accounts[$nik])) {
            return true;
        }
        foreach ($this->users as $u) {
            if ($u['n'] === $nik) {
                return true;
            }
        }
        return false;
    }

    /** Reset kata sandi untuk akun anggota. @return bool sukses. */
    public function resetPassword(string $idOrNik, string $newPassword): bool
    {
        if (! isset($this->accounts[$idOrNik]) || $this->accounts[$idOrNik]['role'] !== 'member') {
            return false;
        }
        $name = $this->accounts[$idOrNik]['name'];
        // Terapkan ke semua id milik orang yang sama (kartu + NIK).
        foreach ($this->accounts as $k => $acc) {
            if ($acc['role'] === 'member' && $acc['name'] === $name) {
                $this->accounts[$k]['pw'] = $newPassword;
            }
        }
        $this->save();
        return true;
    }

    // ---------------------------------------------------------------------
    // E-Library: konten bacaan
    // ---------------------------------------------------------------------

    /** Daftar bab bacaan untuk satu buku (konten demo yang dibuat dari metadata buku). */
    public function chapters(int $bookId): array
    {
        $b = $this->book($bookId);
        if (! $b) {
            return [];
        }
        $t = $b['t'];
        $a = $b['a'];
        $c = $b['c'];

        return [
            ['n' => 1, 'title' => 'Pengantar — Tentang ' . $t, 'minutes' => 4, 'body' => "Buku \"{$t}\" karya {$a} termasuk dalam ranah {$c}. Bab pengantar ini memaparkan latar belakang penulisan, lingkup pembahasan, serta cara membaca buku ini secara efisien. Pembaca dianjurkan menyiapkan catatan kecil untuk menandai gagasan utama yang ingin ditelusuri lebih lanjut di rak referensi."],
            ['n' => 2, 'title' => 'Inti Pembahasan', 'minutes' => 7, 'body' => "Pada bagian inti, {$a} menyusun argumen secara bertahap: dimulai dari definisi istilah kunci, kemudian konteks historisnya, lalu contoh penerapannya. Setiap sub-bab ditutup dengan ringkasan tiga poin. Pembaca dapat memanfaatkan navigasi bab di panel samping untuk melompat antar bagian tanpa kehilangan urutan logika penulis."],
            ['n' => 3, 'title' => 'Kesimpulan & Refleksi', 'minutes' => 5, 'body' => "Kesimpulan merajut kembali benang merah {$c} yang menjadi dasar buku ini. {$a} mengajak pembaca merefleksikan bagaimana gagasan tersebut relevan dengan kehidupan sehari-hari warga kota. Bagian akhir memuat daftar bacaan lanjutan yang tersedia di katalog perpustakaan Inovexa dan dapat Anda reservasi langsung dari menu Katalog."],
        ];
    }

    // ---------------------------------------------------------------------
    // Notifikasi dinamis
    // ---------------------------------------------------------------------

    /** Bangun daftar notifikasi nyata berdasarkan kondisi akun yang sedang login. */
    public function notifications(array $u): array
    {
        $out = [];
        $name = $u['n'];
        $today = Carbon::today();

        if ($u['role'] === 'member') {
            foreach ($this->loans as $l) {
                if ($l['w'] !== $name) {
                    continue;
                }
                $book = $this->book($l['b'])['t'] ?? 'Buku';
                $days = $today->diffInDays(Carbon::parse($l['d']), false);
                if ($this->fine($l) > 0) {
                    $out[] = ['msg' => "Pinjaman \"{$book}\" terlambat. Denda berjalan {$this->rp($this->fine($l))}.", 'time' => 'Segera', 'tone' => 'no'];
                } elseif ($days <= 2) {
                    $out[] = ['msg' => "Jatuh tempo \"{$book}\" " . ($days <= 0 ? 'hari ini' : "{$days} hari lagi") . '.', 'time' => 'Hari ini', 'tone' => 'warn'];
                } else {
                    $out[] = ['msg' => "\"{$book}\" aman — jatuh tempo " . Carbon::parse($l['d'])->translatedFormat('d F Y') . '.', 'time' => 'Terjadwal', 'tone' => 'ok'];
                }
            }

            foreach ($this->resv as $r) {
                if ($r['w'] !== $name) {
                    continue;
                }
                $book = $this->book($r['b'])['t'] ?? 'Buku';
                if ($this->out($r['b'])) {
                    $out[] = ['msg' => "Reservasi \"{$book}\" masih dalam antrean.", 'time' => 'Menunggu', 'tone' => 'warn'];
                } else {
                    $out[] = ['msg' => "Reservasi \"{$book}\" siap diambil (maks. 24 jam).", 'time' => 'Baru', 'tone' => 'ok'];
                }
            }
        } else {
            $overdue = array_values(array_filter($this->loans, fn ($l) => $this->fine($l) > 0));
            $out[] = ['msg' => count($overdue) . " pinjaman sedang terlambat.", 'time' => 'Hari ini', 'tone' => count($overdue) ? 'no' : 'ok'];
            $out[] = ['msg' => count($this->books) . ' judul terdaftar, ' . count($this->loans) . ' sedang dipinjam.', 'time' => 'Ringkasan', 'tone' => 'warn'];
            foreach ($this->resv as $r) {
                if (! $this->out($r['b'])) {
                    $book = $this->book($r['b'])['t'] ?? 'Buku';
                    $out[] = ['msg' => "Antrean: {$r['w']} menunggu \"{$book}\".", 'time' => 'Antrean', 'tone' => 'ok'];
                }
            }
        }

        if (! $out) {
            $out[] = ['msg' => 'Belum ada aktivitas. Jelajahi katalog untuk memulai.', 'time' => 'Info', 'tone' => 'ok'];
        }

        return $out;
    }

    /** Jumlah notifikasi "perhatian" (terlambat / siap diambil) untuk badge menu. */
    public function notificationCount(array $u): int
    {
        return count(array_filter($this->notifications($u), fn ($x) => $x['tone'] === 'no' || $x['tone'] === 'warn'));
    }

    // ---------------------------------------------------------------------
    // Kartu digital: representasi barcode
    // ---------------------------------------------------------------------

    /**
     * Menghasilkan barcode SVG (gaya Code-128/39) yang deterministik dari ID.
     * Pola bar dibuat dari hash ID sehingga kartu yang sama selalu menghasilkan
     * gambar yang sama dan dapat dicetak/diunduh.
     */
    public function barcodeSvg(string $code, int $scale = 2, int $height = 46): string
    {
        $bars = '';
        $x = 0;
        $seed = md5('INX|' . $code);
        $bits = [];
        foreach (str_split($seed) as $h) {
            $bits[] = decbin(hexdec($h)); // 4 bit per heksa
        }
        $stream = str_pad(implode('', $bits), 0);

        // mulai dengan bar
        $isBar = true;
        $i = 0;
        while ($i < strlen($stream) - 1) {
            $w = ((int) $stream[$i] + 1) * $scale; // lebar 1..2 * scale
            if ($isBar) {
                $bars .= sprintf('<rect x="%d" y="0" width="%d" height="%d" fill="%s"/>', $x, $w, $height, '#111');
            }
            $x += $w;
            $isBar = ! $isBar;
            $i++;
        }

        $total = $x + $scale;
        return sprintf('<svg xmlns="http://www.w3.org/2000/svg" width="%d" height="%d" viewBox="0 0 %d %d" preserveAspectRatio="none">%s</svg>',
            $total, $height, $total, $height, $bars);
    }

    /** Data mentah untuk barcode (mis. untuk generator eksternal/printer). */
    public function barcodePayload(string $code): string
    {
        return 'INX;' . $code . ';' . Carbon::today()->toDateString();
    }
}
