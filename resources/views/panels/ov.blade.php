@if($u['role'] === 'super')
<div class="super-dashboard">
    {{-- 1. HERO BANNER PERSIS FIGMA --}}
    <div class="super-hero-banner">
        <div class="super-hero-watermark" aria-hidden="true">
            <svg width="240" height="240" viewBox="0 0 200 200" fill="none">
                <path d="M100 25 L165 55 V110 C165 152 100 182 100 182 C100 182 35 152 35 110 V55 Z" stroke="#143c26" stroke-width="5" />
                <circle cx="100" cy="95" r="28" stroke="#143c26" stroke-width="5" />
                <path d="M82 142 C82 128 118 128 118 142" stroke="#143c26" stroke-width="5" />
            </svg>
        </div>
        <div class="super-hero-tag">
            <span class="super-tag-dot"></span>
            PUSAT KONTROL TINGGI &bull; HAK AKSES ROOT &amp; INFRASTRUKTUR SISTEM
        </div>
        <h1 class="super-hero-title">Halo, Super Admin Ari!</h1>
        <p class="super-hero-desc">
            Kendali penuh tata kelola akun, otorisasi peran berjenjang, pemeliharaan integritas database, dan pengawasan audit seluruh ekosistem Perpustakaan Inovexa Technologies sesuai mandat operasional.
        </p>
        <div class="super-hero-actions">
            <button type="button" class="btn-super-primary" onclick="toast('Membuka formulir pendaftaran akun baru')">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                + Tambah Akun Baru
            </button>
            <button type="button" class="btn-super-outline" onclick="window.location='{{ route('dashboard', 'users') }}'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                Konfigurasi Hak Akses
            </button>
            <button type="button" class="btn-super-outline" onclick="toast('Memulai proses snapshot backup database real-time...')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/><polyline points="16 16 12 12 8 16"/></svg>
                Backup Database Real-time
            </button>
            <button type="button" class="btn-super-outline" onclick="toast('Mengunduh audit trail log sistem format .log / .csv')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Unduh Audit Log
            </button>
        </div>
    </div>

    {{-- 2. EMPAT KARTU STATISTIK METRIK PERSIS FIGMA --}}
    <div class="super-stats-grid">
        {{-- Card 1: Total Akun Pengguna --}}
        <div class="super-stat-card">
            <div class="super-stat-header">
                <div class="super-stat-icon icon-teal">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><circle cx="19" cy="11" r="2"/></svg>
                </div>
                <span class="super-stat-badge badge-teal">↗ +12 minggu ini</span>
            </div>
            <div class="super-stat-label">TOTAL AKUN PENGGUNA</div>
            <div class="super-stat-value">2.450 Akun</div>
            <div class="super-stat-sub">
                <b>1.890</b> Anggota &bull; <b>42</b> Pegawai &bull; <b>3</b> Super Admin
            </div>
        </div>

        {{-- Card 2: Uptime Sistem & DB --}}
        <div class="super-stat-card">
            <div class="super-stat-header">
                <div class="super-stat-icon icon-green">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                </div>
                <span class="super-stat-badge badge-green"><span class="badge-dot-green"></span> Optimal</span>
            </div>
            <div class="super-stat-label">UPTIME SISTEM &amp; DB</div>
            <div class="super-stat-value">99.98%</div>
            <div class="super-stat-sub">PostgreSQL Cluster &bull; Latensi 18ms</div>
        </div>

        {{-- Card 3: Total Koleksi & E-Library --}}
        <div class="super-stat-card">
            <div class="super-stat-header">
                <div class="super-stat-icon icon-slate">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <span class="super-stat-badge badge-slate">Global Aset</span>
            </div>
            <div class="super-stat-label">TOTAL KOLEKSI &amp; E-LIBRARY</div>
            <div class="super-stat-value">18.420 Aset</div>
            <div class="super-stat-sub">
                <b>12.420</b> Fisik &bull; <b>6.000</b> Digital
            </div>
        </div>

        {{-- Card 4: Kas Sirkulasi & Denda --}}
        <div class="super-stat-card">
            <div class="super-stat-header">
                <div class="super-stat-icon icon-amber">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="3"/><line x1="6" y1="12" x2="6.01" y2="12"/><line x1="18" y1="12" x2="18.01" y2="12"/></svg>
                </div>
                <span class="super-stat-badge badge-amber">Audit Klir</span>
            </div>
            <div class="super-stat-label">KAS SIRKULASI &amp; DENDA</div>
            <div class="super-stat-value text-amber">Rp 14.850.000</div>
            <div class="super-stat-sub">Tahun Berjalan &bull; 0 Macet</div>
        </div>
    </div>

    {{-- 3. AREA TENGAH: GRID 2 KOLOM (Kiri 65%, Kanan 35%) --}}
    <div class="super-middle-grid">
        {{-- Kolom Kiri: Kelola Akun & Audit Log --}}
        <div class="super-left-col">
            {{-- Tabel Kelola Akun & Hak Akses Pengguna --}}
            <div class="super-card">
                <div class="super-card-header">
                    <div class="super-card-title-group">
                        <span class="super-title-icon icon-orange">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="5" r="3"/><circle cx="5" cy="19" r="3"/><circle cx="19" cy="19" r="3"/><line x1="12" y1="8" x2="5" y2="16"/><line x1="12" y1="8" x2="19" y2="16"/></svg>
                        </span>
                        <div>
                            <h2 class="super-card-title">Kelola Akun &amp; Hak Akses Pengguna</h2>
                            <p class="super-card-subtitle">Otorisasi hierarki Super Admin, Admin Pegawai, dan Anggota Pemustaka Inovexa</p>
                        </div>
                    </div>
                    <button type="button" class="btn-super-dark-sm" onclick="toast('Membuka modal tambah akun & otorisasi akses')">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                        + Tambah Akses
                    </button>
                </div>

                {{-- Baris Filter Tabs dan Pencarian --}}
                <div class="super-filter-bar">
                    <div class="super-tabs">
                        <button type="button" class="super-tab active">Semua Pengguna (2.450)</button>
                        <button type="button" class="super-tab">Admin Pegawai (42)</button>
                        <button type="button" class="super-tab">Super Admin (3)</button>
                    </div>
                    <div class="super-search-box">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" placeholder="Filter nama / ID akun...">
                    </div>
                </div>

                {{-- Tabel Pengguna --}}
                <div class="super-table-wrap">
                    <table class="super-table">
                        <thead>
                            <tr>
                                <th>NAMA &amp; ID PENGGUNA</th>
                                <th>PERAN &amp; HAK AKSES</th>
                                <th style="text-align:right">STATUS AKSES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="user-row-cell">
                                        <div class="user-avatar-circle bg-dark-green">PR</div>
                                        <div class="user-meta-info">
                                            <div class="user-name-line">
                                                <b>Princess</b>
                                                <span class="user-badge-star" title="Root Administrator">✪</span>
                                            </div>
                                            <small class="user-id-sub">ID: SA-001 &bull; princess@inovexa.id</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="role-pill-root">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        Super Admin (Root)
                                    </span>
                                </td>
                                <td style="text-align:right">
                                    <span class="status-pill-active">&bull; Aktif</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-row-cell">
                                        <div class="user-avatar-circle bg-slate">BS</div>
                                        <div class="user-meta-info">
                                            <div class="user-name-line"><b>Budi Santoso</b></div>
                                            <small class="user-id-sub">ID: INX-ADM-2026-04</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="role-pill-admin">Admin Pegawai (Sirkulasi)</span>
                                </td>
                                <td style="text-align:right">
                                    <span class="status-pill-active">&bull; Aktif</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-row-cell">
                                        <div class="user-avatar-circle bg-slate">SN</div>
                                        <div class="user-meta-info">
                                            <div class="user-name-line"><b>Siti Nurhaliza</b></div>
                                            <small class="user-id-sub">ID: INX-ADM-2026-09</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="role-pill-admin">Admin Pegawai (E-Library)</span>
                                </td>
                                <td style="text-align:right">
                                    <span class="status-pill-active">&bull; Aktif</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-row-cell">
                                        <div class="user-avatar-circle bg-blue">DA</div>
                                        <div class="user-meta-info">
                                            <div class="user-name-line"><b>Dimas Arya</b></div>
                                            <small class="user-id-sub">ID: MBR-2026-07734</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="role-pill-member">Anggota Pemustaka</span>
                                </td>
                                <td style="text-align:right">
                                    <span class="status-pill-active">&bull; Aktif</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="user-row-cell">
                                        <div class="user-avatar-circle bg-amber">KW</div>
                                        <div class="user-meta-info">
                                            <div class="user-name-line"><b>Kevin Wijaya</b></div>
                                            <small class="user-id-sub">ID: MBR-2026-04321</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="role-pill-new">Anggota Baru</span>
                                </td>
                                <td style="text-align:right">
                                    <span class="status-pill-pending">Verifikasi KTM</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Footer Tabel --}}
                <div class="super-card-footer">
                    <span class="footer-count">Menampilkan 5 dari 2.450 total akun pengguna terdaftar</span>
                    <a href="{{ route('dashboard', 'users') }}" class="footer-link">Buka Modul Kelola Akun &amp; Hak Akses Lengkap &rarr;</a>
                </div>
            </div>

            {{-- Audit Log Keamanan & Aktivitas Sistem --}}
            <div class="super-card" style="margin-top:16px">
                <div class="super-card-header">
                    <div class="super-card-title-group">
                        <span class="super-title-icon icon-dark">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                        </span>
                        <div>
                            <h2 class="super-card-title">Audit Log Keamanan &amp; Aktivitas Sistem</h2>
                            <p class="super-card-subtitle">Pelacakan forensik real-time seluruh transaksi, login, dan modul basis data</p>
                        </div>
                    </div>
                    <button type="button" class="btn-super-outline-sm" onclick="toast('Filter parameter log audit aktif')">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                        Filter Event
                    </button>
                </div>

                <div class="audit-timeline">
                    {{-- Item 1 --}}
                    <div class="timeline-item">
                        <div class="timeline-marker dot-amber"></div>
                        <div class="timeline-content">
                            <div class="timeline-meta-row">
                                <b class="timeline-time">10:42:15 WIB</b>
                                <span class="timeline-tag tag-slate">Sirkulasi</span>
                                <span class="timeline-actor">Admin Pegawai Budi Santoso</span>
                            </div>
                            <p class="timeline-desc">
                                Mengubah status pengembalian eksemplar buku <b>TRX-2026-9812</b> ("Laskar Pelangi") &bull; Denda keterlambatan Rp 2.000 lunas tunai.
                            </p>
                        </div>
                    </div>

                    {{-- Item 2 --}}
                    <div class="timeline-item">
                        <div class="timeline-marker dot-green"></div>
                        <div class="timeline-content">
                            <div class="timeline-meta-row">
                                <b class="timeline-time">09:15:00 WIB</b>
                                <span class="timeline-tag tag-green">Automated Backup</span>
                                <span class="timeline-actor">PostgreSQL System Daemon</span>
                            </div>
                            <p class="timeline-desc">
                                Pencadangan rutin otomatis selesai tanpa galat. Ukuran snapshot: <b>4.2 GB</b>, enkripsi hash SHA-256 tersimpan ke Cloud Vault #2.
                            </p>
                        </div>
                    </div>

                    {{-- Item 3 --}}
                    <div class="timeline-item">
                        <div class="timeline-marker dot-dark-green"></div>
                        <div class="timeline-content">
                            <div class="timeline-meta-row">
                                <b class="timeline-time">08:00:22 WIB</b>
                                <span class="timeline-tag tag-slate">Security Policy</span>
                                <span class="timeline-actor actor-orange">Super Admin Princess</span>
                            </div>
                            <p class="timeline-desc">
                                Memperbarui izin akses modul E-Library: Anggota aktif diperbolehkan mengunduh format EPUB offline dengan kuota 3 dokumen / bulan.
                            </p>
                        </div>
                    </div>

                    {{-- Item 4 --}}
                    <div class="timeline-item">
                        <div class="timeline-marker dot-red"></div>
                        <div class="timeline-content">
                            <div class="timeline-meta-row">
                                <b class="timeline-time time-red">Kemarin (23:14 WIB)</b>
                                <span class="timeline-tag tag-red">Firewall Guard</span>
                                <span class="timeline-actor">Auth Gateway</span>
                            </div>
                            <p class="timeline-desc">
                                Percobaan login gagal terdeteksi 3x berturut-turut pada akun staf via IP <span class="ip-blocked">192.168.1.105</span>. Alamat IP diblokir sementara 60 menit.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="super-card-footer" style="justify-content:flex-end">
                    <a href="{{ route('dashboard', 'sys') }}" class="footer-link">Buka Seluruh Audit Log &amp; Riwayat Backup &rarr;</a>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Matriks Hak Akses & Infrastruktur DB --}}
        <div class="super-right-col">
            {{-- Matriks Hak Akses RBAC --}}
            <div class="super-card">
                <div class="matrix-card-header">
                    <div class="matrix-title-line">
                        <span class="matrix-icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#ea580c" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </span>
                        <h3 class="matrix-title">Matriks Hak Akses</h3>
                        <span class="matrix-version-badge">RBAC v2.4</span>
                    </div>
                    <p class="matrix-desc">Ringkasan otorisasi hak istimewa operasional perpustakaan Inovexa berdasarkan peran.</p>
                </div>

                <div class="matrix-blocks">
                    {{-- Blok 1 --}}
                    <div class="matrix-block">
                        <div class="block-top">
                            <b>Kelola Akun &amp; Hak Akses</b>
                            <span class="block-badge badge-root">ROOT ONLY</span>
                        </div>
                        <div class="block-cols">
                            <span>Super: <b class="text-dark-green">Full</b></span>
                            <span class="col-divider">&bull;</span>
                            <span>Admin: <span class="text-muted">No</span></span>
                            <span class="col-divider">&bull;</span>
                            <span>Anggota: <span class="text-muted">No</span></span>
                        </div>
                    </div>

                    {{-- Blok 2 --}}
                    <div class="matrix-block">
                        <div class="block-top">
                            <b>Koleksi &amp; Sirkulasi Buku</b>
                            <span class="block-badge badge-staf">Staf &amp; Super</span>
                        </div>
                        <div class="block-cols">
                            <span>Super: <b class="text-dark-green">Full</b></span>
                            <span class="col-divider">&bull;</span>
                            <span>Admin: <b class="text-dark">R/W</b></span>
                            <span class="col-divider">&bull;</span>
                            <span>Anggota: <span class="text-slate">Read</span></span>
                        </div>
                    </div>

                    {{-- Blok 3 --}}
                    <div class="matrix-block">
                        <div class="block-top">
                            <b>Akses &amp; Baca E-Library</b>
                            <span class="block-badge badge-public">Publik</span>
                        </div>
                        <div class="block-cols">
                            <span>Super: <b class="text-dark-green">Full</b></span>
                            <span class="col-divider">&bull;</span>
                            <span>Admin: <b class="text-dark">Full</b></span>
                            <span class="col-divider">&bull;</span>
                            <span>Anggota: <b class="text-teal">Baca</b></span>
                        </div>
                    </div>

                    {{-- Blok 4 --}}
                    <div class="matrix-block">
                        <div class="block-top">
                            <b>Audit Log &amp; Backup Sistem</b>
                            <span class="block-badge badge-root">ROOT ONLY</span>
                        </div>
                        <div class="block-cols">
                            <span>Super: <b class="text-dark-green">Full</b></span>
                            <span class="col-divider">&bull;</span>
                            <span>Admin: <span class="text-muted">No</span></span>
                            <span class="col-divider">&bull;</span>
                            <span>Anggota: <span class="text-muted">No</span></span>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn-super-dark-full" onclick="toast('Membuka konfigurasi kebijakan RBAC...')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c0 .69.21 1.33.57 1.87z"/></svg>
                    Atur Policy &amp; Peran RBAC
                </button>
            </div>

            {{-- Infrastruktur DB --}}
            <div class="super-card" style="margin-top:16px">
                <div class="db-card-header">
                    <div class="db-title-line">
                        <span class="db-icon">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#ea580c" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                        </span>
                        <h3 class="db-title">Infrastruktur DB</h3>
                    </div>
                    <span class="db-status-pill">&bull; Sinkron</span>
                </div>

                {{-- Storage SSD Bar --}}
                <div class="db-storage-section">
                    <div class="db-storage-labels">
                        <span class="storage-title">Database Storage SSD</span>
                        <b class="storage-value">136 GB / 200 GB (68%)</b>
                    </div>
                    <div class="db-progress-track">
                        <div class="db-progress-fill" style="width: 68%"></div>
                    </div>
                </div>

                {{-- Metric Grid 2x2 --}}
                <div class="db-metrics-grid">
                    <div class="db-metric-box">
                        <small class="metric-label">CPU Load</small>
                        <div class="metric-num">24.2%</div>
                        <span class="metric-state text-green">Stabil (8 Cores)</span>
                    </div>
                    <div class="db-metric-box">
                        <small class="metric-label">RAM Cache</small>
                        <div class="metric-num">38%</div>
                        <span class="metric-state text-green">12 GB / 32 GB</span>
                    </div>
                    <div class="db-metric-box">
                        <small class="metric-label">Bandwidth</small>
                        <div class="metric-num">45 Mbps</div>
                        <span class="metric-state text-muted">Trafik Normal</span>
                    </div>
                    <div class="db-metric-box">
                        <small class="metric-label">Snapshot Terakhir</small>
                        <div class="metric-num">03:00 WIB</div>
                        <span class="metric-state text-green">Klir &bull; Terverifikasi</span>
                    </div>
                </div>

                <div class="db-actions">
                    <button type="button" class="btn-super-dark-full" onclick="toast('Snapshot database manual berhasil dibuat (Snapshot #2026-11)')">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                        Trigger Backup Manual
                    </button>
                    <button type="button" class="btn-super-light-full" onclick="toast('Verifikasi checksum integritas tabel PostgreSQL 100% konsisten')">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 11 12 14 22 4"/></svg>
                        Uji Integritas Database
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. BAGIAN BAWAH: LIHAT KESELURUHAN LAPORAN EKOSISTEM PERPUSTAKAAN --}}
    <div class="super-card super-reports-card">
        <div class="super-reports-header">
            <div class="super-card-title-group">
                <span class="super-title-icon icon-amber-square">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </span>
                <div>
                    <h2 class="super-card-title">Lihat Keseluruhan Laporan Ekosistem Perpustakaan</h2>
                    <p class="super-card-subtitle">Konsolidasi analitik peminjaman fisik vs sirkulasi e-library dan performa operasional berkala</p>
                </div>
            </div>
            <div class="super-reports-actions">
                <button type="button" class="btn-super-outline-sm" onclick="toast('Mengunduh dataset sirkulasi semester format CSV')">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    Ekspor Data CSV
                </button>
                <button type="button" class="btn-super-dark-sm" onclick="toast('Menyiapkan rekapitulasi tahunan ekosistem dalam format PDF...')">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                    Cetak Rekapitulasi Tahunan (PDF)
                </button>
            </div>
        </div>

        <div class="super-reports-layout">
            {{-- Box Grafik Batang --}}
            <div class="super-chart-box">
                <div class="chart-header-row">
                    <div class="chart-title">Tren Sirkulasi Semester I &ndash; 2026</div>
                    <div class="chart-legend">
                        <span class="legend-item"><span class="legend-dot dot-dark-green"></span> Buku Fisik</span>
                        <span class="legend-item"><span class="legend-dot dot-warm-amber"></span> E-Book &amp; Jurnal Digital</span>
                    </div>
                </div>
                <div class="chart-unit">Satuan: Ribu Transaksi</div>

                {{-- SVG Bar Chart --}}
                <div class="super-svg-chart">
                    <svg viewBox="0 0 600 240" class="chart-svg">
                        {{-- Grid lines --}}
                        <line x1="45" y1="30" x2="580" y2="30" stroke="#f1ede4" stroke-dasharray="3 3" />
                        <text x="35" y="34" font-size="10" fill="#94a3b8" text-anchor="end">3.0k</text>

                        <line x1="45" y1="85" x2="580" y2="85" stroke="#f1ede4" stroke-dasharray="3 3" />
                        <text x="35" y="89" font-size="10" fill="#94a3b8" text-anchor="end">2.0k</text>

                        <line x1="45" y1="140" x2="580" y2="140" stroke="#f1ede4" stroke-dasharray="3 3" />
                        <text x="35" y="144" font-size="10" fill="#94a3b8" text-anchor="end">1.0k</text>

                        <line x1="45" y1="195" x2="580" y2="195" stroke="#e2e8f0" />
                        <text x="35" y="198" font-size="10" fill="#94a3b8" text-anchor="end">0</text>

                        {{-- Month 1: Jan (Fisik 1.8k -> h:99, y:96; Digital 1.2k -> h:66, y:129) --}}
                        <rect x="75" y="96" width="18" height="99" rx="3" fill="#133827" />
                        <rect x="97" y="129" width="18" height="66" rx="3" fill="#b45309" />
                        <text x="95" y="215" font-size="11" fill="#64748b" text-anchor="middle" font-weight="600">Jan</text>

                        {{-- Month 2: Feb (Fisik 2.1k -> h:115, y:80; Digital 1.5k -> h:82, y:113) --}}
                        <rect x="160" y="80" width="18" height="115" rx="3" fill="#133827" />
                        <rect x="182" y="113" width="18" height="82" rx="3" fill="#b45309" />
                        <text x="180" y="215" font-size="11" fill="#64748b" text-anchor="middle" font-weight="600">Feb</text>

                        {{-- Month 3: Mar (Fisik 2.4k -> h:132, y:63; Digital 1.7k -> h:93, y:102) --}}
                        <rect x="245" y="63" width="18" height="132" rx="3" fill="#133827" />
                        <rect x="267" y="102" width="18" height="93" rx="3" fill="#b45309" />
                        <text x="265" y="215" font-size="11" fill="#64748b" text-anchor="middle" font-weight="600">Mar</text>

                        {{-- Month 4: Apr (Fisik 2.1k -> h:115, y:80; Digital 2.2k -> h:121, y:74) --}}
                        <rect x="330" y="80" width="18" height="115" rx="3" fill="#133827" />
                        <rect x="352" y="74" width="18" height="121" rx="3" fill="#b45309" />
                        <text x="350" y="215" font-size="11" fill="#64748b" text-anchor="middle" font-weight="600">Apr</text>

                        {{-- Month 5: Mei (Fisik 2.5k -> h:137, y:58; Digital 2.3k -> h:126, y:69) --}}
                        <rect x="415" y="58" width="18" height="137" rx="3" fill="#133827" />
                        <rect x="437" y="69" width="18" height="126" rx="3" fill="#b45309" />
                        <text x="435" y="215" font-size="11" fill="#64748b" text-anchor="middle" font-weight="600">Mei</text>

                        {{-- Month 6: Jun (Fisik 2.8k -> h:154, y:41; Digital 2.6k -> h:143, y:52) --}}
                        <rect x="500" y="41" width="18" height="154" rx="3" fill="#133827" />
                        <rect x="522" y="52" width="18" height="143" rx="3" fill="#b45309" />
                        <text x="520" y="215" font-size="11" fill="#64748b" text-anchor="middle" font-weight="600">Jun</text>
                    </svg>
                </div>
            </div>

            {{-- 4 Kartu Metrik Sisi Kanan --}}
            <div class="super-side-metrics">
                <div class="report-metric-card">
                    <div class="metric-top-row">
                        <span class="report-metric-label">Rasio Baca Digital</span>
                        <span class="report-pill-mint">+6.2% YoY</span>
                    </div>
                    <div class="report-metric-val">44.8%</div>
                </div>

                <div class="report-metric-card">
                    <div class="metric-top-row">
                        <span class="report-metric-label">Rata-rata Durasi Pinjam</span>
                        <span class="report-pill-slate">Maks 14 Hari</span>
                    </div>
                    <div class="report-metric-val">8.4 Hari</div>
                </div>

                <div class="report-metric-card">
                    <div class="metric-top-row">
                        <span class="report-metric-label">Tingkat Pengembalian Tepat Waktu</span>
                        <span class="report-pill-green">Sangat Patuh</span>
                    </div>
                    <div class="report-metric-val">96.2%</div>
                </div>

                <div class="report-metric-card target-card">
                    <div class="metric-top-row">
                        <span class="target-card-label">Target Literasi Inovexa 2026</span>
                    </div>
                    <div class="target-bottom-row">
                        <span class="target-value">Tercapai 78%</span>
                        <div class="target-medal-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#b45309" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($u['role'] === 'admin')
    <div class="admin-dashboard">
    <div class="admin-dashboard-hero" style="background:#153223;color:#fff;border-radius:14px;padding:28px 32px;margin-bottom:20px;position:relative;overflow:hidden;box-shadow:0 10px 30px rgba(21,50,35,.2)">
        <div class="admin-hero-top" style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <span style="font-size:9.5px;font-weight:700;color:#a9cbb7;letter-spacing:.08em;background:rgba(255,255,255,.12);padding:3px 10px;border-radius:99px">LOKET SIRKULASI TERPADU &bull; LANTAI 1</span>
            <div class="admin-hero-actions" style="display:flex;gap:8px">
                <button class="btn" style="background:#ea580c;color:#fff;font-size:11px;padding:6px 14px" onclick="toast('Form transaksi baru')"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg> Transaksi Baru</button>
                <button class="btn ghost" style="background:rgba(255,255,255,.15);color:#fff;border:0;font-size:11px;padding:6px 14px" onclick="toast('Edit data sirkulasi')"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m15 5 4 4M4 20l4.5-1 11-11a2.1 2.1 0 0 0-3-3l-11 11L4 20Z"/></svg> Edit Data Sirkulasi</button>
                <button class="btn ghost" style="background:rgba(255,255,255,.15);color:#fff;border:0;font-size:11px;padding:6px 14px" onclick="toast('Pengembalian cepat')"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12h13M11 6l6 6-6 6M20 5v14"/></svg> Pengembalian Cepat</button>
                <button class="btn ghost" style="background:rgba(255,255,255,.15);color:#fff;border:0;font-size:11px;padding:6px 14px" onclick="window.location='{{ route('dashboard', 'mem') }}'"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="3"/><path d="M3 20v-1a6 6 0 0 1 12 0v1m5-11v6m-3-3h6"/></svg> Tambah Anggota</button>
            </div>
        </div>
        <h2 class="admin-hero-greeting" style="font-size:26px;margin:0 0 6px;font-weight:800;letter-spacing:-.02em;text-align:center">Halo, Petugas {{ $u['n'] }}!</h2>
        <p class="admin-hero-description" style="color:#d1e7db;font-size:12.5px;max-width:700px;margin:0 auto;line-height:1.5;text-align:center">
            Meja layanan sirkulasi aktif. Kelola peminjaman, perpanjangan, pengembalian buku, dan penyesuaian jadwal transaksi secara real-time.
        </p>
    </div>

    {{-- 4 Stat Cards Admin --}}
    <div class="g4" style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:20px">
        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">TARGET SIRKULASI HARI INI</div>
            <div style="font-size:22px;font-weight:800;color:var(--t)">142</div>
            <div style="font-size:11px;color:var(--m)">Buku Peminjaman Aktif</div>
            <div style="font-size:10px;color:var(--ok);margin-top:4px">▲ +14 transaksi dari sesi pagi</div>
            <span class="admin-stat-icon" style="position:absolute;top:14px;right:14px;color:#17643d;background:#e8f4ed"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5m0 14h17M8 15l4-4 3 2 5-6"/><path d="M16 7h4v4"/></svg></span>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">PERLU PERINGATAN</div>
            <div style="font-size:22px;font-weight:800;color:var(--o)">18</div>
            <div style="font-size:11px;color:var(--m)">Buku Jatuh Tempo</div>
            <div style="font-size:10px;color:#dc2626;margin-top:4px">Potensi Denda: Rp 180.000</div>
            <span class="admin-stat-icon" style="position:absolute;top:14px;right:14px;color:#c65d0c;background:#fff1e7"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 22 20H2L12 3Z"/><path d="M12 9v5m0 3h.01"/></svg></span>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">LOKER SIRKULASI</div>
            <div style="font-size:22px;font-weight:800;color:var(--t)">7</div>
            <div style="font-size:11px;color:var(--m)">Antrean Siap Diambil</div>
            <div style="font-size:10px;color:var(--m);margin-top:4px">Tersedia batas 2x24 jam</div>
            <span class="admin-stat-icon" style="position:absolute;top:14px;right:14px;color:#475569;background:#f1f5f9"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 7 9-4 9 4v10l-9 4-9-4V7Z"/><path d="m3 7 9 4 9-4M12 11v10M8 5l9 4"/></svg></span>
        </div>

        <div class="card" style="background:#fff;padding:16px;border:1px solid var(--ln);position:relative">
            <div style="font-size:9.5px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:6px">KASIR SIRKULASI</div>
            <div style="font-size:20px;font-weight:800;color:var(--ok)">Rp 345.000</div>
            <div style="font-size:11px;color:var(--m)">Denda Terkumpul Hari Ini</div>
            <div style="font-size:10px;color:var(--m);margin-top:4px">12 Transaksi &bull; 8 QRIS / 4 Tunai</div>
            <span class="admin-stat-icon" style="position:absolute;top:14px;right:14px;color:#087443;background:#e8f4ed"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="12" cy="12" r="3"/><path d="M7 9h.01M17 15h.01"/></svg></span>
        </div>
    </div>

    {{-- Grid 2 Kolom: Antrean Sirkulasi & Antrean Reservasi Buku --}}
    <div style="display:grid;grid-template-columns:1fr 360px;gap:20px;align-items:start;margin-bottom:20px">
        {{-- Kolom Kiri: Antrean Sirkulasi & Pengembalian Cepat --}}
        <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <div>
                    <h3 style="margin:0;font-size:15px;font-weight:700">Antrean Sirkulasi &amp; Pengembalian Cepat</h3>
                    <small style="color:var(--m);font-size:11.5px">Proses check-in, check-out, perpanjangan, serta verifikasi denda buku.</small>
                </div>
                <div style="display:flex;gap:4px">
                    <span class="pill" style="background:#153223;color:#fff;font-size:11px">Semua</span>
                    <span class="pill" style="background:#f3f4f6;color:var(--t);font-size:11px">Terlambat</span>
                </div>
            </div>

            <div style="display:flex;gap:10px;margin-bottom:14px">
                <input class="in" placeholder="Scan Barcode/Eksemplar atau Masukkan NIM Anggota..." style="flex:1;height:38px;font-size:12px">
                <button class="btn" style="background:#153223;white-space:nowrap;font-size:12px">Proses Cepat</button>
            </div>

            <div class="tw">
                <table>
                    <tr>
                        <th style="font-size:10.5px;color:var(--m)">TRANSAKSI</th>
                        <th style="font-size:10.5px;color:var(--m)">ANGGOTA &amp; NIM</th>
                        <th style="font-size:10.5px;color:var(--m)">BUKU &amp; EKSEMPLAR</th>
                        <th style="font-size:10.5px;color:var(--m)">JATUH TEMPO</th>
                        <th style="font-size:10.5px;color:var(--m)">STATUS</th>
                        <th style="font-size:10.5px;color:var(--m)"></th>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9812</b></td>
                        <td style="font-size:11.5px"><b>Adinda Zahwa Aprilia</b><br><small style="color:var(--m)">24670095</small></td>
                        <td style="font-size:11.5px"><b>Sapiens: Riwayat Singkat</b><br><small style="color:var(--m)">BUK-300-1 (Rak 503)</small></td>
                        <td style="font-size:11.5px">26 Okt 2026<br><small style="color:var(--ok)">Sisa 5 Hari Lagi</small></td>
                        <td><span class="pill" style="background:#dcebe2;color:var(--ok)">Aktif (5 Hari Lagi)</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎</button></td>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9803</b></td>
                        <td style="font-size:11.5px"><b>Muhammad Okta Ramadhani</b><br><small style="color:var(--m)">24670016</small></td>
                        <td style="font-size:11.5px"><b>Metodologi Kualitatif</b><br><small style="color:var(--m)">BUK-412-8 (Rak 401)</small></td>
                        <td style="font-size:11.5px"><span style="color:#dc2626">19 Okt 2026</span><br><small style="color:#dc2626">Telat 1 Hari</small></td>
                        <td><span class="pill" style="background:#fef3e7;color:#dc2626">Denda Rp 2.000</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎ Edit</button></td>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9844</b></td>
                        <td style="font-size:11.5px"><b>Muhammad Dzaky Zidane</b><br><small style="color:var(--m)">24670090</small></td>
                        <td style="font-size:11.5px"><b>Atomic Habits</b><br><small style="color:var(--m)">BUK-184-2 (Rak 158)</small></td>
                        <td style="font-size:11.5px">28 Okt 2026<br><small style="color:var(--ok)">Sisa 7 Hari Lagi</small></td>
                        <td><span class="pill" style="background:#dcebe2;color:var(--ok)">Aktif (7 Hari Lagi)</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎</button></td>
                    </tr>
                    <tr>
                        <td style="font-size:11.5px"><b>TRX-2026-9958</b></td>
                        <td style="font-size:11.5px"><b>Eka Bayu Prasetio</b><br><small style="color:var(--m)">24670092</small></td>
                        <td style="font-size:11.5px"><b>Algoritma &amp; Struktur Data</b><br><small style="color:var(--m)">BUK-004-9 (Rak 005)</small></td>
                        <td style="font-size:11.5px"><span style="color:#dc2626">24 Okt 2026</span><br><small style="color:#dc2626">Hari Terakhir</small></td>
                        <td><span class="pill" style="background:#fef3e7;color:#b45309">Hari Terakhir</span></td>
                        <td><button class="btn ghost" style="padding:4px 8px;font-size:11px">✎</button></td>
                    </tr>
                </table>
            </div>
            <div style="margin-top:12px;font-size:11.5px;display:flex;justify-content:space-between;align-items:center">
                <span style="color:var(--m)">Menampilkan 4 dari 142 transaksi aktif</span>
                <a href="#" onclick="toast('Melihat seluruh transaksi');return false" style="color:var(--o);font-weight:600">Buka Sirkulasi Transaksi Lengkap ›</a>
            </div>
        </div>

        {{-- Kolom Kanan: Antrean Reservasi Buku & Validasi Denda Kasir --}}
        <div style="display:flex;flex-direction:column;gap:20px">
            <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                    <h3 style="margin:0;font-size:15px;font-weight:700">Antrean Reservasi Buku</h3>
                    <span class="pill" style="background:#fef3e7;color:#b45309">3</span>
                </div>
                <small style="color:var(--m);display:block;margin-bottom:12px;font-size:11.5px">Kelola penyiapan &amp; serah terima fisik</small>

                <div style="display:flex;flex-direction:column;gap:10px">
                    <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px">
                        <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:4px">
                            <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9.5px">Siap di Meja Sirkulasi</span>
                            <span style="font-size:10px;color:var(--m)">RES-2826-0012</span>
                        </div>
                        <b style="font-size:13px">Metodologi Penelitian Kualitatif</b><br>
                        <small style="color:var(--m)">Pemohon: Eka Bayu (NIM: 24670092)<br>Loker Pengambilan: <b>A-04</b></small>
                        <div style="margin-top:10px;text-align:right">
                            <button class="btn" style="font-size:11px;padding:5px 12px;background:#153223" onclick="toast('Serah terima dikonfirmasi')">Serahkan</button>
                        </div>
                    </div>

                    <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px">
                        <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:4px">
                            <span class="pill" style="background:#fef3e7;color:#b45309;font-size:9.5px">Dalam Pencarian Rak</span>
                            <span style="font-size:10px;color:var(--m)">RES-2826-08928</span>
                        </div>
                        <b style="font-size:13px">Pengantar Kecerdasan Buatan</b><br>
                        <small style="color:var(--m)">Pemohon: Frendy Wahyu (NIM: 24670091)<br>Lokasi: <b>Rak 004.2 / Lantai 2</b></small>
                        <div style="margin-top:10px;text-align:right">
                            <button class="btn ghost" style="font-size:11px;padding:5px 10px" onclick="toast('Lokasi rak diperbarui')">Ubah Lokasi</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Validasi Denda Kasir --}}
            <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                    <h3 style="margin:0.5px 0 0;font-size:14px;font-weight:700">Validasi Denda Kasir</h3>
                    <span class="pill" style="background:#fef3e7;color:#b45309">2 Antrean</span>
                </div>
                <small style="color:var(--m);display:block;margin-bottom:10px;font-size:11px">Struk pembayaran menunggu konfirmasi</small>

                <div style="display:flex;flex-direction:column;gap:8px">
                    <div style="background:#f8fafc;padding:10px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;font-size:11.5px">
                        <div>
                            <b>Rp 4.000 &bull; Terlambat 2 Hari</b><br>
                            <small style="color:var(--m)">Rian Pratama &bull; QRIS Otomatis</small>
                        </div>
                        <button class="btn" style="font-size:10px;padding:4px 10px;background:#166534">Verifikasi</button>
                    </div>
                    <div style="background:#f8fafc;padding:10px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;font-size:11.5px">
                        <div>
                            <b>Rp 2.000 &bull; Terlambat 1 Hari</b><br>
                            <small style="color:var(--m)">Cinta Dewi &bull; Tunai Loket</small>
                        </div>
                        <button class="btn" style="font-size:10px;padding:4px 10px;background:#111">Terima Tunai</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Widget Bawah: Ringkasan Laporan & Tren Koleksi --}}
    <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
        <div class="row" style="margin-bottom:16px">
            <div>
                <h3 style="margin:0;font-size:16px;font-weight:700">Ringkasan Laporan Sirkulasi &amp; Tren Koleksi</h3>
                <small style="color:var(--m)">Statistik peminjaman mingguan, rasio eksemplar di rak, dan buku terpopuler.</small>
            </div>
            <div style="display:flex;gap:8px">
                <span class="pill" style="background:#f3f4f6;color:var(--t)">Bulan Ini (Okt 2026)</span>
                <button class="btn" style="background:#153223;font-size:11px;padding:6px 12px">📥 Unduh Laporan PDF / Excel</button>
            </div>
        </div>

        <div class="g3" style="grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px">
            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:16px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">KESEHATAN KOLEKSI SIRKULASI</small>
                <div style="font-size:22px;font-weight:800;color:var(--t);margin:4px 0">84.2% <span style="font-size:11px;font-weight:600;color:var(--ok)">Buku Tersedia di Rak</span></div>
                <div style="width:100%;height:8px;background:#e5e7eb;border-radius:99px;overflow:hidden;margin:10px 0">
                    <div style="width:84.2%;height:100%;background:#ea580c;border-radius:99px"></div>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--m)">
                    <span>🟢 5.400 di Rak</span>
                    <span>🟠 1.015 Dipinjam</span>
                </div>
            </div>

            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:16px">
                <div style="display:flex;justify-content:space-between;align-items:center">
                    <small style="color:var(--m);font-weight:700;font-size:10.5px">TREN TRANSAKSI 7 HARI TERAKHIR</small>
                    <span style="color:var(--ok);font-size:11px;font-weight:700">+18.4%</span>
                </div>
                <div style="font-size:18px;font-weight:700;color:var(--t);margin:4px 0">Grafik Aktivitas Sirkulasi</div>
                <div style="font-size:11px;color:var(--m)">Rata-rata: 110 buku/hari &bull; Puncak: Sabtu</div>
            </div>

            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:16px">
                <small style="color:var(--m);font-weight:700;font-size:10.5px">BUKU TERPOPULER PEKAN INI</small>
                <div style="font-size:12px;display:flex;flex-direction:column;gap:6px;margin-top:6px">
                    <div style="display:flex;justify-content:space-between"><span>1. Metodologi Penelitian Kualitatif</span><b>38x</b></div>
                    <div style="display:flex;justify-content:space-between"><span>2. Sapiens: Riwayat Singkat</span><b>29x</b></div>
                    <div style="display:flex;justify-content:space-between"><span>3. Atomic Habits</span><b>26x</b></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@else
    @php
        $userName = $u['n'] ?? 'Muhammad Dzaky Zidane';
        $userId = $u['id'] ?? '24670090';
        $roleName = 'Anggota Reguler';
        $firstInit = mb_strtoupper(mb_substr($userName, 0, 2));
    @endphp

    {{-- Kartu Digital & Header Sapaan Anggota Persis Figma --}}
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px">
        {{-- Kartu Anggota Digital Sesuai Gambar Referensi --}}
        <div style="background:linear-gradient(135deg,#122c1f 0%,#091811 100%);color:#fff;border-radius:16px;padding:22px 24px;position:relative;overflow:hidden;box-shadow:0 12px 30px rgba(18,44,31,.25);border:1px solid rgba(255,255,255,.08)">
            
            {{-- Baris Atas: Logo Inisial & Teks Kartu + Status Aktif --}}
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
                <div style="display:flex;align-items:center;gap:10px">
                    <img class="member-dashboard-logo" src="{{ asset('foto/logo.jpeg') }}" alt="Logo Inovexa">
                    <div>
                        <div style="font-size:8.5px;font-weight:700;letter-spacing:.08em;color:#94a3b8">DIGITAL SMARTPASS</div>
                        <div class="member-card-wordmark">INOVEXA LIBRARY</div>
                    </div>
                </div>
                <span style="background:#166534;border:1px solid #22c55e;color:#86efac;padding:4px 12px;border-radius:99px;font-size:9.5px;font-weight:700;letter-spacing:.05em">STATUS: AKTIF</span>
            </div>

            {{-- Baris Chip & NFC --}}
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px">
                <div style="width:32px;height:24px;background:linear-gradient(135deg,#fde047 0%,#ca8a04 100%);border-radius:4px;position:relative;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,.3)">
                    <div style="position:absolute;top:4px;left:0;right:0;height:1px;background:rgba(0,0,0,.2)"></div>
                    <div style="position:absolute;bottom:4px;left:0;right:0;height:1px;background:rgba(0,0,0,.2)"></div>
                    <div style="position:absolute;top:0;bottom:0;left:10px;width:1px;background:rgba(0,0,0,.2)"></div>
                </div>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#86efac" stroke-width="2">
                    <path d="M8.5 16.5a5 5 0 0 1 0-9" stroke-linecap="round"/>
                    <path d="M5 19.5a9 9 0 0 1 0-15" stroke-linecap="round"/>
                    <path d="M12 12a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" fill="#86efac"/>
                </svg>
            </div>

            {{-- Nomor Anggota --}}
            <div style="font-size:15px;font-weight:700;letter-spacing:.14em;margin-bottom:16px;color:#f8fafc">
                8912 &bull; 4022 &bull; 9012 &bull; 0026
            </div>

            {{-- Baris Bawah: Nama & QR/Barcode --}}
            <div style="display:flex;justify-content:space-between;align-items:flex-end;border-top:1px solid rgba(255,255,255,.1);padding-top:12px">
                <div>
                    <div style="font-size:8.5px;font-weight:700;letter-spacing:.06em;color:#94a3b8;margin-bottom:2px">NAMA PEMEGANG KARTU</div>
                    <div style="font-size:14px;font-weight:800;letter-spacing:.04em;text-transform:uppercase;color:#fef08a">{{ $userName }}</div>
                    <div style="font-size:9.5px;color:#cbd5e1;margin-top:2px">Berlaku s/d: 31 Des 2026</div>
                </div>
                <div style="background:#fff;padding:6px;border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,.2)">
                    <div style="width:38px;height:38px;background:#111;border-radius:6px;display:grid;grid-template-columns:repeat(2,1fr);grid-template-rows:repeat(2,1fr);gap:4px;padding:4px">
                        <div style="background:#fff;border-radius:2px"></div>
                        <div style="background:#fff;border-radius:2px"></div>
                        <div style="background:#fff;border-radius:2px"></div>
                        <div style="background:#22c55e;border-radius:2px"></div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kotak Sapaan & Quick Action --}}
        <div style="background:#fff;border:1px solid var(--ln);border-radius:16px;padding:24px;display:flex;flex-direction:column;justify-content:space-between">
            <div>
                <span class="pill" style="background:#e8f4ed;color:#166534;font-size:11px;margin-bottom:8px">Selamat Datang Kembali</span>
                <h2 style="font-size:22px;font-weight:800;margin:4px 0 6px;letter-spacing:-.02em">Halo, {{ $userName }}! Ingin membaca apa hari ini?</h2>
                <p style="color:var(--m);font-size:12px;line-height:1.5;margin:0">
                    Gunakan fasilitas peminjaman mandiri menggunakan Kartu Digital Anda, pantau batas waktu pengembalian buku agar terbebas dari denda keterlambatan, atau nikmati ribuan e-book langsung di genggaman.
                </p>
            </div>

            <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:8px;margin-top:16px">
                <a href="{{ route('dashboard', 'elib') }}" class="btn ghost" style="min-width:0;border:1px solid #eee9e3;border-radius:11px;background:#faf9f7;padding:10px 9px;text-align:left;text-decoration:none;color:var(--t);display:flex;align-items:center;gap:8px;transition:background .2s,border-color .2s">
                    <span style="width:29px;height:29px;flex:none;border:1px solid #eee9e3;border-radius:8px;background:#fff;color:#214b38;display:grid;place-items:center"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.3"/><path d="m16 16 4 4" stroke-linecap="round"/></svg></span>
                    <span style="min-width:0;display:flex;flex-direction:column;gap:2px"><b style="font-size:10px;line-height:1.2">Cari Katalog</b><small style="color:var(--m);font-size:8.5px;line-height:1.2">OPAC Inovexa</small></span>
                </a>
                <a href="{{ route('dashboard', 'resv') }}" class="btn ghost" style="min-width:0;border:1px solid #eee9e3;border-radius:11px;background:#faf9f7;padding:10px 9px;text-align:left;text-decoration:none;color:var(--t);display:flex;align-items:center;gap:8px;transition:background .2s,border-color .2s">
                    <span style="width:29px;height:29px;flex:none;border:1px solid #eee9e3;border-radius:8px;background:#fff;color:#d97732;display:grid;place-items:center"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="4" y="5" width="16" height="15" rx="2.5"/><path d="M8 3v4m8-4v4M4 10h16m-8 3v4m-2-2h4" stroke-linecap="round"/></svg></span>
                    <span style="min-width:0;display:flex;flex-direction:column;gap:2px"><b style="font-size:10px;line-height:1.2">Reservasi Baru</b><small style="color:var(--m);font-size:8.5px;line-height:1.2">Pesan antrean</small></span>
                </a>
                <a href="{{ route('dashboard', 'elib') }}" class="btn ghost" style="min-width:0;border:1px solid #eee9e3;border-radius:11px;background:#faf9f7;padding:10px 9px;text-align:left;text-decoration:none;color:var(--t);display:flex;align-items:center;gap:8px;transition:background .2s,border-color .2s">
                    <span style="width:29px;height:29px;flex:none;border:1px solid #eee9e3;border-radius:8px;background:#fff;color:#168c68;display:grid;place-items:center"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21.5v-16Z"/><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M8 7h8M8 11h8"/></svg></span>
                    <span style="min-width:0;display:flex;flex-direction:column;gap:2px"><b style="font-size:10px;line-height:1.2">E-Library</b><small style="color:var(--m);font-size:8.5px;line-height:1.2">Baca e-book</small></span>
                </a>
            </div>
        </div>
    </div>

    {{-- 4 Stat Cards Ringkasan Anggota --}}
    <div class="member-summary-grid">
        <div class="member-summary-card"><span class="member-summary-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v16H6.5A2.5 2.5 0 0 0 4 21.5v-16Z"/><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M8 7h8M8 11h8"/></svg></span><div><div class="member-summary-label">Buku Sedang Dipinjam</div><div class="member-summary-value">2 <small>/ Maks 3 Buku</small></div><div class="member-summary-note warning">⚠ 1 buku jatuh tempo 3 hari lagi</div></div></div>
        <div class="member-summary-card"><span class="member-summary-icon amber"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="16" rx="2"/><path d="M8 3v4M16 3v4M4 10h16M8 14h3M8 17h5"/></svg></span><div><div class="member-summary-label">Reservasi Siap Ambil</div><div class="member-summary-value">1 <small>Buku Menunggu</small></div><div class="member-summary-note success">▣ Tersedia di Meja Sirkulasi</div></div></div>
        <div class="member-summary-card"><span class="member-summary-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 20 6v5c0 5-3.4 8.3-8 10-4.6-1.7-8-5-8-10V6l8-3Z"/><path d="m8.5 12 2.3 2.3 4.8-4.8"/></svg></span><div><div class="member-summary-label">Denda Keterlambatan</div><div class="member-summary-value green">Rp 0</div><div class="member-summary-note success"><span aria-hidden="true">✓</span> Bebas denda, akun tertib</div></div></div>
        <div class="member-summary-card"><span class="member-summary-icon neutral"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="6" y="5" width="12" height="16" rx="2"/><path d="M9 5V3h6v2M9 10h6M9 14h6M9 18h3"/></svg></span><div><div class="member-summary-label">Total Riwayat Selesai</div><div class="member-summary-value">18 <small>Judul Buku</small></div><div class="member-summary-note">★ Tingkat pembaca aktif</div></div></div>
    </div>

    {{-- Grid 2 Kolom: Buku Sedang Dipinjam & Status Reservasi Buku --}}
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px">
        {{-- Kolom Kiri: Buku Sedang Dipinjam --}}
        <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <h3 style="margin:0;font-size:15px;font-weight:700">Daftar Buku Sedang Dipinjam</h3>
                <a href="{{ route('dashboard', 'loans') }}" style="font-size:11.5px;color:var(--o);font-weight:600;text-decoration:none">Lihat Semua</a>
            </div>
            <small style="color:var(--m);display:block;margin-bottom:14px;font-size:11px">Pantau jatuh tempo &amp; manfaatkan fitur perpanjangan online.</small>

            <div style="display:flex;flex-direction:column;gap:12px">
                <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px;display:flex;gap:12px;align-items:center">
                    <div style="width:48px;height:64px;background:#e5e7eb;border-radius:6px;flex-shrink:0;overflow:hidden">
                        <img src="{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Buku">
                    </div>
                    <div style="flex:1">
                        <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9.5px;margin-bottom:2px">KOLEKSI UMUM</span>
                        <b style="font-size:13px;display:block">Sapiens: Riwayat Singkat Umat Manusia</b>
                        <small style="color:var(--m);font-size:11px">Yuval Noah Harari &bull; Rak 300.1 / HAR / s</small>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:6px;font-size:11px">
                            <span>Dipinjam: 12 Okt 2026</span>
                            <span style="background:#fef3e7;color:#b45309;padding:2px 8px;border-radius:4px;font-weight:600">Jatuh Tempo: 28 Okt 2026 (3 Hari Lagi)</span>
                        </div>
                    </div>
                    <button class="btn" style="background:#153223;font-size:11px;padding:6px 12px;white-space:nowrap" onclick="toast('Perpanjangan pinjam dicatat')">Perpanjang (1x)</button>
                </div>

                <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:12px;display:flex;gap:12px;align-items:center">
                    <div style="width:48px;height:64px;background:#e5e7eb;border-radius:6px;flex-shrink:0;overflow:hidden">
                        <img src="{{ asset('foto/laskar pelangi.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Buku">
                    </div>
                    <div style="flex:1">
                        <span class="pill" style="background:#e8f4ed;color:#166534;font-size:9.5px;margin-bottom:2px">FIKSI &amp; SASTRA</span>
                        <b style="font-size:13px;display:block">Laskar Pelangi</b>
                        <small style="color:var(--m);font-size:11px">Andrea Hirata &bull; Rak 813 / HIR / l</small>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:6px;font-size:11px">
                            <span>Dipinjam: 18 Okt 2026</span>
                            <span style="background:#dcebe2;color:var(--ok);padding:2px 8px;border-radius:4px;font-weight:600">Jatuh Tempo: 01 Nov 2026</span>
                        </div>
                    </div>
                    <button class="btn" style="background:#153223;font-size:11px;padding:6px 12px;white-space:nowrap" onclick="toast('Perpanjangan pinjam dicatat')">Perpanjang (1x)</button>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Status Reservasi Buku --}}
        <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
                <h3 style="margin:0;font-size:15px;font-weight:700">Status Reservasi Buku</h3>
                <span class="pill" style="background:#fef3e7;color:#b45309">1 Aktif</span>
            </div>
            <small style="color:var(--m);display:block;margin-bottom:14px;font-size:11px">Antrean buku yang dipesan terlebih dahulu.</small>

            <div style="background:#fcfbf9;border:1px solid #fed7aa;border-radius:10px;padding:14px;position:relative">
                <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:6px">
                    <span class="pill" style="background:#153223;color:#fff;font-size:9.5px">SIAP DIAMBIL</span>
                    <span style="font-size:10.5px;color:var(--m)">KODE: <b>RSV-88912-B</b></span>
                </div>
                <b style="font-size:14px;display:block;margin-bottom:2px">Metodologi Penelitian Kualitatif</b>
                <small style="color:var(--m);font-size:11.5px">Prof. Dr. Sugiyono &bull; ISBN: 978-602-...</small>

                <div style="border-top:1px dashed var(--ln);margin-top:10px;padding-top:10px;display:flex;justify-content:space-between;align-items:center;font-size:11.5px">
                    <div>
                        <span style="color:var(--m);display:block">Lokasi Pengambilan:</span>
                        <b>Meja Sirkulasi Lt. 1</b>
                    </div>
                    <div style="text-align:right">
                        <span style="color:var(--m);display:block">Batas Pengambilan:</span>
                        <b style="color:#b45309">28 Okt 2026 (17:00 WIB)</b>
                    </div>
                </div>

                <div style="margin-top:12px;display:flex;justify-content:space-between;align-items:center">
                    <small style="color:var(--m)">Perlihatkan kartu digital kepada pustakawan</small>
                    <button class="btn ghost" style="color:#dc2626;border:1px solid #fecaca;font-size:11px;padding:5px 10px" onclick="toast('Reservasi dibatalkan')">Batalkan Reservasi</button>
                </div>
            </div>

            <div style="margin-top:14px;font-size:11.5px;display:flex;justify-content:space-between;align-items:center">
                <span style="color:var(--m)">Sisa Kuota Reservasi Bulan Ini:</span>
                <b>2 dari 3 Buku</b>
            </div>
             <a href="{{ route('dashboard', 'resv') }}" class="btn" style="display:block;text-align:center;background:#fff;border:1px solid var(--ln);color:var(--t);margin-top:10px;font-size:11.5px;padding:8px;text-decoration:none">+ Ajukan Reservasi Lain</a>
        </div>
    </div>

    {{-- Widget Bawah: Lanjutkan Membaca E-Library --}}
    <div class="card" style="background:#fff;padding:20px;border:1px solid var(--ln)">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <div>
                <h3 style="margin:0;font-size:16px;font-weight:700">Lanjutkan Membaca E-Library</h3>
                <small style="color:var(--m);font-size:11.5px">Koleksi digital interaktif yang siap Anda baca kapan saja.</small>
            </div>
            <a href="{{ route('dashboard', 'elib') }}" style="font-size:12px;color:var(--o);font-weight:600;text-decoration:none">Kunjungi E-Library Lengkap ›</a>
        </div>

        <div class="g3" style="grid-template-columns:repeat(3,1fr);gap:16px">
            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:14px;display:flex;flex-direction:column;justify-content:space-between">
                <div>
                    <div style="display:flex;gap:12px;align-items:start;margin-bottom:10px">
                        <div style="width:40px;height:54px;background:#e5e7eb;border-radius:4px;overflow:hidden;flex-shrink:0">
                            <img src="{{ asset('foto/The Psychology of Money.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Ebook">
                        </div>
                        <div>
                            <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9px">E-Book EPUB</span>
                            <b style="font-size:12.5px;display:block;margin-top:2px">Atomic Habits: Perubahan Kecil</b>
                            <small style="color:var(--m);font-size:10.5px">James Clear &bull; Terakhir dibaca: Hari ini, 09:20</small>
                        </div>
                    </div>
                    <div style="margin-bottom:8px">
                        <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--m);margin-bottom:4px">
                            <span>Progres Baca</span>
                            <b style="color:var(--t)">68%</b>
                        </div>
                        <div style="width:100%;height:6px;background:#e5e7eb;border-radius:99px;overflow:hidden">
                            <div style="width:68%;height:100%;background:#153223;border-radius:99px"></div>
                        </div>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;border-top:1px solid var(--ln);padding-top:10px;font-size:11px">
                    <span style="color:var(--m)">Format: EPUB &amp; Audio</span>
                    <a href="{{ route('dashboard', 'elib') }}" class="btn" style="background:#153223;font-size:11px;padding:5px 12px;text-decoration:none;color:#fff">Lanjutkan Baca</a>
                </div>
            </div>

            <div style="background:#fcfbf9;border:1px solid var(--ln);border-radius:10px;padding:14px;display:flex;flex-direction:column;justify-content:space-between">
                <div>
                    <div style="display:flex;gap:12px;align-items:start;margin-bottom:10px">
                        <div style="width:40px;height:54px;background:#e5e7eb;border-radius:4px;overflow:hidden;flex-shrink:0">
                            <img src="{{ asset('foto/The Psychology of Money.jpeg') }}" style="width:100%;height:100%;object-fit:cover" alt="Ebook">
                        </div>
                        <div>
                            <span class="pill" style="background:#fef3e7;color:#b45309;font-size:9px">PDF Interaktif</span>
                            <b style="font-size:12.5px;display:block;margin-top:2px">The Psychology of Money</b>
                            <small style="color:var(--m);font-size:10.5px">Morgan Housel &bull; Terakhir dibaca: Kemarin</small>
                        </div>
                    </div>
                    <div style="margin-bottom:8px">
                        <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--m);margin-bottom:4px">
                            <span>Progres Baca</span>
                            <b style="color:var(--t)">32%</b>
                        </div>
                        <div style="width:100%;height:6px;background:#e5e7eb;border-radius:99px;overflow:hidden">
                            <div style="width:32%;height:100%;background:#ea580c;border-radius:99px"></div>
                        </div>
                    </div>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;border-top:1px solid var(--ln);padding-top:10px;font-size:11px">
                    <span style="color:var(--m)">Tersedia Akses Offline</span>
                    <a href="{{ route('dashboard', 'elib') }}" class="btn" style="background:#153223;font-size:11px;padding:5px 12px;text-decoration:none;color:#fff">Lanjutkan Baca</a>
                </div>
            </div>

            <div style="background:#fcfbf9;border:1px solid #a7f3d0;border-radius:10px;padding:14px;display:flex;flex-direction:column;justify-content:space-between">
                <div>
                    <span class="pill" style="background:#dcebe2;color:var(--ok);font-size:9px;margin-bottom:4px">REKOMENDASI PUSTAKAWAN</span>
                    <b style="font-size:13px;display:block;margin-top:4px">Prinsip Desain Antarmuka Modern</b>
                    <p style="color:var(--m);font-size:11px;margin:4px 0 10px;line-height:1.4">Panduan lengkap UI/UX perpustakaan digital terkini untuk akademisi.</p>
                    <div style="font-size:11px;color:#b45309;font-weight:700">⭐ 4.9 / 5.0 &bull; <span style="color:var(--m);font-weight:400">128 Pembaca</span></div>
                </div>
                 <a href="{{ route('dashboard', 'elib') }}" class="btn" style="background:#fff;border:1px solid #059669;color:#059669;font-size:11.5px;padding:6px;text-align:center;text-decoration:none;margin-top:10px">+ Buka E-Library</a>
            </div>
        </div>
    </div>
@endif
