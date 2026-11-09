@php
    $r = session('user')['role'] ?? 'member';
@endphp

@if($r === 'super')
{{--
    ========================================================================
    SUPER ADMIN: KELOLA DATA ANGGOTA & TATA KELOLA DIREKTORI
    Figma Prototype Node: 285-2
    INOVEXA Library Management System
    ========================================================================
--}}
@php
    $superMembers = [
        [
            'name' => 'Dr. Siti Rahmawati, M.Sc.',
            'nia' => 'INX-2026-07719',
            'nik_masked' => '31740924****0003',
            'category_title' => 'Dosen / Peneliti Utama',
            'category_verified' => true,
            'quota_desc' => 'Kuota: 10 Buku (Super Override)',
            'repo_desc' => 'Akses Repositori Riset Khusus',
            'status_type' => 'active_verified',
            'status_label' => 'Aktif Terverifikasi',
            'status_sub' => 'KTM/NIDN Sinkron',
            'last_session' => 'Hari ini, 09:14 WIB',
            'last_location' => 'Turnstile Gate 02',
            'avatar' => 'SR',
            'avatar_class' => 'member-avatar-mint',
            'selected' => true,
            'email' => 'siti.rahmawati@ui.ac.id',
            'phone' => '+62 812-99••-•891',
            'valid_until' => '31 Des 2027',
            'limit_books' => '10 Buku',
            'repo_access' => 'Diizinkan (Full)',
            'dispensation' => 'Nonaktif (Standar)',
            'category_filter' => 'dosen',
            'status_filter' => 'active',
        ],
        [
            'name' => 'Herdman Pratama',
            'nia' => 'INX-2026-08912',
            'nik_masked' => '32731005****0001',
            'category_title' => 'Umum / Reguler',
            'category_verified' => false,
            'quota_desc' => 'Kuota Standar: 3 Buku',
            'repo_desc' => 'Katalog Sirkulasi Biasa',
            'status_type' => 'active',
            'status_label' => 'Aktif',
            'status_sub' => 'KTP Terverifikasi',
            'last_session' => 'Kemarin, 16:30 WIB',
            'last_location' => 'Pustaka Digital Mobile',
            'avatar' => 'HP',
            'avatar_class' => '',
            'selected' => false,
            'email' => 'herdman.pratama@gmail.com',
            'phone' => '+62 813-88••-•102',
            'valid_until' => '15 Jan 2027',
            'limit_books' => '3 Buku',
            'repo_access' => 'Standar OPAC',
            'dispensation' => 'Nonaktif',
            'category_filter' => 'umum',
            'status_filter' => 'active',
        ],
        [
            'name' => 'Kevin Wijaya',
            'nia' => 'MBR-2026-04321',
            'nik_masked' => '31710118****0007',
            'category_title' => 'Mahasiswa UI',
            'category_verified' => false,
            'quota_desc' => 'Kuota: 3 Buku',
            'repo_desc' => 'Menunggu Upgrade Kuota Kampus',
            'status_type' => 'verify',
            'status_label' => 'Perlu Validasi KTM',
            'status_sub' => 'Upload Berkas Kemarin',
            'last_session' => '2 hari lalu, 11:20 WIB',
            'last_location' => 'Portal Web / OPAC',
            'avatar' => 'KW',
            'avatar_class' => 'member-avatar-orange',
            'selected' => false,
            'email' => 'kevin.w@campus.ac.id',
            'phone' => '+62 856-44••-•992',
            'valid_until' => '30 Jun 2026',
            'limit_books' => '3 Buku',
            'repo_access' => 'Standar OPAC',
            'dispensation' => 'Nonaktif',
            'category_filter' => 'mahasiswa',
            'status_filter' => 'verify',
        ],
        [
            'name' => 'Ahmad Fauzi',
            'nia' => 'INX-2026-04118',
            'nik_masked' => '35780129****0004',
            'category_title' => 'Mahasiswa S1 TI',
            'category_verified' => false,
            'quota_desc' => 'Kuota Terkunci (Ada Denda)',
            'quota_warn' => true,
            'repo_desc' => 'Denda Rp 45.000 Terutang',
            'status_type' => 'freeze',
            'status_label' => 'Freeze Sirkulasi',
            'status_sub' => 'Otomatisasi Sistem Sirkulasi',
            'last_session' => '03 Okt 2026',
            'last_location' => 'Kios Peminjaman 01',
            'avatar' => 'AF',
            'avatar_class' => 'member-avatar-red',
            'selected' => false,
            'email' => 'ahmad.fauzi@student.ac.id',
            'phone' => '+62 819-22••-•771',
            'valid_until' => '31 Des 2026',
            'limit_books' => '0 Buku (Terkunci)',
            'repo_access' => 'Ditangguhkan',
            'dispensation' => 'Wajib Pelunasan',
            'category_filter' => 'mahasiswa',
            'status_filter' => 'freeze',
        ],
        [
            'name' => 'Dimas Arya',
            'nia' => 'INX-2026-07734',
            'nik_masked' => '31750201****0002',
            'category_title' => 'Anggota Umum',
            'category_verified' => false,
            'quota_desc' => 'Kuota Standar: 3 Buku',
            'repo_desc' => 'Masa Aktif s/d 2027',
            'status_type' => 'active',
            'status_label' => 'Aktif',
            'status_sub' => 'Kepatuhan Terverifikasi',
            'last_session' => '28 Sep 2026',
            'last_location' => 'Gerbang Cabang Timur',
            'avatar' => 'DA',
            'avatar_class' => '',
            'selected' => false,
            'email' => 'dimas.arya@techmail.com',
            'phone' => '+62 878-11••-•332',
            'valid_until' => '28 Sep 2027',
            'limit_books' => '3 Buku',
            'repo_access' => 'Standar OPAC',
            'dispensation' => 'Nonaktif',
            'category_filter' => 'umum',
            'status_filter' => 'active',
        ],
    ];
@endphp

