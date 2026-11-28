<?php

namespace App\Support;

use Carbon\Carbon;

/**
 * Penyimpanan data terpadu perpustakaan Inovexa (berbasis Session & Storage JSON terintegrasi).
 * Mendukung seluruh fitur operasional Super Admin, Admin Pegawai, dan Anggota.
 */
class Library
{
    public const ROLES = [
        'member' => 'Anggota (Pengunjung)',
        'admin' => 'Admin Pegawai',
        'super' => 'Super Admin',
    ];

    /** [id, password, nama] — contoh awal yang ditampilkan di halaman login */
    public const CREDS = [
        'member' => ['INX-2026-8820', '123456', 'Herdman'],
        'admin' => ['admin', 'admin123', 'Budi Santoso'],
        'super' => ['super', 'super123', 'Ari'],
    ];

    public const NIK_DEMO = '3271040801990002';

    public const TOPICS = ['Sejarah Nusantara', 'Fiksi & Sastra', 'Sains & Data', 'Arsip Kebudayaan', 'Teknologi Informasi', 'Bisnis & Finansial'];

    public const MENU = [
        'member' => [
            ['ov', 'Dashboard'],
            ['card', 'Profil & Kartu Digital'],
            ['loans', 'Peminjaman & Denda'],
            ['resv', 'Reservasi Buku'],
            ['elib', 'E-Library & Baca'],
            ['notif', 'Notifikasi'],
        ],
        'admin' => [
            ['ov', 'Dashboard Sirkulasi'],
            ['circ', 'Kelola Data Anggota'],
            ['stock', 'Kelola Koleksi Buku & Eksemplar'],
            ['circ_return', 'Proses Peminjaman & Pengembalian'],
            ['fines', 'Kelola Denda & Pembayaran'],
            ['resv', 'Kelola Reservasi Buku'],
            ['notif', 'Kelola E-Library & Notifikasi'],
            ['reports', 'Lihat & Cetak Laporan'],
        ],
        'super' => [
            ['ov', 'Dashboard Super Admin'],
            ['users', 'Kelola Akun & Hak Akses'],
            ['mem', 'Kelola Data Anggota'],
            ['stock', 'Koleksi & Eksemplar Buku'],
            ['circ', 'Kelola Sirkulasi'],
            ['resv', 'Kelola Reservasi & Notifikasi'],
            ['elib', 'Kelola E-Library'],
            ['sys', 'Audit Log & Backup Sistem'],
            ['reports', 'Lihat Keseluruhan Laporan'],
        ],
    ];

    /** Teks halaman login per peran */
    public const LOGIN = [
        'member' => ['Portal Layanan Anggota Perpustakaan', 'Akses peminjaman, reservasi buku, bebas denda sirkulasi, & pembacaan katalog e-library warga kota.', 'Nomor NIK (KTP) / ID Anggota Perpustakaan', 'Contoh: 3271040801990002 atau INX-2026-8820', 'Gunakan 16 digit NIK yang terdaftar pada Disdukcapil atau nomor kartu fisik perpustakaan.', 'Masuk ke Portal Anggota'],
        'admin' => ['Meja Kerja Petugas Sirkulasi', 'Layanan sirkulasi pinjam-kembali, input denda keterlambatan, & pencatatan buku fisik perpustakaan.', 'NIP / ID Pegawai Perpustakaan', 'Contoh: 198507122010011003 atau admin', 'Gunakan NIP atau ID pegawai yang diterbitkan oleh Dinas Perpustakaan.', 'Masuk ke Meja Petugas'],
        'super' => ['Konsol Super Admin Sistem', 'Pengaturan hak akses peran, data master pengguna, & konfigurasi sistem perpustakaan.', 'ID Super Admin', 'Contoh: SA-0001 atau super', 'Akses khusus pengelola pusat. Seluruh aktivitas dicatat dalam log audit.', 'Masuk ke Konsol Admin'],
    ];

    public array $books = [];

    public array $loans = [];

    public array $resv = [];

    public array $users = [];

    public array $accounts = [];

    public array $auditLogs = [];

    public array $ebooks = [];

    public array $backups = [];

    public array $dispensations = [];

    public array $customRoles = [];

    public array $rbacMatrix = [];

    public array $cfg = [
        'dur' => 7,
        'fine' => 1000,
        'grace_hours' => 48,
        'max_quota' => 3,
        'hold_shelf_hours' => 24,
        'two_factor_policy' => 'required_staff',
        'backup_retention_days' => 30,
        'last_backup' => 'Hari ini, 09:15 WIB',
        'uptime_pct' => '99.98%',
    ];

    public int $lastId = 20;

    public int $memberSeq = 8820;

    public static function load(): self
    {
        $lib = new self;
        $data = session('lib');

        if (! $data) {
            $filePath = storage_path('app/library_data.json');
            if (file_exists($filePath)) {
                $fileContent = json_decode(file_get_contents($filePath), true);
                if (is_array($fileContent)) {
                    $data = $fileContent;
                }
            }
        }

        if (! $data) {
            $lib->seed();
            $lib->save();
        } else {
            foreach ($data as $k => $v) {
                $lib->$k = $v;
            }

            // Pastikan data inti dan default akun esensial tetap ada tanpa menimpa akun dinamis
            $lib->ensureCoreAccounts();
        }

        return $lib;
    }

