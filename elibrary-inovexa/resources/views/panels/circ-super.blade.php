{{--
    Super Admin: Kelola Sirkulasi Kebijakan (Pinjam, Kembali & Denda)
    Figma Prototype Node: 285-4979
    INOVEXA Library Management System
--}}

@php
    $r = session('user')['role'] ?? 'super';
    $currentDur = $lib->cfg['dur'] ?? 7;
    $currentFine = $lib->cfg['fine'] ?? 1000;
@endphp

<div class="circ-policy-page">

    {{-- Breadcrumb & Root Pill (Persis Figma Node 285-4979) --}}
    <div class="circ-policy-topbar">
        <div class="circ-policy-breadcrumb">
            <a href="{{ route('dashboard', 'ov') }}" class="circ-bread-link">Dashboard Super Admin</a>
            <span class="circ-bread-sep">›</span>
            <span class="circ-bread-current">Kelola Sirkulasi</span>
        </div>
        <div class="circ-root-pill">
            <span class="circ-root-dot"></span>
            <span>OTORISASI KEBIJAKAN GLOBAL &amp; AUDIT SIRKULASI (ROOT)</span>
        </div>
    </div>

    {{-- Header Title & Action Buttons --}}
    <div class="circ-policy-header">
        <div class="circ-policy-header-left">
            <h1 class="circ-policy-title">
                Kelola Kebijakan Sirkulasi, Pinjam,<br>
                Kembali &amp; Denda
            </h1>
            <p class="circ-policy-desc">
                Pusat tata kelola aturan sirkulasi multi-kategori, konfigurasi denda &amp; masa pinjam,
                monitoring anomali transaksi sirkulasi terpusat, dan otorisasi dispensasi khusus.
            </p>
        </div>
        <div class="circ-policy-header-actions">
            <button type="button" class="btn-circ-secondary" onclick="openModal('modal-audit-circ-policy')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                <span>Audit Log Sirkulasi</span>
            </button>
            <button type="button" class="btn-circ-secondary" onclick="exportKasdaReport()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                <span>Ekspor Kas Daerah</span>
            </button>
            <button type="button" class="btn-circ-primary" onclick="openModal('modal-save-circ-policy')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2v20M2 12h20"/></svg>
                <span>+ Simpan Perubahan Kebijakan</span>
            </button>
        </div>
    </div>

    {{-- Top 4 Stat Cards --}}
    <div class="circ-stats-grid">
        {{-- Card 1: SIRKULASI BERJALAN AKTIF --}}
        <div class="circ-stat-card">
            <div class="circ-stat-header">
                <span class="circ-stat-label">SIRKULASI BERJALAN AKTIF</span>
                <div class="circ-stat-icon circ-stat-icon-muted">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                </div>
            </div>
            <div class="circ-stat-number-wrap">
                <span class="circ-stat-number">5.490</span>
            </div>
            <div class="circ-stat-sub">Eksemplar dalam pinjaman</div>
            <div class="circ-stat-footer">
                <span class="circ-stat-meta-text">89.2% tepat waktu</span>
                <span class="circ-pill-amber">582 ≤ 3 hari tenggat</span>
            </div>
        </div>

        {{-- Card 2: TERLAMBAT & DENDA --}}
        <div class="circ-stat-card">
            <div class="circ-stat-header">
                <span class="circ-stat-label">TERLAMBAT &amp; DENDA</span>
                <div class="circ-stat-icon circ-stat-icon-orange">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                </div>
            </div>
            <div class="circ-stat-number-wrap">
                <span class="circ-stat-number circ-stat-number-orange">248 Kasus</span>
            </div>
            <div class="circ-stat-sub">Rp 8.420.000 tagihan berjalan</div>
            <div class="circ-stat-footer">
                <span class="circ-pill-red">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    14 Anggota Terblokir
                </span>
                <span class="circ-stat-meta-text">Auto-Lockout Aktif</span>
            </div>
        </div>

        {{-- Card 3: DISPENSASI & PEMUTIHAN --}}
        <div class="circ-stat-card">
            <div class="circ-stat-header">
                <span class="circ-stat-label">DISPENSASI &amp; PEMUTIHAN</span>
                <div class="circ-stat-icon circ-stat-icon-muted">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                </div>
            </div>
            <div class="circ-stat-number-wrap">
                <span class="circ-stat-number">3 Berkas</span>
            </div>
            <div class="circ-stat-sub">Otorisasi kebijakan khusus</div>
            <div class="circ-stat-footer">
                <span class="circ-stat-meta-text">2 Disetujui Root</span>
                <span class="circ-pill-peach">1 Perlu Otorisasi</span>
            </div>
        </div>

        {{-- Card 4: TINGKAT KEPATUHAN SIKLUS --}}
        <div class="circ-stat-card">
            <div class="circ-stat-header">
                <span class="circ-stat-label">TINGKAT KEPATUHAN SIKLUS</span>
                <div class="circ-stat-icon circ-stat-icon-green">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                </div>
            </div>
            <div class="circ-stat-number-wrap">
                <span class="circ-stat-number">96.4%</span>
            </div>
            <div class="circ-stat-sub">
                <span style="color:#16a34a;font-weight:600">+1.8%</span> pemulihan siklus bulan ini
            </div>
            <div class="circ-stat-footer">
                <span class="circ-stat-meta-text">0 Sengketa Eksemplar Hilang Standar ISO 11620</span>
            </div>
        </div>
    </div>

    {{-- Filter Tabs (Pills) Persis Figma --}}
    <div class="circ-nav-tabs">
        <button type="button" class="circ-tab-btn active" onclick="switchCircTab('matrix', this)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
            <span>Konfigurasi Aturan &amp; Kuota Sirkulasi (Aktif)</span>
        </button>
        <button type="button" class="circ-tab-btn" onclick="switchCircTab('anomaly', this)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            <span>Pengawasan Transaksi &amp; Anomali</span>
            <span class="circ-tab-badge circ-tab-badge-orange">248</span>
        </button>
        <button type="button" class="circ-tab-btn" onclick="switchCircTab('dispensation', this)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
            <span>Otorisasi Dispensasi &amp; Pemutihan</span>
            <span class="circ-tab-badge circ-tab-badge-brown">1</span>
        </button>
        <button type="button" class="circ-tab-btn" onclick="switchCircTab('rfid', this)">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
            <span>Integrasi Gerbang RFID &amp; Autogate</span>
        </button>
    </div>

    {{-- Main Two-Column Layout --}}
    <div class="circ-layout-grid">

        {{-- LEFT COLUMN: MATRIKS ATURAN & CALLOUT --}}
        <div class="circ-col-main">

            <div class="circ-card">
                {{-- Card Header --}}
                <div class="circ-card-head">
                    <div class="circ-card-title-group">
                        <div class="circ-card-head-icon">
                            <span>@</span>
                        </div>
                        <div>
                            <h2 class="circ-card-title">Matriks Kebijakan Sirkulasi Berdasarkan Kategori Pemustaka</h2>
                            <p class="circ-card-subtitle">Parameter otomatis yang diterapkan pada sistem loket, kios mandiri, dan portal pemustaka.</p>
                        </div>
                    </div>
                    <div class="circ-grace-pill">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                        <span>Grace Period: 48 Jam</span>
                    </div>
                </div>

                {{-- Policy Global Meta Parameters --}}
                <div class="circ-meta-bar">
                    <div class="circ-meta-item">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
                        <span>Perpanjangan Online Maks: <b>3 Kali</b></span>
                    </div>
                    <div class="circ-meta-item">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                        <span>Batas Denda Auto-Suspend: <b>Rp 50.000</b></span>
                    </div>
                    <div class="circ-meta-item">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                        <span>Sinkronisasi SIPD/Kas: <b>Tiap 23:59 WIB</b></span>
                    </div>
                </div>

                {{-- Policy Matrix Table --}}
                <div class="circ-table-responsive">
                    <table class="circ-table">
                        <thead>
                            <tr>
                                <th style="width:28%">KATEGORI ANGGOTA</th>
                                <th style="width:12%">DURASI PINJAM</th>
                                <th style="width:12%">KUOTA SIMULTAN</th>
                                <th style="width:15%">TARIF DENDA/HARI</th>
                                <th style="width:12%">PERPANJANGAN</th>
                                <th style="width:11%">AKSES LANGKA</th>
                                <th style="width:10%;text-align:right">OPSI OTORITAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Row 1: Dosen & Peneliti Utama --}}
                            <tr id="row-policy-dosen">
                                <td>
                                    <div class="circ-cat-name">Dosen &amp; Peneliti Utama</div>
                                    <div class="circ-cat-sub">Akun Civitas ID: Level-1 Priority</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-dur-dosen">30</span></div>
                                    <div class="circ-val-unit">Hari</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-quota-dosen">10</span></div>
                                    <div class="circ-val-unit">Eksemplar</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold">Rp <span id="val-fine-dosen">500</span></div>
                                    <div class="circ-val-unit">Subsidi riset</div>
                                </td>
                                <td>
                                    <span class="circ-pill-gray"><span id="val-renew-dosen">3x</span> Online</span>
                                </td>
                                <td>
                                    <span class="circ-status-allowed">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                        Diizinkan
                                    </span>
                                </td>
                                <td style="text-align:right">
                                    <button type="button" class="btn-circ-edit" onclick="openEditRuleModal('dosen', 'Dosen & Peneliti Utama', 30, 10, 500, 3, 'Diizinkan')">
                                        Edit Aturan
                                    </button>
                                </td>
                            </tr>

                            {{-- Row 2: Mahasiswa Tingkat Akhir --}}
                            <tr id="row-policy-mhs-akhir">
                                <td>
                                    <div class="circ-cat-title-row">
                                        <span class="circ-cat-name">Mahasiswa Tingkat Akhir</span>
                                        <span class="circ-badge-skripsi">SKRIPSI</span>
                                    </div>
                                    <div class="circ-cat-sub">Tervalidasi KRS Tugas Akhir</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-dur-mhs-akhir">21</span></div>
                                    <div class="circ-val-unit">Hari</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-quota-mhs-akhir">5</span></div>
                                    <div class="circ-val-unit">Eksemplar</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold">Rp <span id="val-fine-mhs-akhir">1.000</span></div>
                                    <div class="circ-val-unit">Standar Perpus</div>
                                </td>
                                <td>
                                    <span class="circ-pill-gray"><span id="val-renew-mhs-akhir">2x</span> Online</span>
                                </td>
                                <td>
                                    <span class="circ-status-recommend">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                                        Rekomendasi
                                    </span>
                                </td>
                                <td style="text-align:right">
                                    <button type="button" class="btn-circ-edit" onclick="openEditRuleModal('mhs_akhir', 'Mahasiswa Tingkat Akhir', 21, 5, 1000, 2, 'Rekomendasi')">
                                        Edit Aturan
                                    </button>
                                </td>
                            </tr>

                            {{-- Row 3: Mahasiswa Reguler & Umum --}}
                            <tr id="row-policy-umum">
                                <td>
                                    <div class="circ-cat-name">Mahasiswa Reguler &amp; Umum</div>
                                    <div class="circ-cat-sub">Pemegang KTP / Kartu Perpustakaan Standar</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-dur-umum">{{ $currentDur }}</span></div>
                                    <div class="circ-val-unit">Hari</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-quota-umum">3</span></div>
                                    <div class="circ-val-unit">Eksemplar</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold">Rp <span id="val-fine-umum">{{ number_format($currentFine, 0, ',', '.') }}</span></div>
                                    <div class="circ-val-unit">Standar Perpus</div>
                                </td>
                                <td>
                                    <span class="circ-pill-gray"><span id="val-renew-umum">1x</span> Online</span>
                                </td>
                                <td>
                                    <span class="circ-status-onsite">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                                        Baca di Tempat
                                    </span>
                                </td>
                                <td style="text-align:right">
                                    <button type="button" class="btn-circ-edit" onclick="openEditRuleModal('umum', 'Mahasiswa Reguler & Umum', {{ $currentDur }}, 3, {{ $currentFine }}, 1, 'Baca di Tempat')">
                                        Edit Aturan
                                    </button>
                                </td>
                            </tr>

                            {{-- Row 4: Pelajar Sekolah Mitra --}}
                            <tr id="row-policy-pelajar">
                                <td>
                                    <div class="circ-cat-name">Pelajar Sekolah Mitra</div>
                                    <div class="circ-cat-sub">Afiliasi MOU Dinas Pendidikan Daerah</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-dur-pelajar">7</span></div>
                                    <div class="circ-val-unit">Hari</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold"><span id="val-quota-pelajar">2</span></div>
                                    <div class="circ-val-unit">Eksemplar</div>
                                </td>
                                <td>
                                    <div class="circ-val-bold">Rp <span id="val-fine-pelajar">500</span></div>
                                    <div class="circ-val-unit">Tarif Subsidi</div>
                                </td>
                                <td>
                                    <span class="circ-pill-gray"><span id="val-renew-pelajar">1x</span> Online</span>
                                </td>
                                <td>
                                    <span class="circ-status-locked">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                        Terkunci
                                    </span>
                                </td>
                                <td style="text-align:right">
                                    <button type="button" class="btn-circ-edit" onclick="openEditRuleModal('pelajar', 'Pelajar Sekolah Mitra', 7, 2, 500, 1, 'Terkunci')">
                                        Edit Aturan
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Callout: Kebijakan Auto-Lockout Denda Terakumulasi --}}
                <div class="circ-lockout-banner">
                    <div class="circ-lockout-left">
                        <div class="circ-lockout-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                        </div>
                        <div>
                            <div class="circ-lockout-title">Kebijakan Auto-Lockout Denda Terakumulasi</div>
                            <div class="circ-lockout-desc">
                                Plafon maksimal denda: <b>Rp 50.000</b>. Jika tercapai, sistem secara otomatis membekukan hak pinjam loket fisik, e-library, dan autogate RFID.
                            </div>
                        </div>
                    </div>
                    <div class="circ-lockout-right">
                        <span class="circ-lockout-label">STATUS MEKANISME:</span>
                        <span class="circ-pill-active-green">
                            <span class="circ-dot-green"></span>
                            AKTIF TERPUSAT
                        </span>
                    </div>
                </div>

            </div>
        </div>

        {{-- RIGHT COLUMN: KEWENANGAN SUPER ADMIN (ROOT) --}}
        <div class="circ-col-side">
            <div class="circ-card circ-side-card">

                {{-- Header Usulan Dispensasi --}}
                <div class="circ-side-head">
                    <div class="circ-side-sublabel">USULAN DISPENSASI &amp; OVERRIDE</div>
                    <div class="circ-side-title-row">
                        <div class="circ-side-title">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                            <span>Kewenangan Super Admin (Root)</span>
                        </div>
                        <span class="circ-side-wait-badge">1 Menunggu</span>
                    </div>
                </div>

                {{-- Member Profile Block --}}
                <div class="circ-member-box">
                    <div class="circ-member-avatar">AF</div>
                    <div class="circ-member-info">
                        <div class="circ-member-name-row">
                            <span class="circ-member-name">Ahmad Fauzi</span>
                            <span class="circ-badge-mhs">MHS TI</span>
                        </div>
                        <div class="circ-member-id">NIM: INX-2026-04118</div>
                        <div class="circ-member-frozen">
                            <span class="circ-dot-red"></span>
                            <span>Akun Dibekukan Otomatis</span>
                        </div>
                    </div>
                </div>

                {{-- Objek Sirkulasi --}}
                <div class="circ-detail-section">
                    <div class="circ-detail-label">OBJEK SIRKULASI:</div>
                    <div class="circ-detail-book-row">
                        <span class="circ-book-title">Metodologi Penelitian Kualitatif</span>
                        <span class="circ-book-code">EX-B-89104</span>
                    </div>
                    <div class="circ-detail-late-row">
                        <span class="circ-text-danger-light">Terlambat: 18 Hari</span>
                        <span class="circ-text-danger-bold">Akumulasi: Rp 18.000</span>
                    </div>
                </div>

                {{-- Dokumen Keringanan --}}
                <div class="circ-detail-section">
                    <div class="circ-detail-label">DOKUMEN KERINGANAN:</div>
                    <div class="circ-doc-row">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>
                        <span class="circ-doc-title">Surat Rawat Inap RSUP Dr. Kariadi (Sah)</span>
                    </div>
                    <div class="circ-doc-desc">
                        Diagnosis rawat inap 14 hari pasca operasi radang usus buntu.
                    </div>
                </div>

                {{-- Rekomendasi Kasir / Petugas --}}
                <div class="circ-detail-section">
                    <div class="circ-detail-label">REKOMENDASI KASIR / PETUGAS:</div>
                    <div class="circ-quote-box">
                        <div class="circ-quote-text">
                            "Dispensasi 100% denda &amp; pemulihan instan hak pinjam (Surat medis sah terverifikasi)."
                        </div>
                        <div class="circ-quote-author">
                            — Petugas Budi Santoso (NIP: 104)
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="circ-action-stack">
                    <button type="button" class="btn-root-approve" onclick="handleRootDispensasi('full')">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                        <span>Setujui Pemutihan Penuh (Buka Blokir)</span>
                    </button>
                    <button type="button" class="btn-root-partial" onclick="handleRootDispensasi('partial')">
                        <span style="font-weight:700">%</span>
                        <span>Dispensasi Sebagian (Potongan 50%)</span>
                    </button>
                    <button type="button" class="btn-root-reject" onclick="handleRootDispensasi('reject')">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
                        <span>Tolak Usulan &amp; Terapkan Sanksi Normal</span>
                    </button>
                </div>

                {{-- Root Compliance Note --}}
                <div class="circ-root-footer-note">
                    <div class="circ-root-note-title">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                        <span>Standar Otorisasi Root Ari:</span>
                    </div>
                    <p class="circ-root-note-text">
                        Setiap pemutihan otomatis tercatat di Audit Forensik BPKAD dan tidak dapat dianulir tanpa persetujuan Kepala UPT Perpustakaan.
                    </p>
                </div>

            </div>
        </div>

    </div>

    {{-- Audit Log Forensik Transaksi Sirkulasi Terbaru --}}
    <div class="circ-card circ-audit-card">
        <div class="circ-audit-head">
            <div class="circ-audit-title-left">
                <div class="circ-audit-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
                </div>
                <div>
                    <h3 class="circ-audit-title">Audit Log Forensik Transaksi Sirkulasi Terbaru</h3>
                    <p class="circ-audit-subtitle">Jejak eksekusi kebijakan, penalti denda, dan intervensi manual sistem secara real-time.</p>
                </div>
            </div>
            <a href="javascript:void(0)" class="circ-audit-link" onclick="openModal('modal-audit-circ-policy')">
                <span>Buka Seluruh Log Forensik (14.280 Rekaman)</span>
                <span style="font-size:14px">›</span>
            </a>
        </div>

        <div class="circ-table-responsive">
            <table class="circ-table circ-audit-table">
                <thead>
                    <tr>
                        <th style="width:13%">WAKTU EKSEKUSI</th>
                        <th style="width:23%">INISIATOR (AKTOR)</th>
                        <th style="width:27%">JENIS TINDAKAN &amp; SASARAN</th>
                        <th style="width:23%">DETAIL NILAI / DAMPAK SISTEM</th>
                        <th style="width:14%;text-align:right">STATUS INTEGRITAS</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Log Row 1 --}}
                    <tr>
                        <td>
                            <span class="circ-mono-time">11:20:14 WIB</span>
                        </td>
                        <td>
                            <div class="circ-actor-cell">
                                <div class="circ-actor-avatar circ-actor-avatar-amber">AR</div>
                                <span class="circ-actor-name">Ari (Super Admin Root)</span>
                            </div>
                        </td>
                        <td>
                            <div class="circ-action-title">Manual Override Kuota Pinjam</div>
                            <div class="circ-action-target">Sasaran: Dr. Siti Rahmawati (NIP: 19820411)</div>
                        </td>
                        <td>
                            <div class="circ-impact-text">Plafon dinaikkan dari 5 → 10 Eksemplar (Riset Hibah Nasional)</div>
                        </td>
                        <td style="text-align:right">
                            <span class="circ-integrity-verified">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span>Tervalidasi SHA-256</span>
                            </span>
                        </td>
                    </tr>

                    {{-- Log Row 2 --}}
                    <tr>
                        <td>
                            <span class="circ-mono-time">09:45:02 WIB</span>
                        </td>
                        <td>
                            <div class="circ-actor-cell">
                                <div class="circ-actor-avatar circ-actor-avatar-gray">BS</div>
                                <span class="circ-actor-name">Budi Santoso (Petugas Loket 1)</span>
                            </div>
                        </td>
                        <td>
                            <div class="circ-action-title">Penerimaan Kembali &amp; Denda Kasir</div>
                            <div class="circ-action-target">Sasaran: Kevin Wijaya (NIM: 0914102)</div>
                        </td>
                        <td>
                            <div class="circ-impact-text">Keterlambatan 4 hari • Denda Rp 4.000 Lunas (QRIS Loket Kasda)</div>
                        </td>
                        <td style="text-align:right">
                            <span class="circ-integrity-teal">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                <span>Kasda Terkonfirmasi</span>
                            </span>
                        </td>
                    </tr>

                    {{-- Log Row 3 --}}
                    <tr>
                        <td>
                            <span class="circ-mono-time">08:30:00 WIB</span>
                        </td>
                        <td>
                            <div class="circ-actor-cell">
                                <div class="circ-actor-avatar circ-actor-avatar-dark">CRON</div>
                                <span class="circ-actor-name">Sistem Sirkulasi Otomatis (Cron Daemon)</span>
                            </div>
                        </td>
                        <td>
                            <div class="circ-action-title">Auto-Lockout Kartu Sirkulasi Terlambat</div>
                            <div class="circ-action-target">Sasaran: 3 Anggota Terblokir Sementara</div>
                        </td>
                        <td>
                            <span class="circ-impact-pill-red">Grace period 48 jam kedaluwarsa • Akses gerbang &amp; e-library dihentikan</span>
                        </td>
                        <td style="text-align:right">
                            <span class="circ-integrity-sync">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                                <span>Sistem Batch Sinkron</span>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Bottom Compliance Banner --}}
    <div class="circ-compliance-banner">
        <div class="circ-compliance-left">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="8" y1="6" x2="16" y2="6"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="16" y2="14"/></svg>
            <span>Kepatuhan Standar Manajemen Sirkulasi Bahan Pustaka ISO 11620:2014 &amp; Tata Kelola Retribusi Daerah No. 12/2024.</span>
        </div>
        <div class="circ-compliance-right">
            <span>Audit Integrity Hash Valid</span>
            <span style="opacity:0.6">•</span>
            <span>Inovexa Library Core Engine v4.8</span>
        </div>
    </div>