<div class="super-member-page">

    {{-- Breadcrumb Persis Figma --}}
    <div class="super-member-breadcrumb">
        <a href="{{ route('dashboard', 'ov') }}" class="super-member-bread-link">Dashboard Super Admin</a>
        <span class="super-member-bread-sep">›</span>
        <span class="super-member-bread-current">Kelola Data Anggota</span>
    </div>

    {{-- Page Header --}}
    <div class="super-member-header">
        <div class="super-member-header-left">
            <div class="super-member-title-row">
                <h1 class="super-member-title">Kelola Data Anggota &amp; Tata Kelola Direktori</h1>
                <span class="badge-root-tag">SUPER ADMIN LEVEL 0 : ROOT</span>
            </div>
            <p class="super-member-desc">
                Pusat tata kelola direktori anggota terpusat, pengawasan siklus hidup kartu digital, penegakan privasi data (UU PDP No. 27/2022), dan verifikasi kepatuhan status keanggotaan seluruh cabang perpustakaan.
            </p>
        </div>
        <div class="super-member-header-actions">
            <button type="button" class="btn-member-outline" onclick="exportSuperMembersCsv()">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                <span>Ekspor Basis Data (.CSV / XLSX)</span>
            </button>
            <button type="button" class="btn-member-outline" onclick="openModal('modal-audit-pdp')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                <span>Audit Kepatuhan PDP</span>
            </button>
            <button type="button" class="btn-member-primary" onclick="openModal('modal-register-master-member')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                <span>+ Daftarkan Anggota Baru (Master)</span>
            </button>
        </div>
    </div>

    {{-- Top Stats 4-Grid --}}
    <div class="super-member-stats-grid">
        {{-- Card 1: Total Anggota --}}
        <div class="super-member-stat-card">
            <div class="super-member-stat-top">
                <span class="super-member-stat-label">Total Anggota Terdaftar</span>
                <div class="super-member-stat-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
            </div>
            <div class="super-member-stat-val-row">
                <span class="super-member-stat-val">2.450</span>
                <span class="super-member-stat-subbadge">+12 pekan ini</span>
            </div>
            <div class="super-member-stat-breakdown">
                <span>1.890 Reguler</span>
                <span>•</span>
                <span>518 Peneliti</span>
                <span>•</span>
                <span>42 Staf</span>
            </div>
        </div>

        {{-- Card 2: Status Direktori Aktif --}}
        <div class="super-member-stat-card">
            <div class="super-member-stat-top">
                <span class="super-member-stat-label">Status Direktori Aktif</span>
                <div class="super-member-stat-icon" style="background:#dcfce7;color:#15803d">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
                </div>
            </div>
            <div class="super-member-stat-val-row">
                <span class="super-member-stat-val">2.405</span>
                <span class="super-member-stat-unit">98.2% Lolos Verifikasi</span>
            </div>
            <div class="super-member-stat-breakdown">
                <span class="stat-tag-orange">28 Menunggu KTM</span>
                <span>•</span>
                <span class="stat-tag-red"><span class="stat-dot-red"></span> 17 Sanksi/Freeze</span>
            </div>
        </div>

        {{-- Card 3: Utilisasi Kartu Digital NFC --}}
        <div class="super-member-stat-card">
            <div class="super-member-stat-top">
                <span class="super-member-stat-label">Utilisasi Kartu Digital NFC</span>
                <div class="super-member-stat-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                </div>
            </div>
            <div class="super-member-stat-val-row">
                <span class="super-member-stat-val">2.180</span>
                <span class="super-member-stat-unit">Smart Card Aktif</span>
            </div>
            <div class="super-member-stat-breakdown">
                <span>89% Sinkron Mobile Pass</span>
                <span>•</span>
                <span>0 Anomali Kloning</span>
            </div>
        </div>

        {{-- Card 4: Kepatuhan UU PDP --}}
        <div class="super-member-stat-card">
            <div class="super-member-stat-top">
                <span class="super-member-stat-label">Kepatuhan UU PDP (Privasi)</span>
                <div class="super-member-stat-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
            </div>
            <div class="super-member-stat-val-row">
                <span class="super-member-stat-val" style="font-size:20px">AES-256</span>
                <span class="super-member-stat-unit">100% Enkripsi GCM</span>
            </div>
            <div class="super-member-stat-breakdown">
                <span>NIK &amp; Kontak Masked</span>
                <span>•</span>
                <span style="color:#059669;font-weight:600">Audit Trail Aktif</span>
            </div>
        </div>
    </div>

    {{-- Main Two-Column Layout --}}
    <div class="super-member-body">

        {{-- Kolom Kiri: Tabel & Kontrol Anggota --}}
        <div class="super-member-main-col">

            {{-- Filter & Search Toolbar --}}
            <div class="super-member-toolbar">
                <div class="super-member-search-box">
                    <span class="super-member-search-icon">🔍</span>
                    <input type="text" id="member-search-input" class="super-member-search-input" placeholder="Cari berdasarkan NIK, NIA, nama lengkap, atau email SSO..." onkeyup="filterSuperMembersTable()">
                </div>
                <select id="member-category-filter" class="super-member-select" onchange="filterSuperMembersTable()">
                    <option value="all">Kategori: Semua</option>
                    <option value="dosen">Dosen / Peneliti</option>
                    <option value="mahasiswa">Mahasiswa Kampus</option>
                    <option value="umum">Masyarakat Umum</option>
                </select>
                <select id="member-status-filter" class="super-member-select" onchange="filterSuperMembersTable()">
                    <option value="all">Status: Semua</option>
                    <option value="active">Aktif Terverifikasi</option>
                    <option value="verify">Perlu Validasi KTM</option>
                    <option value="freeze">Freeze / Terkunci</option>
                </select>
            </div>

            {{-- Batch Action Bar --}}
            <div class="super-member-bulkbar">
                <div class="super-member-bulk-left">
                    <input type="checkbox" id="check-all-members" style="width:15px;height:15px;accent-color:#0f172a" onchange="toggleSelectAllSuperMembers(this)">
                    <span id="bulk-members-count">Pilih Semua di Halaman (5 dipilih)</span>
                </div>
                <div class="super-member-bulk-actions">
                    <button type="button" class="btn-member-bulk" onclick="toast('Kredensial aktivasi smart card berhasil dikirim ulang ke kontak anggota.')">
                        <span>✉️</span> Kirim Kredensial Ulang
                    </button>
                    <button type="button" class="btn-member-bulk-danger" onclick="toast('Anggota terpilih telah dibekukan sementara dari transaksi sirkulasi.')">
                        <span>❄️</span> Bekukan Sementara
                    </button>
                    <button type="button" class="btn-member-bulk" onclick="toast('Limit kuota peminjaman berhasil dibuka (Super Admin Override).')">
                        <span>⚡</span> Bypass Limit Kuota
                    </button>
                </div>
            </div>

            {{-- Tabel Direktori Anggota --}}
            <div class="super-member-table-card">
                <table class="super-member-table" id="super-members-table">
                    <thead>
                        <tr>
                            <th style="width: 32%">ANGGOTA &amp; IDENTITAS</th>
                            <th style="width: 25%">KATEGORI &amp; KUOTA</th>
                            <th style="width: 22%">STATUS KEPATUHAN</th>
                            <th style="width: 21%">SESI TERAKHIR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($superMembers as $m)
                        <tr class="super-member-row {{ !empty($m['selected']) ? 'selected-row' : '' }}"
                            data-name="{{ strtolower($m['name']) }}"
                            data-nia="{{ strtolower($m['nia']) }}"
                            data-nik="{{ strtolower($m['nik_masked']) }}"
                            data-category="{{ $m['category_filter'] }}"
                            data-status="{{ $m['status_filter'] }}"
                            onclick="inspectSuperMember('{{ addslashes($m['name']) }}', '{{ addslashes($m['nia']) }}', '{{ addslashes($m['nik_masked']) }}', '{{ addslashes($m['email']) }}', '{{ addslashes($m['phone']) }}', '{{ addslashes($m['category_title']) }}', '{{ addslashes($m['valid_until']) }}', '{{ addslashes($m['limit_books']) }}', '{{ addslashes($m['repo_access']) }}', '{{ addslashes($m['dispensation']) }}')">
                            
                            {{-- Kolom 1: Anggota & Identitas --}}
                            <td>
                                <div class="col-member-identity">
                                    <input type="checkbox" class="super-member-checkbox" {{ !empty($m['selected']) ? 'checked' : '' }} onclick="event.stopPropagation(); updateSuperMemberCount();">
                                    <div class="member-avatar-circle {{ $m['avatar_class'] }}">
                                        <span>{{ $m['avatar'] }}</span>
                                    </div>
                                    <div class="member-name-block">
                                        <span class="member-name-text">{{ $m['name'] }}</span>
                                        <span class="member-code-sub">NIA: {{ $m['nia'] }}</span>
                                        <span class="member-code-sub">NIK: {{ $m['nik_masked'] }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Kolom 2: Kategori & Kuota --}}
                            <td>
                                <div class="member-cat-title">
                                    <span>{{ $m['category_title'] }}</span>
                                    @if(!empty($m['category_verified']))
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    @endif
                                </div>
                                <div class="member-quota-sub {{ !empty($m['quota_warn']) ? 'member-quota-warn' : '' }}">{{ $m['quota_desc'] }}</div>
                                <div class="member-repo-note">{{ $m['repo_desc'] }}</div>
                            </td>

                            {{-- Kolom 3: Status Kepatuhan --}}
                            <td>
                                @if($m['status_type'] === 'active_verified' || $m['status_type'] === 'active')
                                    <span class="compliance-pill compliance-pill-green">
                                        <span style="font-size:8px">●</span>
                                        <span>{{ $m['status_label'] }}</span>
                                    </span>
                                @elseif($m['status_type'] === 'verify')
                                    <span class="compliance-pill compliance-pill-amber">
                                        <span>⚠️</span>
                                        <span>{{ $m['status_label'] }}</span>
                                    </span>
                                @else
                                    <span class="compliance-pill compliance-pill-red">
                                        <span>⊘</span>
                                        <span>{{ $m['status_label'] }}</span>
                                    </span>
                                @endif
                                <div class="compliance-sub">{{ $m['status_sub'] }}</div>
                            </td>

                            {{-- Kolom 4: Sesi Terakhir --}}
                            <td>
                                <div class="session-time">{{ $m['last_session'] }}</div>
                                <div class="session-location">{{ $m['last_location'] }}</div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination Footer Persis Figma --}}
                <div class="super-member-table-footer">
                    <span>Menampilkan 5 dari 2.450 anggota terdaftar di direktori</span>
                    <div style="display:flex;align-items:center;gap:12px">
                        <span style="color:#64748b;font-size:11px">Baris per halaman: <b>5 ▾</b></span>
                        <div class="super-users-pagination">
                            <button type="button" class="btn-page" onclick="toast('Halaman pertama')">‹</button>
                            <button type="button" class="btn-page active">1</button>
                            <button type="button" class="btn-page" onclick="toast('Menuju halaman 2')">2</button>
                            <button type="button" class="btn-page" onclick="toast('Menuju halaman 3')">3</button>
                            <span class="page-dots">...</span>
                            <button type="button" class="btn-page" onclick="toast('Menuju halaman 490')">490</button>
                            <button type="button" class="btn-page" onclick="toast('Menuju halaman berikutnya')">›</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Jejak Audit Terakhir Tata Kelola Anggota (Figma Node 285-2) --}}
            <div class="super-member-audit-section">
                <div class="super-member-audit-header">
                    <div class="super-member-audit-title">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span>Jejak Audit Terakhir Tata Kelola Anggota</span>
                    </div>
                    <a href="javascript:void(0)" class="super-member-audit-link" onclick="toast('Membuka seluruh log jejak audit tata kelola anggota...')">Lihat Seluruh Log Keamanan</a>
                </div>

                <div class="super-member-audit-grid">
                    {{-- Log Card 1 --}}
                    <div class="super-member-audit-card">
                        <div class="super-member-audit-top">
                            <span class="super-member-audit-actor">Super Admin [Ari]</span>
                            <span class="super-member-audit-time">10m lalu</span>
                        </div>
                        <div class="super-member-audit-text">
                            Override kuota peminjaman anggota Dr. Siti Rahmawati menjadi 10 buku.
                        </div>
                    </div>

                    {{-- Log Card 2 --}}
                    <div class="super-member-audit-card">
                        <div class="super-member-audit-top">
                            <span class="super-member-audit-actor">Sistem Sirkulasi Daemon</span>
                            <span class="super-member-audit-time">42m lalu</span>
                        </div>
                        <div class="super-member-audit-text">
                            Pembekuan otomatis akun Ahmad Fauzi (Keterlambatan &gt; 14 hari + denda).
                        </div>
                    </div>

                    {{-- Log Card 3 --}}
                    <div class="super-member-audit-card">
                        <div class="super-member-audit-top">
                            <span class="super-member-audit-actor">Sync Gateway Kemendikbud</span>
                            <span class="super-member-audit-time">02:15 WIB</span>
                        </div>
                        <div class="super-member-audit-text">
                            Verifikasi massal status NIDN/NIM aktif 42 mahasiswa dan 8 staf pengajar.
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan: Panel Inspeksi Otorisasi Super Admin --}}
        <div class="super-member-sidebar-col">
            <div class="super-member-sidebar-card">
                <div class="super-member-sidebar-header">
                    <span class="super-member-sidebar-title">PANEL INSPEKSI OTORISASI SUPER ADMIN</span>
                    <span class="badge-root-focused">Root Focused</span>
                </div>

                {{-- Digital Member Card Widget (Kartu Anggota Digital Nasional) --}}
                <div class="member-digital-card">
                    <div class="card-top-row">
                        <div>
                            <div class="card-brand-title">INOVEXA PUBLIC LIBRARY</div>
                            <div class="card-brand-sub">Kartu Anggota Digital Nasional</div>
                        </div>
                        <div class="card-nfc-wave">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12a8 8 0 0 1 14.93-4"/><path d="M7.5 12a4.5 4.5 0 0 1 8.52-2"/><circle cx="12" cy="12" r="1.5"/></svg>
                        </div>
                    </div>

                    <div class="card-chip-row">
                        <div class="card-gold-chip"></div>
                        <span class="card-scan-label">SCAN READY</span>
                    </div>

                    <div class="card-user-label">NAMA LENGKAP PEMUSTAKA</div>
                    <div class="card-user-name" id="card-member-name">Dr. Siti Rahmawati, M.Sc.</div>

                    <div class="card-bottom-row">
                        <div>
                            <div style="font-size:7.5px;color:#94a3b8">Nomor Induk Anggota (NIA)</div>
                            <b id="card-member-nia" style="font-family:monospace">INX-2026-07719</b>
                        </div>
                        <div style="text-align:right">
                            <div style="font-size:7.5px;color:#94a3b8">Berlaku Hingga</div>
                            <b id="card-member-valid">31 Des 2027</b>
                        </div>
                    </div>
                </div>

                {{-- Kredensial & Privasi Terenkripsi --}}
                <div class="privacy-meta-box">
                    <div class="privacy-meta-row" style="margin-bottom:4px">
                        <b>Kredensial &amp; Privasi Terenkripsi</b>
                        <span class="badge-pdp-valid">🔒 PDP Valid</span>
                    </div>
                    <div class="privacy-meta-row">
                        <span>NIK (Disamarkan):</span>
                        <b class="privacy-meta-val" id="meta-member-nik">31740924••••0003</b>
                    </div>
                    <div class="privacy-meta-row">
                        <span>Email Institusi:</span>
                        <b class="privacy-meta-val" id="meta-member-email">siti.rahmawati@ui.ac.id</b>
                    </div>
                    <div class="privacy-meta-row">
                        <span>WhatsApp Terverifikasi:</span>
                        <b class="privacy-meta-val" id="meta-member-phone">+62 812-99••-•891</b>
                    </div>
                    <div class="privacy-meta-row">
                        <span>Kategori Hak:</span>
                        <span style="background:#dcfce7;color:#15803d;padding:1px 6px;border-radius:3px;font-weight:700;font-size:10px" id="meta-member-cat">Dosen / Peneliti</span>
                    </div>
                </div>

                {{-- Hak Otoritas Khusus (Super Admin Override) --}}
                <div class="override-section">
                    <div class="override-header">
                        <span>Hak Otoritas Khusus (Super Admin Override)</span>
                        <span class="override-tag-master">Tingkat Master</span>
                    </div>

                    <div class="override-item">
                        <div class="override-item-left">
                            <span class="override-item-name">Limit Pinjam Simultan</span>
                            <span class="override-item-sub">Standar umum: 3 eksemplar</span>
                        </div>
                        <span class="override-badge-pill" id="meta-member-limit">
                            <b id="override-limit-val">10 Buku</b>
                            <span style="font-size:10px;cursor:pointer" onclick="openModal('modal-member-quota-override')">✏️</span>
                        </span>
                    </div>

                    <div class="override-item">
                        <div class="override-item-left">
                            <span class="override-item-name">Repositori Riset Langka</span>
                            <span class="override-item-sub">Akses manuskrip &amp; arsip terbatas</span>
                        </div>
                        <span class="override-badge-pill override-badge-green" id="meta-member-repo">Diizinkan (Full)</span>
                    </div>

                    <div class="override-item">
                        <div class="override-item-left">
                            <span class="override-item-name">Dispensasi Denda Keterlambatan</span>
                            <span class="override-item-sub">Bebas penalti harian sirkulasi</span>
                        </div>
                        <span class="override-badge-pill" id="meta-member-dispense" style="color:#64748b">Nonaktif (Standar)</span>
                    </div>
                </div>

                {{-- Tombol Aksi Override & Kontrol Akun --}}
                <button type="button" class="btn-sidebar-override-main" onclick="openModal('modal-member-quota-override')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9c0 .69.21 1.33.57 1.87z"/></svg>
                    <span>Ubah Kebijakan Hak Kuota Anggota</span>
                </button>

                <div class="sidebar-action-subrow">
                    <button type="button" class="btn-sub-freeze" onclick="toast('Status akun pemustaka dibekukan sementara.')">
                        <span>🔒</span> Bekukan Akun
                    </button>
                    <button type="button" class="btn-sub-log" onclick="toast('Membuka log riwayat transaksi &amp; kepatuhan anggota...')">
                        <span>📜</span> Lihat Audit Log
                    </button>
                </div>

            </div>

            {{-- Integritas Direktori Anggota (Figma Node 285-2 Right Sidebar) --}}
            <div class="member-integrity-card">
                <div class="member-integrity-header">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                    <span>Integritas Direktori Anggota</span>
                </div>
                <div class="member-integrity-list">
                    <div class="member-integrity-row">
                        <span class="member-integrity-label">Sinkronisasi PDDikti &amp; Dukcapil</span>
                        <span class="member-integrity-val member-integrity-val-green">
                            <span class="integrity-dot-connected"></span>
                            <span>Terhubung Real-Time</span>
                        </span>
                    </div>
                    <div class="member-integrity-row">
                        <span class="member-integrity-label">SHA-256 Hash Record Check</span>
                        <span class="member-integrity-val">Valid (0 Tampering)</span>
                    </div>
                    <div class="member-integrity-row">
                        <span class="member-integrity-label">Siklus Pembaruan Kredensial</span>
                        <span class="member-integrity-val">Setiap 365 Hari</span>
                    </div>
                </div>
            </div>

            {{-- Cold Storage Notice Box --}}
            <div class="member-cold-storage-box">
                <div class="cold-storage-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="4"/><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"/></svg>
                </div>
                <div class="cold-storage-text">
                    Data anggota yang berstatus tidak aktif lebih dari 24 bulan akan diajukan ke proses arsip dingin (cold storage) secara otomatis sesuai protokol privasi perpustakaan daerah.
                </div>
            </div>
        </div>

    </div>

    {{-- Standar Tata Kelola Perlindungan Data Pribadi Full Width Banner (Figma Node 285-2 Bottom) --}}
    <div class="super-member-footer-banner">
        <div class="footer-banner-left">
            <svg class="footer-banner-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <span>
                <b>Standar Tata Kelola Perlindungan Data Pribadi (UU PDP No. 27/2022) &amp; ISO 27001:</b> Seluruh data identitas kependudukan pemustaka disimpan dengan enkripsi end-to-end dan hanya dapat diaudit oleh Super Admin Otoritas Root.
            </span>
        </div>
        <div class="footer-banner-right">
            Inovexa Governance Engine v4.8
        </div>
    </div>

