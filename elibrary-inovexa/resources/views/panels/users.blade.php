@php
    $usersData = $lib->users;
    $defaultEmails = [
        'Ari' => 'ari.sp@inovexa.id',
        'Budi Santoso' => 'budi.santoso@inovexa.id',
        'Siti Nurhaliza' => 'siti.nurhaliza@inovexa.id',
        'Hendra Kusuma' => 'hendra.k@inovexa.id',
        'Herdman' => 'herdman.library@inovexa.id',
        'Kevin Wijaya' => 'kevin.w@campus.ac.id',
        'Dimas Arya' => 'dimas.arya@techmail.com',
        'Adinda Zahwa Aprilia' => 'adinda.zahwa@campus.ac.id',
        'Muhammad Dzaky Zidane' => 'dzaky.zidane@campus.ac.id',
        'Carendra Aldiansyah' => 'carendra.a@campus.ac.id',
        'Juniari Nur Shofa' => 'juniari.shofa@campus.ac.id',
        'syalna kurnia putri' => 'syalna.kurnia@campus.ac.id',
        'rendi dwiki h' => 'rendi.dwiki@campus.ac.id',
        'Robiatul Adawiyyah' => 'robiatul.a@campus.ac.id',
        'Eka Bayu Prasetio' => 'bayu.prasetio@campus.ac.id',
        'frendy wahyu p' => 'frendy.wahyu@campus.ac.id',
        'Darius Fikram Azzam' => 'darius.azzam@campus.ac.id',
        'nopal' => 'naufal.library@campus.ac.id',
        'Muhammad Okta Ramadhani' => 'okta.ramadhani@campus.ac.id',
    ];

    $securityMeta = [
        'Ari' => [
            'type' => 'fido2',
            'title' => 'Hardware Key FIDO2',
            'sub' => 'Sesi Aktif Sekarang',
            'active_session' => true,
        ],
        'Budi Santoso' => [
            'type' => 'totp',
            'title' => 'Authenticator App',
            'sub' => 'Login: 12 menit lalu',
            'active_session' => false,
        ],
        'Siti Nurhaliza' => [
            'type' => 'totp',
            'title' => 'Authenticator App',
            'sub' => 'Login: 1 jam lalu',
            'active_session' => false,
        ],
        'Hendra Kusuma' => [
            'type' => 'warn',
            'title' => 'Belum 2FA',
            'sub' => 'Wajib Aktivasi',
            'active_session' => false,
        ],
        'Herdman' => [
            'type' => 'standard',
            'title' => 'Standard Auth',
            'sub' => 'Login: Kemarin',
            'active_session' => false,
        ],
        'Kevin Wijaya' => [
            'type' => 'warn',
            'title' => 'Belum 2FA',
            'sub' => 'Sandi Default',
            'active_session' => false,
        ],
        'Dimas Arya' => [
            'type' => 'standard',
            'title' => 'Standard Auth',
            'sub' => 'Login: 3 hari lalu',
            'active_session' => false,
        ],
    ];

    $roleMeta = [
        'Super Admin (Root)' => [
            'pill' => 'access-role-mint',
            'label' => 'Super Admin (Root)',
            'sub' => 'Full Otoritas Arsitektur',
            'category' => 'super',
            'level' => 'LEVEL 0: ROOT',
        ],
        'Super Admin' => [
            'pill' => 'access-role-mint',
            'label' => 'Super Admin (Root)',
            'sub' => 'Full Otoritas Arsitektur',
            'category' => 'super',
            'level' => 'LEVEL 0: ROOT',
        ],
        'Admin Pegawai' => [
            'pill' => 'access-role-dark',
            'label' => 'Admin Pegawai',
            'sub' => 'Sirkulasi & Denda (R/W)',
            'category' => 'admin',
            'level' => 'LEVEL 1: PETUGAS',
        ],
        'Admin E-Library' => [
            'pill' => 'access-role-dark',
            'label' => 'Admin E-Library',
            'sub' => 'E-Book & Repositori (R/W)',
            'category' => 'admin',
            'level' => 'LEVEL 1: PETUGAS',
        ],
        'Staf Inventaris' => [
            'pill' => 'access-role-gray',
            'label' => 'Staf Inventaris',
            'sub' => 'Katalog & Eksemplar',
            'category' => 'admin',
            'level' => 'LEVEL 2: STAF',
        ],
        'Pemustaka Mahasiswa' => [
            'pill' => 'access-role-light',
            'label' => 'Pemustaka Mahasiswa',
            'sub' => 'Akses Sementara',
            'category' => 'member',
            'level' => 'LEVEL 3: ANGGOTA',
        ],
        'Anggota Umum' => [
            'pill' => 'access-role-light',
            'label' => 'Anggota Umum',
            'sub' => 'OPAC & Reservasi',
            'category' => 'member',
            'level' => 'LEVEL 3: ANGGOTA',
        ],
        'Anggota Pemustaka' => [
            'pill' => 'access-role-light',
            'label' => 'Anggota Pemustaka',
            'sub' => 'OPAC & Pinjam Mandiri',
            'category' => 'member',
            'level' => 'LEVEL 3: ANGGOTA',
        ],
        'Anggota' => [
            'pill' => 'access-role-light',
            'label' => 'Anggota Pemustaka',
            'sub' => 'OPAC & Pinjam Mandiri',
            'category' => 'member',
            'level' => 'LEVEL 3: ANGGOTA',
        ],
    ];