</div>

{{-- MODAL: EDIT ATURAN KATEGORI --}}
<div id="modal-edit-circ-rule" class="circ-modal-backdrop" style="display:none" onclick="if(event.target===this)closeModal('modal-edit-circ-rule')">
    <div class="circ-modal-content">
        <div class="circ-modal-head">
            <div>
                <h3 class="circ-modal-title">Edit Aturan Kebijakan Sirkulasi</h3>
                <p class="circ-modal-subtitle" id="modal-rule-cat-name">Dosen &amp; Peneliti Utama</p>
            </div>
            <button type="button" class="circ-modal-close" onclick="closeModal('modal-edit-circ-rule')">✕</button>
        </div>
        <form id="form-edit-circ-rule" onsubmit="saveCircRuleChanges(event)">
            <input type="hidden" id="edit-rule-code">
            <div class="circ-modal-body">
                <div class="circ-form-row">
                    <div class="circ-form-group">
                        <label class="circ-form-label">Durasi Pinjam (Hari)</label>
                        <input type="number" id="input-rule-duration" class="circ-form-input" min="1" max="90" required>
                        <small class="circ-form-hint">Masa peminjaman standar per sirkulasi.</small>
                    </div>
                    <div class="circ-form-group">
                        <label class="circ-form-label">Kuota Simultan (Eksemplar)</label>
                        <input type="number" id="input-rule-quota" class="circ-form-input" min="1" max="20" required>
                        <small class="circ-form-hint">Maksimal buku aktif dipinjam bersamaan.</small>
                    </div>
                </div>

                <div class="circ-form-row">
                    <div class="circ-form-group">
                        <label class="circ-form-label">Tarif Denda Keterlambatan (Rp / Hari)</label>
                        <input type="number" id="input-rule-fine" class="circ-form-input" min="0" step="100" required>
                        <small class="circ-form-hint">Denda harian setelah melewati batas grace period.</small>
                    </div>
                    <div class="circ-form-group">
                        <label class="circ-form-label">Maksimal Perpanjangan Online</label>
                        <select id="input-rule-renew" class="circ-form-input">
                            <option value="0">0x (Tidak Diizinkan)</option>
                            <option value="1">1x Online</option>
                            <option value="2">2x Online</option>
                            <option value="3">3x Online</option>
                        </select>
                        <small class="circ-form-hint">Kuota perpanjang mandiri lewat portal pemustaka.</small>
                    </div>
                </div>

                <div class="circ-form-group">
                    <label class="circ-form-label">Hak Akses Koleksi Khusus / Langka</label>
                    <select id="input-rule-rare" class="circ-form-input">
                        <option value="Diizinkan">Diizinkan (Prioritas Riset)</option>
                        <option value="Rekomendasi">Rekomendasi Dosen Pembimbing</option>
                        <option value="Baca di Tempat">Hanya Baca di Tempat</option>
                        <option value="Terkunci">Terkunci / Tidak Diizinkan</option>
                    </select>
                </div>
            </div>
            <div class="circ-modal-footer">
                <button type="button" class="btn-circ-secondary" onclick="closeModal('modal-edit-circ-rule')">Batal</button>
                <button type="submit" class="btn-circ-primary">Terapkan Perubahan Aturan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: SIMPAN PERUBAHAN KEBIJAKAN KE SETTINGS --}}