</div>

{{-- MODAL 1: Daftarkan Anggota Baru (Master) --}}
<div class="super-modal-overlay" id="modal-register-master-member" onclick="if(event.target === this) closeModal('modal-register-master-member')">
    <div class="super-modal-content">
        <div class="super-modal-header">
            <div>
                <h3 class="super-modal-title">Daftarkan Anggota Baru (Master Direktori)</h3>
                <p class="super-modal-sub">Pendaftaran akun pemustaka dengan verifikasi identitas NIK dan pembuatan smart card otomatis.</p>
            </div>
            <button type="button" class="super-modal-close" onclick="closeModal('modal-register-master-member')">&times;</button>
        </div>

        <form onsubmit="event.preventDefault(); toast('Data anggota baru berhasil didaftarkan dan kartu digital diterbitkan.'); closeModal('modal-register-master-member');">
            <div class="modal-form-grid">
                <div class="modal-field modal-form-full">
                    <label>Nama Lengkap Pemustaka</label>
                    <input type="text" class="modal-input" placeholder="Misal: Prof. Dr. Hendra Gunawan" required>
                </div>
                <div class="modal-field">
                    <label>Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" class="modal-input" placeholder="16 Digit NIK KTP" required>
                </div>
                <div class="modal-field">
                    <label>Nomor Induk Anggota (NIA)</label>
                    <input type="text" class="modal-input" value="INX-2026-9912" required>
                </div>
                <div class="modal-field">
                    <label>Kategori Keanggotaan</label>
                    <select class="modal-select">
                        <option>Dosen / Peneliti Utama</option>
                        <option>Mahasiswa Sarjana (S1)</option>
                        <option>Mahasiswa Pascasarjana (S2/S3)</option>
                        <option>Masyarakat Umum / Peneliti Mandiri</option>
                    </select>
                </div>
                <div class="modal-field">
                    <label>Limit Kuota Simultan</label>
                    <select class="modal-select">
                        <option>Standar Reguler (3 Eksemplar)</option>
                        <option>Extended Mahasiswa (5 Eksemplar)</option>
                        <option>Master Dosen / Riset (10 Eksemplar)</option>
                    </select>
                </div>
                <div class="modal-field">
                    <label>Alamat Email SSO / Institusi</label>
                    <input type="email" class="modal-input" placeholder="nama@kampus.ac.id" required>
                </div>
                <div class="modal-field">
                    <label>Nomor WhatsApp / Ponsel</label>
                    <input type="text" class="modal-input" placeholder="+62 812-xxxx-xxxx" required>
                </div>
            </div>

            <div class="super-modal-footer">
                <button type="button" class="btn-member-outline" onclick="closeModal('modal-register-master-member')">Batal</button>
                <button type="submit" class="btn-member-primary">Daftarkan &amp; Terbitkan Kartu</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL 2: Audit Kepatuhan PDP --}}