@endphp

<div class="access-page-wrapper">
    {{-- Header Halaman Sesuai Figma --}}
    <div class="access-top-header">
        <div class="access-breadcrumb-bar">
            <a href="{{ route('dashboard', 'ov') }}" class="access-breadcrumb-link">Dashboard Super Admin</a>
            <span class="access-breadcrumb-sep">&gt;</span>
            <span class="access-breadcrumb-active">Kelola Akun &amp; Hak Akses</span>
        </div>

        <div class="access-header-main-row">
            <div class="access-header-intro">
                <h1 class="access-page-title">Kelola Akun &amp; Otorisasi Hak Akses Pengguna</h1>
                <p class="access-page-subtext">
                    Pusat kendali hierarki kredensial, manajemen multi-faktor, kebijakan otentikasi SSO, serta konfigurasi matriks peran RBAC (Role-Based Access Control) seluruh ekosistem Inovexa.
                </p>
            </div>
            <div class="access-top-btn-group">
                <button type="button" class="access-btn-dark-cta" onclick="openModal('create-account-modal')">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Buat Akun Baru</span>
                </button>
                <a href="{{ route('dashboard', 'roles') }}" class="access-btn-white-cta">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>Matriks Kebijakan RBAC</span>
                </a>
                <button type="button" class="access-btn-ghost-cta" onclick="toast('Mengekspor seluruh data kredensial terenkripsi ke file CSV...')">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    <span>Ekspor .CSV</span>
                </button>
            </div>
        </div>
    </div>

    {{-- 4 Stat Cards --}}
    <div class="access-stat-grid">
        {{-- Card 1: Total Akun --}}
        <div class="access-stat-card">
            <div class="access-stat-head">
                <div class="access-stat-icon-wrap" style="background:#f1f5f9;color:#334155">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <span class="access-pill-badge mint">+12 Minggu Ini</span>
            </div>
            <div class="access-stat-body">
                <span class="access-stat-label">TOTAL AKUN TERDAFTAR</span>
                <div class="access-stat-number-row">
                    <span class="access-stat-number">2.450</span>
                    <span class="access-stat-unit">Kredensial</span>
                </div>
                <div class="access-stat-footer">
                    <span>3 Super Admin</span> &bull; <span>42 Staf</span> &bull; <span>2.405</span>
                </div>
            </div>
        </div>

        {{-- Card 2: Status Akses Aktif --}}
        <div class="access-stat-card">
            <div class="access-stat-head">
                <div class="access-stat-icon-wrap" style="background:#ecfdf5;color:#059669">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/></svg>
                </div>
                <span class="access-pill-badge mint">99.1% Sehat</span>
            </div>
            <div class="access-stat-body">
                <span class="access-stat-label">STATUS AKSES AKTIF</span>
                <div class="access-stat-number-row">
                    <span class="access-stat-number">2.428</span>
                    <span class="access-stat-unit">Terverifikasi</span>
                </div>
                <div class="access-stat-footer">
                    <span>14 Verifikasi KTM</span> &bull; <span style="color:#dc2626;font-weight:700">8 Suspend</span>
                </div>
            </div>
        </div>

        {{-- Card 3: Sesi Login Aktif --}}
        <div class="access-stat-card">
            <div class="access-stat-head">
                <div class="access-stat-icon-wrap" style="background:#f8fafc;color:#475569">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <span class="access-pill-badge amber">&bull; Live Token</span>
            </div>
            <div class="access-stat-body">
                <span class="access-stat-label">SESI LOGIN AKTIF</span>
                <div class="access-stat-number-row">
                    <span class="access-stat-number">184</span>
                    <span class="access-stat-unit">Perangkat</span>
                </div>
                <div class="access-stat-footer">
                    Multi-device active &bull; 0 Anomali IP
                </div>
            </div>
        </div>

        {{-- Card 4: Integritas RBAC --}}
        <div class="access-stat-card">
            <div class="access-stat-head">
                <div class="access-stat-icon-wrap" style="background:#f1f5f9;color:#0f172a">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                </div>
                <span class="access-pill-badge dark">v2.4 Active</span>
            </div>
            <div class="access-stat-body">
                <span class="access-stat-label">INTEGRITAS RBAC</span>
                <div class="access-stat-number-row">
                    <span class="access-stat-number">Optimal</span>
                    <span class="access-stat-unit">2FA On</span>
                </div>
                <div class="access-stat-footer">
                    Kebijakan 2FA Staf Wajib &bull; Enkripsi SHA-256
                </div>
            </div>
        </div>
    </div>

    {{-- Main 2 Column Section --}}
    <div class="access-content-layout">
        {{-- Left Column: User Table & Controls --}}
        <div class="access-table-column">
            {{-- Filter Tabs --}}
            <div class="access-filter-tabs">
                <button type="button" class="access-tab-btn active" data-tab="all" onclick="filterByRole('all', this)">
                    Semua Pengguna (2.450)
                </button>
                <button type="button" class="access-tab-btn" data-tab="super" onclick="filterByRole('super', this)">
                    Super Admin (3)
                </button>
                <button type="button" class="access-tab-btn" data-tab="admin" onclick="filterByRole('admin', this)">
                    Admin Pegawai &amp; Staf (42)
                </button>
                <button type="button" class="access-tab-btn" data-tab="member" onclick="filterByRole('member', this)">
                    Anggota Pemustaka (2.405)
                </button>
            </div>

            {{-- Toolbar: Search & Dropdowns --}}
            <div class="access-toolbar-row">
                <div class="access-search-field">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <input type="text" id="access-search-input" placeholder="Cari berdasarkan nama, email SSO, NIP, atau ID Anggota..." oninput="handleTableSearch(this.value)">
                </div>

                <div class="access-select-group">
                    <select id="access-status-filter" onchange="handleStatusFilter(this.value)" class="access-custom-select">
                        <option value="all">Status Akun: Semua</option>
                        <option value="active">Aktif (Verified)</option>
                        <option value="suspended">Tangguhkan (Suspend)</option>
                    </select>

                    <select id="access-authority-filter" onchange="handleAuthorityFilter(this.value)" class="access-custom-select">
                        <option value="all">Tingkat Otoritas: Semua</option>
                        <option value="super">Super Admin (Root)</option>
                        <option value="admin">Admin Pegawai</option>
                        <option value="elib">Admin E-Library</option>
                        <option value="staff">Staf Inventaris</option>
                        <option value="member">Anggota Pemustaka</option>
                    </select>
                </div>
            </div>

            {{-- Bulk Actions Bar (Active Bar in Figma) --}}
            <div class="access-bulk-bar" id="access-bulk-bar">
                <div class="access-bulk-left">
                    <label class="access-bulk-label">
                        <input type="checkbox" id="access-check-all" onchange="toggleSelectAll(this)" checked>
                        <span id="access-selected-count">2 Akun Terpilih</span>
                    </label>
                </div>
                <div class="access-bulk-actions">
                    <button type="button" class="access-bulk-btn" onclick="toast('Kredensial login SSO berhasil dikirim ulang ke alamat email terdaftar')">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <span>Kirim Kredensial</span>
                    </button>
                    <button type="button" class="access-bulk-btn" onclick="toast('Tautan reset kata sandi telah dikirimkan ke email akun terpilih')">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                        <span>Reset Sandi</span>
                    </button>
                    <button type="button" class="access-bulk-btn-danger" onclick="bulkSuspendAction()">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                        <span>Tangguhkan</span>
                    </button>
                </div>
            </div>

            {{-- Users Table --}}
            <div class="access-table-card">
                <table class="access-users-table" id="access-users-table">
                    <thead>
                        <tr>
                            <th style="width:36px;text-align:center">
                                <input type="checkbox" id="table-th-checkbox" onchange="toggleSelectAll(this)" checked>
                            </th>
                            <th style="width:34%">PENGGUNA &amp; IDENTITAS</th>
                            <th style="width:28%">PERAN &amp; LEVEL HAK AKSES</th>
                            <th style="width:24%">KEAMANAN &amp; 2FA</th>
                            <th style="width:14%;text-align:right">STATUS &amp; AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="access-table-body">
                        @foreach($usersData as $i => $x)
                        @php
                            $userName = $x['n'];
                            $userId = $x['i'];
                            $rawRole = $x['r'];
                            $isActive = (bool) $x['on'];
                            $isYou = ($userName === 'Ari' || (session('user')['n'] ?? '') === $userName);
                            
                            $email = $defaultEmails[$userName] ?? (strtolower(preg_replace('/[^a-zA-Z0-9]/', '.', $userName)) . '@inovexa.id');
                            
                            $roleConf = $roleMeta[$rawRole] ?? $roleMeta['Anggota Pemustaka'];
                            $secConf = $securityMeta[$userName] ?? [
                                'type' => 'standard',
                                'title' => 'Standard Auth',
                                'sub' => 'Login: Terverifikasi',
                                'active_session' => false,
                            ];

                            // Inisial Avatar
                            $nameParts = explode(' ', trim($userName));
                            $initials = '';
                            if (count($nameParts) >= 2) {
                                $initials = mb_strtoupper(mb_substr($nameParts[0], 0, 1) . mb_substr($nameParts[1], 0, 1));
                            } else {
                                $initials = mb_strtoupper(mb_substr($userName, 0, 2));
                            }

                            // Checked by default for Ari & Budi Santoso (sesuai screenshot Figma)
                            $isChecked = ($i < 2);
                            $isSelected = ($i === 0);
                        @endphp
                        <tr class="access-user-row {{ $isSelected ? 'is-inspected' : '' }}" 
                            data-index="{{ $i }}"
                            data-name="{{ $userName }}"
                            data-id="{{ $userId }}"
                            data-email="{{ $email }}"
                            data-role="{{ $roleConf['label'] }}"
                            data-category="{{ $roleConf['category'] }}"
                            data-level="{{ $roleConf['level'] }}"
                            data-status="{{ $isActive ? 'active' : 'suspended' }}"
                            data-2fa="{{ $secConf['title'] }}"
                            data-initials="{{ $initials }}"
                            onclick="inspectUserRow(this, event)">
                            
                            {{-- Checkbox --}}
                            <td style="text-align:center" onclick="event.stopPropagation()">
                                <input type="checkbox" class="user-row-checkbox" onchange="updateSelectedCount()" {{ $isChecked ? 'checked' : '' }}>
                            </td>

                            {{-- Pengguna & Identitas --}}
                            <td>
                                <div class="access-user-cell">
                                    <div class="access-user-avatar {{ $isYou ? 'avatar-dark' : ($userName === 'Kevin Wijaya' ? 'avatar-warm' : '') }}">
                                        {{ $initials }}
                                    </div>
                                    <div class="access-user-meta">
                                        <div class="access-user-name-row">
                                            <span class="access-user-fullname">{{ $userName }}</span>
                                            @if($isYou)
                                                <span class="access-pill-you">YOU</span>
                                            @endif
                                        </div>
                                        <div class="access-user-id-line">
                                            <span>{{ $email }}</span>
                                            <span class="access-dot-sep">&bull;</span>
                                            <span class="access-badge-id">{{ $userId }}</span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Peran & Level Hak Akses --}}
                            <td>
                                <div class="access-role-cell">
                                    <div class="access-role-pill {{ $roleConf['pill'] }}">
                                        @if($roleConf['category'] === 'super')
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        @elseif($roleConf['category'] === 'admin')
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                        @endif
                                        <span>{{ $roleConf['label'] }}</span>
                                    </div>
                                    <span class="access-role-subtext">{{ $roleConf['sub'] }}</span>
                                </div>
                            </td>

                            {{-- Keamanan & 2FA --}}
                            <td>
                                <div class="access-sec-cell">
                                    <div class="access-sec-title">
                                        @if($secConf['type'] === 'fido2')
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/></svg>
                                            <span style="font-weight:700;color:#0f172a">{{ $secConf['title'] }}</span>
                                        @elseif($secConf['type'] === 'totp')
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#334155" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                            <span style="font-weight:600;color:#1e293b">{{ $secConf['title'] }}</span>
                                        @elseif($secConf['type'] === 'warn')
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#d97706" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                                            <span style="font-weight:700;color:#d97706">{{ $secConf['title'] }}</span>
                                        @else
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                            <span style="font-weight:500;color:#475569">{{ $secConf['title'] }}</span>
                                        @endif
                                    </div>
                                    <div class="access-sec-sub">
                                        @if(!empty($secConf['active_session']))
                                            <span class="access-sec-live-dot"></span>
                                        @endif
                                        <span>{{ $secConf['sub'] }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Status & Aksi --}}
                            <td style="text-align:right" onclick="event.stopPropagation()">
                                <div class="access-status-action-cell">
                                    @if($isActive)
                                        <span class="access-status-badge active">
                                            <span class="access-status-dot"></span> Aktif
                                        </span>
                                        <form method="POST" action="{{ route('user.toggle', $i) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="access-toggle-btn ghost-danger" title="Tangguhkan akses akun ini">
                                                Nonaktifkan
                                            </button>
                                        </form>
                                    @else
                                        <span class="access-status-badge suspended">
                                            <span class="access-status-dot red"></span> Suspend
                                        </span>
                                        <form method="POST" action="{{ route('user.toggle', $i) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="access-toggle-btn primary-mint" title="Aktifkan kembali akses akun ini">
                                                Aktifkan
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Table Pagination Sesuai Figma --}}
                <div class="access-pagination-bar">
                    <div class="access-pagination-info">
                        Menampilkan <span id="access-page-count">1-{{ count($usersData) }}</span> dari <b>2.450</b> akun terdaftar
                    </div>
                    <div class="access-pagination-pills">
                        <button type="button" class="access-page-pill" title="Sebelumnya">&lsaquo;</button>
                        <button type="button" class="access-page-pill active">1</button>
                        <button type="button" class="access-page-pill" onclick="toast('Halaman 2 sedang disinkronkan...')">2</button>
                        <button type="button" class="access-page-pill" onclick="toast('Halaman 3 sedang disinkronkan...')">3</button>
                        <span class="access-page-dots">...</span>
                        <button type="button" class="access-page-pill" onclick="toast('Halaman 350...')">350</button>
                        <button type="button" class="access-page-pill" title="Berikutnya">&rsaquo;</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column: Inspeksi Hak Akses & Matriks RBAC --}}
        <div class="access-side-column">
            {{-- Card 1: Inspeksi Hak Akses --}}
            <div class="access-side-card">
                <div class="access-side-head">
                    <div class="access-side-title-group">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        <h3 class="access-side-title">Inspeksi Hak Akses</h3>
                    </div>
                    <span class="access-level-chip" id="inspect-level-badge">LEVEL 0: ROOT</span>
                </div>

                {{-- User Mini Profile --}}
                <div class="access-inspect-box">
                    <div class="access-inspect-avatar" id="inspect-avatar">PR</div>
                    <div class="access-inspect-meta">
                        <div class="access-inspect-name" id="inspect-name">Prasetyo</div>
                        <div class="access-inspect-role" id="inspect-role">Kepala TI &amp; Super Admin</div>
                        <div class="access-inspect-id-row">
                            <span id="inspect-id">Kredensial: SA-001</span>
                            <span class="access-inspect-verified" id="inspect-2fa">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                Hardware 2FA Verified
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Kewenangan Modul Sistem --}}
                <div class="access-module-section">
                    <div class="access-module-heading">Kewenangan Modul Sistem:</div>
                    
                    <div class="access-module-list">
                        <div class="access-module-item">
                            <div class="access-module-left">
                                <div class="access-mod-icon-box">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#1e293b" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                                </div>
                                <span class="access-mod-label">Kelola Akun &amp; Hak Akses (RBAC)</span>
                            </div>
                            <span class="access-mod-tag dark" id="mod-rbac">Full R/W</span>
                        </div>

                        <div class="access-module-item">
                            <div class="access-module-left">
                                <div class="access-mod-icon-box">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#1e293b" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                                </div>
                                <span class="access-mod-label">Backup &amp; Restore Basis Data</span>
                            </div>
                            <span class="access-mod-tag dark" id="mod-db">Root Cred</span>
                        </div>

                        <div class="access-module-item">
                            <div class="access-module-left">
                                <div class="access-mod-icon-box">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                </div>
                                <span class="access-mod-label">Bypass Kuota &amp; Batas Sirkulasi</span>
                            </div>
                            <span class="access-mod-tag green" id="mod-bypass">Diizinkan</span>
                        </div>

                        <div class="access-module-item">
                            <div class="access-module-left">
                                <div class="access-mod-icon-box">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                </div>
                                <span class="access-mod-label">Penghapusan Eksemplar Permanen</span>
                            </div>
                            <span class="access-mod-tag green" id="mod-delete">Diizinkan</span>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="access-side-actions">
                    <button type="button" class="access-side-btn-primary" onclick="openModal('edit-permission-modal')">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        <span>Ubah Konfigurasi Hak Akses</span>
                    </button>
                    <div class="access-side-btn-row">
                        <button type="button" class="access-side-btn-sub" onclick="toast('Sesi perangkat aktif pengguna ini berhasil dicabut')">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"/><line x1="12" y1="2" x2="12" y2="12"/></svg>
                            <span>Cabut Sesi</span>
                        </button>
                        <button type="button" class="access-side-btn-sub" onclick="window.location='{{ route('dashboard', 'audit') }}'">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            <span>Log Audit Akun</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Card 2: Matriks RBAC v2.4 --}}
            <div class="access-side-card">
                <div class="access-side-head">
                    <div class="access-side-title-group">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#0f172a" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        <h3 class="access-side-title">Matriks RBAC v2.4</h3>
                    </div>
                    <a href="{{ route('dashboard', 'roles') }}" class="access-side-link">
                        Kelola Matriks
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
                    </a>
                </div>
                <p class="access-side-desc">Pemetaan hak istimewa operasional antarmuka menurut peran pengguna.</p>

                {{-- Compact Matrix Table --}}
                <div class="access-matrix-table-wrap">
                    <table class="access-matrix-table">
                        <thead>
                            <tr>
                                <th style="width:28%">PERAN</th>
                                <th style="width:18%">AKUN</th>
                                <th style="width:18%">SIRKULASI</th>
                                <th style="width:18%">E-LIBRARY</th>
                                <th style="width:18%">DB ROOT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>Super Admin</b></td>
                                <td><span class="matrix-pill full">Full</span></td>
                                <td><span class="matrix-pill full">Full</span></td>
                                <td><span class="matrix-pill full">Full</span></td>
                                <td><span class="matrix-pill full">Full</span></td>
                            </tr>
                            <tr>
                                <td><b>Admin Pegawai</b></td>
                                <td><span class="matrix-pill view">View</span></td>
                                <td><span class="matrix-pill rw">R/W</span></td>
                                <td><span class="matrix-pill rw">R/W</span></td>
                                <td><span class="matrix-pill dash">–</span></td>
                            </tr>
                            <tr>
                                <td><b>Staf Inventaris</b></td>
                                <td><span class="matrix-pill no">No</span></td>
                                <td><span class="matrix-pill view">View</span></td>
                                <td><span class="matrix-pill rw">R/W</span></td>
                                <td><span class="matrix-pill dash">–</span></td>
                            </tr>
                            <tr>
                                <td><b>Pemustaka</b></td>
                                <td><span class="matrix-pill self">Self</span></td>
                                <td><span class="matrix-pill pinjam">Pinjam</span></td>
                                <td><span class="matrix-pill baca">Baca</span></td>
                                <td><span class="matrix-pill dash">–</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="access-matrix-btn-custom" onclick="openModal('custom-role-modal')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>Definisikan Peran Kustom Baru</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Modal 1: Buat Akun Baru --}}