<div id="modal-save-circ-policy" class="circ-modal-backdrop" style="display:none" onclick="if(event.target===this)closeModal('modal-save-circ-policy')">
    <div class="circ-modal-content">
        <div class="circ-modal-head">
            <div>
                <h3 class="circ-modal-title">Simpan &amp; Terapkan Kebijakan Global</h3>
                <p class="circ-modal-subtitle">Sinkronisasi parameter sirkulasi sistem INOVEXA ke seluruh gerbang &amp; loket.</p>
            </div>
            <button type="button" class="circ-modal-close" onclick="closeModal('modal-save-circ-policy')">✕</button>
        </div>
        <form method="POST" action="{{ route('settings.save') }}">
            @csrf
            <div class="circ-modal-body">
                <div class="circ-alert-info">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    <div>
                        Perubahan parameter ini akan langsung aktif pada loket sirkulasi fisik, kios peminjaman mandiri RFID, dan notifikasi denda otomatis pemustaka.
                    </div>
                </div>

                <div class="circ-form-row">
                    <div class="circ-form-group">
                        <label class="circ-form-label">Durasi Pinjam Standar Default (Hari)</label>
                        <input type="number" name="dur" class="circ-form-input" value="{{ $currentDur }}" min="1" max="60" required>
                    </div>
                    <div class="circ-form-group">
                        <label class="circ-form-label">Tarif Denda Standar Default (Rp / Hari)</label>
                        <input type="number" name="fine" class="circ-form-input" value="{{ $currentFine }}" min="0" step="500" required>
                    </div>
                </div>

                <div class="circ-form-group">
                    <label class="circ-form-label">Catatan Pengesahan Otorisasi (Audit Trail)</label>
                    <input type="text" class="circ-form-input" value="Penyesuaian Matriks Sirkulasi Super Admin Root Q1-2026" readonly style="background:#f8fafc;color:#64748b">
                </div>
            </div>
            <div class="circ-modal-footer">
                <button type="button" class="btn-circ-secondary" onclick="closeModal('modal-save-circ-policy')">Batal</button>
                <button type="submit" class="btn-circ-primary">Otorisasi &amp; Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL: AUDIT LOG FORENSIK LENGKAP --}}
