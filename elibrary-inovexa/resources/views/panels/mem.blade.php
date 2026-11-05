@php
    $r = session('user')['role'] ?? 'super';
    $isSuper = ($r === 'super');

    $demoMembers = [
        [
            'name' => 'Dr. Siti Rahmawati, M.Sc.',
            'nia' => 'INX-2026-02911',
            'nik' => '32740924******0003',
            'cat' => 'Dosen / Peneliti Utama',
            'cat_code' => 'dosen',
            'quota' => '10 Buku',
            'quota_sub' => 'Dapat Override • Akses Repositori Riset Khusus',
            'status' => 'active',
            'status_label' => '● Aktif (Terverifikasi)',
            'status_sub' => '✓ Kripto Simetris Sinkron',
            'activity' => 'Rating: 4.9/5',
            'activity_sub' => '12 menit lalu',
            'email' => 'siti.rahma@univ.ac.id',
            'phone' => '+62 811-2388-901',
            'soc_cat' => 'Dosen / Peneliti',
            'valid_until' => '31 Des 2027',
            'initials' => 'SR',
            'avatar_bg' => '#0f766e',
            'checked' => true,
            'inspected' => true,
            'has_check_badge' => true,
            'override_limit' => '10 Buku',
            'override_resv' => 'Diizinkan (Full)',
            'override_disp' => 'Inisiatif (Toleran)',
            'override_resv_color' => 'green',
            'override_disp_color' => 'gray',
        ],
        [
            'name' => 'Herdman Pratama',
            'nia' => 'INX-2026-08912',
            'nik' => '31740924******0003',
            'cat' => 'Umum / Reguler',
            'cat_code' => 'umum',
            'quota' => 'Kuota Standar: 3 Buku',
            'quota_sub' => 'Katalog Sirkulasi Biasa',
            'status' => 'active',
            'status_label' => '● Aktif',
            'status_sub' => 'KTM Terverifikasi',
            'activity' => 'Kemarin, 14:10',
            'activity_sub' => 'Pos Sirkulasi A',
            'email' => 'herdman.library@inovexa.id',
            'phone' => '+62 812-9842-1188',
            'soc_cat' => 'Masyarakat Umum',
            'valid_until' => '12 Des 2027',
            'initials' => 'HP',
            'avatar_bg' => '#f1f5f9',
            'checked' => false,
            'inspected' => false,
            'has_check_badge' => false,
            'override_limit' => '3 Buku',
            'override_resv' => 'Standar (1 Buku)',
            'override_disp' => 'Normal (Sesuai Aturan)',
            'override_resv_color' => 'gray',
            'override_disp_color' => 'gray',
        ],
        [
            'name' => 'Kevin Wijaya',
            'nia' => 'MBR-2026-04321',
            'nik' => 'NIM: 22/12345/TK/9887',
            'cat' => 'Mahasiswa S-1',
            'cat_code' => 'mahasiswa',
            'quota' => 'Kuota: 3 Buku',
            'quota_sub' => 'Menunggu Validasi Kampus',
            'status' => 'pending',
            'status_label' => 'Perlu Validasi KTM',
            'status_sub' => 'Layanan Mandiri Terbatas',
            'activity' => '3 hari lalu, 11:20',
            'activity_sub' => 'Pintu Masuk Barat',
            'email' => 'kevin.wj@campus.ac.id',
            'phone' => '+62 857-3319-2041',
            'soc_cat' => 'Mahasiswa Aktif',
            'valid_until' => '30 Agu 2026',
            'initials' => 'KW',
            'avatar_bg' => '#fed7aa',
            'checked' => false,
            'inspected' => false,
            'has_check_badge' => false,
            'override_limit' => '3 Buku',
            'override_resv' => 'Ditangguhkan',
            'override_disp' => 'Tidak Diizinkan',
            'override_resv_color' => 'gray',
            'override_disp_color' => 'gray',
        ],
        [
            'name' => 'Ahmad Fauzi',
            'nia' => 'INX-2026-04118',
            'nik' => 'NIM: 21/48622/SV/16666',
            'cat' => 'Mahasiswa D-IV',
            'cat_code' => 'mahasiswa',
            'quota' => 'Kuota Terkunci (Ada Denda)',
            'quota_sub' => 'Denda: Rp 45.000 Terutang',
            'status' => 'sanction',
            'status_label' => 'Kena Sanksi',
            'status_sub' => 'Sirkulasi Dibekukan Sementara',
            'activity' => '03 Des 2025',
            'activity_sub' => 'Kios Peminjaman',
            'email' => 'ahmad.fauzi@student.id',
            'phone' => '+62 813-2209-8871',
            'soc_cat' => 'Mahasiswa Tingkat Akhir',
            'valid_until' => '15 Jul 2026',
            'initials' => 'AF',
            'avatar_bg' => '#fee2e2',
            'checked' => true,
            'inspected' => false,
            'has_check_badge' => false,
            'override_limit' => '0 Buku (Dibekukan)',
            'override_resv' => 'Ditolak',
            'override_disp' => 'Sanksi Aktif',
            'override_resv_color' => 'gray',
            'override_disp_color' => 'gray',
        ],
        [
            'name' => 'Dimas Arya',
            'nia' => 'INX-2026-07734',
            'nik' => '32750812******0001',
            'cat' => 'Anggota Umum',
            'cat_code' => 'umum',
            'quota' => 'Kuota Standar: 3 Buku',
            'quota_sub' => 'Masa Aktif: 12 Des 2027',
            'status' => 'active',
            'status_label' => '● Aktif',
            'status_sub' => 'Kepatuhan Terverifikasi',
            'activity' => '19 Des 2025',
            'activity_sub' => 'Gedung C Lt. 2',
            'email' => 'dimas.arya@techmail.com',
            'phone' => '+62 815-9921-3441',
            'soc_cat' => 'Masyarakat Umum',
            'valid_until' => '12 Des 2027',
            'initials' => 'DA',
            'avatar_bg' => '#f1f5f9',
            'checked' => false,
            'inspected' => false,
            'has_check_badge' => false,
            'override_limit' => '3 Buku',
            'override_resv' => 'Standar (1 Buku)',
            'override_disp' => 'Normal (Sesuai Aturan)',
            'override_resv_color' => 'gray',
            'override_disp_color' => 'gray',
        ],
    ];

    // Sisipkan juga anggota terdaftar dari data dinamis $lib bila ada
    foreach ($lib->users as $u) {
        $n = $u['n'];
        if (in_array($n, ['Ari', 'Budi Santoso', 'Siti Nurhaliza', 'Hendra Kusuma', 'Kevin Wijaya', 'Dimas Arya', 'Dr. Siti Rahmawati, M.Sc.', 'Herdman Pratama', 'Ahmad Fauzi'])) {
            continue;
        }
        $parts = explode(' ', trim($n));
        $init = count($parts) >= 2 ? mb_strtoupper(mb_substr($parts[0], 0, 1) . mb_substr($parts[1], 0, 1)) : mb_strtoupper(mb_substr($n, 0, 2));
        $demoMembers[] = [
            'name' => $n,
            'nia' => 'INX-2026-' . substr(md5($n), 0, 5),
            'nik' => '3271' . substr(crc32($n), 0, 8) . '0001',
            'cat' => 'Mahasiswa / Akademisi',
            'cat_code' => 'mahasiswa',
            'quota' => 'Kuota Standar: 3 Buku',
            'quota_sub' => 'Katalog Sirkulasi Biasa',
            'status' => $u['on'] ? 'active' : 'sanction',
            'status_label' => $u['on'] ? '● Aktif' : 'Nonaktif',
            'status_sub' => 'Terdaftar di Sistem',
            'activity' => '2 hari lalu',
            'activity_sub' => 'Lobi Sirkulasi',
            'email' => strtolower(preg_replace('/[^a-zA-Z0-9]/', '.', $n)) . '@campus.ac.id',
            'phone' => '+62 812-' . substr(crc32($n), 0, 4) . '-8890',
            'soc_cat' => 'Civitas Akademika',
            'valid_until' => '31 Des 2027',
            'initials' => $init,
            'avatar_bg' => '#f1f5f9',
            'checked' => false,
            'inspected' => false,
            'has_check_badge' => false,
            'override_limit' => '3 Buku',
            'override_resv' => 'Standar (1 Buku)',
            'override_disp' => 'Normal (Sesuai Aturan)',
            'override_resv_color' => 'gray',
            'override_disp_color' => 'gray',
        ];
    }
