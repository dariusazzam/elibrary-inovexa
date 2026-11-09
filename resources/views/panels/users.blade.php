{{--
    Super Admin: Kelola Akun & Otorisasi Hak Akses Pengguna
    Figma Prototype Node: 149-6777
    INOVEXA Library Management System
--}}

@php
    // Data akun utama persis sesuai tampilan Figma (node-id: 149-6777)
    $figmaAccounts = [
        [
            'name' => 'Ari',
            'is_you' => true,
            'email' => 'ariupgris@inovexa.id',
            'id_code' => 'SA-001',
            'role' => 'Super Admin (Root)',
            'role_badge_class' => 'role-badge-root',
            'role_icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
            'role_sub' => 'Full Otoritas Arsitektur',
            'sec_main' => 'Hardware Key FIDO2',
            'sec_icon' => 'key',
            'sec_sub' => 'Sesi Aktif Sekarang',
            'sec_warn' => false,
            'avatar' => 'AR',
            'avatar_class' => 'user-avatar-dark',
            'selected' => true,
            'category' => 'super',
            'root_level' => 'LEVEL 0: ROOT',
            'auth_type' => 'FIDO2 / Hardware Security Key',
        ],
        [
            'name' => 'Budi Santoso',
            'is_you' => false,
            'email' => 'budi.santoso@inovexa.id',
            'id_code' => 'INX-ADM-2026-04',
            'role' => 'Admin Pegawai',
            'role_badge_class' => 'role-badge-dark',
            'role_icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>',
            'role_sub' => 'Sirkulasi & Denda (R/W)',
            'sec_main' => 'Authenticator App',
            'sec_icon' => 'phone',
            'sec_sub' => 'Login: 12 menit lalu',
            'sec_warn' => false,
            'avatar' => 'BS',
            'avatar_class' => '',
            'selected' => true,
            'category' => 'admin',
            'root_level' => 'LEVEL 1: ADMIN',
            'auth_type' => 'TOTP Mobile App',
        ],
        [
            'name' => 'Siti Nurhaliza',
            'is_you' => false,
            'email' => 'siti.nurhaliza@inovexa.id',
            'id_code' => 'INX-ADM-2026-09',
            'role' => 'Admin E-Library',
            'role_badge_class' => 'role-badge-dark',
            'role_icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>',
            'role_sub' => 'E-Book & Repositori (R/W)',
            'sec_main' => 'Authenticator App',
            'sec_icon' => 'phone',
            'sec_sub' => 'Login: 1 jam lalu',
            'sec_warn' => false,
            'avatar' => 'SN',
            'avatar_class' => '',
            'selected' => false,
            'category' => 'admin',
            'root_level' => 'LEVEL 1: ADMIN',
            'auth_type' => 'TOTP Mobile App',
        ],
        [
            'name' => 'Hendra Kusuma',
            'is_you' => false,
            'email' => 'hendra.k@inovexa.id',
            'id_code' => 'INX-ADM-2026-15',
            'role' => 'Staf Inventaris',
            'role_badge_class' => 'role-badge-gray',
            'role_icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>',
            'role_sub' => 'Katalog & Eksemplar',
            'sec_main' => 'Belum 2FA',
            'sec_icon' => 'warn',
            'sec_sub' => 'Wajib Aktivasi',
            'sec_warn' => true,
            'avatar' => 'HK',
            'avatar_class' => '',
            'selected' => false,
            'category' => 'admin',
            'root_level' => 'LEVEL 2: STAF',
            'auth_type' => 'Standar Password',
        ],
        [
            'name' => 'Herdman',
            'is_you' => false,
            'email' => 'herdman.library@inovexa.id',
            'id_code' => 'INX-2026-08912',
            'role' => 'Anggota Pemustaka',
            'role_badge_class' => 'role-badge-muted',
            'role_icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>',
            'role_sub' => 'OPAC & Pinjam Mandiri',
            'sec_main' => 'Standard Auth',
            'sec_icon' => 'lock',
            'sec_sub' => 'Login: Kemarin',
            'sec_warn' => false,
            'avatar' => 'HM',
            'avatar_class' => '',
            'selected' => false,
            'category' => 'member',
            'root_level' => 'LEVEL 3: PEMUSTAKA',
            'auth_type' => 'Kredensial Single Factor',
        ],
        [
            'name' => 'Kevin Wijaya',
            'is_you' => false,
            'email' => 'kevin.w@campus.ac.id',
            'id_code' => 'MBR-2026-04321',
            'role' => 'Pemustaka Mahasiswa',
            'role_badge_class' => 'role-badge-muted',
            'role_icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
            'role_sub' => 'Akses Sementara',
            'sec_main' => 'Belum 2FA',
            'sec_icon' => 'warn',
            'sec_sub' => 'Sandi Default',
            'sec_warn' => true,
            'avatar' => 'KW',
            'avatar_class' => 'user-avatar-orange',
            'selected' => false,
            'category' => 'member',
            'root_level' => 'LEVEL 3: PEMUSTAKA',
            'auth_type' => 'KTM / NIM SSO',
        ],
        [
            'name' => 'Dimas Arya',
            'is_you' => false,
            'email' => 'dimas.arya@techmail.com',
            'id_code' => 'INX-2026-07734',
            'role' => 'Anggota Umum',
            'role_badge_class' => 'role-badge-muted',
            'role_icon' => '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>',
            'role_sub' => 'OPAC & Reservasi',
            'sec_main' => 'Standard Auth',
            'sec_icon' => 'lock',
            'sec_sub' => 'Login: 3 hari lalu',
            'sec_warn' => false,
            'avatar' => 'DA',
            'avatar_class' => '',
            'selected' => false,
            'category' => 'member',
            'root_level' => 'LEVEL 3: PEMUSTAKA',
            'auth_type' => 'Kredensial Single Factor',
        ],
    ];

    // Hubungkan dengan $lib->users agar fungsi toggle Laravel tetap berjalan
    $mappedAccounts = [];
    $matchedNames = [];

    foreach ($figmaAccounts as $acc) {
        $libIndex = null;
        $isActive = true;
        foreach ($lib->users as $idx => $lu) {
            if (strcasecmp($lu['n'], $acc['name']) === 0) {
                $libIndex = $idx;
                $isActive = (bool)$lu['on'];
                $matchedNames[] = strtolower($lu['n']);
                break;
            }
        }
        $acc['lib_index'] = $libIndex;
        $acc['is_active'] = $isActive;
        $mappedAccounts[] = $acc;
    }

    // Hanya tampilkan data dari $figmaAccounts (Ari sampai Dimas Arya), tanpa menambah dari $lib->users