<div id="modal-audit-circ-policy" class="circ-modal-backdrop" style="display:none" onclick="if(event.target===this)closeModal('modal-audit-circ-policy')">
    <div class="circ-modal-content" style="max-width:760px">
        <div class="circ-modal-head">
            <div>
                <h3 class="circ-modal-title">Buku Besar Audit Forensik Kebijakan Sirkulasi</h3>
                <p class="circ-modal-subtitle">Log tidak dapat dihapus (Immutable Audit Trail) sesuai UU Perpustakaan &amp; BPKAD.</p>
            </div>
            <button type="button" class="circ-modal-close" onclick="closeModal('modal-audit-circ-policy')">✕</button>
        </div>
        <div class="circ-modal-body">
            <div class="circ-log-list">
                <div class="circ-log-item">
                    <div class="circ-log-time">Hari ini • 11:20:14 WIB</div>
                    <div class="circ-log-event"><b>Manual Override Kuota:</b> Super Admin Root Ari menaikkan kuota peminjaman Dr. Siti Rahmawati menjadi 10 eksemplar.</div>
                    <div class="circ-log-hash">Hash: 8f3d1b4902a7c5e2194b6da0... (Valid)</div>
                </div>
                <div class="circ-log-item">
                    <div class="circ-log-time">Hari ini • 09:45:02 WIB</div>
                    <div class="circ-log-event"><b>Penerimaan Kasir &amp; Denda:</b> Petugas Budi Santoso menerima pelunasan denda Rp 4.000 (Kevin Wijaya). Bukti QRIS tersimpan.</div>
                    <div class="circ-log-hash">Hash: a12c98d41098fe736b042... (Valid)</div>
                </div>
                <div class="circ-log-item">
                    <div class="circ-log-time">Hari ini • 08:30:00 WIB</div>
                    <div class="circ-log-event"><b>Auto-Lockout Daemon:</b> Cron batch memblokir 3 kartu pemustaka karena melewati masa toleransi denda Rp 50.000.</div>
                    <div class="circ-log-hash">Hash: c77e21fa680b54e38914d... (Valid)</div>
                </div>
            </div>
        </div>
        <div class="circ-modal-footer">
            <button type="button" class="btn-circ-secondary" onclick="exportCircAuditCsv()">Unduh CSV Rekapitulasi</button>
            <button type="button" class="btn-circ-primary" onclick="closeModal('modal-audit-circ-policy')">Tutup</button>
        </div>
    </div>