<div class="super-modal-overlay" id="modal-audit-pdp" onclick="if(event.target === this) closeModal('modal-audit-pdp')">
    <div class="super-modal-content super-modal-lg">
        <div class="super-modal-header">
            <div>
                <h3 class="super-modal-title">Audit Kepatuhan UU Perlindungan Data Pribadi (UU PDP No. 27/2022)</h3>
                <p class="super-modal-sub">Standarisasi keamanan enkripsi data pribadi dan pengawasan hak subjek data pemustaka.</p>
            </div>
            <button type="button" class="super-modal-close" onclick="closeModal('modal-audit-pdp')">&times;</button>
        </div>

        <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:14px;margin-bottom:16px;font-size:12px;line-height:1.6">
            <div style="display:flex;align-items:center;gap:8px;font-weight:700;color:#0f172a;margin-bottom:6px">
                <span style="color:#059669;font-size:15px">🛡️</span>
                <span>Enkripsi Penyimpanan Kolom Sensitif (Rest Encryption)</span>
            </div>
            <p style="margin:0 0 10px;color:#64748b">
                Seluruh data identitas kependudukan (NIK 16 digit), nomor telepon WhatsApp, dan alamat domisili tersimpan dalam basis data dengan algoritma enkripsi <b>AES-256-GCM</b>. Kunci dekripsi hanya dapat diakses melalui modul berotentikasi Super Admin (Root Level 0).
            </p>
            <div style="display:grid;grid-template-columns:repeat(3, 1fr);gap:10px;padding-top:10px;border-top:1px solid #e2e8f0;font-size:11px">
                <div>
                    <span style="color:#64748b;display:block">Masking Antarmuka:</span>
                    <b style="color:#059669">Aktif (12 Digit Masked)</b>
                </div>
                <div>
                    <span style="color:#64748b;display:block">Audit Trail Akses:</span>
                    <b style="color:#059669">Tercatat di Syslog</b>
                </div>
                <div>
                    <span style="color:#64748b;display:block">Hak Penghapusan Subjek:</span>
                    <b style="color:#059669">Tersedia Sesuai Regulasi</b>
                </div>
            </div>
        </div>

        <div class="super-modal-footer">
            <button type="button" class="btn-member-outline" onclick="closeModal('modal-audit-pdp')">Tutup</button>
            <button type="button" class="btn-member-primary" onclick="toast('Laporan kepatuhan PDP berhasil diunduh.'); closeModal('modal-audit-pdp');">Unduh Sertifikat Kepatuhan</button>
        </div>
    </div>