@endphp

<div class="super-users-page">

    {{-- Breadcrumb persis Figma --}}
    <div class="super-users-breadcrumb">
        <a href="{{ route('dashboard', 'ov') }}" class="super-users-bread-link">Dashboard Super Admin</a>
        <span class="super-users-bread-sep">›</span>
        <span class="super-users-bread-current">Kelola Akun &amp; Hak Akses</span>
    </div>

    {{-- Page Header --}}
    <div class="super-users-header">
        <div class="super-users-header-left">
            <h1 class="super-users-title">Kelola Akun &amp; Otorisasi Hak Akses Pengguna</h1>
            <p class="super-users-desc">
                Pusat kendali hierarki kredensial, manajemen multi-faktor, kebijakan otentikasi SSO, serta konfigurasi matriks peran RBAC (Role-Based Access Control) seluruh ekosistem Inovexa.
            </p>
        </div>
        <div class="super-users-header-actions">
            <button type="button" class="btn-users-primary" onclick="openModal('modal-create-account')">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.3"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
                <span>+ Buat Akun Baru</span>
            </button>
            <button type="button" class="btn-users-outline" onclick="openModal('modal-rbac-matrix')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                <span>Matriks Kebijakan RBAC</span>
            </button>
            <button type="button" class="btn-users-outline" onclick="exportUsersCsv()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                <span>Ekspor .CSV</span>
            </button>
        </div>
    </div>

    {{-- 4 Stat Cards Row --}}
    <div class="super-users-stats-grid">
        {{-- Card 1: Total Akun --}}
        <div class="super-users-stat-card">
            <div class="super-users-stat-top">
                <div class="stat-card-icon stat-icon-gray">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <span class="stat-badge stat-badge-green">+12 Minggu Ini</span>
            </div>
            <div class="super-users-stat-label">TOTAL AKUN TERDAFTAR</div>
            <div class="super-users-stat-main">
                <span class="super-users-stat-val">2.450</span>
                <span class="super-users-stat-unit">Kredensial</span>
            </div>
            <div class="super-users-stat-sub">
                <span>3 Super Admin • 42 Staf • 2.405</span>
            </div>
        </div>

        {{-- Card 2: Status Akses Aktif --}}
        <div class="super-users-stat-card">
            <div class="super-users-stat-top">
                <div class="stat-card-icon stat-icon-mint">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
                </div>
                <span class="stat-badge stat-badge-gray">99.1% Sehat</span>
            </div>
            <div class="super-users-stat-label">STATUS AKSES AKTIF</div>
            <div class="super-users-stat-main">
                <span class="super-users-stat-val">2.428</span>
                <span class="super-users-stat-unit">Terverifikasi</span>
            </div>
            <div class="super-users-stat-sub super-users-stat-sub-split">
                <span>14 Verifikasi KTM</span>
                <span>•</span>
                <span class="stat-suspend-label"><span class="dot-red"></span> 8 Suspend</span>
            </div>
        </div>

        {{-- Card 3: Sesi Login Aktif --}}
        <div class="super-users-stat-card">
            <div class="super-users-stat-top">
                <div class="stat-card-icon stat-icon-gray">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <span class="stat-badge stat-badge-token"><span class="dot-orange"></span> Live Token</span>
            </div>
            <div class="super-users-stat-label">SESI LOGIN AKTIF</div>
            <div class="super-users-stat-main">
                <span class="super-users-stat-val">184</span>
                <span class="super-users-stat-unit">Perangkat</span>
            </div>
            <div class="super-users-stat-sub">
                <span>Multi-device active • 0 Anomali IP</span>
            </div>
        </div>

        {{-- Card 4: Integritas RBAC --}}
        <div class="super-users-stat-card">
            <div class="super-users-stat-top">
                <div class="stat-card-icon stat-icon-gray">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <span class="stat-badge stat-badge-dark">v2.4 Active</span>
            </div>
            <div class="super-users-stat-label">INTEGRITAS RBAC</div>
            <div class="super-users-stat-main">
                <span class="super-users-stat-val">Optimal</span>
                <span class="super-users-stat-unit">2FA On</span>
            </div>
            <div class="super-users-stat-sub">
                <span>Kebijakan 2FA Staf Wajib • Enkripsi SHA-256</span>
            </div>
        </div>
    </div>

    {{-- Two Column Layout --}}
    <div class="super-users-body">

        {{-- Kolom Kiri: Tabel & Kontrol Akun --}}
        <div class="super-users-main-col">

            {{-- Tabs Filter Peran --}}
            <div class="super-users-tabs">
                <button type="button" class="users-tab-pill active" onclick="filterUserCategory('all', this)">Semua Pengguna (2.450)</button>
                <button type="button" class="users-tab-pill" onclick="filterUserCategory('super', this)">Super Admin (3)</button>
                <button type="button" class="users-tab-pill" onclick="filterUserCategory('admin', this)">Admin Pegawai &amp; Staf (42)</button>
                <button type="button" class="users-tab-pill" onclick="filterUserCategory('member', this)">Anggota Pemustaka (2.405)</button>
            </div>

            {{-- Search & Filter Toolbar --}}
            <div class="super-users-toolbar">
                <div class="super-users-search-box">
                    <span class="super-users-search-icon">🔍</span>
                    <input type="text" id="user-search-input" class="super-users-search-input" placeholder="Cari berdasarkan nama, email SSO, NIP..." onkeyup="filterUserTable()">
                </div>
                <select id="user-status-filter" class="super-users-select" onchange="filterUserTable()">
                    <option value="all">Status Akun: Semua</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Nonaktif</option>
                    <option value="suspend">Ditangguhkan</option>
                </select>
                <select id="user-authority-filter" class="super-users-select" onchange="filterUserTable()">
                    <option value="all">Tingkat Otoritas: Semua</option>
                    <option value="super">Root (Super Admin)</option>
                    <option value="admin">Admin Sirkulasi &amp; Staf</option>
                    <option value="member">Pemustaka</option>
                </select>
            </div>

            {{-- Batch Action Bar (Akun Terpilih) --}}
            <div class="super-users-bulkbar">
                <div class="super-users-bulk-info">
                    <span class="bulk-check-box">✓</span>
                    <span id="bulk-selected-count">2 Akun Terpilih</span>
                </div>
                <div class="super-users-bulk-actions">
                    <button type="button" class="btn-bulk-action" onclick="toast('Kredensial aktivasi telah dikirimkan ke email terdaftar.')">
                        <span>▷</span> Kirim Kredensial
                    </button>
                    <button type="button" class="btn-bulk-action" onclick="toast('Tautan reset kata sandi sementara berhasil diterbitkan.')">
                        <span>⟳</span> Reset Sandi
                    </button>
                    <button type="button" class="btn-bulk-danger" onclick="toast('Akses akun terpilih berhasil ditangguhkan sementara.')">
                        <span>⊘</span> Tangguhkan
                    </button>
                </div>
            </div>

            {{-- Tabel Data Pengguna --}}
            <div class="super-users-table-card">
                <table class="super-users-table" id="users-table">
                    <thead>
                        <tr>
                            <th style="width: 44%">
                                <div style="display:flex;align-items:center;gap:10px">
                                    <input type="checkbox" id="check-all-users" class="user-checkbox" onchange="toggleSelectAllUsers(this)">
                                    <span>PENGGUNA &amp; IDENTITAS</span>
                                </div>
                            </th>
                            <th style="width: 28%">PERAN &amp; LEVEL HAK AKSES</th>
                            <th style="width: 18%">KEAMANAN &amp; 2FA</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mappedAccounts as $idx => $row)
                        @php
                            $rowSelected = $row['selected'] ?? false;
                            $isActive = $row['is_active'];
                        @endphp
                        <tr class="user-row {{ $rowSelected ? 'selected-row' : '' }}"
                            data-category="{{ $row['category'] }}"
                            data-status="{{ $isActive ? 'active' : 'inactive' }}"
                            data-name="{{ strtolower($row['name']) }}"
                            data-email="{{ strtolower($row['email']) }}"
                            data-id="{{ strtolower($row['id_code']) }}"
                            onclick="inspectUser('{{ addslashes($row['name']) }}', '{{ addslashes($row['role']) }}', '{{ addslashes($row['id_code']) }}', '{{ addslashes($row['avatar']) }}', '{{ addslashes($row['root_level']) }}', '{{ addslashes($row['auth_type']) }}')">
                            
                            {{-- Kolom Identitas --}}
                            <td>
                                <div class="col-identity">
                                    <input type="checkbox" class="user-checkbox row-select-box" {{ $rowSelected ? 'checked' : '' }} onclick="event.stopPropagation(); updateSelectedCount();">
                                    <div class="user-avatar-circle {{ $row['avatar_class'] }}">
                                        <span>{{ $row['avatar'] }}</span>
                                    </div>
                                    <div class="user-identity-meta">
                                        <div class="user-name-line">
                                            <span class="user-name">{{ $row['name'] }}</span>
                                            @if(!empty($row['is_you']))
                                                <span class="badge-you">YOU</span>
                                            @endif
                                        </div>
                                        <span class="user-subtext">{{ $row['email'] }} • {{ $row['id_code'] }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Kolom Peran & Hak Akses --}}
                            <td>
                                <div class="col-role">
                                    <span class="role-badge {{ $row['role_badge_class'] }}">
                                        {!! $row['role_icon'] !!}
                                        <span>{{ $row['role'] }}</span>
                                    </span>
                                    <span class="role-subtext">{{ $row['role_sub'] }}</span>
                                </div>
                            </td>

                            {{-- Kolom Keamanan & 2FA --}}
                            <td>
                                <div class="col-security">
                                    <span class="sec-status {{ $row['sec_warn'] ? 'sec-warning' : '' }}">
                                        @if($row['sec_icon'] === 'key')
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 2l-2 2m-1.5 1.5L16 7l-2-2m-1.5 1.5L11 8l-2-2m-1.5 1.5L6 9l-2-2M2 22l8.5-8.5"/><circle cx="16.5" cy="7.5" r="4.5"/></svg>
                                        @elseif($row['sec_icon'] === 'phone')
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                        @elseif($row['sec_icon'] === 'warn')
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                        @else
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                        @endif
                                        <span>{{ $row['sec_main'] }}</span>
                                    </span>
                                    <span class="sec-subtext {{ $row['sec_warn'] ? 'sec-subtext-warn' : '' }}">{{ $row['sec_sub'] }}</span>
                                </div>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination Footer --}}
                <div class="super-users-table-footer">
                    <span>Menampilkan 1-7 dari 2.450 akun terdaftar</span>
                    <div class="super-users-pagination">
                        <button type="button" class="btn-page" onclick="toast('Halaman pertama')">‹</button>
                        <button type="button" class="btn-page active">1</button>
                        <button type="button" class="btn-page" onclick="toast('Menuju halaman 2')">2</button>
                        <button type="button" class="btn-page" onclick="toast('Menuju halaman 3')">3</button>
                        <span class="page-dots">...</span>
                        <button type="button" class="btn-page" onclick="toast('Menuju halaman 350')">350</button>
                        <button type="button" class="btn-page" onclick="toast('Menuju halaman berikutnya')">›</button>
                    </div>
                </div>
            </div>

        </div>

        {{-- Kolom Kanan: Inspeksi Hak Akses & Matriks RBAC --}}
        <div class="super-users-sidebar-col">

            {{-- Widget 1: Inspeksi Hak Akses --}}
            <div class="super-users-card">
                <div class="super-users-card-header">
                    <div class="super-users-card-title">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        <span>Inspeksi Hak Akses</span>
                    </div>
                    <span class="badge-root-level" id="inspect-root-level">LEVEL 0: ROOT</span>
                </div>

                {{-- User Profile Mini Box --}}
                <div class="sidebar-user-box">
                    <div class="sidebar-user-avatar" id="inspect-avatar">PR</div>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user-name" id="inspect-name">Princess</span>
                        <span class="sidebar-user-meta" id="inspect-role">Kepala TI &amp; Super Admin</span>
                        <span class="sidebar-user-meta" id="inspect-id">Kredensial SA-001</span>
                        <span class="sidebar-user-2fa" id="inspect-auth">(Hardware 2FA Verified)</span>
                    </div>
                </div>

                <div class="sidebar-section-title">Kewenangan Modul Sistem:</div>

                {{-- 4 Permissions --}}
                <div class="permission-list">
                    <div class="permission-item">
                        <div class="permission-left">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Kelola Akun &amp; Hak Akses (RBAC)</span>
                        </div>
                        <span class="permission-badge">Full R/W</span>
                    </div>

                    <div class="permission-item">
                        <div class="permission-left">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Backup &amp; Restore Basis Data</span>
                        </div>
                        <span class="permission-badge">Root Cmd</span>
                    </div>

                    <div class="permission-item">
                        <div class="permission-left">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Bypass Kuota &amp; Batas Sirkulasi</span>
                        </div>
                        <span class="permission-badge">Diizinkan</span>
                    </div>

                    <div class="permission-item">
                        <div class="permission-left">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            <span>Penghapusan Eksemplar Permanen</span>
                        </div>
                        <span class="permission-badge">Diizinkan</span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <button type="button" class="btn-sidebar-primary" onclick="openModal('modal-rbac-matrix')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    <span>Ubah Konfigurasi Hak Akses</span>
                </button>

                <div class="sidebar-btn-row">
                    <button type="button" class="btn-sidebar-secondary" onclick="toast('Sesi aktif pengguna berhasil dicabut dari seluruh perangkat.')">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/></svg>
                        <span>Cabut Sesi</span>
                    </button>
                    <button type="button" class="btn-sidebar-secondary" onclick="toast('Membuka rekaman audit trail otentikasi akun...')">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        <span>Log Audit Akun</span>
                    </button>
                </div>
            </div>

            {{-- Widget 2: Matriks RBAC v2.4 --}}
            <div class="super-users-card">
                <div class="super-users-card-header">
                    <div class="super-users-card-title">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                        <span>Matriks RBAC v2.4</span>
                    </div>
                    <a href="javascript:void(0)" class="rbac-link-btn" onclick="openModal('modal-rbac-matrix')">Kelola Matriks</a>
                </div>

                <p class="rbac-desc">
                    Pemetaan hak istimewa operasional antarmuka menurut peran pengguna.
                </p>

                {{-- Mini Matrix Table --}}
                <div class="rbac-mini-table-box">
                    <table class="rbac-mini-table">
                        <thead>
                            <tr>
                                <th>PERAN</th>
                                <th>AKUN</th>
                                <th>SIRKULASI</th>
                                <th>E-LIBRARY</th>
                                <th>DB ROOT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Super Admin</td>
                                <td>Full</td>
                                <td>Full</td>
                                <td>Full</td>
                                <td>Full</td>
                            </tr>
                            <tr>
                                <td>Admin Pegawai</td>
                                <td>View</td>
                                <td>R/W</td>
                                <td>R/W</td>
                                <td><span class="rbac-hyphen-red">-</span></td>
                            </tr>
                            <tr>
                                <td>Staf Inventaris</td>
                                <td>No</td>
                                <td>View</td>
                                <td>R/W</td>
                                <td><span class="rbac-hyphen-red">-</span></td>
                            </tr>
                            <tr>
                                <td>Pemustaka</td>
                                <td>Self</td>
                                <td>Pinjam</td>
                                <td>Baca</td>
                                <td><span class="rbac-hyphen-red">-</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn-sidebar-outline-full" onclick="openModal('modal-custom-role')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                    <span>Definisikan Peran Kustom Baru</span>
                </button>
            </div>

        </div>

    </div>