</div>

{{-- SCOPED CSS PERSIS FIGMA NODE 285-4979 --}}
<style>
/* Base Page Container */
.circ-policy-page {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    color: #0f172a;
    padding-bottom: 40px;
}

/* Top Breadcrumb & Root Pill */
.circ-policy-topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.circ-policy-breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: #64748b;
}

.circ-bread-link {
    color: #64748b;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.15s;
}

.circ-bread-link:hover {
    color: #0f172a;
}

.circ-bread-sep {
    color: #cbd5e1;
    font-size: 13px;
}

.circ-bread-current {
    color: #0f172a;
    font-weight: 600;
}

.circ-root-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #0f172a;
    color: #ffffff;
    font-size: 10.5px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 9999px;
    letter-spacing: 0.6px;
}

.circ-root-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #22c55e;
    box-shadow: 0 0 6px rgba(34, 197, 94, 0.6);
}

/* Page Header */
.circ-policy-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 24px;
    gap: 20px;
}

.circ-policy-title {
    font-size: 26px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.25;
    margin: 0 0 8px 0;
    letter-spacing: -0.02em;
}

.circ-policy-desc {
    font-size: 13px;
    color: #64748b;
    line-height: 1.5;
    margin: 0;
    max-width: 660px;
}

.circ-policy-header-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

.btn-circ-secondary {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #1e293b;
    font-size: 12.5px;
    font-weight: 600;
    padding: 9px 15px;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    transition: all 0.15s ease;
}

.btn-circ-secondary:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

.btn-circ-primary {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #0f172a;
    border: 1px solid #0f172a;
    color: #ffffff;
    font-size: 12.5px;
    font-weight: 600;
    padding: 9px 16px;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    transition: all 0.15s ease;
}

.btn-circ-primary:hover {
    background: #1e293b;
    border-color: #1e293b;
}

/* 4-Stat Cards */
.circ-stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 20px;
}

.circ-stat-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 18px 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    display: flex;
    flex-direction: column;
}

.circ-stat-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.circ-stat-label {
    font-size: 11px;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.circ-stat-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.circ-stat-icon-muted {
    background: #f1f5f9;
    color: #475569;
}

.circ-stat-icon-orange {
    background: #fff7ed;
    color: #ea580c;
}

.circ-stat-icon-green {
    background: #f0fdf4;
    color: #16a34a;
}

.circ-stat-number-wrap {
    margin-bottom: 4px;
}

.circ-stat-number {
    font-size: 32px;
    font-weight: 800;
    color: #0f172a;
    line-height: 1.1;
    letter-spacing: -0.02em;
}

.circ-stat-number-orange {
    color: #c2410c;
}

.circ-stat-sub {
    font-size: 12px;
    color: #64748b;
    margin-bottom: 16px;
}

.circ-stat-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid #f1f5f9;
}

.circ-stat-meta-text {
    font-size: 11px;
    color: #475569;
    font-weight: 500;
}

.circ-pill-amber {
    background: #fef3c7;
    color: #b45309;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 9999px;
}