<div class="modal" id="create-account-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('create-account-modal')">
    <div class="modal-box" style="max-width:540px">
        <button class="modal-close" type="button" onclick="closeModal('create-account-modal')">&times;</button>
        <div class="lbl">MANAJEMEN KREDENSIAL PENGGUNA</div>
        <h2 style="margin:4px 0 10px;font-size:20px;font-weight:800;color:#0f172a">Buat Akun &amp; Kredensial Baru</h2>
        <p style="color:var(--m);font-size:13px;line-height:1.5">
            Daftarkan entitas kredensial baru dengan hierarki peran dan kebijakan enkripsi autentikasi Inovexa.
        </p>
        
        <form onsubmit="event.preventDefault(); closeModal('create-account-modal'); toast('Akun kredensial baru berhasil diterbitkan dan email aktivasi telah dikirim!')" style="margin-top:16px;display:flex;flex-direction:column;gap:14px">
            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Nama Lengkap Pengguna</label>
                <input type="text" required placeholder="Contoh: Raditya Pratama, S.Kom" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">ID Pengguna / NIP</label>
                    <input type="text" required placeholder="INX-ADM-2026-15" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Email SSO Institusi</label>
                    <input type="email" required placeholder="raditya.p@inovexa.id" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Tingkat Peran (RBAC)</label>
                    <select style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                        <option value="admin">Admin Pegawai (Sirkulasi)</option>
                        <option value="elib">Admin E-Library</option>
                        <option value="staff">Staf Inventaris</option>
                        <option value="super">Super Admin (Root)</option>
                        <option value="member">Anggota Pemustaka</option>
                    </select>
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Kebijakan 2FA</label>
                    <select style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                        <option value="totp">Wajib Authenticator App</option>
                        <option value="fido2">Wajib Hardware Key (FIDO2)</option>
                        <option value="standard">Standard (Sandi + OTP Email)</option>
                    </select>
                </div>
            </div>

            <div style="display:flex;justify-content:flex-end;gap:10px;margin-top:10px">
                <button type="button" class="btn ghost" onclick="closeModal('create-account-modal')">Batal</button>
                <button type="submit" class="btn" style="background:#153223;color:#fff;border-radius:8px;font-weight:700;padding:10px 20px">Terbitkan Akun</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal 2: Ubah Konfigurasi Hak Akses --}}