</div>

{{-- MODAL 1: Tambah Akun Baru --}}
<div class="super-modal-overlay" id="modal-create-account" onclick="if(event.target === this) closeModal('modal-create-account')">
    <div class="super-modal-content">
        <div class="super-modal-header">
            <div>
                <h3 class="super-modal-title">Buat Akun Kredensial Baru</h3>
                <p class="super-modal-sub">Daftarkan staf baru atau pemustaka ke dalam basis otentikasi SSO Inovexa.</p>
            </div>
            <button type="button" class="super-modal-close" onclick="closeModal('modal-create-account')">&times;</button>
        </div>

        <form onsubmit="event.preventDefault(); toast('Akun kredensial baru berhasil diterbitkan dan notifikasi telah dikirimkan.'); closeModal('modal-create-account');">
            <div class="modal-form-grid">
                <div class="modal-field modal-form-full">
                    <label>Nama Lengkap Akun</label>
                    <input type="text" class="modal-input" placeholder="Misal: Princess Anggita, M.Kom" required>
                </div>
                <div class="modal-field">
                    <label>Alamat Email SSO</label>
                    <input type="email" class="modal-input" placeholder="princess@inovexa.id" required>
                </div>
                <div class="modal-field">
                    <label>Nomor Induk / NIP / ID</label>
                    <input type="text" class="modal-input" placeholder="INX-ADM-2026-99" required>
                </div>
                <div class="modal-field">
                    <label>Peran &amp; Otoritas</label>
                    <select class="modal-select">
                        <option value="super">Super Admin (Root)</option>
                        <option value="admin">Admin Pegawai &amp; Sirkulasi</option>
                        <option value="elib">Admin E-Library &amp; Repositori</option>
                        <option value="inv">Staf Inventaris &amp; Katalog</option>
                        <option value="member">Anggota Pemustaka</option>
                    </select>
                </div>
                <div class="modal-field">
                    <label>Kebijakan Otentikasi 2FA</label>
                    <select class="modal-select">
                        <option>Wajib Hardware Key / FIDO2</option>
                        <option>Wajib Authenticator App (TOTP)</option>
                        <option>Standar Password + Email OTP</option>
                    </select>
                </div>
                <div class="modal-field modal-form-full">
                    <label>Kata Sandi Sementara</label>
                    <input type="password" class="modal-input" value="InovexaPass2026!" placeholder="Masukkan kata sandi">
                </div>
            </div>

            <div class="super-modal-footer">
                <button type="button" class="btn-users-outline" onclick="closeModal('modal-create-account')">Batal</button>
                <button type="submit" class="btn-users-primary">Simpan &amp; Terbitkan Akun</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL 2: Matriks Kebijakan RBAC & Hak Akses Modul --}}