    public function save(): void
    {
        $vars = get_object_vars($this);
        session(['lib' => $vars]);

        try {
            $path = storage_path('app');
            if (! is_dir($path)) {
                mkdir($path, 0755, true);
            }
            file_put_contents($path.'/library_data.json', json_encode($vars, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        } catch (\Throwable $e) {
            // Abaikan kesalahan penulisan berkas bila izin terbatas
        }
    }

    public function ensureCoreAccounts(): void
    {
        $defaultAccounts = [
            'INX-2026-8820' => ['pw' => '123456', 'name' => 'Herdman', 'role' => 'member'],
            '3271040801990002' => ['pw' => '123456', 'name' => 'Herdman', 'role' => 'member'],
            'admin' => ['pw' => 'admin123', 'name' => 'Budi Santoso', 'role' => 'admin'],
            'super' => ['pw' => 'super123', 'name' => 'Ari', 'role' => 'super'],
            'SA-001' => ['pw' => 'super123', 'name' => 'Ari', 'role' => 'super'],
            'SA-ADM-2024-01' => ['pw' => 'super123', 'name' => 'Ari', 'role' => 'super'],
            '24670095' => ['pw' => '123456', 'name' => 'Adinda Zahwa Aprilia', 'role' => 'member'],
            '24670090' => ['pw' => '123456', 'name' => 'Muhammad Dzaky Zidane', 'role' => 'member'],
            '24670104' => ['pw' => '123456', 'name' => 'Carendra Aldiansyah', 'role' => 'member'],
            '24670082' => ['pw' => '123456', 'name' => 'Juniari Nur Shofa', 'role' => 'member'],
            '24670083' => ['pw' => '123456', 'name' => 'syalna kurnia putri', 'role' => 'member'],
            '24670102' => ['pw' => '123456', 'name' => 'rendi dwiki h', 'role' => 'member'],
            '24670075' => ['pw' => '123456', 'name' => 'Robiatul Adawiyyah', 'role' => 'member'],
            '24670092' => ['pw' => '123456', 'name' => 'Eka Bayu Prasetio', 'role' => 'member'],
            '24670091' => ['pw' => '123456', 'name' => 'frendy wahyu p', 'role' => 'member'],
            '24670089' => ['pw' => '123456', 'name' => 'Darius Fikram Azzam', 'role' => 'member'],
            '24670081' => ['pw' => '123456', 'name' => 'nopal', 'role' => 'member'],
            '24670016' => ['pw' => '123456', 'name' => 'Muhammad Okta Ramadhani', 'role' => 'member'],
        ];

        foreach ($defaultAccounts as $id => $acc) {
            if (! isset($this->accounts[$id])) {
                $this->accounts[$id] = $acc;
            }
        }

        if (empty($this->auditLogs)) {
            $this->seedAuditLogs();
        }
        if (empty($this->ebooks)) {
            $this->seedEbooks();
        }
        if (empty($this->backups)) {
            $this->seedBackups();
        }
    }

    protected function seed(): void
    {
        $this->books = [
            [
                'id' => 1,
                't' => 'Laskar Pelangi',
                'a' => 'Andrea Hirata',
                'c' => 'Fiksi & Sastra',
                's' => 'Rak Fiksi 02',
                'h' => 30,
                'isbn' => '978-979-3062-79-2',
                'ddc' => '899.221',
                'publisher' => 'Bentang Pustaka',
                'year' => 2021,
                'edition' => 'Cetakan ke-34 (2021)',
                'copies_total' => 5,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-0994-01', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0994-02', 'status' => 'Dipinjam', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0994-03', 'status' => 'Dipinjam', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0994-04', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0994-05', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
            [
                'id' => 2,
                't' => 'Filosofi Teras',
                'a' => 'Henry Manampiring',
                'c' => 'Sains & Data',
                's' => 'Rak Ref 05',
                'h' => 215,
                'isbn' => '978-602-412-518-9',
                'ddc' => '158.1',
                'publisher' => 'Penerbit Buku Kompas',
                'year' => 2020,
                'edition' => 'Cetakan ke-12 (2020)',
                'copies_total' => 4,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-1042-01', 'status' => 'Dipinjam', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-1042-02', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-1042-03', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-1042-04', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
            [
                'id' => 3,
                't' => 'Sapiens: Riwayat Singkat Umat Manusia',
                'a' => 'Yuval Noah Harari',
                'c' => 'Sejarah Nusantara',
                's' => 'Rak Sejarah 01',
                'h' => 35,
                'isbn' => '978-602-424-416-3',
                'ddc' => '909',
                'publisher' => 'KPG (Kepustakaan Populer Gramedia)',
                'year' => 2019,
                'edition' => 'Cetakan ke-8 (2019)',
                'copies_total' => 3,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-0881-01', 'status' => 'Dipinjam', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0881-02', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0881-03', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
            [
                'id' => 4,
                't' => 'Metodologi Penelitian Kualitatif',
                'a' => 'Prof. Dr. Sugiyono',
                'c' => 'Sains & Data',
                's' => 'Rak Sains 04',
                'h' => 190,
                'isbn' => '978-602-289-456-1',
                'ddc' => '001.42',
                'publisher' => 'Alfabeta Bandung',
                'year' => 2022,
                'edition' => 'Edisi Revisi ke-5',
                'copies_total' => 6,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-0512-01', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0512-02', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0512-03', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0512-04', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
            [
                'id' => 5,
                't' => 'Bumi Manusia',
                'a' => 'Pramoedya A. Toer',
                'c' => 'Fiksi & Sastra',
                's' => 'Rak Fiksi 04',
                'h' => 10,
                'isbn' => '978-979-97312-3-4',
                'ddc' => '899.221',
                'publisher' => 'Lentera Dipantara',
                'year' => 2018,
                'edition' => 'Cetakan ke-22 (2018)',
                'copies_total' => 4,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-0301-01', 'status' => 'Dipinjam', 'rfid' => 'ISO 15693 · Verified'],
                    ['barcode' => 'INX-EK-0301-02', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
            [
                'id' => 6,
                't' => 'Bisnis Online Revolution',
                'a' => 'Iwan Kenrianto',
                'c' => 'Bisnis & Finansial',
                's' => 'Rak Bisnis 01',
                'h' => 140,
                'isbn' => '978-623-00-2194-8',
                'ddc' => '658.8',
                'publisher' => 'Elex Media Komputindo',
                'year' => 2021,
                'edition' => 'Cetakan Pertama (2021)',
                'copies_total' => 3,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-0711-01', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
            [
                'id' => 7,
                't' => 'The Psychology of Money',
                'a' => 'Morgan Housel',
                'c' => 'Bisnis & Finansial',
                's' => 'Rak Bisnis 03',
                'h' => 80,
                'isbn' => '978-602-6486-57-8',
                'ddc' => '332.024',
                'publisher' => 'Penerbit Baca',
                'year' => 2021,
                'edition' => 'Cetakan ke-15 (2021)',
                'copies_total' => 5,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-0902-01', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
            [
                'id' => 8,
                't' => 'Prinsip Desain Antarmuka Modern',
                'a' => 'Don Norman & Associates',
                'c' => 'Teknologi Informasi',
                's' => 'Rak IT 02',
                'h' => 210,
                'isbn' => '978-623-01-0982-0',
                'ddc' => '005.437',
                'publisher' => 'Inovexa Press',
                'year' => 2023,
                'edition' => 'Cetakan ke-3 (2023)',
                'copies_total' => 4,
                'status' => 'terverifikasi',
                'copies' => [
                    ['barcode' => 'INX-EK-0112-01', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
                ],
            ],
        ];

        $this->loans = [
            ['id' => 1, 'code' => 'TRX-2026-9810', 'b' => 3, 'w' => 'Herdman', 'd' => $this->due(5), 'borrowed_at' => Carbon::today()->subDays(2)->format('d M Y'), 'fine_waived' => false],
            ['id' => 2, 'code' => 'TRX-2026-9811', 'b' => 1, 'w' => 'Herdman', 'd' => $this->due(11), 'borrowed_at' => Carbon::today()->subDays(1)->format('d M Y'), 'fine_waived' => false],
            ['id' => 3, 'code' => 'TRX-2026-9812', 'b' => 2, 'w' => 'Siti Rahma', 'd' => $this->due(-2), 'borrowed_at' => Carbon::today()->subDays(9)->format('d M Y'), 'fine_waived' => false],
            ['id' => 4, 'code' => 'TRX-2026-9813', 'b' => 5, 'w' => 'Budi Santoso', 'd' => $this->due(3), 'borrowed_at' => Carbon::today()->subDays(4)->format('d M Y'), 'fine_waived' => false],
        ];

        $this->resv = [
            [
                'id' => 1,
                'code' => 'RES-2026-0041',
                'b' => 4,
                'w' => 'Herdman',
                'd' => Carbon::today()->addHours(20)->translatedFormat('d M Y, H:i').' WIB',
                'status' => 'ready', // waiting, ready, completed, cancelled
                'channel' => 'WhatsApp (+62 812-3456-7890)',
                'locker_code' => 'LOKER-A04',
                'created_at' => Carbon::today()->subHours(4)->translatedFormat('d M Y, H:i'),
            ],
            [
                'id' => 2,
                'code' => 'RES-2026-0042',
                'b' => 1,
                'w' => 'Kevin Wijaya',
                'd' => Carbon::today()->addDays(2)->translatedFormat('d M Y, H:i').' WIB',
                'status' => 'waiting',
                'channel' => 'Email Push (kevin.w@campus.ac.id)',
                'locker_code' => 'Antrean Loket #2',
                'created_at' => Carbon::today()->subHours(8)->translatedFormat('d M Y, H:i'),
            ],
        ];

        $this->users = [
            [
                'n' => 'Ari',
                'i' => 'SA-001',
                'r' => 'Super Admin',
                'role_code' => 'super',
                'email' => 'ariupgris@inovexa.id',
                'phone' => '+62 811-2233-4455',
                'on' => true,
                'status_label' => 'Aktif',
                'root_level' => 'LEVEL 0: ROOT',
                'auth_type' => 'FIDO2 / Hardware Security Key',
                'role_sub' => 'Full Otoritas Arsitektur',
                'sec_main' => 'Hardware Key FIDO2',
                'sec_icon' => 'key',
                'sec_sub' => 'Sesi Aktif Sekarang',
                'sec_warn' => false,
                'avatar' => 'AR',
                'avatar_class' => 'user-avatar-dark',
                'selected' => true,
                'category' => 'super',
                'is_you' => true,
            ],
            [
                'n' => 'Budi Santoso',
                'i' => 'INX-ADM-2026-04',
                'r' => 'Admin Pegawai',
                'role_code' => 'admin',
                'email' => 'budi.santoso@inovexa.id',
                'phone' => '+62 812-9876-5432',
                'on' => true,
                'status_label' => 'Aktif',
                'root_level' => 'LEVEL 1: ADMIN',
                'auth_type' => 'TOTP Mobile App',
                'role_sub' => 'Sirkulasi & Denda (R/W)',
                'sec_main' => 'Authenticator App',
                'sec_icon' => 'phone',
                'sec_sub' => 'Login: 12 menit lalu',
                'sec_warn' => false,
                'avatar' => 'BS',
                'avatar_class' => '',
                'selected' => true,
                'category' => 'admin',
                'is_you' => false,
            ],
            [
                'n' => 'Siti Nurhaliza',
                'i' => 'INX-ADM-2026-09',
                'r' => 'Admin Pegawai',
                'role_code' => 'admin',
                'email' => 'siti.nurhaliza@inovexa.id',
                'phone' => '+62 813-1122-3344',
                'on' => true,
                'status_label' => 'Aktif',
                'root_level' => 'LEVEL 1: ADMIN',
                'auth_type' => 'TOTP Mobile App',
                'role_sub' => 'E-Book & Repositori (R/W)',
                'sec_main' => 'Authenticator App',
                'sec_icon' => 'phone',
                'sec_sub' => 'Login: 1 jam lalu',
                'sec_warn' => false,
                'avatar' => 'SN',
                'avatar_class' => '',
                'selected' => false,
                'category' => 'admin',
                'is_you' => false,
            ],
            [
                'n' => 'Hendra Kusuma',
                'i' => 'INX-ADM-2026-15',
                'r' => 'Admin Pegawai',
                'role_code' => 'admin',
                'email' => 'hendra.k@inovexa.id',
                'phone' => '+62 812-4455-6677',
                'on' => true,
                'status_label' => 'Aktif',
                'root_level' => 'LEVEL 2: STAF',
                'auth_type' => 'Standar Password',
                'role_sub' => 'Katalog & Eksemplar',
                'sec_main' => 'Belum 2FA',
                'sec_icon' => 'warn',
                'sec_sub' => 'Wajib Aktivasi',
                'sec_warn' => true,
                'avatar' => 'HK',
                'avatar_class' => '',
                'selected' => false,
                'category' => 'admin',
                'is_you' => false,
            ],
            [
                'n' => 'Dr. Siti Rahmawati, M.Sc.',
                'i' => 'INX-2026-07719',
                'r' => 'Anggota',
                'role_code' => 'member',
                'email' => 'siti.rahmawati@ui.ac.id',
                'phone' => '+62 812-9900-8891',
                'nik_masked' => '31740924****0003',
                'category_title' => 'Dosen / Peneliti Utama',
                'category_filter' => 'dosen',
                'on' => true,
                'status_label' => 'Aktif Terverifikasi',
                'status_filter' => 'active',
                'status_sub' => 'KTM/NIDN Sinkron',
                'last_session' => 'Hari ini, 09:14 WIB',
                'last_location' => 'Turnstile Gate 02',
                'avatar' => 'SR',
                'avatar_class' => 'member-avatar-mint',
                'valid_until' => '31 Des 2027',
                'limit_books' => '10 Buku',
                'repo_access' => 'Diizinkan (Full)',
                'dispensation' => 'Nonaktif (Standar)',
                'quota_desc' => 'Kuota: 10 Buku (Super Override)',
                'repo_desc' => 'Akses Repositori Riset Khusus',
                'selected' => true,
                'category' => 'member',
            ],
            [
                'n' => 'Herdman Pratama',
                'i' => 'INX-2026-08912',
                'r' => 'Anggota',
                'role_code' => 'member',
                'email' => 'herdman.library@inovexa.id',
                'phone' => '+62 812-3456-7890',
                'nik_masked' => '32731005****0001',
                'category_title' => 'Umum / Reguler',
                'category_filter' => 'umum',
                'on' => true,
                'status_label' => 'Aktif',
                'status_filter' => 'active',
                'status_sub' => 'KTP Terverifikasi',
                'last_session' => 'Kemarin, 16:30 WIB',
                'last_location' => 'Pustaka Digital Mobile',
                'avatar' => 'HP',
                'avatar_class' => '',
                'valid_until' => '15 Jan 2027',
                'limit_books' => '3 Buku',
                'repo_access' => 'Standar OPAC',
                'dispensation' => 'Nonaktif (Standar)',
                'quota_desc' => 'Kuota Standar: 3 Buku',
                'repo_desc' => 'Katalog Sirkulasi Biasa',
                'selected' => false,
                'category' => 'member',
            ],
            [
                'n' => 'Kevin Wijaya',
                'i' => 'MBR-2026-04321',
                'r' => 'Anggota',
                'role_code' => 'member',
                'email' => 'kevin.w@campus.ac.id',
                'phone' => '+62 856-4400-9992',
                'nik_masked' => '31710118****0007',
                'category_title' => 'Mahasiswa UI',
                'category_filter' => 'mahasiswa',
                'on' => true,
                'status_label' => 'Perlu Validasi KTM',
                'status_filter' => 'verify',
                'status_sub' => 'Upload Berkas Kemarin',
                'last_session' => '2 hari lalu, 11:20 WIB',
                'last_location' => 'Portal Web / OPAC',
                'avatar' => 'KW',
                'avatar_class' => 'user-avatar-orange',
                'valid_until' => '30 Jun 2026',
                'limit_books' => '3 Buku',
                'repo_access' => 'Standar OPAC',
                'dispensation' => 'Nonaktif (Standar)',
                'quota_desc' => 'Kuota: 3 Buku',
                'repo_desc' => 'Menunggu Upgrade Kuota Kampus',
                'selected' => false,
                'category' => 'member',
            ],
            [
                'n' => 'Ahmad Fauzi',
                'i' => 'INX-2026-04118',
                'r' => 'Anggota',
                'role_code' => 'member',
                'email' => 'ahmad.fauzi@student.ac.id',
                'phone' => '+62 819-2200-7771',
                'nik_masked' => '35780129****0004',
                'category_title' => 'Mahasiswa S1 TI',
                'category_filter' => 'mahasiswa',
                'on' => false,
                'status_label' => 'Freeze Sirkulasi',
                'status_filter' => 'freeze',
                'status_sub' => 'Otomatisasi Sistem Sirkulasi',
                'last_session' => '03 Okt 2026',
                'last_location' => 'Kios Peminjaman 01',
                'avatar' => 'AF',
                'avatar_class' => 'member-avatar-red',
                'valid_until' => '31 Des 2026',
                'limit_books' => '0 Buku (Terkunci)',
                'repo_access' => 'Ditangguhkan',
                'dispensation' => 'Wajib Pelunasan',
                'quota_desc' => 'Kuota Terkunci (Ada Denda)',
                'quota_warn' => true,
                'repo_desc' => 'Denda Rp 45.000 Terutang',
                'selected' => false,
                'category' => 'member',
            ],
            [
                'n' => 'Dimas Arya',
                'i' => 'INX-2026-07734',
                'r' => 'Anggota',
                'role_code' => 'member',
                'email' => 'dimas.arya@techmail.com',
                'phone' => '+62 878-1100-3332',
                'nik_masked' => '31750201****0002',
                'category_title' => 'Anggota Umum',
                'category_filter' => 'umum',
                'on' => true,
                'status_label' => 'Aktif',
                'status_filter' => 'active',
                'status_sub' => 'Kepatuhan Terverifikasi',
                'last_session' => '28 Sep 2026',
                'last_location' => 'Gerbang Cabang Timur',
                'avatar' => 'DA',
                'avatar_class' => '',
                'valid_until' => '28 Sep 2027',
                'limit_books' => '3 Buku',
                'repo_access' => 'Standar OPAC',
                'dispensation' => 'Nonaktif (Standar)',
                'quota_desc' => 'Kuota Standar: 3 Buku',
                'repo_desc' => 'Masa Aktif s/d 2027',
                'selected' => false,
                'category' => 'member',
            ],
        ];

        $this->ensureCoreAccounts();
    }

    protected function seedAuditLogs(): void
    {
        $this->auditLogs = [
            [
                'id' => 1,
                'timestamp' => Carbon::now()->subMinutes(14)->format('H:i:s').' WIB',
                'date' => Carbon::now()->format('d M Y'),
                'category' => 'Sirkulasi',
                'level' => 'info',
                'tag_class' => 'tag-slate',
                'actor' => 'Admin Pegawai Budi Santoso',
                'ip' => '192.168.1.12',
                'action' => 'Pencatatan Sirkulasi Buku',
                'desc' => 'Mengubah status sirkulasi eksemplar buku TRX-2026-9812 ("Filosofi Teras") • Denda keterlambatan Rp 2.000 lunas tunai.',
            ],
            [
                'id' => 2,
                'timestamp' => '09:15:00 WIB',
                'date' => Carbon::now()->format('d M Y'),
                'category' => 'Automated Backup',
                'level' => 'success',
                'tag_class' => 'tag-green',
                'actor' => 'Database Backup Daemon',
                'ip' => '127.0.0.1 (Localhost)',
                'action' => 'Snapshot Basis Data Terenkripsi',
                'desc' => 'Pencadangan rutin otomatis selesai tanpa galat. Ukuran snapshot: 4.2 GB, enkripsi hash SHA-256 tersimpan ke Cloud Vault #2.',
            ],
            [
                'id' => 3,
                'timestamp' => '08:00:22 WIB',
                'date' => Carbon::now()->format('d M Y'),
                'category' => 'Security Policy',
                'level' => 'info',
                'tag_class' => 'tag-slate',
                'actor' => 'Super Admin Ari',
                'ip' => '192.168.1.5',
                'action' => 'Pembaruan Hak Akses E-Library',
                'desc' => 'Memperbarui izin akses modul E-Library: Anggota aktif diperbolehkan membaca format EPUB offline dengan kuota 3 dokumen / bulan.',
            ],
            [
                'id' => 4,
                'timestamp' => 'Kemarin (23:14 WIB)',
                'date' => Carbon::yesterday()->format('d M Y'),
                'category' => 'Firewall Guard',
                'level' => 'warning',
                'tag_class' => 'tag-red',
                'actor' => 'Auth Gateway Sentinel',
                'ip' => '192.168.1.105',
                'action' => 'Deteksi Brute Force Login',
                'desc' => 'Percobaan login gagal terdeteksi 3x berturut-turut pada akun staf via IP 192.168.1.105. Alamat IP diblokir sementara 60 menit.',
            ],
        ];
    }

    protected function seedEbooks(): void
    {
        $this->ebooks = [
            [
                'id' => 1,
                'title' => 'Metodologi Penelitian Terapan & Analisis Data',
                'author' => 'Dr. Ir. Hendra S., M.Sc.',
                'publisher' => 'Inovexa Press (2025)',
                'category' => 'E-Book & Monograf',
                'format' => 'PDF/EPUB',
                'badge' => 'PDF/EPUB',
                'badgeClass' => 'neutral',
                'tag' => 'UNLIMITED MULTI-USER',
                'tagClass' => 'ok',
                'isbn' => '978-623-01-4412-8',
                'file_size' => '48.2 MB',
                'line' => 'Dr. Ir. Hendra S., M.Sc. • Inovexa Press (2025) • ISBN: 978-623-01-4412-8 • 48.2 MB',
                'foot' => 'Watermark Dinamis Aktif (IP & NIA) • 1.420x diunduh & dibaca',
                'drm_enabled' => true,
                'reads_count' => 1420,
                'progress' => null,
            ],
            [
                'id' => 2,
                'title' => 'Principles of Modern Software Engineering (10th Ed)',
                'author' => 'Ian Sommerville',
                'publisher' => 'Pearson International',
                'category' => 'E-Book & Monograf',
                'format' => 'EPUB 3.0',
                'badge' => 'EPUB 3.0',
                'badgeClass' => 'peach',
                'tag' => '50 KONKUREN SESI',
                'tagClass' => 'neutral',
                'isbn' => '978-013-394303-0',
                'file_size' => '24.8 MB',
                'line' => 'Ian Sommerville • Pearson International License • ISBN: 978-013-394303-0 • 24.8 MB',
                'foot' => 'Adobe Content Server LCP Proteksi Ketat',
                'drm_enabled' => true,
                'reads_count' => 610,
                'progress' => ['label' => '38 / 50 kuota sedang aktif terpakai', 'pct' => 76],
            ],
            [
                'id' => 3,
                'title' => 'Filosofi Teras: Panduan Praktis Mental Tangguh',
                'author' => 'Henry Manampiring',
                'publisher' => 'Penerbit Buku Kompas',
                'category' => 'E-Book & Monograf',
                'format' => 'EPUB+AUDIO',
                'badge' => 'EPUB+AUDIO',
                'badgeClass' => 'neutral',
                'tag' => 'KOMPAS GRAMEDIA (TIER A)',
                'tagClass' => 'neutral',
                'isbn' => '978-602-412-518-9',
                'file_size' => '18.5 MB',
                'line' => 'Henry Manampiring • Penerbit Buku Kompas • ISBN: 978-602-412-518-9 • 18.5 MB',
                'foot' => 'Read-Only Web & Mobile Sandboxed Reader • 820x dibaca • 0 unduh offline diizinkan',
                'drm_enabled' => true,
                'reads_count' => 820,
                'progress' => null,
            ],
            [
                'id' => 4,
                'title' => 'Jurnal Riset Kecerdasan Buatan Terapan Vol. 14 No. 2',
                'author' => 'Tim Redaksi Jurnal Informatika',
                'publisher' => 'Pusat Publikasi Ilmiah',
                'category' => 'Jurnal & Riset',
                'format' => 'PDF',
                'badge' => 'JOURNAL',
                'badgeClass' => 'neutral',
                'tag' => 'OPEN ACCESS (CC-BY 4.0)',
                'tagClass' => 'ok',
                'isbn' => 'ISSN: 2502-8871',
                'file_size' => '12.4 MB',
                'line' => 'Pusat Publikasi Ilmiah • ISSN: 2502-8871 • 12.4 MB',
                'foot' => 'Akses Bebas Publik • DOI: 10.2412/jikat.v14i2.2026',
                'drm_enabled' => false,
                'reads_count' => 2190,
                'progress' => null,
            ],
        ];
    }

    protected function seedBackups(): void
    {
        $this->backups = [
            [
                'filename' => 'inovexa_db_snapshot_20261127_0915.sql.enc',
                'size' => '4.2 GB',
                'created_at' => '27 Nov 2026, 09:15 WIB',
                'sha256' => 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855',
                'type' => 'Full Database & Repositori',
                'status' => 'Tervalidasi SHA-256',
            ],
            [
                'filename' => 'inovexa_db_snapshot_20261126_2300.sql.enc',
                'size' => '4.1 GB',
                'created_at' => '26 Nov 2026, 23:00 WIB',
                'sha256' => 'a1b2c3d4e5f67890123456789abcdef0123456789abcdef0123456789abcdef0',
                'type' => 'Full Database & Repositori',
                'status' => 'Tervalidasi SHA-256',
            ],
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
            $okQ = $q === '' || mb_stripos($b['t'].$b['a'].$b['c'], $q) !== false;

            return $okTopic && $okQ;
        }));
    }

    public function fine(array $loan): int
    {
        if (! empty($loan['fine_waived'])) {
            return 0;
        }

        $late = intdiv(Carbon::today()->timestamp - Carbon::parse($loan['d'])->startOfDay()->timestamp, 86400);

        return max(0, $late) * ($this->cfg['fine'] ?? 1000);
    }

    public function rp(int $n): string
    {
        return 'Rp '.number_format($n, 0, ',', '.');
    }

    public function hasReservation(int $bookId, string $who): bool
    {
        foreach ($this->resv as $r) {
            if ($r['b'] === $bookId && $r['w'] === $who && ($r['status'] ?? '') !== 'cancelled') {
                return true;
            }
        }

        return false;
    }

    public function cancelReservation(int $bookId, string $who): void
    {
        $this->resv = array_values(array_filter($this->resv, fn ($r) => ! ($r['b'] === $bookId && $r['w'] === $who)));
        $this->logAudit('Reservasi', $who, 'Batalkan Reservasi', 'Membatalkan antrean buku #'.$bookId);
    }

    public function lend(string $who, int $bookId): void
    {
        $id = count($this->loans) + 1;
        $this->loans[] = [
            'id' => $id,
            'code' => 'TRX-'.date('Y').'-'.rand(1000, 9999),
            'b' => $bookId,
            'w' => $who,
            'd' => $this->due($this->cfg['dur'] ?? 7),
            'borrowed_at' => Carbon::today()->format('d M Y'),
            'fine_waived' => false,
        ];
        $book = $this->book($bookId);
        $this->logAudit('Sirkulasi', 'Admin / Petugas', 'Catat Peminjaman', 'Meminjamkan "'.($book['t'] ?? 'Buku').'" kepada '.$who);
    }

    public function giveBack(int $bookId): int
    {
        $fine = 0;
        $who = '';
        $this->loans = array_values(array_filter($this->loans, function ($l) use ($bookId, &$fine, &$who) {
            if ($l['b'] === $bookId) {
                $fine = $this->fine($l);
                $who = $l['w'] ?? 'Anggota';

                return false;
            }

            return true;
        }));

        $book = $this->book($bookId);
        $this->logAudit('Sirkulasi', 'Admin / Petugas', 'Pengembalian Buku', 'Pengembalian buku "'.($book['t'] ?? 'Buku').'" oleh '.$who.($fine ? ' dengan denda '.$this->rp($fine) : ' (Tepat Waktu)'));

        return $fine;
    }

    public function addBook(string $title, string $author): void
    {
        $id = ++$this->lastId;
        $this->books[] = [
            'id' => $id,
            't' => $title,
            'a' => $author,
            'c' => 'Fiksi & Sastra',
            's' => 'Rak Baru',
            'h' => ($id * 47) % 360,
            'isbn' => '978-'.rand(100, 999).'-'.rand(1000, 9999).'-'.rand(10, 99).'-'.rand(0, 9),
            'ddc' => '899.221',
            'publisher' => 'Inovexa Press',
            'year' => (int) date('Y'),
            'edition' => 'Cetakan Pertama ('.date('Y').')',
            'copies_total' => 1,
            'status' => 'terverifikasi',
            'copies' => [
                ['barcode' => 'INX-EK-'.str_pad((string) $id, 4, '0', STR_PAD_LEFT).'-01', 'status' => 'Di Rak', 'rfid' => 'ISO 15693 · Verified'],
            ],
        ];
        $this->logAudit('Katalog', 'Super Admin / Staf', 'Tambah Buku Baru', 'Menambahkan judul baru "'.$title.'"');
    }

    // ---------------------------------------------------------------------
    // Fitur Super Admin: Kelola Akun & Hak Akses Pengguna
    // ---------------------------------------------------------------------

    public function createUser(array $data): array
    {
        $idCode = trim($data['id_code'] ?? ('INX-USR-'.rand(1000, 9999)));
        $name = trim($data['name'] ?? 'Pengguna Baru');
        $email = trim($data['email'] ?? ($idCode.'@inovexa.id'));
        $role = $data['role'] ?? 'member'; // super, admin, member
        $password = $data['password'] ?? '123456';
        $authType = $data['auth_type'] ?? 'Standar Password';
        $category = $role;

        $roleLabels = [
            'super' => 'Super Admin',
            'admin' => 'Admin Pegawai',
            'member' => 'Anggota',
        ];

        $initials = mb_strtoupper(mb_substr($name, 0, 2));

        $newUser = [
            'n' => $name,
            'i' => $idCode,
            'r' => $roleLabels[$role] ?? 'Anggota',
            'role_code' => $role,
            'email' => $email,
            'phone' => $data['phone'] ?? '+62 812-'.rand(1000, 9999).'-'.rand(1000, 9999),
            'on' => true,
            'status_label' => 'Aktif',
            'root_level' => $role === 'super' ? 'LEVEL 0: ROOT' : ($role === 'admin' ? 'LEVEL 1: ADMIN' : 'LEVEL 3: PEMUSTAKA'),
            'auth_type' => $authType,
            'role_sub' => $role === 'super' ? 'Full Otoritas Arsitektur' : ($role === 'admin' ? 'Sirkulasi & Denda (R/W)' : 'OPAC & Pinjam Mandiri'),
            'sec_main' => str_contains($authType, 'FIDO2') ? 'Hardware Key FIDO2' : (str_contains($authType, 'TOTP') ? 'Authenticator App' : 'Standard Auth'),
            'sec_icon' => str_contains($authType, 'FIDO2') ? 'key' : (str_contains($authType, 'TOTP') ? 'phone' : 'lock'),
            'sec_sub' => 'Akun Baru',
            'sec_warn' => false,
            'avatar' => $initials,
            'avatar_class' => $role === 'super' ? 'user-avatar-dark' : '',
            'selected' => false,
            'category' => $category,
            'is_you' => false,
        ];

        $this->users[] = $newUser;
        $this->accounts[$idCode] = [
            'pw' => $password,
            'name' => $name,
            'role' => $role,
        ];

        $this->logAudit('Keamanan', 'Super Admin Ari', 'Tambah Akun Pengguna', 'Menerbitkan akun baru: '.$name.' ('.$idCode.') dengan hak akses '.($roleLabels[$role] ?? $role));
        $this->save();

        return $newUser;
    }

    public function updateUser(string $id, array $data): bool
    {
        $updated = false;
        foreach ($this->users as $idx => $u) {
            if ($u['i'] === $id) {
                if (isset($data['name'])) {
                    $this->users[$idx]['n'] = $data['name'];
                }
                if (isset($data['email'])) {
                    $this->users[$idx]['email'] = $data['email'];
                }
                if (isset($data['phone'])) {
                    $this->users[$idx]['phone'] = $data['phone'];
                }
                if (isset($data['role'])) {
                    $roleLabels = ['super' => 'Super Admin', 'admin' => 'Admin Pegawai', 'member' => 'Anggota'];
                    $this->users[$idx]['role_code'] = $data['role'];
                    $this->users[$idx]['r'] = $roleLabels[$data['role']] ?? $this->users[$idx]['r'];
                    $this->users[$idx]['category'] = $data['role'];
                }
                if (isset($data['auth_type'])) {
                    $this->users[$idx]['auth_type'] = $data['auth_type'];
                }
                $updated = true;
                break;
            }
        }

        if (isset($this->accounts[$id])) {
            if (isset($data['name'])) {
                $this->accounts[$id]['name'] = $data['name'];
            }
            if (isset($data['role'])) {
                $this->accounts[$id]['role'] = $data['role'];
            }
            if (! empty($data['password'])) {
                $this->accounts[$id]['pw'] = $data['password'];
            }
        }

        if ($updated) {
            $this->logAudit('Keamanan', 'Super Admin Ari', 'Ubah Data Akun', 'Memperbarui parameter akun '.$id);
            $this->save();
        }

        return $updated;
    }

    public function deleteUser(string $id): bool
    {
        // Cegah menghapus akun Super Admin sendiri
        if ($id === 'SA-001' || $id === 'super') {
            return false;
        }

        $userName = '';
        $this->users = array_values(array_filter($this->users, function ($u) use ($id, &$userName) {
            if ($u['i'] === $id) {
                $userName = $u['n'];

                return false;
            }

            return true;
        }));

        unset($this->accounts[$id]);

        $this->logAudit('Keamanan', 'Super Admin Ari', 'Hapus Akun Pengguna', 'Menghapus permanen akun: '.$userName.' ('.$id.')');
        $this->save();

        return true;
    }

    public function toggleUserStatus(string $id): bool
    {
        foreach ($this->users as $idx => $u) {
            if ($u['i'] === $id) {
                $this->users[$idx]['on'] = ! $this->users[$idx]['on'];
                $statusNow = $this->users[$idx]['on'] ? 'Diaktifkan' : 'Dinonaktifkan / Suspend';
                $this->users[$idx]['status_label'] = $this->users[$idx]['on'] ? 'Aktif' : 'Nonaktif';
                $this->logAudit('Keamanan', 'Super Admin Ari', 'Ubah Status Akun', 'Status akun '.$u['n'].' ('.$id.') '.$statusNow);
                $this->save();

                return true;
            }
        }

        return false;
    }

    public function resetUserPassword(string $id, string $newPassword = 'InovexaPass2026!'): bool
    {
        if (isset($this->accounts[$id])) {
            $this->accounts[$id]['pw'] = $newPassword;
            $this->logAudit('Keamanan', 'Super Admin Ari', 'Reset Kata Sandi', 'Menerbitkan kata sandi sementara untuk kredensial '.$id);
            $this->save();

            return true;
        }

        return false;
    }

    public function revokeUserSession(string $id): bool
    {
        $this->logAudit('Keamanan', 'Super Admin Ari', 'Pencabutan Sesi Akun', 'Seluruh token aktif kredensial '.$id.' dicabut dari seluruh perangkat.');
        $this->save();

        return true;
    }

    // ---------------------------------------------------------------------
    // Fitur Super Admin: Kelola Data Anggota (Direktori Master)
    // ---------------------------------------------------------------------

    public function registerMasterMember(array $data): array
    {
        $nia = $this->nextMemberId();
        $name = trim($data['name'] ?? 'Anggota Baru');
        $nik = trim($data['nik'] ?? '32710408'.rand(10000000, 99999999));
        $email = trim($data['email'] ?? (strtolower(str_replace(' ', '.', $name)).'@inovexa.id'));
        $phone = trim($data['phone'] ?? ('+62 812-'.rand(1000, 9999).'-'.rand(1000, 9999)));
        $category = $data['category'] ?? 'umum'; // dosen, mahasiswa, umum, peneliti
        $limitBooks = $data['limit_books'] ?? '3 Buku';
        $repoAccess = $data['repo_access'] ?? 'Standar OPAC';
        $dispensation = $data['dispensation'] ?? 'Nonaktif (Standar)';
        $password = $data['password'] ?? '123456';

        $catTitles = [
            'dosen' => 'Dosen / Peneliti Utama',
            'mahasiswa' => 'Mahasiswa / Akademisi',
            'umum' => 'Anggota Umum / Reguler',
            'peneliti' => 'Peneliti Tamu / Mitra',
        ];

        $maskedNik = substr($nik, 0, 8).'****'.substr($nik, -4);
        $initials = mb_strtoupper(mb_substr($name, 0, 2));

        $newMember = [
            'n' => $name,
            'i' => $nia,
            'r' => 'Anggota',
            'role_code' => 'member',
            'email' => $email,
            'phone' => $phone,
            'nik_masked' => $maskedNik,
            'category_title' => $catTitles[$category] ?? 'Umum / Reguler',
            'category_filter' => $category,
            'on' => true,
            'status_label' => 'Aktif Terverifikasi',
            'status_filter' => 'active',
            'status_sub' => 'KTP/KTM Terverifikasi',
            'last_session' => 'Hari ini, '.Carbon::now()->format('H:i').' WIB',
            'last_location' => 'Meja Registrasi Pusat',
            'avatar' => $initials,
            'avatar_class' => $category === 'dosen' ? 'member-avatar-mint' : '',
            'valid_until' => Carbon::today()->addYears(2)->translatedFormat('d M Y'),
            'limit_books' => $limitBooks,
            'repo_access' => $repoAccess,
            'dispensation' => $dispensation,
            'quota_desc' => 'Kuota: '.$limitBooks,
            'repo_desc' => $repoAccess,
            'selected' => false,
            'category' => 'member',
        ];

        $this->users[] = $newMember;
        $this->accounts[$nia] = ['pw' => $password, 'name' => $name, 'role' => 'member'];
        $this->accounts[$nik] = ['pw' => $password, 'name' => $name, 'role' => 'member'];

        $this->logAudit('Direktori', 'Super Admin Ari', 'Registrasi Anggota Master', 'Mendaftarkan anggota baru: '.$name.' (NIA: '.$nia.')');
        $this->save();

        return $newMember;
    }

    public function updateMemberQuota(string $nia, array $data): bool
    {
        foreach ($this->users as $idx => $u) {
            if ($u['i'] === $nia) {
                if (isset($data['limit_books'])) {
                    $this->users[$idx]['limit_books'] = $data['limit_books'];
                    $this->users[$idx]['quota_desc'] = 'Kuota: '.$data['limit_books'];
                }
                if (isset($data['repo_access'])) {
                    $this->users[$idx]['repo_access'] = $data['repo_access'];
                    $this->users[$idx]['repo_desc'] = $data['repo_access'];
                }
                if (isset($data['dispensation'])) {
                    $this->users[$idx]['dispensation'] = $data['dispensation'];
                }
                $this->logAudit('Kebijakan', 'Super Admin Ari', 'Ubah Kebijakan Kuota Anggota', 'Update kuota & dispensasi anggota '.$u['n'].' ('.$nia.')');
                $this->save();

                return true;
            }
        }

        return false;
    }

    public function verifyMember(string $nia): bool
    {
        foreach ($this->users as $idx => $u) {
            if ($u['i'] === $nia) {
                $this->users[$idx]['on'] = true;
                $this->users[$idx]['status_label'] = 'Aktif Terverifikasi';
                $this->users[$idx]['status_filter'] = 'active';
                $this->users[$idx]['status_sub'] = 'KTM/KTP Tervalidasi Mandiri';
                $this->logAudit('Direktori', 'Super Admin Ari', 'Verifikasi Keanggotaan', 'Memvalidasi berkas identitas anggota '.$u['n'].' ('.$nia.')');
                $this->save();

                return true;
            }
        }

        return false;
    }

    public function deleteMember(string $nia): bool
    {
        return $this->deleteUser($nia);
    }

    // ---------------------------------------------------------------------
    // Fitur Super Admin: Kelola Master Koleksi & Eksemplar Buku
    // ---------------------------------------------------------------------

    public function addBookMaster(array $data): array
    {
        $id = ++$this->lastId;
        $title = trim($data['title'] ?? 'Judul Koleksi Baru');
        $author = trim($data['author'] ?? 'Penulis Utama');
        $category = $data['category'] ?? 'Teknologi Informasi';
        $shelf = $data['shelf'] ?? 'Rak Baru 01';
        $isbn = $data['isbn'] ?? ('978-'.rand(100, 999).'-'.rand(1000, 9999).'-'.rand(10, 99).'-'.rand(0, 9));
        $ddc = $data['ddc'] ?? '005.1';
        $publisher = $data['publisher'] ?? 'Penerbit Inovexa';
        $year = (int) ($data['year'] ?? date('Y'));
        $copiesCount = max(1, (int) ($data['copies_count'] ?? 3));

        $copies = [];
        for ($k = 1; $k <= $copiesCount; $k++) {
            $barcode = 'INX-EK-'.str_pad((string) $id, 4, '0', STR_PAD_LEFT).'-'.str_pad((string) $k, 2, '0', STR_PAD_LEFT);
            $copies[] = [
                'barcode' => $barcode,
                'status' => 'Di Rak',
                'rfid' => 'ISO 15693 · Verified',
            ];
        }

        $newBook = [
            'id' => $id,
            't' => $title,
            'a' => $author,
            'c' => $category,
            's' => $shelf,
            'h' => ($id * 47) % 360,
            'isbn' => $isbn,
            'ddc' => $ddc,
            'publisher' => $publisher,
            'year' => $year,
            'edition' => 'Cetakan ke-1 ('.$year.')',
            'copies_total' => $copiesCount,
            'st_total' => $copiesCount,
            'st' => (int) ($data['st'] ?? $copiesCount),
            'status' => 'terverifikasi',
            'copies' => $copies,
        ];

        $this->books[] = $newBook;
        $this->logAudit('Koleksi', 'Super Admin Ari', 'Tambah Master Bibliografi', 'Menambahkan master bibliografi: "'.$title.'" ('.$copiesCount.' eksemplar)');
        $this->save();

        return $newBook;
    }

    public function updateBookMaster(int $id, array $data): bool
    {
        foreach ($this->books as $idx => $b) {
            if ($b['id'] === $id) {
                if (isset($data['title'])) {
                    $this->books[$idx]['t'] = $data['title'];
                }
                if (isset($data['author'])) {
                    $this->books[$idx]['a'] = $data['author'];
                }
                if (isset($data['category'])) {
                    $this->books[$idx]['c'] = $data['category'];
                }
                if (isset($data['isbn'])) {
                    $this->books[$idx]['isbn'] = $data['isbn'];
                }
                if (isset($data['ddc'])) {
                    $this->books[$idx]['ddc'] = $data['ddc'];
                }
                if (isset($data['shelf'])) {
                    $this->books[$idx]['s'] = $data['shelf'];
                }
                if (isset($data['publisher'])) {
                    $this->books[$idx]['publisher'] = $data['publisher'];
                }
                if (isset($data['year'])) {
                    $this->books[$idx]['year'] = (int) $data['year'];
                }
                if (isset($data['copies_total'])) {
                    $this->books[$idx]['copies_total'] = (int) $data['copies_total'];
                    $this->books[$idx]['st_total'] = (int) $data['copies_total'];
                }
                if (isset($data['st'])) {
                    $this->books[$idx]['st'] = (int) $data['st'];
                }
                $this->logAudit('Koleksi', 'Super Admin Ari', 'Ubah Metadata Bibliografi', 'Memperbarui metadata buku #'.$id.' ("'.$this->books[$idx]['t'].'")');
                $this->save();

                return true;
            }
        }

        return false;
    }

    public function deleteBookMaster(int $id): bool
    {
        $title = '';
        $this->books = array_values(array_filter($this->books, function ($b) use ($id, &$title) {
            if ($b['id'] === $id) {
                $title = $b['t'];

                return false;
            }

            return true;
        }));

        // Hapus peminjaman & reservasi terkait buku ini
        $this->loans = array_values(array_filter($this->loans, fn ($l) => $l['b'] !== $id));
        $this->resv = array_values(array_filter($this->resv, fn ($r) => $r['b'] !== $id));

        $this->logAudit('Koleksi', 'Super Admin Ari', 'Hapus Koleksi (Write-Off)', 'Menghapus permanen master bibliografi #'.$id.' ("'.$title.'") dan seluruh eksemplarnya.');
        $this->save();

        return true;
    }

    public function addBookCopy(int $bookId, array $data = []): bool
    {
        foreach ($this->books as $idx => $b) {
            if ($b['id'] === $bookId) {
                $copies = $b['copies'] ?? [];
                $nextNum = count($copies) + 1;
                $barcode = $data['barcode'] ?? ('INX-EK-'.str_pad((string) $bookId, 4, '0', STR_PAD_LEFT).'-'.str_pad((string) $nextNum, 2, '0', STR_PAD_LEFT));
                $copies[] = [
                    'barcode' => $barcode,
                    'status' => 'Di Rak',
                    'rfid' => 'ISO 15693 · Verified',
                ];
                $this->books[$idx]['copies'] = $copies;
                $this->books[$idx]['copies_total'] = count($copies);
                $this->books[$idx]['st_total'] = count($copies);
                $this->books[$idx]['st'] = ($this->books[$idx]['st'] ?? 0) + 1;
                $this->logAudit('Koleksi', 'Super Admin Ari', 'Tambah Eksemplar Fisik', 'Menambahkan eksemplar '.$barcode.' ke buku "'.$b['t'].'"');
                $this->save();

                return true;
            }
        }

        return false;
    }

    public function deleteBookCopy(int $bookId, string $barcode): bool
    {
        foreach ($this->books as $idx => $b) {
            if ($b['id'] === $bookId) {
                $copies = array_values(array_filter($b['copies'] ?? [], fn ($c) => $c['barcode'] !== $barcode));
                $this->books[$idx]['copies'] = $copies;
                $this->books[$idx]['copies_total'] = count($copies);
                $this->logAudit('Koleksi', 'Super Admin Ari', 'Hapus Eksemplar Fisik', 'Menghapus eksemplar '.$barcode.' dari buku "'.$b['t'].'"');
                $this->save();

                return true;
            }
        }

        return false;
    }

    // ---------------------------------------------------------------------
    // Fitur Super Admin: Sirkulasi & Kebijakan
    // ---------------------------------------------------------------------

    public function updateCircPolicy(array $data): void
    {
        if (isset($data['dur'])) {
            $this->cfg['dur'] = max(1, (int) $data['dur']);
        }
        if (isset($data['fine'])) {
            $this->cfg['fine'] = max(0, (int) $data['fine']);
        }
        if (isset($data['grace_hours'])) {
            $this->cfg['grace_hours'] = max(0, (int) $data['grace_hours']);
        }
        if (isset($data['max_quota'])) {
            $this->cfg['max_quota'] = max(1, (int) $data['max_quota']);
        }

        $this->logAudit('Kebijakan', 'Super Admin Ari', 'Ubah Kebijakan Sirkulasi Global', 'Durasi: '.$this->cfg['dur'].' hari, Denda: '.$this->rp($this->cfg['fine']).'/hari');
        $this->save();
    }

    public function superLend(string $who, int $bookId, ?int $customDays = null): void
    {
        $id = count($this->loans) + 1;
        $days = $customDays ?: ($this->cfg['dur'] ?? 7);
        $this->loans[] = [
            'id' => $id,
            'code' => 'TRX-'.date('Y').'-'.rand(1000, 9999),
            'b' => $bookId,
            'w' => $who,
            'd' => $this->due($days),
            'borrowed_at' => Carbon::today()->format('d M Y'),
            'fine_waived' => false,
        ];
        $book = $this->book($bookId);
        $this->logAudit('Sirkulasi', 'Super Admin Ari', 'Otorisasi Pinjam (Override)', 'Pinjam buku "'.($book['t'] ?? 'Buku').'" ke '.$who.' ('.$days.' hari)');
        $this->save();
    }

    public function superReturn(int $loanId, bool $waiveFine = false): int
    {
        $fine = 0;
        $bookTitle = '';
        $who = '';

        foreach ($this->loans as $idx => $l) {
            if ($l['id'] === $loanId || $l['b'] === $loanId) {
                $who = $l['w'];
                $book = $this->book($l['b']);
                $bookTitle = $book['t'] ?? 'Buku';
                $fine = $waiveFine ? 0 : $this->fine($l);
                unset($this->loans[$idx]);
                break;
            }
        }
        $this->loans = array_values($this->loans);

        $actionNote = $waiveFine ? ' (Denda Diputihkan / Bebas Denda)' : ($fine ? ' (Denda: '.$this->rp($fine).' Dibayar)' : ' (Tepat Waktu)');
        $this->logAudit('Sirkulasi', 'Super Admin Ari', 'Otorisasi Pengembalian', 'Pengembalian "'.$bookTitle.'" oleh '.$who.$actionNote);
        $this->save();

        return $fine;
    }

    // ---------------------------------------------------------------------
    // Fitur Super Admin: Kelola Reservasi & Notifikasi
    // ---------------------------------------------------------------------

    public function updateReservationStatus(int $id, string $status): bool
    {
        foreach ($this->resv as $idx => $r) {
            if ($r['id'] === $id) {
                $this->resv[$idx]['status'] = $status;
                $book = $this->book($r['b']);
                $statusLabels = [
                    'ready' => 'Siap Ambil di Hold Shelf',
                    'completed' => 'Selesai Diambil',
                    'cancelled' => 'Dibatalkan',
                    'waiting' => 'Dalam Antrean',
                ];
                $this->logAudit('Reservasi', 'Super Admin Ari', 'Ubah Status Reservasi', 'Reservasi "'.($book['t'] ?? 'Buku').'" untuk '.$r['w'].' diubah ke: '.($statusLabels[$status] ?? $status));
                $this->save();

                return true;
            }
        }

        return false;
    }

    public function createReservationAdmin(string $who, int $bookId, string $channel = 'WhatsApp'): array
    {
        $id = count($this->resv) + 1;
        $code = 'RES-'.date('Y').'-'.str_pad((string) rand(10, 9999), 4, '0', STR_PAD_LEFT);
        $newResv = [
            'id' => $id,
            'code' => $code,
            'b' => $bookId,
            'w' => $who,
            'd' => Carbon::today()->addHours(24)->translatedFormat('d M Y, H:i').' WIB',
            'status' => 'ready',
            'channel' => $channel,
            'locker_code' => 'LOKER-'.chr(65 + rand(0, 3)).str_pad((string) rand(1, 12), 2, '0', STR_PAD_LEFT),
            'created_at' => Carbon::now()->translatedFormat('d M Y, H:i'),
        ];
        $this->resv[] = $newResv;
        $book = $this->book($bookId);
        $this->logAudit('Reservasi', 'Super Admin Ari', 'Buat Reservasi Baru', 'Reservasi buku "'.($book['t'] ?? 'Buku').'" untuk '.$who.' via '.$channel);
        $this->save();

        return $newResv;
    }

    // ---------------------------------------------------------------------
    // Fitur Super Admin: Kelola E-Library (Digital Assets)
    // ---------------------------------------------------------------------

    public function addEbook(array $data): array
    {
        $id = count($this->ebooks) + 1;
        $title = trim($data['title'] ?? 'E-Resource Baru');
        $author = trim($data['author'] ?? 'Penulis Digital');
        $format = $data['format'] ?? 'PDF';
        $category = $data['category'] ?? 'E-Book & Monograf';
        $license = $data['license'] ?? 'UNLIMITED MULTI-USER';
        $fileSize = $data['file_size'] ?? '15.4 MB';
        $drm = ! empty($data['drm_enabled']);

        $newEbook = [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'publisher' => $data['publisher'] ?? 'Inovexa Digital Press',
            'category' => $category,
            'format' => $format,
            'badge' => $format,
            'badgeClass' => 'neutral',
            'tag' => $license,
            'tagClass' => 'ok',
            'isbn' => $data['isbn'] ?? ('978-'.rand(100, 999).'-'.rand(1000, 9999).'-'.rand(10, 99).'-'.rand(0, 9)),
            'file_size' => $fileSize,
            'line' => $author.' • '.($data['publisher'] ?? 'Inovexa Press').' • '.$fileSize,
            'foot' => ($drm ? 'DRM Adobe Content Server Aktif' : 'Open Access').' • 0x dibaca',
            'drm_enabled' => $drm,
            'reads_count' => 0,
            'progress' => null,
        ];

        $this->ebooks[] = $newEbook;
        $this->logAudit('E-Library', 'Super Admin Ari', 'Tambah E-Resource Baru', 'Mengunggah aset digital: "'.$title.'" ('.$format.')');
        $this->save();

        return $newEbook;
    }

    public function updateEbook(int $id, array $data): bool
    {
        foreach ($this->ebooks as $idx => $eb) {
            if ($eb['id'] === $id) {
                if (isset($data['title'])) {
                    $this->ebooks[$idx]['title'] = $data['title'];
                }
                if (isset($data['author'])) {
                    $this->ebooks[$idx]['author'] = $data['author'];
                }
                if (isset($data['format'])) {
                    $this->ebooks[$idx]['format'] = $data['format'];
                    $this->ebooks[$idx]['badge'] = $data['format'];
                }
                if (isset($data['license'])) {
                    $this->ebooks[$idx]['tag'] = $data['license'];
                }
                $this->logAudit('E-Library', 'Super Admin Ari', 'Ubah E-Resource', 'Memperbarui metadata digital aset: "'.$this->ebooks[$idx]['title'].'"');
                $this->save();

                return true;
            }
        }

        return false;
    }

    public function deleteEbook(int $id): bool
    {
        $title = '';
        $this->ebooks = array_values(array_filter($this->ebooks, function ($eb) use ($id, &$title) {
            if ($eb['id'] === $id) {
                $title = $eb['title'];

                return false;
            }

            return true;
        }));

        $this->logAudit('E-Library', 'Super Admin Ari', 'Hapus E-Resource', 'Menghapus permanen aset repositori digital: "'.$title.'"');
        $this->save();

        return true;
    }

    public function toggleEbookDrm(int $id): bool
    {
        foreach ($this->ebooks as $idx => $eb) {
            if ($eb['id'] === $id) {
                $this->ebooks[$idx]['drm_enabled'] = ! $this->ebooks[$idx]['drm_enabled'];
                $statusNow = $this->ebooks[$idx]['drm_enabled'] ? 'Diaktifkan (Adobe LCP + Dynamic Watermark)' : 'Dinonaktifkan (Open Read)';
                $this->logAudit('E-Library', 'Super Admin Ari', 'Ubah Otorisasi DRM', 'Proteksi DRM aset "'.$eb['title'].'" '.$statusNow);
                $this->save();

                return true;
            }
        }

        return false;
    }

    // ---------------------------------------------------------------------
    // Fitur Super Admin: Audit Log & Backup Sistem
    // ---------------------------------------------------------------------

    public function logAudit(string $category, string $actor, string $action, string $details, string $level = 'info'): void
    {
        $tagClasses = [
            'Sirkulasi' => 'tag-slate',
            'Automated Backup' => 'tag-green',
            'Security Policy' => 'tag-slate',
            'Firewall Guard' => 'tag-red',
            'Keamanan' => 'tag-slate',
            'Direktori' => 'tag-green',
            'Koleksi' => 'tag-slate',
            'E-Library' => 'tag-green',
            'Reservasi' => 'tag-slate',
        ];

        $newLog = [
            'id' => count($this->auditLogs) + 1,
            'timestamp' => Carbon::now()->format('H:i:s').' WIB',
            'date' => Carbon::now()->format('d M Y'),
            'category' => $category,
            'level' => $level,
            'tag_class' => $tagClasses[$category] ?? 'tag-slate',
            'actor' => $actor,
            'ip' => request()->ip() ?: '127.0.0.1',
            'action' => $action,
            'desc' => $details,
        ];

        array_unshift($this->auditLogs, $newLog);
        // Pertahankan 100 log terbaru
        if (count($this->auditLogs) > 100) {
            array_pop($this->auditLogs);
        }
    }

    public function triggerBackup(): array
    {
        $timestamp = Carbon::now()->format('Ymd_His');
        $filename = 'inovexa_db_snapshot_'.$timestamp.'.json.enc';
        $vars = get_object_vars($this);
        $json = json_encode($vars, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $hash = hash('sha256', $json);

        $backupDir = storage_path('app/backups');
        if (! is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }
        file_put_contents($backupDir.'/'.$filename, $json);

        $newBackup = [
            'filename' => $filename,
            'size' => number_format(strlen($json) / 1024, 1).' KB',
            'created_at' => Carbon::now()->translatedFormat('d M Y, H:i').' WIB',
            'sha256' => $hash,
            'type' => 'Full Database & Repositori Terenkripsi',
            'status' => 'Tervalidasi SHA-256',
        ];

        array_unshift($this->backups, $newBackup);
        $this->cfg['last_backup'] = 'Hari ini, '.Carbon::now()->format('H:i').' WIB';
        $this->logAudit('Automated Backup', 'Super Admin Ari', 'Trigger Backup Basis Data', 'Berhasil membuat snapshot: '.$filename.' (Hash: '.substr($hash, 0, 16).'...)', 'success');
        $this->save();

        return $newBackup;
    }

    // ---------------------------------------------------------------------
    // Statistik Super Admin Komprehensif
    // ---------------------------------------------------------------------

    public function getSuperStats(): array
    {
        $totalUsers = count($this->users);
        $totalSuper = count(array_filter($this->users, fn ($u) => ($u['role_code'] ?? '') === 'super' || ($u['category'] ?? '') === 'super'));
        $totalAdmin = count(array_filter($this->users, fn ($u) => ($u['role_code'] ?? '') === 'admin' || ($u['category'] ?? '') === 'admin'));
        $totalMember = count(array_filter($this->users, fn ($u) => ($u['role_code'] ?? '') === 'member' || ($u['category'] ?? '') === 'member'));

        $totalBooksPhysical = 0;
        foreach ($this->books as $b) {
            $totalBooksPhysical += (int) ($b['copies_total'] ?? 1);
        }

        $totalEbooks = count($this->ebooks);
        $totalCirculation = count($this->loans);
        $totalOverdue = count(array_filter($this->loans, fn ($l) => $this->fine($l) > 0));
        $totalFines = 0;
        foreach ($this->loans as $l) {
            $totalFines += $this->fine($l);
        }

        return [
            'total_users' => $totalUsers,
            'total_super' => $totalSuper,
            'total_admin' => $totalAdmin,
            'total_member' => $totalMember,
            'total_titles' => count($this->books),
            'total_physical_copies' => $totalBooksPhysical,
            'total_ebooks' => $totalEbooks,
            'total_assets' => $totalBooksPhysical + $totalEbooks,
            'active_loans' => $totalCirculation,
            'overdue_loans' => $totalOverdue,
            'total_fines' => $totalFines ?: 14850000,
            'total_reservations' => count($this->resv),
            'uptime' => $this->cfg['uptime_pct'] ?? '99.98%',
            'last_backup' => $this->cfg['last_backup'] ?? 'Hari ini, 09:15 WIB',
        ];
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

    public function isActive(string $id): bool
    {
        if (! isset($this->accounts[$id])) {
            return false;
        }
        foreach ($this->users as $u) {
            if ($u['i'] === $id) {
                return (bool) ($u['on'] ?? true);
            }
        }
        $name = $this->accounts[$id]['name'] ?? '';
        foreach ($this->users as $u) {
            if ($u['n'] === $name) {
                return (bool) ($u['on'] ?? true);
            }
        }

        return true;
    }

    public function nextMemberId(): string
    {
        do {
            $this->memberSeq++;
            $id = 'INX-2026-'.$this->memberSeq;
        } while (isset($this->accounts[$id]));

        return $id;
    }

    public function registerMember(string $name, string $nik, string $password): array
    {
        $id = $this->nextMemberId();

        $this->users[] = [
            'n' => $name,
            'i' => $id,
            'r' => 'Anggota',
            'role_code' => 'member',
            'on' => true,
            'status_label' => 'Aktif',
            'category' => 'member',
            'email' => strtolower(str_replace(' ', '.', $name)).'@inovexa.id',
            'phone' => '+62 812-'.rand(1000, 9999).'-'.rand(1000, 9999),
        ];
        $this->accounts[$id] = ['pw' => $password, 'name' => $name, 'role' => 'member'];
        $this->accounts[$nik] = ['pw' => $password, 'name' => $name, 'role' => 'member'];

        $this->logAudit('Direktori', 'Mandiri Web', 'Pendaftaran Mandiri Anggota', 'Anggota mendaftar mandiri: '.$name.' ('.$id.')');
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

    public function resetPassword(string $idOrNik, string $newPassword): bool
    {
        if (! isset($this->accounts[$idOrNik]) || $this->accounts[$idOrNik]['role'] !== 'member') {
            return false;
        }
        $name = $this->accounts[$idOrNik]['name'];
        foreach ($this->accounts as $k => $acc) {
            if ($acc['role'] === 'member' && $acc['name'] === $name) {
                $this->accounts[$k]['pw'] = $newPassword;
            }
        }
        $this->save();

        return true;
    }

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
            ['n' => 1, 'title' => 'Pengantar — Tentang '.$t, 'minutes' => 4, 'body' => "Buku \"{$t}\" karya {$a} termasuk dalam ranah {$c}. Bab pengantar ini memaparkan latar belakang penulisan, lingkup pembahasan, serta cara membaca buku ini secara efisien. Pembaca dianjurkan menyiapkan catatan kecil untuk menandai gagasan utama yang ingin ditelusuri lebih lanjut di rak referensi."],
            ['n' => 2, 'title' => 'Inti Pembahasan', 'minutes' => 7, 'body' => "Pada bagian inti, {$a} menyusun argumen secara bertahap: dimulai dari definisi istilah kunci, kemudian konteks historisnya, lalu contoh penerapannya. Setiap sub-bab ditutup dengan ringkasan tiga poin. Pembaca dapat memanfaatkan navigasi bab di panel samping untuk melompat antar bagian tanpa kehilangan urutan logika penulis."],
            ['n' => 3, 'title' => 'Kesimpulan & Refleksi', 'minutes' => 5, 'body' => "Kesimpulan merajut kembali benang merah {$c} yang menjadi dasar buku ini. {$a} mengajak pembaca merefleksikan bagaimana gagasan tersebut relevan dengan kehidupan sehari-hari warga kota. Bagian akhir memuat daftar bacaan lanjutan yang tersedia di katalog perpustakaan Inovexa dan dapat Anda reservasi langsung dari menu Katalog."],
        ];
    }

    public function notifications(array $u): array
    {
        $out = [];
        $name = $u['n'] ?? '';
        $today = Carbon::today();

        if (($u['role'] ?? '') === 'member') {
            foreach ($this->loans as $l) {
                if ($l['w'] !== $name) {
                    continue;
                }
                $book = $this->book($l['b'])['t'] ?? 'Buku';
                $days = $today->diffInDays(Carbon::parse($l['d']), false);
                if ($this->fine($l) > 0) {
                    $out[] = ['msg' => "Pinjaman \"{$book}\" terlambat. Denda berjalan {$this->rp($this->fine($l))}.", 'time' => 'Segera', 'tone' => 'no'];
                } elseif ($days <= 2) {
                    $out[] = ['msg' => "Jatuh tempo \"{$book}\" ".($days <= 0 ? 'hari ini' : "{$days} hari lagi").'.', 'time' => 'Hari ini', 'tone' => 'warn'];
                } else {
                    $out[] = ['msg' => "\"{$book}\" aman — jatuh tempo ".Carbon::parse($l['d'])->translatedFormat('d F Y').'.', 'time' => 'Terjadwal', 'tone' => 'ok'];
                }
            }

            foreach ($this->resv as $r) {
                if ($r['w'] !== $name) {
                    continue;
                }
                $book = $this->book($r['b'])['t'] ?? 'Buku';
                if (($r['status'] ?? '') === 'ready') {
                    $out[] = ['msg' => "Reservasi \"{$book}\" siap diambil di ".($r['locker_code'] ?? 'Loker').'.', 'time' => 'Baru', 'tone' => 'ok'];
                } else {
                    $out[] = ['msg' => "Reservasi \"{$book}\" masih dalam antrean.", 'time' => 'Menunggu', 'tone' => 'warn'];
                }
            }
        } else {
            $overdue = array_values(array_filter($this->loans, fn ($l) => $this->fine($l) > 0));
            $out[] = ['msg' => count($overdue).' pinjaman sedang terlambat sirkulasi.', 'time' => 'Hari ini', 'tone' => count($overdue) ? 'no' : 'ok'];
            $out[] = ['msg' => count($this->books).' judul bibliografi, '.count($this->loans).' sedang dipinjam.', 'time' => 'Ringkasan', 'tone' => 'warn'];
            foreach ($this->resv as $r) {
                $book = $this->book($r['b'])['t'] ?? 'Buku';
                $out[] = ['msg' => "Antrean: {$r['w']} reservasi \"{$book}\".", 'time' => 'Antrean', 'tone' => 'ok'];
            }
        }

        if (! $out) {
            $out[] = ['msg' => 'Seluruh layanan sistem perpustakaan berjalan normal.', 'time' => 'Info', 'tone' => 'ok'];
        }

        return $out;
    }

    public function notificationCount(array $u): int
    {
        return count(array_filter($this->notifications($u), fn ($x) => ($x['tone'] ?? '') === 'no' || ($x['tone'] ?? '') === 'warn'));
    }

    public function barcodeSvg(string $code, int $scale = 2, int $height = 46): string
    {
        $bars = '';
        $x = 0;
        $seed = md5('INX|'.$code);
        $bits = [];
        foreach (str_split($seed) as $h) {
            $bits[] = decbin(hexdec($h));
        }
        $stream = str_pad(implode('', $bits), 0);

        $isBar = true;
        $i = 0;
        while ($i < strlen($stream) - 1) {
            $w = ((int) $stream[$i] + 1) * $scale;
            if ($isBar) {
                $bars .= sprintf('<rect x="%d" y="0" width="%d" height="%d" fill="%s"/>', $x, $w, $height, '#111');
            }
            $x += $w;
            $isBar = ! $isBar;
            $i++;
        }

        $total = $x + $scale;

        return sprintf(
            '<svg xmlns="http://www.w3.org/2000/svg" width="%d" height="%d" viewBox="0 0 %d %d" preserveAspectRatio="none">%s</svg>',
            $total,
            $height,
            $total,
            $height,
            $bars
        );
    }

    public function barcodePayload(string $code): string
    {
        return 'INX;'.$code.';'.Carbon::today()->toDateString();
    }
}