</div>

{{-- MODAL 3: Ubah Kebijakan Hak Kuota Anggota --}}
<div class="super-modal-overlay" id="modal-member-quota-override" onclick="if(event.target === this) closeModal('modal-member-quota-override')">
    <div class="super-modal-content">
        <div class="super-modal-header">
            <div>
                <h3 class="super-modal-title">Ubah Kebijakan Hak Kuota &amp; Otoritas Anggota</h3>
                <p class="super-modal-sub">Atur dispensasi dan hak istimewa operasional untuk pemustaka terpilih.</p>
            </div>
            <button type="button" class="super-modal-close" onclick="closeModal('modal-member-quota-override')">&times;</button>
        </div>

        <form onsubmit="event.preventDefault(); applyQuotaOverride();">
            <div class="modal-form-grid">
                <div class="modal-field modal-form-full">
                    <label>Limit Pinjaman Buku Simultan</label>
                    <select id="input-override-quota" class="modal-select">
                        <option value="3 Buku">Standar (3 Buku)</option>
                        <option value="5 Buku">Extended Mahasiswa (5 Buku)</option>
                        <option value="10 Buku" selected>Master Peneliti / Dosen (10 Buku)</option>
                        <option value="15 Buku">VIP / Institusi Mitra (15 Buku)</option>
                    </select>
                </div>
                <div class="modal-field modal-form-full">
                    <label>Akses Repositori Naskah Kuno &amp; Arsip Langka</label>
                    <select id="input-override-repo" class="modal-select">
                        <option value="Diizinkan (Full)" selected>Diizinkan Akses Penuh (Full Download &amp; View)</option>
                        <option value="Baca Saja">Baca di Ruang Khusus (View Only)</option>
                        <option value="Tidak Diizinkan">Tidak Diizinkan</option>
                    </select>
                </div>
                <div class="modal-field modal-form-full">
                    <label>Dispensasi Penalti Keterlambatan Sirkulasi</label>
                    <select id="input-override-fine" class="modal-select">
                        <option value="Nonaktif (Standar)" selected>Nonaktif (Denda Normal Sesuai Jadwal)</option>
                        <option value="Aktif (Bebas Denda)">Aktif (Bebas Denda Sirkulasi Selama Masa Riset)</option>
                    </select>
                </div>
            </div>

            <div class="super-modal-footer">
                <button type="button" class="btn-member-outline" onclick="closeModal('modal-member-quota-override')">Batal</button>
                <button type="submit" class="btn-member-primary">Terapkan Kebijakan</button>
            </div>
        </form>
    </div>