.circ-pill-red {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    background: #fee2e2;
    color: #dc2626;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 9999px;
}

.circ-pill-peach {
    background: #ffedd5;
    color: #c2410c;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 9999px;
}

/* Nav Tabs (Pills) */
.circ-nav-tabs {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 18px;
    flex-wrap: wrap;
}

.circ-tab-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: #334155;
    font-size: 12.5px;
    font-weight: 600;
    padding: 8px 14px;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 1px 2px rgba(0,0,0,0.02);
    transition: all 0.15s ease;
}

.circ-tab-btn:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

.circ-tab-btn.active {
    background: #0f172a;
    border-color: #0f172a;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.circ-tab-badge {
    font-size: 10px;
    font-weight: 700;
    padding: 1px 6px;
    border-radius: 9999px;
}

.circ-tab-badge-orange {
    background: #ea580c;
    color: #ffffff;
}

.circ-tab-badge-brown {
    background: #c2410c;
    color: #ffffff;
}

/* Two-Column Grid Layout */
.circ-layout-grid {
    display: grid;
    grid-template-columns: 2.15fr 1fr;
    gap: 16px;
    margin-bottom: 20px;
    align-items: start;
}

.circ-col-main {
    min-width: 0;
}

.circ-col-side {
    min-width: 0;
}

.circ-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
}

/* Card Header */
.circ-card-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 14px;
}

.circ-card-title-group {
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.circ-card-head-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #0f172a;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    flex-shrink: 0;
}

.circ-card-title {
    font-size: 15px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 2px 0;
    letter-spacing: -0.01em;
}

.circ-card-subtitle {
    font-size: 12px;
    color: #64748b;
    margin: 0;
}

.circ-grace-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #fef9c3;
    color: #854d0e;
    border: 1px solid #fef08a;
    font-size: 11.5px;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 9999px;
    white-space: nowrap;
}

/* Global Meta Parameters Bar */
.circ-meta-bar {
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 10px 0;
    border-top: 1px solid #f1f5f9;
    border-bottom: 1px solid #f1f5f9;
    margin-bottom: 14px;
    font-size: 12px;
    color: #475569;
    flex-wrap: wrap;
}

.circ-meta-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Matrix Table */
.circ-table-responsive {
    overflow-x: auto;
}

.circ-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12.5px;
}

.circ-table th {
    text-align: left;
    padding: 10px 12px;
    font-size: 10.5px;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    border-bottom: 1px solid #e2e8f0;
    background: #f8fafc;
}

.circ-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}

.circ-table tr:last-child td {
    border-bottom: none;
}

.circ-cat-name {
    font-size: 13px;
    font-weight: 700;
    color: #0f172a;
}

.circ-cat-title-row {
    display: flex;
    align-items: center;
    gap: 6px;
}

.circ-badge-skripsi {
    background: #ffedd5;
    color: #c2410c;
    font-size: 9.5px;
    font-weight: 800;
    padding: 1px 5px;
    border-radius: 4px;
    letter-spacing: 0.5px;
}

.circ-cat-sub {
    font-size: 11px;
    color: #64748b;
    margin-top: 2px;
}

.circ-val-bold {
    font-size: 13.5px;
    font-weight: 700;
    color: #0f172a;
}

.circ-val-unit {
    font-size: 11px;
    color: #64748b;
    margin-top: 2px;
}

.circ-pill-gray {
    display: inline-block;
    background: #f1f5f9;
    color: #334155;
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 11.5px;
    font-weight: 600;
}

.circ-status-allowed {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #059669;
    font-size: 12px;
    font-weight: 600;
}

.circ-status-recommend {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #d97706;
    font-size: 12px;
    font-weight: 600;
}

.circ-status-onsite {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #475569;
    font-size: 12px;
    font-weight: 600;
}

.circ-status-locked {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #dc2626;
    font-size: 12px;
    font-weight: 600;
}

.btn-circ-edit {
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-size: 11.5px;
    font-weight: 600;
    padding: 5px 10px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.15s;
    white-space: nowrap;
}

.btn-circ-edit:hover {
    background: #f8fafc;
    border-color: #94a3b8;
    color: #0f172a;
}

/* Callout Lockout Banner */
.circ-lockout-banner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fffbeb;
    border: 1px solid #fde68a;
    border-radius: 10px;
    padding: 14px 18px;
    margin-top: 16px;
    gap: 16px;
}

.circ-lockout-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.circ-lockout-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #fef3c7;
    color: #d97706;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.circ-lockout-title {
    font-size: 13px;
    font-weight: 700;
    color: #92400e;
    margin-bottom: 2px;
}

.circ-lockout-desc {
    font-size: 11.5px;
    color: #78350f;
    line-height: 1.4;
}

.circ-lockout-right {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}

.circ-lockout-label {
    font-size: 10px;
    font-weight: 700;
    color: #78350f;
    letter-spacing: 0.5px;
}

.circ-pill-active-green {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #dcfce7;
    color: #15803d;
    padding: 3px 9px;
    border-radius: 9999px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.circ-dot-green {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #16a34a;
}

/* Right Sidebar: Usulan Dispensasi & Override (Root) */
.circ-side-card {
    display: flex;
    flex-direction: column;
}

.circ-side-sublabel {
    font-size: 10px;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.circ-side-title-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
}

.circ-side-title {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 14.5px;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.01em;
}

.circ-side-wait-badge {
    background: #ffedd5;
    color: #c2410c;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 8px;
    border-radius: 9999px;
}

.circ-member-box {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #f8fafc;
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 14px;
}

.circ-member-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #0f172a;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 13px;
    flex-shrink: 0;
}

.circ-member-name-row {
    display: flex;
    align-items: center;
    gap: 6px;
}

.circ-member-name {
    font-size: 13.5px;
    font-weight: 700;
    color: #0f172a;
}

.circ-badge-mhs {
    background: #e2e8f0;
    color: #475569;
    font-size: 10px;
    font-weight: 700;
    padding: 1px 5px;
    border-radius: 4px;
}

.circ-member-id {
    font-size: 11px;
    color: #64748b;
    margin-top: 1px;
}

.circ-member-frozen {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #dc2626;
    font-size: 10.5px;
    font-weight: 600;
    margin-top: 3px;
}

.circ-dot-red {
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #dc2626;
}

.circ-detail-section {
    margin-bottom: 12px;
}

.circ-detail-label {
    font-size: 10px;
    font-weight: 700;
    color: #64748b;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}

.circ-detail-book-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.circ-book-title {
    font-size: 12.5px;
    font-weight: 700;
    color: #0f172a;
}

.circ-book-code {
    font-family: monospace;
    font-size: 11px;
    color: #64748b;
}

.circ-detail-late-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 3px;
}

.circ-text-danger-light {
    font-size: 11.5px;
    color: #b91c1c;
    font-weight: 600;
}