<div class="modal" id="edit-permission-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('edit-permission-modal')">
    <div class="modal-box" style="max-width:520px">
        <button class="modal-close" type="button" onclick="closeModal('edit-permission-modal')">&times;</button>
        <div class="lbl">OTORISASI MATRIKS HAK AKSES</div>
        <h2 style="margin:4px 0 10px;font-size:20px;font-weight:800;color:#0f172a" id="modal-perm-title">Konfigurasi Hak Akses — Prasetyo</h2>
        <p style="color:var(--m);font-size:13px;line-height:1.5">
            Atur izin spesifik granular untuk modul sistem perpustakaan dan repositori terpusat.
        </p>

        <form onsubmit="event.preventDefault(); closeModal('edit-permission-modal'); toast('Konfigurasi hak akses modul berhasil diperbarui!')" style="margin-top:16px;display:flex;flex-direction:column;gap:12px">
            <label style="display:flex;align-items:center;gap:10px;background:#f8fafc;padding:10px 14px;border-radius:8px;border:1px solid #e2e8f0;cursor:pointer">
                <input type="checkbox" checked style="width:16px;height:16px">
                <div>
                    <b style="font-size:13px;color:#0f172a;display:block">Kelola Akun &amp; Hak Akses (RBAC)</b>
                    <span style="font-size:11px;color:#64748b">Izin pembuatan akun, modifikasi matriks peran, dan reset sandi.</span>
                </div>
            </label>

            <label style="display:flex;align-items:center;gap:10px;background:#f8fafc;padding:10px 14px;border-radius:8px;border:1px solid #e2e8f0;cursor:pointer">
                <input type="checkbox" checked style="width:16px;height:16px">
                <div>
                    <b style="font-size:13px;color:#0f172a;display:block">Backup &amp; Restore Basis Data Forensik</b>
                    <span style="font-size:11px;color:#64748b">Akses root snapshot SQLite, dump skema, dan rollback arsip.</span>
                </div>
            </label>

            <label style="display:flex;align-items:center;gap:10px;background:#f8fafc;padding:10px 14px;border-radius:8px;border:1px solid #e2e8f0;cursor:pointer">
                <input type="checkbox" checked style="width:16px;height:16px">
                <div>
                    <b style="font-size:13px;color:#0f172a;display:block">Bypass Kuota &amp; Batas Sirkulasi</b>
                    <span style="font-size:11px;color:#64748b">Mengabaikan limit pinjaman 3 buku dan penghapusan denda otomatis.</span>
                </div>
            </label>

            <label style="display:flex;align-items:center;gap:10px;background:#f8fafc;padding:10px 14px;border-radius:8px;border:1px solid #e2e8f0;cursor:pointer">
                <input type="checkbox" checked style="width:16px;height:16px">
                <div>
                    <b style="font-size:13px;color:#0f172a;display:block">Penghapusan Eksemplar Permanen</b>
                    <span style="font-size:11px;color:#64748b">Izin soft-delete dan hard-purge katalog inventaris fisik.</span>
                </div>
            </label>

            <div style="display:flex;justify-content:flex-end;gap:10px;margin-top:10px">
                <button type="button" class="btn ghost" onclick="closeModal('edit-permission-modal')">Batal</button>
                <button type="submit" class="btn" style="background:#153223;color:#fff;border-radius:8px;font-weight:700;padding:10px 20px">Simpan Konfigurasi</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal 3: Definisikan Peran Kustom Baru --}}