<div class="super-modal-overlay" id="modal-rbac-matrix" onclick="if(event.target === this) closeModal('modal-rbac-matrix')">
    <div class="super-modal-content super-modal-lg">
        <div class="super-modal-header">
            <div>
                <h3 class="super-modal-title">Konfigurasi Hak Akses &amp; Matriks Kebijakan RBAC</h3>
                <p class="super-modal-sub">Pemetaan hierarki otorisasi akses modul operasional untuk setiap peran pengguna.</p>
            </div>
            <button type="button" class="super-modal-close" onclick="closeModal('modal-rbac-matrix')">&times;</button>
        </div>

        <div style="overflow-x:auto;margin-bottom:18px">
            <table style="width:100%;border-collapse:collapse;font-size:12px;text-align:left">
                <thead>
                    <tr style="background:#f8fafc;border-bottom:1px solid #e2e8f0">
                        <th style="padding:10px;color:#64748b;font-size:10.5px">MODUL SISTEM</th>
                        <th style="padding:10px;text-align:center;color:#64748b;font-size:10.5px">SUPER ADMIN</th>
                        <th style="padding:10px;text-align:center;color:#64748b;font-size:10.5px">ADMIN PEGAWAI</th>
                        <th style="padding:10px;text-align:center;color:#64748b;font-size:10.5px">STAF INVENTARIS</th>
                        <th style="padding:10px;text-align:center;color:#64748b;font-size:10.5px">PEMUSTAKA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom:1px solid #f1f5f9">
                        <td style="padding:10px;font-weight:600">Kelola Akun &amp; Hak Akses (RBAC)</td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Full R/W</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#f1f5f9;color:#475569;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Lihat Saja</span></td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9">
                        <td style="padding:10px;font-weight:600">Backup &amp; Restore Basis Data</td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Root Cmd</span></td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9">
                        <td style="padding:10px;font-weight:600">Sirkulasi Buku &amp; Denda</td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Full R/W</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Full R/W</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#f1f5f9;color:#475569;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Lihat Saja</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#eff6ff;color:#1d4ed8;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Pinjam Mandiri</span></td>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9">
                        <td style="padding:10px;font-weight:600">Koleksi &amp; Eksemplar Buku</td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Full R/W</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Full R/W</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Full R/W</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#f1f5f9;color:#475569;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Katalog OPAC</span></td>
                    </tr>
                    <tr style="border-bottom:1px solid #f1f5f9">
                        <td style="padding:10px;font-weight:600">Bypass Kuota Sirkulasi</td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Diizinkan</span></td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Diizinkan</span></td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                    </tr>
                    <tr>
                        <td style="padding:10px;font-weight:600">Penghapusan Eksemplar Permanen</td>
                        <td style="padding:10px;text-align:center"><span style="background:#ecfdf5;color:#065f46;padding:2px 6px;border-radius:4px;font-weight:700;font-size:10px">Diizinkan</span></td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                        <td style="padding:10px;text-align:center;color:#ef4444;font-weight:bold">-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="super-modal-footer">
            <button type="button" class="btn-users-outline" onclick="closeModal('modal-rbac-matrix')">Tutup</button>
            <button type="button" class="btn-users-primary" onclick="toast('Kebijakan matriks RBAC berhasil diperbarui.'); closeModal('modal-rbac-matrix');">Terapkan Perubahan</button>
        </div>
    </div>
