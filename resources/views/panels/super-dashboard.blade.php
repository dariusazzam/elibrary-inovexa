{{-- ========================================================================= --}}
{{-- KONSOL DASHBOARD SUPER ADMIN PERSIS REFERENSI FIGMA                    --}}
{{-- ========================================================================= --}}

<div class="super-dashboard-container">
    {{-- ================================================================= --}}
    {{-- 1. HERO BANNER HIJAU TUA WATERMARK SHIELD                          --}}
    {{-- ================================================================= --}}
    <div class="super-hero-banner">
        {{-- Shield Watermark di sisi kanan --}}
        <div class="super-hero-watermark" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <path d="M12 8v8"/>
                <path d="M8 12h8"/>
            </svg>
        </div>

        {{-- Tag Kicker Atas --}}
        <div class="super-hero-kicker">
            <span class="super-dot-orange"></span>
            <span>PUSAT KONTROL TINGGI &bull; HAK AKSES PUSAT &amp; INFRASTRUKTUR SISTEM</span>
        </div>

        {{-- Greeting Title & Subtitle --}}
        <h1 class="super-hero-title">Halo, Super Admin Ari!</h1>
        <p class="super-hero-desc">
            Kendali penuh tata kelola ekosistem perpustakaan digital: pemeliharaan integritas database, dan pengawasan audit seluruh aktivitas sistem Perpustakaan Inovexa Technologies secara mandiri operasional.
        </p>

        {{-- Quick Actions Hero --}}
        <div class="super-hero-actions">
            <button type="button" class="super-btn-primary" onclick="toast('Membuka formulir registrasi akun staf baru...')">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <span>Tambah Akun Baru</span>
            </button>
            <button type="button" class="super-btn-glass" onclick="window.location='{{ route('dashboard', 'roles') }}'">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <span>Konfigurasi Hak Akses</span>
            </button>
            <button type="button" class="super-btn-glass" onclick="toast('Pencadangan darurat basis data SQL berhasil dieksekusi!')">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                <span>Backup Database Real-time</span>
            </button>
            <button type="button" class="super-btn-glass" onclick="toast('Mengunduh audit log keamanan sistem (.csv)...')">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                <span>Unduh Audit Log</span>
            </button>
        </div>
    </div>

    {{-- ================================================================= --}}
    {{-- 2. 4 KARTU STATISTIK UTAMA (KPI CARDS)                            --}}
    {{-- ================================================================= --}}
    <div class="super-kpi-grid">
        {{-- Card 1: Total Akun Pengguna --}}
        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon green">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <span class="super-kpi-badge mint">↗ +12 Minggu ini</span>
            </div>
            <div class="super-kpi-label">TOTAL AKUN PENGGUNA</div>
            <div class="super-kpi-value">2.450 <span class="super-kpi-unit">Akun</span></div>
            <div class="super-kpi-sub"><b>1.850</b> Mahasiswa &bull; <b>47</b> Pegawai &amp; <b>1</b> Super Admin</div>
        </div>

        {{-- Card 2: Uptime Sistem & DB --}}
        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon green">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                </div>
                <span class="super-kpi-badge mint">● Optimal</span>
            </div>
            <div class="super-kpi-label">UPTIME SISTEM &amp; DB</div>
            <div class="super-kpi-value">99.98%</div>
            <div class="super-kpi-sub">Peningkatan latensi &lt; 140ms Ping</div>
        </div>

        {{-- Card 3: Total Koleksi Buku & Repository --}}
        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon slate">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <span class="super-kpi-badge slate">14 Koleksi Baru</span>
            </div>
            <div class="super-kpi-label">TOTAL KOLEKSI BUKU &amp; REPOSITORY</div>
            <div class="super-kpi-value">18.420 <span class="super-kpi-unit">Aset</span></div>
            <div class="super-kpi-sub"><b>11.600</b> Fisik &bull; <b>6.820</b> Digital</div>
        </div>

        {{-- Card 4: Kas Sirkulasi & Denda --}}
        <div class="super-kpi-card">
            <div class="super-kpi-head">
                <div class="super-kpi-icon amber">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="3"/><line x1="6" y1="12" x2="6.01" y2="12"/><line x1="18" y1="12" x2="18.01" y2="12"/></svg>
                </div>
                <span class="super-kpi-badge amber">Audit Kas</span>
            </div>
            <div class="super-kpi-label">KAS SIRKULASI &amp; DENDA</div>
            <div class="super-kpi-value-currency">
                <span class="currency-prefix">Rp</span>
                <span class="currency-amount">14.880.000</span>
            </div>
            <div class="super-kpi-sub">Total Penerimaan 1 Bulan</div>
        </div>
    </div>

    {{-- ================================================================= --}}
    {{-- 3. GRID TENGAH: KELOLA AKUN & HAK AKSES + MATRIKS RBAC            --}}
    {{-- ================================================================= --}}
    <div class="super-two-col-grid">
        {{-- KOLOM KIRI: Kelola Akun & Hak Akses Pengguna --}}
        <div class="super-card super-accounts-card">
            <div class="super-card-header">
                <div>
                    <h2 class="super-card-title">Kelola Akun &amp; Hak Akses Pengguna</h2>
                    <p class="super-card-desc">Efisiensi kontrol hak akses RBAC serta status aktivasi akun staf, pegawai, dan pengguna terdaftar.</p>
                </div>
                <button type="button" class="super-btn-dark-pill" onclick="toast('Membuka modal pendaftaran akun baru...')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Tambah Akun</span>
                </button>
            </div>

            {{-- Tabs Filter & Search Bar --}}
            <div class="super-table-toolbar">
                <div class="super-table-tabs">
                    <button type="button" class="super-tab-btn active">Semua Pengguna (2.450)</button>
                    <button type="button" class="super-tab-btn" onclick="toast('Menampilkan 3 permohonan aktivasi akun baru')">Aktivasi Pengguna Baru (3)</button>
                </div>
                <div class="super-table-search">
                    <span class="search-icon">🔍</span>
                    <input type="text" placeholder="Cari nama, akun..." id="superUserSearchInput" onkeyup="filterSuperTable(this.value)">
                </div>
            </div>

            {{-- Tabel Data Akun Pengguna --}}
            <div class="super-table-wrap">
                <table class="super-table" id="superUserTable">
                    <thead>
                        <tr>
                            <th style="width:48%">PENGGUNA &amp; IDENTITAS</th>
                            <th style="width:34%">PERAN &amp; HAK AKSES</th>
                            <th style="width:18%">STATUS AKUN</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Row 1: Prasetyo --}}
                        <tr>
                            <td>
                                <div class="super-user-cell">
                                    <div class="super-table-avatar green">PR</div>
                                    <div class="super-table-user-info">
                                        <div class="super-table-name">
                                            <b>Prasetyo</b>
                                            <span class="super-verified-icon" title="Root Verified">👑</span>
                                        </div>
                                        <small class="super-table-meta">ID: SA-001 &bull; prasetyo@inovexa.id</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="super-role-pill super-role-super">Super Admin (Level 1)</span>
                            </td>
                            <td>
                                <span class="super-status-pill green">● Aktif</span>
                            </td>
                        </tr>

                        {{-- Row 2: Budi Santoso --}}
                        <tr>
                            <td>
                                <div class="super-user-cell">
                                    <div class="super-table-avatar slate">BS</div>
                                    <div class="super-table-user-info">
                                        <div class="super-table-name"><b>Budi Santoso</b></div>
                                        <small class="super-table-meta">NIP: ASN-2026-04 &bull; budi.s@inovexa.id</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="super-role-pill super-role-admin">Admin Pegawai &amp; Sirkulasi</span>
                            </td>
                            <td>
                                <span class="super-status-pill green">● Aktif</span>
                            </td>
                        </tr>

                        {{-- Row 3: Siti Rahma --}}
                        <tr>
                            <td>
                                <div class="super-user-cell">
                                    <div class="super-table-avatar slate">SP</div>
                                    <div class="super-table-user-info">
                                        <div class="super-table-name"><b>Siti Rahma</b></div>
                                        <small class="super-table-meta">NIP: ASN-2026-08 &bull; siti.rahma@inovexa.id</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="super-role-pill super-role-admin">Admin Pegawai &amp; Sirkulasi</span>
                            </td>
                            <td>
                                <span class="super-status-pill green">● Aktif</span>
                            </td>
                        </tr>

                        {{-- Row 4: Dini Satiya --}}
                        <tr>
                            <td>
                                <div class="super-user-cell">
                                    <div class="super-table-avatar teal">DS</div>
                                    <div class="super-table-user-info">
                                        <div class="super-table-name"><b>Dini Satiya</b></div>
                                        <small class="super-table-meta">NIM: 24670081 &bull; dini.s@mahasiswa.id</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="super-role-pill super-role-member">Anggota Terdaftar</span>
                            </td>
                            <td>
                                <span class="super-status-pill green">● Aktif</span>
                            </td>
                        </tr>

                        {{-- Row 5: Rian Wijaya --}}
                        <tr>
                            <td>
                                <div class="super-user-cell">
                                    <div class="super-table-avatar amber">RW</div>
                                    <div class="super-table-user-info">
                                        <div class="super-table-name"><b>Rian Wijaya</b></div>
                                        <small class="super-table-meta">NIM: 24670092 &bull; rian.w@gmail.com</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="super-role-pill super-role-guest">Anggota Tamu</span>
                            </td>
                            <td>
                                <span class="super-status-pill amber">Verifikasi KTP</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Table Footer --}}
            <div class="super-table-footer">
                <span class="super-table-count">Menampilkan 5 dari 2.450 total akun pengguna terdaftar</span>
                <a href="{{ route('dashboard', 'users') }}" class="super-link-orange">
                    <span>Buka Modul Kelola Akun &amp; Peran Lengkap</span>
                    <span class="super-arrow">&rsaquo;</span>
                </a>
            </div>
        </div>

        {{-- KOLOM KANAN: Matriks Hak Akses RBAC --}}
        <div class="super-card super-rbac-card">
            <div class="super-card-header">
                <div>
                    <h2 class="super-card-title">Matriks Hak Akses</h2>
                    <p class="super-card-desc">Pengaturan matriks hak akses berdasar hierarki peran keamanan pengguna perpustakaan daerah.</p>
                </div>
                <span class="super-badge-version">RBAC V2.4</span>
            </div>

            {{-- 4 List Matriks Hak Akses --}}
            <div class="super-matrix-list">
                {{-- Matrix 1 --}}
                <div class="super-matrix-item">
                    <div class="super-matrix-info">
                        <b class="super-matrix-name">Kelola Akun &amp; Hak Akses</b>
                        <small class="super-matrix-scope">Super: <span>Full</span> &bull; Admin: No &bull; Anggota: No</small>
                    </div>
                    <span class="super-access-pill full">AKSES PENUH</span>
                </div>

                {{-- Matrix 2 --}}
                <div class="super-matrix-item">
                    <div class="super-matrix-info">
                        <b class="super-matrix-name">Katalog &amp; Eksemplar Buku</b>
                        <small class="super-matrix-scope">Super: <span>Full</span> &bull; Admin: <span>Full</span> &bull; Anggota: Read</small>
                    </div>
                    <span class="super-access-pill edit">BACA &amp; EDIT</span>
                </div>

                {{-- Matrix 3 --}}
                <div class="super-matrix-item">
                    <div class="super-matrix-info">
                        <b class="super-matrix-name">Akses E-Katalog &amp; Library</b>
                        <small class="super-matrix-scope">Super: <span>Full</span> &bull; Admin: Read &bull; Anggota: Baca</small>
                    </div>
                    <span class="super-access-pill public">PUBLIK</span>
                </div>

                {{-- Matrix 4 --}}
                <div class="super-matrix-item">
                    <div class="super-matrix-info">
                        <b class="super-matrix-name">Audit Log &amp; Backup Server</b>
                        <small class="super-matrix-scope">Super: <span>Full</span> &bull; Admin: No &bull; Anggota: No</small>
                    </div>
                    <span class="super-access-pill full">AKSES PENUH</span>
                </div>
            </div>

            {{-- Button Aksi RBAC --}}
            <div class="super-rbac-action-wrap">
                <button type="button" class="super-btn-dark-full" onclick="window.location='{{ route('dashboard', 'roles') }}'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <span>Atur Kebijakan Peran RBAC</span>
                </button>
            </div>
        </div>
    </div>

    {{-- ================================================================= --}}
    {{-- 4. GRID BAWAH: AUDIT LOG KEAMANAN + INFRASTRUKTUR DB               --}}
    {{-- ================================================================= --}}
    <div class="super-two-col-grid">
        {{-- KOLOM KIRI: Audit Log Keamanan & Aktivitas Sistem --}}
        <div class="super-card super-audit-card">
            <div class="super-card-header">
                <div>
                    <h2 class="super-card-title">Audit Log Keamanan &amp; Aktivitas Sistem</h2>
                    <p class="super-card-desc">Monitoring real-time aktivitas login, konfigurasi data master, ekspor laporan, dan proteksi server.</p>
                </div>
                <button type="button" class="super-btn-filter" onclick="toast('Menyaring kategori log audit...')">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                    <span>Filter Event</span>
                </button>
            </div>

            {{-- List Log Aktivitas dengan Dot Indikator --}}
            <div class="super-audit-timeline">
                {{-- Log 1 --}}
                <div class="super-audit-item">
                    <div class="super-audit-dot dot-red"></div>
                    <div class="super-audit-body">
                        <div class="super-audit-headline">
                            <span class="super-audit-time">10:42:12 WIB</span>
                            <span class="super-audit-tag system">SISTEM</span>
                            <b class="super-audit-actor">Admin Pegawai Budi Santoso</b>
                        </div>
                        <p class="super-audit-detail">
                            Mengubah konfigurasi otorisasi kredensial koneksi host <b>192.168.1.100</b>. Status enkripsi otomatis diperbarui dengan TLS 1.3 oleh root admin.
                        </p>
                    </div>
                </div>

                {{-- Log 2 --}}
                <div class="super-audit-item">
                    <div class="super-audit-dot dot-green"></div>
                    <div class="super-audit-body">
                        <div class="super-audit-headline">
                            <span class="super-audit-time">09:15:07 WIB</span>
                            <span class="super-audit-tag backup">Terjadwal Backup</span>
                            <b class="super-audit-actor">Backup SQL System Standar</b>
                        </div>
                        <p class="super-audit-detail">
                            Proses kompresi data arsip database repositori selesai. Ukuran file: <b>412 MB</b>, cadangan Cloud System terkirim ke AWS S3 bucket ID: 41.
                        </p>
                    </div>
                </div>

                {{-- Log 3 --}}
                <div class="super-audit-item">
                    <div class="super-audit-dot dot-amber"></div>
                    <div class="super-audit-body">
                        <div class="super-audit-headline">
                            <span class="super-audit-time">08:30:44 WIB</span>
                            <span class="super-audit-tag role">PERUBAHAN ROLE</span>
                            <b class="super-audit-actor">Aktivasi Akun Dini Satiya</b>
                        </div>
                        <p class="super-audit-detail">
                            Pembaruan hak akses dari <i>Anggota Tamu</i> menjadi <i>Anggota Aktif Terdaftar</i> setelah pencocokan berkas identitas KTP &amp; KTM oleh Petugas Budi Santoso.
                        </p>
                    </div>
                </div>

                {{-- Log 4 --}}
                <div class="super-audit-item">
                    <div class="super-audit-dot dot-darkred"></div>
                    <div class="super-audit-body">
                        <div class="super-audit-headline">
                            <span class="super-audit-time">Kemarin 23:14 WIB</span>
                            <span class="super-audit-tag firewall">FIREWALL GUARD</span>
                            <b class="super-audit-actor">IP Blocklist Gateway</b>
                        </div>
                        <p class="super-audit-detail">
                            Percobaan brute-force gagal terdeteksi (12 percobaan berturut-turut dari IP <span class="super-text-red">194.26.2.110</span>). Alamat IP diblokir otomatis oleh Fail2Ban.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Audit Footer --}}
            <div class="super-audit-footer">
                <a href="{{ route('dashboard', 'audit') }}" class="super-link-dark">
                    <span>Buka Seluruh Audit Log &amp; Riwayat Backup</span>
                    <span class="super-arrow">&rsaquo;</span>
                </a>
            </div>
        </div>

        {{-- KOLOM KANAN: Infrastruktur DB --}}
        <div class="super-card super-infra-card">
            <div class="super-card-header">
                <div>
                    <h2 class="super-card-title">Infrastruktur DB</h2>
                </div>
                <span class="super-status-badge-green">
                    <span class="super-dot-green"></span>
                    <span>Terkoneksi</span>
                </span>
            </div>

            {{-- Database Storage Pool Box --}}
            <div class="super-storage-box">
                <div class="super-storage-head">
                    <span class="super-storage-label">Database Storage Pool</span>
                    <b class="super-storage-value">128 GB / 256 GB (50%)</b>
                </div>
                <div class="super-storage-bar-track">
                    <div class="super-storage-bar-fill" style="width: 50%"></div>
                </div>
            </div>

            {{-- 2x2 Specs Grid --}}
            <div class="super-specs-grid">
                <div class="super-spec-box">
                    <div class="super-spec-title">CPU Load</div>
                    <div class="super-spec-value">34.2%</div>
                    <div class="super-spec-sub green">Normal (8 Cores)</div>
                </div>
                <div class="super-spec-box">
                    <div class="super-spec-title">Ram Cache</div>
                    <div class="super-spec-value">38%</div>
                    <div class="super-spec-sub muted">12 GB / 32 GB</div>
                </div>
                <div class="super-spec-box">
                    <div class="super-spec-title">Kecepatan</div>
                    <div class="super-spec-value">412 Mbps</div>
                    <div class="super-spec-sub green">Trafik Normal</div>
                </div>
                <div class="super-spec-box">
                    <div class="super-spec-title">Snapshot Berikut</div>
                    <div class="super-spec-value">03:00 WIB</div>
                    <div class="super-spec-sub muted">Setiap Dini Hari</div>
                </div>
            </div>

            {{-- Action Buttons Infrastruktur --}}
            <div class="super-infra-actions">
                <button type="button" class="super-btn-dark-full" onclick="toast('Proses snapshot database manual sedang diinisiasi...')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                    <span>Trigger Backup Manual</span>
                </button>
                <button type="button" class="super-btn-outline-full" onclick="window.location='{{ route('dashboard', 'sys') }}'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c0 .69.21 1.33.57 1.87z"/></svg>
                    <span>Konfigurasi Host Database</span>
                </button>
            </div>
        </div>
    </div>

    {{-- ================================================================= --}}
    {{-- 5. KARTU LEBAR BAWAH: LAPORAN EKOSISTEM PERPUSTAKAAN (CHART)      --}}
    {{-- ================================================================= --}}
    <div class="super-card super-report-fullwidth-card">
        {{-- Card Header --}}
        <div class="super-report-head-row">
            <div class="super-report-title-lockup">
                <div class="super-report-icon-badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </div>
                <div>
                    <h2 class="super-report-title">Lihat Keseluruhan Laporan Ekosistem Perpustakaan</h2>
                    <p class="super-report-subtitle">Monitoring sirkulasi sirkuler, penggunaan buku fisik &amp; digital, serta kepuasan pembaca per semester berjalan.</p>
                </div>
            </div>
            <div class="super-report-head-actions">
                <button type="button" class="super-btn-outline-report" onclick="toast('Mengekspor berkas data ekosistem CSV...')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    <span>Ekspor Data CSV</span>
                </button>
                <button type="button" class="super-btn-dark-report" onclick="toast('Mencetak rekapitulasi tahunan berformat PDF...')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                    <span>Cetak Rekapitulasi Tahunan (PDF)</span>
                </button>
            </div>
        </div>

        {{-- Isi Konten: Grid 2 Kolom (Chart Kiri & Metrik Kanan) --}}
        <div class="super-report-content-grid">
            {{-- KOLOM KIRI: Visualisasi Bar Chart --}}
            <div class="super-chart-column">
                <div class="super-chart-top-row">
                    <div>
                        <b class="super-chart-heading">Tren Sirkulasi Semester 1 - 2026</b>
                        <small class="super-chart-sub">Rentang Volume Transaksi Peminjaman</small>
                    </div>
                    <div class="super-chart-legends">
                        <span class="super-legend-item">
                            <span class="legend-dot green"></span>
                            <span>Buku Fisik</span>
                        </span>
                        <span class="super-legend-item">
                            <span class="legend-dot orange"></span>
                            <span>E-Book &amp; Jurnal Digital</span>
                        </span>
                    </div>
                </div>

                {{-- Komponen Bar Chart Berdasarkan Data Figma --}}
                <div class="super-barchart-wrapper">
                    {{-- Y-Axis Grid Marks --}}
                    <div class="super-barchart-y-axis">
                        <span>150k</span>
                        <span>100k</span>
                        <span>50k</span>
                        <span>0</span>
                    </div>

                    {{-- Chart Canvas Bars --}}
                    <div class="super-barchart-canvas">
                        {{-- Grid lines background --}}
                        <div class="super-chart-gridline" style="bottom: 100%"></div>
                        <div class="super-chart-gridline" style="bottom: 66.6%"></div>
                        <div class="super-chart-gridline" style="bottom: 33.3%"></div>
                        <div class="super-chart-gridline" style="bottom: 0%"></div>

                        {{-- Month Columns (Jan - Jun) --}}
                        <div class="super-bars-group">
                            {{-- Jan --}}
                            <div class="super-month-col">
                                <div class="super-paired-bars">
                                    <div class="super-bar physical" style="height: 38%" title="Januari: Fisik 57.000"></div>
                                    <div class="super-bar digital" style="height: 24%" title="Januari: Digital 36.000"></div>
                                </div>
                                <span class="super-month-label">Jan</span>
                            </div>

                            {{-- Feb --}}
                            <div class="super-month-col">
                                <div class="super-paired-bars">
                                    <div class="super-bar physical" style="height: 60%" title="Februari: Fisik 90.000"></div>
                                    <div class="super-bar digital" style="height: 42%" title="Februari: Digital 63.000"></div>
                                </div>
                                <span class="super-month-label">Feb</span>
                            </div>

                            {{-- Mar --}}
                            <div class="super-month-col">
                                <div class="super-paired-bars">
                                    <div class="super-bar physical" style="height: 82%" title="Maret: Fisik 123.000"></div>
                                    <div class="super-bar digital" style="height: 58%" title="Maret: Digital 87.000"></div>
                                </div>
                                <span class="super-month-label">Mar</span>
                            </div>

                            {{-- Apr --}}
                            <div class="super-month-col">
                                <div class="super-paired-bars">
                                    <div class="super-bar physical" style="height: 68%" title="April: Fisik 102.000"></div>
                                    <div class="super-bar digital" style="height: 74%" title="April: Digital 111.000"></div>
                                </div>
                                <span class="super-month-label">Apr</span>
                            </div>

                            {{-- May --}}
                            <div class="super-month-col">
                                <div class="super-paired-bars">
                                    <div class="super-bar physical" style="height: 94%" title="Mei: Fisik 141.000"></div>
                                    <div class="super-bar digital" style="height: 88%" title="Mei: Digital 132.000"></div>
                                </div>
                                <span class="super-month-label">May</span>
                            </div>

                            {{-- Jun --}}
                            <div class="super-month-col">
                                <div class="super-paired-bars">
                                    <div class="super-bar physical" style="height: 98%" title="Juni: Fisik 147.000"></div>
                                    <div class="super-bar digital" style="height: 92%" title="Juni: Digital 138.000"></div>
                                </div>
                                <span class="super-month-label">Jun</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: 3 Metrik Ringkas + Banner Target --}}
            <div class="super-metrics-column">
                {{-- Metrik 1: Rasio Baca Digital --}}
                <div class="super-metric-box">
                    <div>
                        <div class="super-metric-title">Rasio Baca Digital</div>
                        <div class="super-metric-value">44.8%</div>
                    </div>
                    <span class="super-metric-badge green">+11.2% YoY</span>
                </div>

                {{-- Metrik 2: Rata-rata Durasi Pinjam --}}
                <div class="super-metric-box">
                    <div>
                        <div class="super-metric-title">Rata-rata Durasi Pinjam</div>
                        <div class="super-metric-value">8.4 <span class="super-metric-unit">Hari</span></div>
                    </div>
                    <span class="super-metric-badge slate">Maks 14 Hari</span>
                </div>

                {{-- Metrik 3: Tingkat Pengembalian Tepat Waktu --}}
                <div class="super-metric-box">
                    <div>
                        <div class="super-metric-title">Tingkat Pengembalian Tepat Waktu</div>
                        <div class="super-metric-value">94.3%</div>
                    </div>
                    <span class="super-metric-badge green">Sangat Patuh</span>
                </div>

                {{-- Banner Target Capaian Semester --}}
                <div class="super-target-card">
                    <div>
                        <div class="super-target-title">Target Sirkulasi Semester A - 2026</div>
                        <div class="super-target-progress">Tercapai 78%</div>
                    </div>
                    <div class="super-target-icon">
                        💡
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Mini Script Filter Pencarian Tabel Super Admin --}}
<script>
function filterSuperTable(val) {
    const query = (val || '').toLowerCase().trim();
    const rows = document.querySelectorAll('#superUserTable tbody tr');
    rows.forEach(r => {
        const text = r.textContent.toLowerCase();
        r.style.display = text.includes(query) ? '' : 'none';
    });
}
</script>