@endphp

<div class="member-page-wrapper">
    {{-- Header & Breadcrumb Sesuai Figma --}}
    <div class="member-top-header">
        <div class="member-breadcrumb-bar">
            <a href="{{ route('dashboard', 'ov') }}" class="member-breadcrumb-link">
                {{ $isSuper ? 'Dashboard Super Admin' : 'Dashboard Admin Sirkulasi' }}
            </a>
            <span class="member-breadcrumb-sep">&gt;</span>
            <span class="member-breadcrumb-active">Kelola Data Anggota</span>
        </div>

        <div class="member-header-main-row">
            <div class="member-header-intro">
                <div class="member-title-lockup">
                    <h1 class="member-page-title">Kelola Data Anggota &amp; Otorisasi Kredensial</h1>
                    @if($isSuper)
                        <span class="member-root-chip">SUPER ADMIN LEVEL 0: ROOT</span>
                    @else
                        <span class="member-root-chip" style="background:#e0f2fe;color:#0369a1">MODUL MASTER SIRKULASI</span>
                    @endif
                </div>
                <p class="member-page-subtext">
                    Pusat hierarki direktori anggota terpusat, pengawasan status kelayakan sirkulasi, penegakan batas masa KTM/Kartu Perpustakaan, transmisi enkripsi kartu smartpass, hingga otomasi audit kepatuhan pemustaka.
                </p>
            </div>
            <div class="member-top-btn-group">
                <button type="button" class="member-btn-white-cta" onclick="toast('Mengekspor basis data anggota (.CSV / XLSX) terenkripsi...')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                    <span>Ekspor Basis Data (.CSV/XLSX)</span>
                </button>
                <button type="button" class="member-btn-white-cta" onclick="toast('Membuat dokumen Audit Kepatuhan Pemustaka (PDF Berita Acara)...')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                    <span>Audit Kepatuhan PDF</span>
                </button>
                <button type="button" class="member-btn-dark-cta" onclick="openModal('add-member-modal')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    <span>+ Daftarkan Anggota Baru (Master)</span>
                </button>
            </div>
        </div>
    </div>

    {{-- 4 KPI Stat Cards Sesuai Figma --}}
    <div class="member-kpi-grid">
        {{-- Card 1: Total Anggota Terdaftar --}}
        <div class="member-kpi-card">
            <div class="member-kpi-head">
                <span class="member-kpi-label">Total Anggota Terdaftar</span>
                <div class="member-kpi-icon-wrap" style="background:#f1f5f9;color:#334155">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
            </div>
            <div class="member-kpi-body">
                <div class="member-kpi-num-row">
                    <span class="member-kpi-number">2.450</span>
                    <span class="member-kpi-badge-inline mint">✓ 0.4% Hari Ini</span>
                </div>
                <div class="member-kpi-footer">
                    <span>1.890 Mahasiswa</span> &bull; <span>255 Peneliti</span> &bull; <span>43 Staf</span>
                </div>
            </div>
        </div>

        {{-- Card 2: Status Otorisasi Aktif --}}
        <div class="member-kpi-card">
            <div class="member-kpi-head">
                <span class="member-kpi-label">Status Otorisasi Aktif</span>
                <div class="member-kpi-icon-wrap" style="background:#ecfdf5;color:#059669">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                </div>
            </div>
            <div class="member-kpi-body">
                <div class="member-kpi-num-row">
                    <span class="member-kpi-number">2.408</span>
                    <span class="member-kpi-badge-inline muted">98.3% Kredensial Valid</span>
                </div>
                <div class="member-kpi-footer">
                    <span>26 Menunggu KTM</span> &bull; <span style="color:#dc2626;font-weight:700">11 Sanksi/Suspend</span>
                </div>
            </div>
        </div>

        {{-- Card 3: Enkripsi Kartu Digital NFC --}}
        <div class="member-kpi-card">
            <div class="member-kpi-head">
                <span class="member-kpi-label">Enkripsi Kartu Digital NFC</span>
                <div class="member-kpi-icon-wrap" style="background:#f8fafc;color:#475569">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                </div>
            </div>
            <div class="member-kpi-body">
                <div class="member-kpi-num-row">
                    <span class="member-kpi-number">2.138</span>
                    <span class="member-kpi-badge-inline muted">Smart Card Aktif</span>
                </div>
                <div class="member-kpi-footer">
                    <span>87% Sinkron Mobile Pass</span> &bull; <span style="font-weight:700;color:#0f172a">0 Anomali Kloning</span>
                </div>
            </div>
        </div>

        {{-- Card 4: Kepatuhan UU PDP (Privasi) --}}
        <div class="member-kpi-card">
            <div class="member-kpi-head">
                <span class="member-kpi-label">Kepatuhan UU PDP (Privasi)</span>
                <div class="member-kpi-icon-wrap" style="background:#ecfdf5;color:#059669">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
            </div>
            <div class="member-kpi-body">
                <div class="member-kpi-num-row">
                    <span class="member-kpi-number">AES-256</span>
                    <span class="member-kpi-badge-inline mint">100% Enkripsi</span>
                </div>
                <div class="member-kpi-footer">
                    <span>NIK &amp; Kontak Terenkripsi</span> &bull; <span>Audit Trail Aktif</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Toolbar: Search & Select Filter --}}
    <div class="member-toolbar-row">
        <div class="member-search-box">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" id="member-search-input" placeholder="NIK, ID Anggota (INX...), NIM, atau Nama..." oninput="handleMemberSearch(this.value)">
        </div>

        <div class="member-select-group">
            <select id="member-cat-select" onchange="handleCatFilter(this.value)" class="member-filter-select">
                <option value="all">Kategori: Semua</option>
                <option value="dosen">Dosen / Peneliti</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="umum">Masyarakat Umum</option>
            </select>

            <select id="member-status-select" onchange="handleStatusFilter(this.value)" class="member-filter-select">
                <option value="all">Status: Semua</option>
                <option value="active">Aktif (Valid)</option>
                <option value="pending">Perlu Validasi KTM</option>
                <option value="sanction">Kena Sanksi / Suspend</option>
            </select>
        </div>
    </div>

    {{-- Bulk Action Bar Sesuai Figma --}}
    <div class="member-bulk-bar" id="member-bulk-bar">
        <div class="member-bulk-left">
            <label class="member-bulk-label">
                <input type="checkbox" id="member-check-all" onchange="toggleSelectAllMembers(this)" checked>
                <span>Pilih Semua di Halaman &bull; <b id="member-selected-count">(2 Dipilih)</b></span>
            </label>
        </div>
        <div class="member-bulk-actions">
            <button type="button" class="member-bulk-btn" onclick="toast('Mengirimkan notifikasi WhatsApp / Email peringatan ke anggota terpilih...')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <span>Kirim Peringatan / Notif</span>
            </button>
            <button type="button" class="member-bulk-btn-danger" onclick="bulkFreezeMembers()">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                <span>Bekukan Sementara</span>
            </button>
            <button type="button" class="member-bulk-btn" onclick="toast('Mengekspor berkas cetak Smartcard untuk anggota yang dipilih...')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                <span>Export / Cetak Kartu</span>
            </button>
        </div>
    </div>

    {{-- Main 2 Column Content Layout --}}
    <div class="member-main-layout">
        {{-- Left Column: Table & Bottom Sections --}}
        <div class="member-table-col">
            <div class="member-table-card">
                <table class="member-table" id="member-data-table">
                    <thead>
                        <tr>
                            <th style="width:36px;text-align:center">
                                <input type="checkbox" id="member-th-checkbox" onchange="toggleSelectAllMembers(this)" checked>
                            </th>
                            <th style="width:30%">ANGGOTA &amp; IDENTITAS</th>
                            <th style="width:26%">KATEGORI &amp; KUOTA</th>
                            <th style="width:24%">STATUS KEPATUHAN</th>
                            <th style="width:20%">AKTIVITAS</th>
                        </tr>
                    </thead>
                    <tbody id="member-tbody">
                        @foreach($demoMembers as $idx => $m)
                        <tr class="member-row {{ $m['inspected'] ? 'is-inspected' : '' }}"
                            data-index="{{ $idx }}"
                            data-name="{{ $m['name'] }}"
                            data-nia="{{ $m['nia'] }}"
                            data-nik="{{ $m['nik'] }}"
                            data-cat="{{ $m['cat'] }}"
                            data-catcode="{{ $m['cat_code'] }}"
                            data-quota="{{ $m['quota'] }}"
                            data-status="{{ $m['status'] }}"
                            data-email="{{ $m['email'] }}"
                            data-phone="{{ $m['phone'] }}"
                            data-soccat="{{ $m['soc_cat'] }}"
                            data-valid="{{ $m['valid_until'] }}"
                            data-initials="{{ $m['initials'] }}"
                            data-limit="{{ $m['override_limit'] }}"
                            data-resv="{{ $m['override_resv'] }}"
                            data-disp="{{ $m['override_disp'] }}"
                            onclick="inspectMemberRow(this, event)">
                            
                            {{-- Checkbox --}}
                            <td style="text-align:center" onclick="event.stopPropagation()">
                                <input type="checkbox" class="member-row-check" onchange="updateMemberSelectedCount()" {{ $m['checked'] ? 'checked' : '' }}>
                            </td>

                            {{-- Anggota & Identitas --}}
                            <td>
                                <div class="member-id-cell">
                                    <div class="member-avatar-box" style="background:{{ $m['avatar_bg'] }};color:{{ $m['avatar_bg'] === '#f1f5f9' ? '#334155' : '#ffffff' }}">
                                        {{ $m['initials'] }}
                                        @if($m['has_check_badge'])
                                            <span class="member-avatar-check">✓</span>
                                        @endif
                                    </div>
                                    <div class="member-id-meta">
                                        <span class="member-fullname">{{ $m['name'] }}</span>
                                        <span class="member-sub-id">NIA: {{ $m['nia'] }}</span>
                                        <span class="member-sub-nik">{{ str_starts_with($m['nik'], 'NIM') ? $m['nik'] : 'NIK: ' . $m['nik'] }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Kategori & Kuota --}}
                            <td>
                                <div class="member-cat-cell">
                                    <span class="member-cat-name">{{ $m['cat'] }}</span>
                                    <span class="member-quota-highlight {{ $m['status'] === 'sanction' ? 'danger' : '' }}">{{ $m['quota'] }}</span>
                                    <span class="member-cat-note {{ $m['status'] === 'sanction' ? 'danger' : '' }}">{{ $m['quota_sub'] }}</span>
                                </div>
                            </td>

                            {{-- Status Kepatuhan --}}
                            <td>
                                <div class="member-status-cell">
                                    @if($m['status'] === 'active')
                                        <span class="member-status-pill active">{{ $m['status_label'] }}</span>
                                    @elseif($m['status'] === 'pending')
                                        <span class="member-status-pill warning">{{ $m['status_label'] }}</span>
                                    @else
                                        <span class="member-status-pill danger">{{ $m['status_label'] }}</span>
                                    @endif
                                    <span class="member-status-sub">{{ $m['status_sub'] }}</span>
                                </div>
                            </td>

                            {{-- Aktivitas --}}
                            <td>
                                <div class="member-activity-cell">
                                    <span class="member-act-highlight">{{ $m['activity'] }}</span>
                                    <span class="member-act-sub">{{ $m['activity_sub'] }}</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Table Pagination Sesuai Figma --}}
                <div class="member-pagination-bar">
                    <div>
                        Menampilkan <span id="member-page-count">5</span> dari <b>2.450</b> anggota terdaftar di direktori
                    </div>
                    <div class="member-pagination-right">
                        <select class="member-per-page-select">
                            <option>10 data per halaman</option>
                            <option>25 data per halaman</option>
                            <option>50 data per halaman</option>
                        </select>
                        <div class="member-page-pills">
                            <button type="button" class="member-page-pill" title="Sebelumnya">&lsaquo;</button>
                            <button type="button" class="member-page-pill active">1</button>
                            <button type="button" class="member-page-pill" onclick="toast('Membuka direktori halaman 2...')">2</button>
                            <button type="button" class="member-page-pill" onclick="toast('Membuka direktori halaman 3...')">3</button>
                            <span style="color:#94a3b8;padding:0 4px">...</span>
                            <button type="button" class="member-page-pill" onclick="toast('Membuka direktori halaman 490...')">490</button>
                            <button type="button" class="member-page-pill" title="Berikutnya">&rsaquo;</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Jejak Audit Terakhir Transaksi Keanggotaan Sesuai Figma --}}
            <div class="member-audit-section">
                <div class="member-audit-head">
                    <h3 class="member-audit-title">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <span>Jejak Audit Terakhir Transaksi Keanggotaan</span>
                    </h3>
                    <a href="{{ route('dashboard', 'audit') }}" class="member-audit-link">
                        Lihat Seluruh Log Keamanan &rsaquo;
                    </a>
                </div>

                <div class="member-audit-grid">
                    <div class="member-audit-card">
                        <div class="member-audit-card-head">
                            <span class="member-audit-actor">Super Admin (Ari)</span>
                            <span class="member-audit-time">10:41 WIB</span>
                        </div>
                        <div class="member-audit-msg">
                            Override kuota peminjaman anggota <b>Dr. Siti Rahmawati</b> menjadi 10 buku.
                        </div>
                    </div>

                    <div class="member-audit-card">
                        <div class="member-audit-card-head">
                            <span class="member-audit-actor">Sistem Sirkulasi Otomatis</span>
                            <span class="member-audit-time">09:14 WIB</span>
                        </div>
                        <div class="member-audit-msg">
                            Pembekuan sementara akun <b>Ahmad Fauzi</b>. Keterlambatan &gt; 14 hari + denda.
                        </div>
                    </div>

                    <div class="member-audit-card">
                        <div class="member-audit-card-head">
                            <span class="member-audit-actor">Staf Otorisasi (Hendra K.)</span>
                            <span class="member-audit-time">08:33 WIB</span>
                        </div>
                        <div class="member-audit-msg">
                            Verifikasi massal status KTM/NIM aktif <b>12 mahasiswa</b> dari loket pendaftaran.
                        </div>
                    </div>
                </div>
            </div>

            {{-- Legal Compliance Footer Sesuai Figma --}}
            <div class="member-legal-banner">
                <div class="member-legal-left">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <div class="member-legal-text">
                        <b>Standar Tata Kelola Perlindungan Data Pribadi (UU PDP No. 27/2022 &amp; ISO 27001)</b>
                        <span>Seluruh transmisi identitas anggota terenkripsi secara asimetris dengan kontrol akses berbasis hierarki hanya dapat disentuh oleh Super Admin/Otoritas Pusat.</span>
                    </div>
                </div>
                <a href="#" onclick="toast('Menampilkan sertifikasi kepatuhan privasi ISO 27001 & UU PDP'); return false;" class="member-legal-link">
                    https://inovexa.id/legal/privacy
                </a>
            </div>
        </div>

        {{-- Right Column: Panel Inspeksi & Otorisasi Super Admin --}}
        <div class="member-inspect-panel">
            <div class="member-inspect-head">
                <h3 class="member-inspect-title">PANEL INSPEKSI &amp; OTORISASI SUPER ADMIN</h3>
                <span class="member-inspect-chip">Root Focused</span>
            </div>

            {{-- The Digital Smart Card --}}
            <div class="member-smartcard">
                <div class="member-smartcard-top">
                    <div class="member-smartcard-brand">
                        <b>INOVEXA<br>PUBLIC LIBRARY</b>
                        <small>Kartu Anggota Digital Nasional</small>
                    </div>
                    <div class="member-smartcard-logo">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#34d399" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                </div>

                <div class="member-smartcard-chip-row">
                    <div class="member-emv-chip"></div>
                    <span class="member-nfc-tag">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12a10 10 0 0 1 10-10"/><path d="M5 12a7 7 0 0 1 7-7"/><path d="M8 12a4 4 0 0 1 4-4"/></svg>
                        ((( NFC PASS )))
                    </span>
                </div>

                <div class="member-smartcard-holder">
                    <small>NAMA LENGKAP PEMUSTAKA:</small>
                    <b id="inspect-member-name">Dr. Siti Rahmawati, M.Sc.</b>
                </div>

                <div class="member-smartcard-foot">
                    <div class="member-smartcard-meta">
                        <small>Nomor Induk Anggota (NIA)</small>
                        <b id="inspect-member-nia">INX-2026-02911</b>
                    </div>
                    <div class="member-smartcard-meta" style="text-align:right">
                        <small>Berlaku Hingga</small>
                        <b id="inspect-member-valid">31 Des 2027</b>
                    </div>
                </div>
            </div>

            {{-- Sub-Card Verification Bar --}}
            <div class="member-subcard-action">
                <span class="member-subcard-verified">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    Protokol Enkripsi: Terverifikasi
                </span>
                <button type="button" class="member-btn-pdf-valid" onclick="toast('Mencetak sertifikat enkripsi PDF digital terverifikasi...')">
                    🖨️ PDF Valid
                </button>
            </div>

            {{-- Detail Identity Rows --}}
            <div class="member-detail-list">
                <div class="member-detail-row">
                    <span class="member-detail-key">NIK (Disdukcapil)</span>
                    <span class="member-detail-val mono" id="inspect-member-nik">32740924******0003</span>
                </div>
                <div class="member-detail-row">
                    <span class="member-detail-key">Email Institusi</span>
                    <span class="member-detail-val" id="inspect-member-email">siti.rahma@univ.ac.id</span>
                </div>
                <div class="member-detail-row">
                    <span class="member-detail-key">Nomor Telepon</span>
                    <span class="member-detail-val mono" id="inspect-member-phone">+62 811-2388-901</span>
                </div>
                <div class="member-detail-row">
                    <span class="member-detail-key">Kategori Sosiologis</span>
                    <span class="member-detail-val" id="inspect-member-soccat">Dosen / Peneliti</span>
                </div>
            </div>

            {{-- Super Admin Override Box --}}
            <div class="member-override-box">
                <div class="member-override-head">
                    <span class="member-override-title">Hak Akses &amp; Modul Khusus (Super Admin Override)</span>
                    <span class="member-override-chip">Tingkat Master</span>
                </div>

                <div class="member-override-item">
                    <div class="member-override-left">
                        <span class="member-override-name">Limit Pinjam Sekaligus</span>
                        <span class="member-override-sub">Standar umum: 3 eksemplar</span>
                    </div>
                    <div class="member-override-val" style="cursor:pointer" onclick="openModal('override-config-modal')">
                        <span id="inspect-override-limit">10 Buku</span>
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2.5"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                    </div>
                </div>

                <div class="member-override-item">
                    <div class="member-override-left">
                        <span class="member-override-name">Kapasitas Reservasi Jangka</span>
                        <span class="member-override-sub">Akses manuskrip &amp; repositori langka</span>
                    </div>
                    <span class="member-override-pill green" id="inspect-override-resv">Diizinkan (Full)</span>
                </div>

                <div class="member-override-item">
                    <div class="member-override-left">
                        <span class="member-override-name">Dispensasi Denda Keterlambatan</span>
                        <span class="member-override-sub">Bebas sanksi harian otomatis</span>
                    </div>
                    <span class="member-override-pill gray" id="inspect-override-disp">Inisiatif (Toleran)</span>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="member-action-stack">
                <button type="button" class="member-btn-main-action" onclick="openModal('override-config-modal')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <span>Ubah Konfigurasi Hak Kredensial Anggota</span>
                </button>
                <div class="member-btn-split-row">
                    <button type="button" class="member-btn-freeze" onclick="freezeCurrentMember()">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                        <span>Bekukan Akun</span>
                    </button>
                    <button type="button" class="member-btn-audit-log" onclick="window.location='{{ route('dashboard', 'audit') }}'">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span>Lihat Audit Log</span>
                    </button>
                </div>
            </div>

            {{-- Integrasi Sistem Anggota --}}
            <div class="member-integration-box">
                <h4 class="member-integration-title">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    <span>Integrasi Sistem Anggota</span>
                </h4>
                <div class="member-integration-row">
                    <span class="member-integration-key">Sinkronisasi PDDikti &amp; Disdukcapil</span>
                    <span class="member-integration-val green">Terhubung Real-Time</span>
                </div>
                <div class="member-integration-row">
                    <span class="member-integration-key">SHA-256 HSM Secret Store</span>
                    <span class="member-integration-val">Valid (8 Perangkat)</span>
                </div>
                <div class="member-integration-row">
                    <span class="member-integration-key">Siklus Pembaruan Kredensial</span>
                    <span class="member-integration-val">Setiap 365 Hari</span>
                </div>

                <div class="member-info-alert">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:1px"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    <span>Data anggota yang terarsip tidak aktif lebih dari 2 tahun akan otomatis dianonimisasi sesuai dengan doktrin legal perlindungan data pribadi perpustakaan daerah.</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal 1: Daftarkan Anggota Baru (Master) --}}