</div>

{{-- Script Interaktivitas Direktori Anggota --}}
<script>
    // Filter Pencarian & Dropdown
    function filterSuperMembersTable() {
        const query = (document.getElementById('member-search-input').value || '').toLowerCase().trim();
        const cat = document.getElementById('member-category-filter').value;
        const status = document.getElementById('member-status-filter').value;
        const rows = document.querySelectorAll('#super-members-table tbody tr');

        rows.forEach(r => {
            const name = r.dataset.name || '';
            const nia = r.dataset.nia || '';
            const nik = r.dataset.nik || '';
            const rowCat = r.dataset.category || '';
            const rowStatus = r.dataset.status || '';

            const matchQuery = !query || name.includes(query) || nia.includes(query) || nik.includes(query);
            const matchCat = cat === 'all' || rowCat === cat;
            const matchStatus = status === 'all' || rowStatus === status;

            if (matchQuery && matchCat && matchStatus) {
                r.style.display = '';
            } else {
                r.style.display = 'none';
            }
        });
    }

    // Toggle Checkbox Pilih Semua
    function toggleSelectAllSuperMembers(master) {
        const boxes = document.querySelectorAll('.super-member-checkbox');
        boxes.forEach(b => {
            b.checked = master.checked;
            const row = b.closest('tr');
            if (master.checked) {
                row.classList.add('selected-row');
            } else {
                row.classList.remove('selected-row');
            }
        });
        updateSuperMemberCount();
    }

    // Perbarui jumlah anggota terpilih
    function updateSuperMemberCount() {
        const count = document.querySelectorAll('.super-member-checkbox:checked').length;
        const label = document.getElementById('bulk-members-count');
        if (label) {
            label.textContent = count > 0 ? count + ' Anggota Dipilih' : 'Pilih Semua di Halaman';
        }

        document.querySelectorAll('.super-member-checkbox').forEach(b => {
            const row = b.closest('tr');
            if (b.checked) row.classList.add('selected-row');
            else row.classList.remove('selected-row');
        });
    }

    // Update Panel Inspeksi Samping Kanan
    function inspectSuperMember(name, nia, nik, email, phone, category, validUntil, limit, repo, dispense) {
        const cardName = document.getElementById('card-member-name');
        const cardNia = document.getElementById('card-member-nia');
        const cardValid = document.getElementById('card-member-valid');
        const metaNik = document.getElementById('meta-member-nik');
        const metaEmail = document.getElementById('meta-member-email');
        const metaPhone = document.getElementById('meta-member-phone');
        const metaCat = document.getElementById('meta-member-cat');
        const limitVal = document.getElementById('override-limit-val');
        const repoVal = document.getElementById('meta-member-repo');
        const dispenseVal = document.getElementById('meta-member-dispense');

        if (cardName) cardName.textContent = name;
        if (cardNia) cardNia.textContent = nia;
        if (cardValid) cardValid.textContent = validUntil;
        if (metaNik) metaNik.textContent = nik;
        if (metaEmail) metaEmail.textContent = email;
        if (metaPhone) metaPhone.textContent = phone;
        if (metaCat) metaCat.textContent = category;
        if (limitVal) limitVal.textContent = limit;
        if (repoVal) repoVal.textContent = repo;
        if (dispenseVal) dispenseVal.textContent = dispense;
    }

    // Terapkan override dari modal
    function applyQuotaOverride() {
        const quota = document.getElementById('input-override-quota').value;
        const repo = document.getElementById('input-override-repo').value;
        const fine = document.getElementById('input-override-fine').value;

        const limitVal = document.getElementById('override-limit-val');
        const repoVal = document.getElementById('meta-member-repo');
        const dispenseVal = document.getElementById('meta-member-dispense');

        if (limitVal) limitVal.textContent = quota;
        if (repoVal) repoVal.textContent = repo;
        if (dispenseVal) dispenseVal.textContent = fine;

        closeModal('modal-member-quota-override');
        toast('Kebijakan hak kuota anggota berhasil diperbarui.');
    }

    // Ekspor CSV
    function exportSuperMembersCsv() {
        const rows = [
            ['Nama', 'NIA', 'NIK', 'Kategori', 'Batas Kuota', 'Status Kepatuhan', 'Email', 'No Telepon'],
            ['Dr. Siti Rahmawati, M.Sc.', 'INX-2026-07719', '3174092400000003', 'Dosen / Peneliti', '10 Buku', 'Aktif Terverifikasi', 'siti.rahmawati@ui.ac.id', '+628129900891'],
            ['Herdman Pratama', 'INX-2026-08912', '3273100500000001', 'Umum / Reguler', '3 Buku', 'Aktif', 'herdman.pratama@gmail.com', '+628138800102'],
            ['Kevin Wijaya', 'MBR-2026-04321', '3171011800000007', 'Mahasiswa UI', '3 Buku', 'Perlu Validasi KTM', 'kevin.w@campus.ac.id', '+628564400992'],
            ['Ahmad Fauzi', 'INX-2026-04118', '3578012900000004', 'Mahasiswa S1 TI', 'Terkunci Denda', 'Freeze Sirkulasi', 'ahmad.fauzi@student.ac.id', '+628192200771'],
            ['Dimas Arya', 'INX-2026-07734', '3175020100000002', 'Anggota Umum', '3 Buku', 'Aktif', 'dimas.arya@techmail.com', '+628781100332']
        ];
        let csvContent = "data:text/csv;charset=utf-8," + rows.map(e => e.join(",")).join("\n");
        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "inovexa_direktori_anggota_super.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        toast('Mengunduh berkas CSV direktori anggota...');
    }