<div class="modal" id="custom-role-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('custom-role-modal')">
    <div class="modal-box" style="max-width:500px">
        <button class="modal-close" type="button" onclick="closeModal('custom-role-modal')">&times;</button>
        <div class="lbl">DEFINISI RBAC TINGKAT TINGGI</div>
        <h2 style="margin:4px 0 10px;font-size:20px;font-weight:800;color:#0f172a">Definisikan Peran Kustom Baru</h2>
        <p style="color:var(--m);font-size:13px;line-height:1.5">
            Tambahkan tingkat peran baru pada matriks v2.4 dengan hak akses spesifik.
        </p>

        <form onsubmit="event.preventDefault(); closeModal('custom-role-modal'); toast('Peran kustom baru berhasil ditambahkan ke matriks RBAC!')" style="margin-top:16px;display:flex;flex-direction:column;gap:14px">
            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Nama Peran Baru</label>
                <input type="text" required placeholder="Contoh: Auditor Eksternal BPK" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
            </div>

            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Tingkat Level Hierarki</label>
                <select style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                    <option value="level2">LEVEL 2: AUDITOR (Read-Only Log &amp; Laporan)</option>
                    <option value="level1">LEVEL 1: OPERATOR TEKNIS (Sirkulasi &amp; Buku)</option>
                    <option value="level3">LEVEL 3: TAMU / MITRA RISET</option>
                </select>
            </div>

            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Akses Sirkulasi</label>
                <select style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                    <option value="view">Hanya Melihat (View-Only)</option>
                    <option value="rw">Baca &amp; Tulis (R/W)</option>
                    <option value="no">Tanpa Akses (No)</option>
                </select>
            </div>

            <div style="display:flex;justify-content:flex-end;gap:10px;margin-top:10px">
                <button type="button" class="btn ghost" onclick="closeModal('custom-role-modal')">Batal</button>
                <button type="submit" class="btn" style="background:#153223;color:#fff;border-radius:8px;font-weight:700;padding:10px 20px">Simpan Peran</button>
            </div>
        </form>
    </div>