.circ-text-danger-bold {
    font-size: 11.5px;
    color: #b91c1c;
    font-weight: 700;
}

.circ-doc-row {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 700;
    color: #0f172a;
}

.circ-doc-desc {
    font-size: 11px;
    color: #64748b;
    margin-top: 2px;
    line-height: 1.35;
}

.circ-quote-box {
    background: #f8fafc;
    border-left: 3px solid #cbd5e1;
    padding: 8px 12px;
    border-radius: 0 6px 6px 0;
}

.circ-quote-text {
    font-size: 11.5px;
    color: #334155;
    font-style: italic;
    line-height: 1.4;
}

.circ-quote-author {
    font-size: 10.5px;
    color: #64748b;
    margin-top: 4px;
    font-weight: 600;
    font-style: normal;
}

/* Action Stack */
.circ-action-stack {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top: 14px;
}

.btn-root-approve {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    background: #0f172a;
    border: 1px solid #0f172a;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    padding: 9px 12px;
    border-radius: 8px;
    cursor: pointer;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    transition: all 0.15s ease;
}

.btn-root-approve:hover {
    background: #1e293b;
    border-color: #1e293b;
}

.btn-root-partial {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-size: 12px;
    font-weight: 600;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.15s ease;
}

.btn-root-partial:hover {
    background: #f8fafc;
    border-color: #94a3b8;
    color: #0f172a;
}

.btn-root-reject {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    background: #ffffff;
    border: 1px solid #fca5a5;
    color: #dc2626;
    font-size: 12px;
    font-weight: 600;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.15s ease;
}

.btn-root-reject:hover {
    background: #fef2f2;
    border-color: #f87171;
}

.circ-root-footer-note {
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px solid #f1f5f9;
}

.circ-root-note-title {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 10.5px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 3px;
}

.circ-root-note-text {
    font-size: 10.5px;
    color: #64748b;
    line-height: 1.4;
    margin: 0;
}

/* Audit Log Table Section */
.circ-audit-card {
    margin-top: 20px;
}

.circ-audit-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
}

.circ-audit-title-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.circ-audit-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: #f1f5f9;
    color: #475569;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.circ-audit-title {
    font-size: 15px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 2px 0;
}

.circ-audit-subtitle {
    font-size: 12px;
    color: #64748b;
    margin: 0;
}

.circ-audit-link {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    font-weight: 600;
    color: #0f172a;
    text-decoration: none;
    transition: color 0.15s;
}

.circ-audit-link:hover {
    color: #0284c7;
}

.circ-mono-time {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 12px;
    font-weight: 600;
    color: #0f172a;
}

.circ-actor-cell {
    display: flex;
    align-items: center;
    gap: 8px;
}

.circ-actor-avatar {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 700;
    color: #ffffff;
    flex-shrink: 0;
}

.circ-actor-avatar-amber {
    background: #d97706;
}

.circ-actor-avatar-gray {
    background: #64748b;
}

.circ-actor-avatar-dark {
    background: #0f172a;
    font-size: 8.5px;
}

.circ-actor-name {
    font-size: 12.5px;
    font-weight: 700;
    color: #0f172a;
}

.circ-action-title {
    font-size: 12.5px;
    font-weight: 700;
    color: #0f172a;
}

.circ-action-target {
    font-size: 11px;
    color: #64748b;
    margin-top: 1px;
}

.circ-impact-text {
    font-size: 12px;
    color: #334155;
}

.circ-impact-pill-red {
    display: inline-block;
    background: #fee2e2;
    color: #dc2626;
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
}

.circ-integrity-verified {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #059669;
    font-size: 11.5px;
    font-weight: 600;
}

.circ-integrity-teal {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #0f766e;
    font-size: 11.5px;
    font-weight: 600;
}

.circ-integrity-sync {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: #64748b;
    font-size: 11.5px;
    font-weight: 600;
}

/* Compliance Banner */
.circ-compliance-banner {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 24px;
    padding: 14px 18px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    font-size: 11.5px;
    color: #64748b;
}

.circ-compliance-left {
    display: flex;
    align-items: center;
    gap: 8px;
}

.circ-compliance-right {
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Modals */
.circ-modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(2px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    padding: 16px;
}

.circ-modal-content {
    background: #ffffff;
    border-radius: 14px;
    width: 100%;
    max-width: 540px;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    overflow: hidden;
    animation: circModalFadeIn 0.15s ease-out;
}

@keyframes circModalFadeIn {
    from { opacity: 0; transform: scale(0.97); }
    to { opacity: 1; transform: scale(1); }
}

.circ-modal-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px 24px;
    border-bottom: 1px solid #f1f5f9;
}

.circ-modal-title {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 2px 0;
}

.circ-modal-subtitle {
    font-size: 12px;
    color: #64748b;
    margin: 0;
}

.circ-modal-close {
    background: transparent;
    border: none;
    font-size: 18px;
    color: #94a3b8;
    cursor: pointer;
    line-height: 1;
    padding: 4px;
}

.circ-modal-close:hover {
    color: #0f172a;
}

.circ-modal-body {
    padding: 20px 24px;
}

.circ-modal-footer {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
    padding: 16px 24px;
    background: #f8fafc;
    border-top: 1px solid #f1f5f9;
}

.circ-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 14px;
}

.circ-form-group {
    margin-bottom: 14px;
}

.circ-form-label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: #334155;
    margin-bottom: 6px;
}

.circ-form-input {
    width: 100%;
    padding: 8px 12px;
    font-size: 13px;
    border: 1px solid #cbd5e1;
    border-radius: 7px;
    background: #ffffff;
    color: #0f172a;
    box-sizing: border-box;
}

.circ-form-input:focus {
    outline: none;
    border-color: #0f172a;
    box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.08);
}

.circ-form-hint {
    display: block;
    font-size: 11px;
    color: #64748b;
    margin-top: 4px;
}

.circ-alert-info {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    padding: 12px;
    font-size: 12px;
    color: #1e40af;
    line-height: 1.45;
    margin-bottom: 16px;
}

.circ-log-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    max-height: 380px;
    overflow-y: auto;
}

.circ-log-item {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 12px;
}

.circ-log-time {
    font-size: 11px;
    font-weight: 600;
    color: #64748b;
    margin-bottom: 4px;
}

.circ-log-event {
    font-size: 12.5px;
    color: #1e293b;
    line-height: 1.4;
    margin-bottom: 4px;
}

.circ-log-hash {
    font-family: monospace;
    font-size: 10.5px;
    color: #059669;
}

/* Responsiveness */
@media (max-width: 1200px) {
    .circ-layout-grid {
        grid-template-columns: 1fr;
    }
    .circ-stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .circ-policy-header {
        flex-direction: column;
    }
    .circ-policy-header-actions {
        width: 100%;
        justify-content: flex-start;
        flex-wrap: wrap;
    }
    .circ-stats-grid {
        grid-template-columns: 1fr;
    }
    .circ-form-row {
        grid-template-columns: 1fr;
    }
}
</style>