</div>

{{-- MODAL 3: Definisikan Peran Kustom Baru --}}
<div class="super-modal-overlay" id="modal-custom-role" onclick="if(event.target === this) closeModal('modal-custom-role')">
    <div class="super-modal-content">
        <div class="super-modal-header">
            <div>
                <h3 class="super-modal-title">Definisikan Peran Kustom Baru</h3>
                <p class="super-modal-sub">Tambahkan peran baru dengan cakupan otoritas spesifik di dalam sistem perpustakaan.</p>
            </div>
            <button type="button" class="super-modal-close" onclick="closeModal('modal-custom-role')">&times;</button>
        </div>

        <form onsubmit="event.preventDefault(); toast('Peran kustom baru berhasil dibuat dan didaftarkan ke matriks RBAC.'); closeModal('modal-custom-role');">
            <div class="modal-form-grid">
                <div class="modal-field modal-form-full">
                    <label>Nama Peran Kustom</label>
                    <input type="text" class="modal-input" placeholder="Misal: Kurator Naskah Kuno" required>
                </div>
                <div class="modal-field modal-form-full">
                    <label>Tingkat Tingkatan Hierarki (Level)</label>
                    <select class="modal-select">
                        <option>Level 1 - Pengelola / Admin Operasional</option>
                        <option>Level 2 - Staf / Petugas Teknis Lapangan</option>
                        <option>Level 3 - Pemustaka Terverifikasi Khusus</option>
                    </select>
                </div>
                <div class="modal-field modal-form-full">
                    <label>Deskripsi Lingkup Tugas</label>
                    <textarea class="modal-input" rows="3" placeholder="Jelaskan batas kewenangan peran baru ini..."></textarea>
                </div>
            </div>

            <div class="super-modal-footer">
                <button type="button" class="btn-users-outline" onclick="closeModal('modal-custom-role')">Batal</button>
                <button type="submit" class="btn-users-primary">Simpan Peran Baru</button>
            </div>
        </form>
    </div>