</div>

{{-- Interactive Client Scripts --}}
<script>
    let activeRoleTab = 'all';
    let searchQuery = '';
    let statusFilter = 'all';
    let authorityFilter = 'all';

    function filterByRole(role, btn) {
        activeRoleTab = role;
        document.querySelectorAll('.access-tab-btn').forEach(b => b.classList.remove('active'));
        if (btn) btn.classList.add('active');
        applyFilters();
    }

    function handleTableSearch(val) {
        searchQuery = (val || '').toLowerCase().trim();
        applyFilters();
    }

    function handleStatusFilter(val) {
        statusFilter = val;
        applyFilters();
    }

    function handleAuthorityFilter(val) {
        authorityFilter = val;
        applyFilters();
    }

    function applyFilters() {
        const rows = document.querySelectorAll('.access-user-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const name = (row.dataset.name || '').toLowerCase();
            const id = (row.dataset.id || '').toLowerCase();
            const email = (row.dataset.email || '').toLowerCase();
            const role = (row.dataset.role || '').toLowerCase();
            const category = row.dataset.category || '';
            const status = row.dataset.status || '';

            // Check Tab Category
            let matchesTab = (activeRoleTab === 'all') || (category === activeRoleTab);

            // Check Search
            let matchesSearch = !searchQuery || 
                name.includes(searchQuery) || 
                id.includes(searchQuery) || 
                email.includes(searchQuery) || 
                role.includes(searchQuery);

            // Check Status
            let matchesStatus = (statusFilter === 'all') || (status === statusFilter);

            // Check Authority
            let matchesAuthority = (authorityFilter === 'all') || 
                (authorityFilter === 'super' && category === 'super') ||
                (authorityFilter === 'admin' && role.includes('admin pegawai')) ||
                (authorityFilter === 'elib' && role.includes('e-library')) ||
                (authorityFilter === 'staff' && role.includes('inventaris')) ||
                (authorityFilter === 'member' && category === 'member');

            if (matchesTab && matchesSearch && matchesStatus && matchesAuthority) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const countEl = document.getElementById('access-page-count');
        if (countEl) countEl.innerText = `1-${visibleCount}`;
        updateSelectedCount();
    }

    function toggleSelectAll(masterCheckbox) {
        const checked = masterCheckbox.checked;
        const visibleRows = document.querySelectorAll('.access-user-row:not([style*="display: none"]) .user-row-checkbox');
        visibleRows.forEach(cb => cb.checked = checked);
        
        const thCb = document.getElementById('table-th-checkbox');
        const bulkCb = document.getElementById('access-check-all');
        if (thCb) thCb.checked = checked;
        if (bulkCb) bulkCb.checked = checked;

        updateSelectedCount();
    }

    function updateSelectedCount() {
        const checked = document.querySelectorAll('.user-row-checkbox:checked').length;
        const countSpan = document.getElementById('access-selected-count');
        const bulkBar = document.getElementById('access-bulk-bar');
        
        if (countSpan) {
            countSpan.innerText = `${checked} Akun Terpilih`;
        }
        if (bulkBar) {
            bulkBar.style.display = checked > 0 ? 'flex' : 'none';
        }
    }

    function bulkSuspendAction() {
        const checked = document.querySelectorAll('.user-row-checkbox:checked').length;
        if (checked === 0) {
            toast('Pilih minimal 1 akun untuk ditangguhkan');
            return;
        }
        if (confirm(`Apakah Anda yakin ingin menangguhkan akses ${checked} akun terpilih?`)) {
            toast(`${checked} akun terpilih telah berhasil ditangguhkan`);
        }
    }

    function inspectUserRow(row, evt) {
        document.querySelectorAll('.access-user-row').forEach(r => r.classList.remove('is-inspected'));
        row.classList.add('is-inspected');

        const name = row.dataset.name || 'Prasetyo';
        const role = row.dataset.role || 'Kepala TI & Super Admin';
        const id = row.dataset.id || 'SA-001';
        const level = row.dataset.level || 'LEVEL 0: ROOT';
        const initials = row.dataset.initials || 'PR';
        const sec = row.dataset['2fa'] || 'Hardware 2FA Verified';
        const cat = row.dataset.category || 'super';

        const inspectAvatar = document.getElementById('inspect-avatar');
        const inspectName = document.getElementById('inspect-name');
        const inspectRole = document.getElementById('inspect-role');
        const inspectId = document.getElementById('inspect-id');
        const inspectLevel = document.getElementById('inspect-level-badge');
        const inspect2fa = document.getElementById('inspect-2fa');
        const modalTitle = document.getElementById('modal-perm-title');

        if (inspectAvatar) inspectAvatar.innerText = initials;
        if (inspectName) inspectName.innerText = name;
        if (inspectRole) inspectRole.innerText = role;
        if (inspectId) inspectId.innerText = `Kredensial: ${id}`;
        if (inspectLevel) inspectLevel.innerText = level;
        if (inspect2fa) inspect2fa.innerHTML = `<svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg> ${sec}`;
        if (modalTitle) modalTitle.innerText = `Konfigurasi Hak Akses — ${name}`;

        // Dynamic modules preview based on category
        const rbacMod = document.getElementById('mod-rbac');
        const dbMod = document.getElementById('mod-db');
        const bypassMod = document.getElementById('mod-bypass');
        const delMod = document.getElementById('mod-delete');

        if (cat === 'super') {
            if (rbacMod) { rbacMod.innerText = 'Full R/W'; rbacMod.className = 'access-mod-tag dark'; }
            if (dbMod) { dbMod.innerText = 'Root Cred'; dbMod.className = 'access-mod-tag dark'; }
            if (bypassMod) { bypassMod.innerText = 'Diizinkan'; bypassMod.className = 'access-mod-tag green'; }
            if (delMod) { delMod.innerText = 'Diizinkan'; delMod.className = 'access-mod-tag green'; }
        } else if (cat === 'admin') {
            if (rbacMod) { rbacMod.innerText = 'View Only'; rbacMod.className = 'access-mod-tag gray'; }
            if (dbMod) { dbMod.innerText = 'Ditolak'; dbMod.className = 'access-mod-tag red'; }
            if (bypassMod) { bypassMod.innerText = 'Batas Normal'; bypassMod.className = 'access-mod-tag gray'; }
            if (delMod) { delMod.innerText = 'Ditolak'; delMod.className = 'access-mod-tag red'; }
        } else {
            if (rbacMod) { rbacMod.innerText = 'Tanpa Akses'; rbacMod.className = 'access-mod-tag red'; }
            if (dbMod) { dbMod.innerText = 'Tanpa Akses'; dbMod.className = 'access-mod-tag red'; }
            if (bypassMod) { bypassMod.innerText = 'Ditolak'; bypassMod.className = 'access-mod-tag red'; }
            if (delMod) { delMod.innerText = 'Ditolak'; delMod.className = 'access-mod-tag red'; }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateSelectedCount();
    });
</script>