</script>

@else
{{--
    ========================================================================
    ADMIN SIRKULASI: KELOLA DATA ANGGOTA PERPUSTAKAAN (EXISTING PANEL)
    ========================================================================
--}}
<div class="member-management-page" style="display:grid;grid-template-columns:1fr 340px;gap:20px;max-width:1450px;margin:0 auto">
    <div class="member-management-main" style="min-width:0">
        <!-- Top Title & Buttons -->
        <div class="member-management-heading" style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:16px">
            <div>
                <div style="font-size:10px;color:var(--m);font-weight:700;letter-spacing:.05em;margin-bottom:3px">Dashboard Admin Sirkulasi &rsaquo; Kelola Data Anggota</div>
                <h2 style="font-size:22px;font-weight:800;color:var(--t);margin:0;display:flex;align-items:center;gap:10px">
                    Kelola Data Anggota Perpustakaan
                    <span style="font-size:9.5px;background:#e5e7eb;color:var(--t);padding:2px 8px;border-radius:4px;font-weight:600">Modul Master Sirkulasi</span>
                </h2>
                <p style="font-size:11.5px;color:var(--m);margin:4px 0 0">Pusat kendali basis data anggota terpadu. Verifikasi berkas KTM/KTP, pantau batas kuota peminjaman, perpanjangan smart card, serta audit kepatuhan sirkulasi pemustaka secara real-time.</p>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">🖨️ Cetak Kartu Massal</button>
                <button style="background:#fff;border:1px solid var(--ln);color:var(--t);padding:7px 12px;border-radius:8px;font-size:11.5px;font-weight:600;cursor:pointer">📥 Import CSV/Excel</button>
                <button style="background:#153223;color:#fff;border:none;padding:7px 14px;border-radius:8px;font-size:11.5px;font-weight:700;cursor:pointer">+ Tambah Anggota Baru</button>
            </div>
        </div>

        <!-- Top Stats Grid -->
        <div class="member-management-stats" style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px">
            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">TOTAL ANGGOTA TERDAFTAR</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">1.890 <span style="font-size:11px;font-weight:normal;color:var(--m)">Orang</span></div>
                <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">+28 registrasi bulan ini</span>
                    <span class="member-management-stat-icon" style="color:#17643d;background:#e8f4ed"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="8" r="3"/><path d="M3 20v-1a6 6 0 0 1 12 0v1m2-9a3 3 0 1 0 0-6m1 9a5 5 0 0 1 3 5v1"/></svg></span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">ANGGOTA AKTIF SIRKULASI</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">1.642 <span style="font-size:11px;font-weight:normal;color:var(--m)">Anggota</span></div>
                <span style="font-size:10px;color:#059669;font-weight:600;background:#ecfdf5;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">● Status valid bebas sanksi (86.8%)</span>
                <span class="member-management-stat-icon" style="color:#168c68;background:#e9f8f1"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 3h12v18H6zM9 7h6m-6 4h6m-6 4h4"/><path d="M4 6H3v15h12v-1"/></svg></span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">VERIFIKASI KTM / BERKAS</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">14 <span style="font-size:11px;font-weight:normal;color:var(--m)">Orang</span></div>
                <span style="font-size:10px;color:#d97706;font-weight:600;background:#fef3c7;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚠️ Butuh validasi loket hari ini</span>
                <span class="member-management-stat-icon" style="color:#c76b00;background:#fff4df"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4V2h6v2m-7 6h8m-8 4h8m-8 4h5"/></svg></span>
            </div>

            <div style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:14px;position:relative">
                <span style="font-size:10px;color:var(--m);font-weight:700;display:block;margin-bottom:6px">MASA BERLAKU HABIS</span>
                <div style="font-size:22px;font-weight:800;color:var(--t)">24 <span style="font-size:11px;font-weight:normal;color:var(--m)">Orang</span></div>
                <span style="font-size:10px;color:#dc2626;font-weight:600;background:#fee2e2;padding:2px 6px;border-radius:4px;display:inline-block;margin-top:6px">⚡ Perlu perpanjangan masa aktif</span>
                <span class="member-management-stat-icon" style="color:#dc2626;background:#fff0f0"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18m-9 3v4m-2-2h4"/></svg></span>
            </div>
        </div>

        <!-- Search & Filters -->
        <div class="member-management-toolbar" style="background:#fff;border:1px solid var(--ln);border-radius:10px;padding:12px;margin-bottom:14px;display:flex;gap:10px;align-items:center">
            <div style="flex:1;position:relative">
                <span style="position:absolute;left:12px;top:9px;color:var(--m);font-size:12px">🔍</span>
                <input type="text" placeholder="Cari NIA (INX-...), nama lengkap, NIK..." style="width:100%;padding:8px 30px 8px 34px;border:1px solid var(--ln);border-radius:6px;font-size:12px">
                <span style="position:absolute;right:10px;top:8px;background:#f3f4f6;color:var(--m);font-size:10px;padding:2px 5px;border-radius:4px">ESC</span>
            </div>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Semua Kategori Pemustaka</option>
            </select>
            <select style="padding:8px 12px;border:1px solid var(--ln);border-radius:6px;font-size:12px;background:#fff">
                <option>Paling Baru Terdaftar</option>
            </select>
            <button style="background:#fff;border:1px solid var(--ln);padding:8px 12px;border-radius:6px;font-size:12px;font-weight:600;cursor:pointer">⚙️ Filter Lanjutan</button>
            <button style="background:#fff;border:1px solid var(--ln);padding:8px 10px;border-radius:6px;font-size:12px;cursor:pointer">📥</button>
        </div>

        <!-- Sub Tabs & Info -->
        <div class="member-management-tabs" style="display:flex;gap:8px;margin-bottom:12px;align-items:center">
            <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:700;cursor:pointer">Semua (1.890)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Aktif (1.642)</button>
            <button style="background:#153223;color:#fff;border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:700;cursor:pointer">Menunggu Verifikasi 14</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Ditangguhkan (10)</button>
            <button style="background:#f3f4f6;color:var(--m);border:none;padding:5px 12px;border-radius:20px;font-size:11.5px;font-weight:600;cursor:pointer">Kedaluwarsa (24)</button>
        </div>
        <div style="font-size:11.5px;color:var(--m);margin-bottom:10px">Menampilkan <b>6 data</b> anggota relevan</div>

        <!-- Bulk Bar -->
        <div class="member-management-bulkbar" style="background:#153223;color:#fff;padding:8px 14px;border-radius:8px;display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;font-size:12px">
            <div style="display:flex;align-items:center;gap:10px">
                <input type="checkbox" checked style="accent-color:#059669;width:15px;height:15px">
                <span><b>2 Anggota Dipilih</b></span>
            </div>
            <div style="display:flex;gap:8px">
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">Kirim Notifikasi WhatsApp</button>
                <button style="background:#1f4e2d;color:#fff;border:none;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer">Cetak Kartu Terpilih</button>
                <button style="background:none;border:none;color:#cbd5e1;font-size:11px;cursor:pointer">Batal</button>
            </div>
        </div>

        <!-- Main Table -->
        <div class="member-management-table" style="background:#fff;border:1px solid var(--ln);border-radius:10px;overflow:hidden">
            <table style="width:100%;border-collapse:collapse;text-align:left;font-size:12px">
                <thead>
                    <tr style="background:#f9fafb;border-bottom:1px solid var(--ln);color:var(--m);font-size:10.5px;font-weight:700">
                        <th style="padding:12px;width:30px"><input type="checkbox"></th>
                        <th style="padding:12px">ANGGOTA &amp; IDENTITAS</th>
                        <th style="padding:12px">KONTAK &amp; DOMISILI</th>
                        <th style="padding:12px">PINJAMAN AKTIF</th>
                        <th style="padding:12px">STATUS AKUN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom:1px solid var(--ln)">
                        <td style="padding:12px"><input type="checkbox" checked></td>
                        <td style="padding:12px">
                            <div style="display:flex;align-items:center;gap:10px">
                                <div style="width:34px;height:34px;border-radius:50%;background:#e5e7eb;display:grid;place-items:center;font-weight:700;color:var(--t)">HP</div>
                                <div>
                                    <b style="color:var(--t)">Herdman Pratama</b><br>
                                    <small style="color:var(--m)">INX-2026-08912 • NIK 31740924...</small>
                                </div>
                            </div>
                        </td>
                        <td style="padding:12px">
                            <span style="color:var(--t)">0812-3456-7890</span><br>
                            <small style="color:var(--m)">herdman@inovexa.test • Semarang</small>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;padding:2px 6px;border-radius:4px;font-size:10px;font-weight:700">2 Buku</span>
                            <span style="background:#f3f4f6;color:var(--m);padding:2px 6px;border-radius:4px;font-size:10px">Denda Rp 0</span>
                        </td>
                        <td style="padding:12px">
                            <span style="background:#d1fae5;color:#065f46;padding:3px 8px;border-radius:20px;font-size:10.5px;font-weight:700;display:inline-flex;align-items:center;gap:4px">
                                <span style="width:6px;height:6px;border-radius:50%;background:#059669"></span> Aktif
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Right Detail Column -->
    <div class="member-management-sidebar" style="background:#fff;border:1px solid var(--ln);border-radius:12px;padding:16px;height:fit-content">
        <div style="text-align:center;margin-bottom:14px">
            <div style="width:60px;height:60px;border-radius:50%;background:#e5e7eb;display:grid;place-items:center;font-size:20px;font-weight:700;margin:0 auto 8px;color:var(--t)">HP</div>
            <h3 style="margin:0;font-size:16px;font-weight:800;color:var(--t)">Herdman Pratama</h3>
            <span style="font-size:11px;color:var(--m)">ID: INX-2026-08912 • Terdaftar 15 Jan 2024</span>
        </div>

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px">
            <h4 style="font-size:13px;font-weight:800;color:var(--t);margin:0">Detail &amp; Kepatuhan Anggota</h4>
            <span style="background:#d1fae5;color:#065f46;font-size:10px;font-weight:700;padding:2px 6px;border-radius:4px">Terverifikasi</span>
        </div>

        <div style="margin-bottom:12px">
            <div style="display:flex;justify-content:space-between;font-size:11.5px;margin-bottom:4px">
                <span style="color:var(--m)">Hak Kuota Buku Fisik</span>
                <b style="color:var(--t)">2 / 3 Eksemplar Terpakai</b>
            </div>
            <div style="width:100%;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden">
                <div style="width:66.6%;height:100%;background:#d97706"></div>
            </div>
            <div style="display:flex;justify-content:space-between;font-size:10px;color:var(--m);margin-top:3px">
                <span>Sisa kuota: 1 Buku</span>
                <span style="color:#059669;font-weight:600">E-Library: Akses Penuh</span>
            </div>
        </div>

        <button style="width:100%;background:#e5e7eb;color:var(--t);border:none;padding:10px;border-radius:8px;font-size:12px;font-weight:700;margin-bottom:10px;cursor:pointer">💬 Kirim Pengingat WhatsApp</button>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px">
            <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11px;font-weight:600;cursor:pointer">⏱️ Perpanjang 1 Thn</button>
            <button style="background:#f3f4f6;border:1px solid var(--ln);color:var(--t);padding:8px;border-radius:8px;font-size:11px;font-weight:600;cursor:pointer">🖨️ Cetak Smartcard</button>
        </div>
    </div>
</div>
@endif