<div class="modal" id="add-member-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('add-member-modal')">
    <div class="modal-box" style="max-width:540px">
        <button class="modal-close" type="button" onclick="closeModal('add-member-modal')">&times;</button>
        <div class="lbl">DIREKTORI MASTER PEMUSTAKA</div>
        <h2 style="margin:4px 0 10px;font-size:20px;font-weight:800;color:#0f172a">Daftarkan Anggota Baru (Master)</h2>
        <p style="color:var(--m);font-size:13px;line-height:1.5">
            Pusat penerbitan kredensial nomor induk anggota (NIA) resmi Inovexa Library beserta hak enkripsi NFC Smartpass.
        </p>

        <form onsubmit="event.preventDefault(); closeModal('add-member-modal'); toast('Anggota baru berhasil didaftarkan dan kartu digital smartpass telah aktif!')" style="margin-top:16px;display:flex;flex-direction:column;gap:13px">
            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Nama Lengkap Sesuai KTP / KTM</label>
                <input type="text" required placeholder="Contoh: Farhan Nurhadi, S.T." style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Nomor NIK / Identitas Resmi</label>
                    <input type="text" required placeholder="3271040801990002" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Kategori Pemustaka</label>
                    <select style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                        <option value="dosen">Dosen / Peneliti Utama</option>
                        <option value="mahasiswa">Mahasiswa / Akademisi</option>
                        <option value="umum">Masyarakat Umum &amp; Mandiri</option>
                    </select>
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Email SSO / Institusi</label>
                    <input type="email" required placeholder="farhan.n@campus.ac.id" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
                </div>
                <div>
                    <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Nomor Telepon / WhatsApp</label>
                    <input type="text" required placeholder="+62 812-3456-7890" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none">
                </div>
            </div>

            <div style="display:flex;justify-content:flex-end;gap:10px;margin-top:10px">
                <button type="button" class="btn ghost" onclick="closeModal('add-member-modal')">Batal</button>
                <button type="submit" class="btn" style="background:#0f172a;color:#fff;border-radius:8px;font-weight:700;padding:10px 20px">Terbitkan Kredensial</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal 2: Ubah Konfigurasi Hak Kredensial --}}