</div>

{{-- Script Interaksi Frontend Khusus Halaman Kelola Akun --}}
<script>
    // Filter Kategori Tab
    function filterUserCategory(cat, btn) {
        document.querySelectorAll('.users-tab-pill').forEach(el => el.classList.remove('active'));
        if (btn) btn.classList.add('active');

        const rows = document.querySelectorAll('#users-table tbody tr');
        rows.forEach(r => {
            if (cat === 'all' || r.dataset.category === cat) {
                r.style.display = '';
            } else {
                r.style.display = 'none';
            }
        });
    }

    // Filter Pencarian & Dropdown
    function filterUserTable() {
        const query = (document.getElementById('user-search-input').value || '').toLowerCase().trim();
        const status = document.getElementById('user-status-filter').value;
        const auth = document.getElementById('user-authority-filter').value;
        const rows = document.querySelectorAll('#users-table tbody tr');

        rows.forEach(r => {
            const name = r.dataset.name || '';
            const email = r.dataset.email || '';
            const id = r.dataset.id || '';
            const rowCat = r.dataset.category || '';
            const rowStatus = r.dataset.status || '';

            const matchQuery = !query || name.includes(query) || email.includes(query) || id.includes(query);
            const matchStatus = status === 'all' || rowStatus === status;
            const matchAuth = auth === 'all' || rowCat === auth;

            if (matchQuery && matchStatus && matchAuth) {
                r.style.display = '';
            } else {
                r.style.display = 'none';
            }
        });
    }

    // Checkbox Pilih Semua
    function toggleSelectAllUsers(master) {
        const boxes = document.querySelectorAll('.row-select-box');
        boxes.forEach(b => {
            b.checked = master.checked;
            const row = b.closest('tr');
            if (master.checked) {
                row.classList.add('selected-row');
            } else {
                row.classList.remove('selected-row');
            }
        });
        updateSelectedCount();
    }

    // Perbarui counter "X Akun Terpilih"
    function updateSelectedCount() {
        const checkedBoxes = document.querySelectorAll('.row-select-box:checked');
        const count = checkedBoxes.length;
        const counterEl = document.getElementById('bulk-selected-count');
        if (counterEl) {
            counterEl.textContent = count + ' Akun Terpilih';
        }

        // Tandai baris terpilih
        document.querySelectorAll('.row-select-box').forEach(b => {
            const row = b.closest('tr');
            if (b.checked) {
                row.classList.add('selected-row');
            } else {
                row.classList.remove('selected-row');
            }
        });
    }

    // Klik Baris untuk Mengupdate Panel Inspeksi Hak Akses di Samping Kanan
    function inspectUser(name, role, idCode, avatar, rootLevel, authType) {
        const nameEl = document.getElementById('inspect-name');
        const roleEl = document.getElementById('inspect-role');
        const idEl = document.getElementById('inspect-id');
        const avatarEl = document.getElementById('inspect-avatar');
        const levelEl = document.getElementById('inspect-root-level');
        const authEl = document.getElementById('inspect-auth');

        if (nameEl) nameEl.textContent = name;
        if (roleEl) roleEl.textContent = role;
        if (idEl) idEl.textContent = 'Kredensial ' + idCode;
        if (avatarEl) avatarEl.textContent = avatar;
        if (levelEl) levelEl.textContent = rootLevel;
        if (authEl) authEl.textContent = '(' + authType + ')';
    }

    // Ekspor CSV Data Akun
    function exportUsersCsv() {
        const rows = [
            ['Nama', 'Email', 'ID/NIP', 'Peran', 'Status', 'Metode Keamanan'],
            ['Ari', 'ariupgris@inovexa.id', 'SA-001', 'Super Admin (Root)', 'Aktif', 'Hardware Key FIDO2'],
            ['Budi Santoso', 'budi.santoso@inovexa.id', 'INX-ADM-2026-04', 'Admin Pegawai', 'Aktif', 'Authenticator App'],
            ['Siti Nurhaliza', 'siti.nurhaliza@inovexa.id', 'INX-ADM-2026-09', 'Admin E-Library', 'Aktif', 'Authenticator App'],
            ['Hendra Kusuma', 'hendra.k@inovexa.id', 'INX-ADM-2026-15', 'Staf Inventaris', 'Aktif', 'Belum 2FA'],
            ['Herdman', 'herdman.library@inovexa.id', 'INX-2026-08912', 'Anggota Pemustaka', 'Aktif', 'Standard Auth'],
            ['Kevin Wijaya', 'kevin.w@campus.ac.id', 'MBR-2026-04321', 'Pemustaka Mahasiswa', 'Aktif', 'Belum 2FA'],
            ['Dimas Arya', 'dimas.arya@techmail.com', 'INX-2026-07734', 'Anggota Umum', 'Aktif', 'Standard Auth']
        ];

        let csvContent = "data:text/csv;charset=utf-8," + rows.map(e => e.join(",")).join("\n");
        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "inovexa_daftar_akun_rbac.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        toast('Mengunduh berkas CSV daftar akun...');
    }
</script>