{{-- INTERACTIVE JAVASCRIPT SCOPED --}}
<script>
function openModal(id) {
    var el = document.getElementById(id);
    if (el) el.style.display = 'flex';
}

function closeModal(id) {
    var el = document.getElementById(id);
    if (el) el.style.display = 'none';
}

function switchCircTab(tabId, btn) {
    document.querySelectorAll('.circ-tab-btn').forEach(function(b) {
        b.classList.remove('active');
    });
    if (btn) btn.classList.add('active');

    if (tabId === 'matrix') {
        toast('Menampilkan Matriks Konfigurasi Aturan & Kuota Sirkulasi Aktif');
    } else if (tabId === 'anomaly') {
        toast('Memfilter 248 Kasus Anomali & Keterlambatan Sirkulasi Aktif');
    } else if (tabId === 'dispensation') {
        toast('Menampilkan Berkas Otorisasi Dispensasi & Pemutihan');
    } else if (tabId === 'rfid') {
        toast('Status Autogate & Gerbang RFID: 4 Turnstile Aktif & Terhubung');
    }
}

function openEditRuleModal(code, name, duration, quota, fine, renew, rare) {
    document.getElementById('edit-rule-code').value = code;
    document.getElementById('modal-rule-cat-name').innerText = name;
    document.getElementById('input-rule-duration').value = duration;
    document.getElementById('input-rule-quota').value = quota;
    document.getElementById('input-rule-fine').value = fine;
    document.getElementById('input-rule-renew').value = renew;
    document.getElementById('input-rule-rare').value = rare;
    openModal('modal-edit-circ-rule');
}

function saveCircRuleChanges(e) {
    e.preventDefault();
    var code = document.getElementById('edit-rule-code').value;
    var dur = document.getElementById('input-rule-duration').value;
    var quota = document.getElementById('input-rule-quota').value;
    var fine = document.getElementById('input-rule-fine').value;
    var renew = document.getElementById('input-rule-renew').value;
    var rare = document.getElementById('input-rule-rare').value;

    if (code === 'dosen') {
        document.getElementById('val-dur-dosen').innerText = dur;
        document.getElementById('val-quota-dosen').innerText = quota;
        document.getElementById('val-fine-dosen').innerText = Number(fine).toLocaleString('id-ID');
        document.getElementById('val-renew-dosen').innerText = renew + 'x';
    } else if (code === 'mhs_akhir') {
        document.getElementById('val-dur-mhs-akhir').innerText = dur;
        document.getElementById('val-quota-mhs-akhir').innerText = quota;
        document.getElementById('val-fine-mhs-akhir').innerText = Number(fine).toLocaleString('id-ID');
        document.getElementById('val-renew-mhs-akhir').innerText = renew + 'x';
    } else if (code === 'umum') {
        document.getElementById('val-dur-umum').innerText = dur;
        document.getElementById('val-quota-umum').innerText = quota;
        document.getElementById('val-fine-umum').innerText = Number(fine).toLocaleString('id-ID');
        document.getElementById('val-renew-umum').innerText = renew + 'x';
    } else if (code === 'pelajar') {
        document.getElementById('val-dur-pelajar').innerText = dur;
        document.getElementById('val-quota-pelajar').innerText = quota;
        document.getElementById('val-fine-pelajar').innerText = Number(fine).toLocaleString('id-ID');
        document.getElementById('val-renew-pelajar').innerText = renew + 'x';
    }

    closeModal('modal-edit-circ-rule');
    toast('Aturan berhasil diperbarui dan diselaraskan pada matriks sirkulasi!');
}

function handleRootDispensasi(action) {
    if (action === 'full') {
        if (confirm('Konfirmasi Setujui Pemutihan Penuh:\nBuka blokir akun Ahmad Fauzi (NIM: INX-2026-04118) dan hapus denda keterlambatan Rp 18.000?')) {
            toast('✓ Otorisasi Root Berhasil! Akun pemustaka telah diaktifkan kembali.');
        }
    } else if (action === 'partial') {
        if (confirm('Konfirmasi Dispensasi Sebagian:\nBeri potongan 50% denda (Tagihan disesuaikan menjadi Rp 9.000)?')) {
            toast('✓ Tagihan denda berhasil dipotong 50%. Menunggu konfirmasi pembayaran kasir.');
        }
    } else if (action === 'reject') {
        if (confirm('Konfirmasi Penolakan Usulan:\nTerapkan penalti normal dan pertahankan status freeze akun?')) {
            toast('Usulan dispensasi ditolak. Sanksi normal tetap berlaku.');
        }
    }
}

function exportKasdaReport() {
    toast('Mengekspor Laporan Retribusi Denda & Kas Daerah (.CSV)...');
    var csvContent = "data:text/csv;charset=utf-8,";
    csvContent += "ID Transaksi,Pemustaka,Kategori,Keterlambatan (Hari),Denda (Rp),Status Bayar,Waktu Validasi Kasda\n";
    csvContent += "TRX-DND-9812,Kevin Wijaya,Mahasiswa Umum,4,4000,Lunas QRIS,2026-11-06 09:45:02\n";
    csvContent += "TRX-DND-9811,Ahmad Fauzi,Mahasiswa Akhir,18,18000,Menunggu Pemutihan,2026-11-06 08:30:00\n";
    csvContent += "TRX-DND-9810,Dewi Sartika,Pelajar Mitra,2,1000,Lunas Kasir Loket,2026-11-05 14:15:30\n";

    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "Laporan_Retribusi_Denda_Kasda_INOVEXA.csv");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function exportCircAuditCsv() {
    toast('Mengunduh Log Audit Forensik Sirkulasi (.CSV)...');
    var csv = "Waktu,Aktor,Aksi,Sasaran,Dampak,Hash_Integritas\n";
    csv += "2026-11-06 11:20:14,Ari (Super Admin Root),Manual Override Kuota,Dr. Siti Rahmawati,5 -> 10 Eksemplar,8f3d1b4902a7c5e2194b6da0\n";
    csv += "2026-11-06 09:45:02,Budi Santoso (Petugas Loket 1),Pelunasan Denda,Kevin Wijaya,Rp 4.000 Lunas,a12c98d41098fe736b042\n";
    csv += "2026-11-06 08:30:00,Cron Daemon,Auto-Lockout,3 Anggota,Freeze Akun,c77e21fa680b54e38914d\n";

    var encoded = encodeURI("data:text/csv;charset=utf-8," + csv);
    var a = document.createElement("a");
    a.href = encoded;
    a.download = "Audit_Log_Sirkulasi_Forensik.csv";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
</script>