<div class="modal" id="override-config-modal" role="dialog" aria-modal="true" onclick="if(event.target === this) closeModal('override-config-modal')">
    <div class="modal-box" style="max-width:520px">
        <button class="modal-close" type="button" onclick="closeModal('override-config-modal')">&times;</button>
        <div class="lbl">HAK AKSES KHUSUS SUPER ADMIN</div>
        <h2 style="margin:4px 0 10px;font-size:20px;font-weight:800;color:#0f172a" id="modal-override-title">Override Hak Akses Anggota</h2>
        <p style="color:var(--m);font-size:13px;line-height:1.5">
            Konfigurasi batas sirkulasi, limit peminjaman paralel, dan dispensasi kepatuhan khusus.
        </p>

        <form onsubmit="event.preventDefault(); saveMemberOverride();" style="margin-top:16px;display:flex;flex-direction:column;gap:14px">
            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Limit Pinjam Eksemplar Paralel</label>
                <select id="modal-select-limit" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                    <option value="10 Buku">10 Buku (Khusus Dosen / Peneliti Utama)</option>
                    <option value="5 Buku">5 Buku (Prioritas Skripsi / Riset)</option>
                    <option value="3 Buku">3 Buku (Standar Pemustaka Umum)</option>
                    <option value="0 Buku (Dibekukan)">0 Buku (Tangguhkan Sirkulasi)</option>
                </select>
            </div>

            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Kapasitas Reservasi Manuskrip &amp; Koleksi Langka</label>
                <select id="modal-select-resv" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                    <option value="Diizinkan (Full)">Diizinkan (Full Akses Koleksi Terkunci)</option>
                    <option value="Standar (1 Buku)">Standar (1 Buku Terbuka)</option>
                    <option value="Ditolak">Ditolak / Nonaktif</option>
                </select>
            </div>

            <div>
                <label style="display:block;font-size:12px;font-weight:700;color:#334155;margin-bottom:6px">Dispensasi Denda &amp; Sanksi Harian</label>
                <select id="modal-select-disp" style="width:100%;padding:10px 14px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;background:#fff;outline:none">
                    <option value="Inisiatif (Toleran)">Inisiatif (Toleran - Bebas Denda Keterlambatan Otomatis)</option>
                    <option value="Normal (Sesuai Aturan)">Normal (Sesuai Kebijakan Sirkulasi Aktif)</option>
                    <option value="Sanksi Aktif">Sanksi Aktif (Wajib Pelunasan)</option>
                </select>
            </div>

            <div style="display:flex;justify-content:flex-end;gap:10px;margin-top:10px">
                <button type="button" class="btn ghost" onclick="closeModal('override-config-modal')">Batal</button>
                <button type="submit" class="btn" style="background:#0f172a;color:#fff;border-radius:8px;font-weight:700;padding:10px 20px">Simpan Override</button>
            </div>
        </form>
    </div>
</div>

{{-- Interactive Client Scripts --}}
<script>
    let currentMemberName = 'Dr. Siti Rahmawati, M.Sc.';
    let memberSearchQuery = '';
    let memberCatFilter = 'all';
    let memberStatusFilter = 'all';

    function handleMemberSearch(val) {
        memberSearchQuery = (val || '').toLowerCase().trim();
        applyMemberFilters();
    }

    function handleCatFilter(val) {
        memberCatFilter = val;
        applyMemberFilters();
    }

    function handleStatusFilter(val) {
        memberStatusFilter = val;
        applyMemberFilters();
    }

    function applyMemberFilters() {
        const rows = document.querySelectorAll('.member-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const name = (row.dataset.name || '').toLowerCase();
            const nia = (row.dataset.nia || '').toLowerCase();
            const nik = (row.dataset.nik || '').toLowerCase();
            const cat = (row.dataset.cat || '').toLowerCase();
            const catcode = row.dataset.catcode || '';
            const status = row.dataset.status || '';

            // Search query matches
            const matchesSearch = !memberSearchQuery ||
                name.includes(memberSearchQuery) ||
                nia.includes(memberSearchQuery) ||
                nik.includes(memberSearchQuery) ||
                cat.includes(memberSearchQuery);

            // Category filter matches
            const matchesCat = (memberCatFilter === 'all') || (catcode === memberCatFilter);

            // Status filter matches
            const matchesStatus = (memberStatusFilter === 'all') || (status === memberStatusFilter);

            if (matchesSearch && matchesCat && matchesStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const countSpan = document.getElementById('member-page-count');
        if (countSpan) countSpan.innerText = visibleCount;
        updateMemberSelectedCount();
    }

    function toggleSelectAllMembers(masterCheckbox) {
        const checked = masterCheckbox.checked;
        const visibleRows = document.querySelectorAll('.member-row:not([style*="display: none"]) .member-row-check');
        visibleRows.forEach(cb => cb.checked = checked);

        const thCb = document.getElementById('member-th-checkbox');
        const bulkCb = document.getElementById('member-check-all');
        if (thCb) thCb.checked = checked;
        if (bulkCb) bulkCb.checked = checked;

        updateMemberSelectedCount();
    }

    function updateMemberSelectedCount() {
        const checked = document.querySelectorAll('.member-row-check:checked').length;
        const countSpan = document.getElementById('member-selected-count');
        const bulkBar = document.getElementById('member-bulk-bar');

        if (countSpan) {
            countSpan.innerText = `(${checked} Dipilih)`;
        }
        if (bulkBar) {
            bulkBar.style.display = checked > 0 ? 'flex' : 'none';
        }
    }

    function bulkFreezeMembers() {
        const checked = document.querySelectorAll('.member-row-check:checked').length;
        if (checked === 0) {
            toast('Pilih minimal 1 anggota untuk dibekukan');
            return;
        }
        if (confirm(`Apakah Anda yakin ingin membekukan akses sirkulasi ${checked} anggota terpilih?`)) {
            toast(`${checked} akun anggota berhasil dibekukan sementara`);
        }
    }

    function freezeCurrentMember() {
        if (confirm(`Bekukan akun pemustaka "${currentMemberName}" secara manual?`)) {
            toast(`Akun pemustaka "${currentMemberName}" berhasil dibekukan sementara`);
        }
    }

    function inspectMemberRow(row, evt) {
        document.querySelectorAll('.member-row').forEach(r => r.classList.remove('is-inspected'));
        row.classList.add('is-inspected');

        const name = row.dataset.name || '';
        const nia = row.dataset.nia || '';
        const nik = row.dataset.nik || '';
        const email = row.dataset.email || '';
        const phone = row.dataset.phone || '';
        const soccat = row.dataset.soccat || '';
        const valid = row.dataset.valid || '';
        const limit = row.dataset.limit || '3 Buku';
        const resv = row.dataset.resv || 'Standar';
        const disp = row.dataset.disp || 'Normal';

        currentMemberName = name;

        // Update Smartcard
        const nameEl = document.getElementById('inspect-member-name');
        const niaEl = document.getElementById('inspect-member-nia');
        const validEl = document.getElementById('inspect-member-valid');
        if (nameEl) nameEl.innerText = name;
        if (niaEl) niaEl.innerText = nia;
        if (validEl) validEl.innerText = valid;

        // Update Identity
        const nikEl = document.getElementById('inspect-member-nik');
        const emailEl = document.getElementById('inspect-member-email');
        const phoneEl = document.getElementById('inspect-member-phone');
        const soccatEl = document.getElementById('inspect-member-soccat');
        if (nikEl) nikEl.innerText = nik;
        if (emailEl) emailEl.innerText = email;
        if (phoneEl) phoneEl.innerText = phone;
        if (soccatEl) soccatEl.innerText = soccat;

        // Update Override
        const limitEl = document.getElementById('inspect-override-limit');
        const resvEl = document.getElementById('inspect-override-resv');
        const dispEl = document.getElementById('inspect-override-disp');
        if (limitEl) limitEl.innerText = limit;
        if (resvEl) {
            resvEl.innerText = resv;
            resvEl.className = 'member-override-pill ' + (resv.includes('Full') || resv.includes('Diizinkan') ? 'green' : 'gray');
        }
        if (dispEl) {
            dispEl.innerText = disp;
            dispEl.className = 'member-override-pill ' + (disp.includes('Toleran') ? 'gray' : (disp.includes('Sanksi') ? 'red' : 'gray'));
        }

        const modalTitle = document.getElementById('modal-override-title');
        if (modalTitle) modalTitle.innerText = `Override Hak Akses — ${name}`;
    }

    function saveMemberOverride() {
        const limit = document.getElementById('modal-select-limit').value;
        const resv = document.getElementById('modal-select-resv').value;
        const disp = document.getElementById('modal-select-disp').value;

        const limitEl = document.getElementById('inspect-override-limit');
        const resvEl = document.getElementById('inspect-override-resv');
        const dispEl = document.getElementById('inspect-override-disp');

        if (limitEl) limitEl.innerText = limit;
        if (resvEl) {
            resvEl.innerText = resv;
            resvEl.className = 'member-override-pill ' + (resv.includes('Full') || resv.includes('Diizinkan') ? 'green' : 'gray');
        }
        if (dispEl) {
            dispEl.innerText = disp;
            dispEl.className = 'member-override-pill ' + (disp.includes('Toleran') ? 'gray' : 'gray');
        }

        closeModal('override-config-modal');
        toast(`Konfigurasi hak override untuk "${currentMemberName}" berhasil disimpan!`);
    }

    document.addEventListener('DOMContentLoaded', () => {
        updateMemberSelectedCount();
    });
</script>
