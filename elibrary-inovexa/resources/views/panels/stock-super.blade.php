{{--
    Super Admin: Kelola Koleksi & Eksemplar Buku
    Figma Prototype Node: 285-2190
    INOVEXA Library Management System
--}}

<div class="super-stock-page">

    {{-- Breadcrumb persis Figma --}}
    <div class="super-stock-breadcrumb">
        <a href="{{ route('dashboard', 'ov') }}" class="super-stock-bread-link">Dashboard Super Admin</a>
        <span class="super-stock-bread-sep">›</span>
        <span class="super-stock-bread-current">Koleksi &amp; Eksemplar Buku</span>
    </div>

    {{-- Page Header --}}
    <div class="super-stock-header">
        <div class="super-stock-header-left">
            <div class="super-stock-badge-row">
                <span class="super-stock-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>OTORISASI MASTER BIBLIOGRAFI &amp; INVENTARIS ASET</span>
                </span>
            </div>
            <h1 class="super-stock-title">Kelola Master Koleksi Buku &amp; Eksemplar</h1>
            <p class="super-stock-desc">
                Pusat tata kelola pangkalan data bibliografi terpusat, pengawasan nomor panggil DDC, otorisasi penghapusan eksemplar aus/hilang, dan integrasi pangkalan data Perpustakaan Nasional RI.
            </p>
        </div>
        <div class="super-stock-header-actions">
            <button type="button" class="btn-stock-outline" onclick="toast('Memulai sinkronisasi data dengan INLISLite &amp; Perpustakaan Nasional...')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
                <span>Sinkronisasi INLISLite &amp; Perpusnas</span>
            </button>
            <button type="button" class="btn-stock-outline" onclick="toast('Membuka log audit penghapusan aset koleksi...')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                <span>Audit Log Penghapusan Aset</span>
            </button>
            <button type="button" class="btn-stock-primary" onclick="openModal('add-book-modal')" title="Tambah Bibliografi Baru">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </button>
        </div>
    </div>

    {{-- Stats Row 4-Card Grid --}}
    <div class="super-stock-stats-row">
        {{-- Card 1: Total Judul --}}
        <div class="super-stock-stat-card">
            <div class="super-stock-stat-top">
                <span class="super-stock-stat-label">TOTAL JUDUL BIBLIOGRAFI</span>
                <div class="super-stock-icon-box">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
            </div>
            <div class="super-stock-stat-val">12.450 <span class="stat-unit">Judul</span></div>
            <div class="super-stock-stat-sub">
                <span class="badge-green-sm">↗ +142 bulan ini</span>
                <span class="text-muted-sm">98.4% ISBN Resmi</span>
            </div>
        </div>

        {{-- Card 2: Total Eksemplar Fisik --}}
        <div class="super-stock-stat-card">
            <div class="super-stock-stat-top">
                <span class="super-stock-stat-label">TOTAL EKSEMPLAR FISIK</span>
                <div class="super-stock-icon-box">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
            </div>
            <div class="super-stock-stat-val">38.820 <span class="stat-unit">Item</span></div>
            <div class="super-stock-stat-sub">
                <span class="text-muted-sm">Nilai Aset: Rp 4,82 Miliar</span>
                <span class="badge-teal-sm">✓ Terverifikasi RFID</span>
            </div>
        </div>

        {{-- Card 3: Ketersediaan di Rak --}}
        <div class="super-stock-stat-card">
            <div class="super-stock-stat-top">
                <span class="super-stock-stat-label">KETERSEDIAAN DI RAK</span>
                <div class="super-stock-icon-box">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                </div>
            </div>
            <div class="super-stock-stat-val super-stock-stat-val--green">82.9% <span class="stat-unit">Sirkulasi</span></div>
            <div class="super-stock-stat-sub-row">
                <span>32.180 di rak</span>
                <span>5.490 dipinjam</span>
                <span>1.150 perbaikan</span>
            </div>
            <div class="super-stock-progress-track">
                <div class="super-stock-progress-fill" style="width: 82.9%"></div>
            </div>
        </div>

        {{-- Card 4: Usulan Write-Off --}}
        <div class="super-stock-stat-card super-stock-stat-card--warn">
            <div class="super-stock-stat-top">
                <span class="super-stock-stat-label">USULAN WRITE-OFF</span>
                <div class="super-stock-icon-box super-stock-icon-box--warn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#b45309" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
            </div>
            <div class="super-stock-stat-val super-stock-stat-val--warn">14 <span class="stat-unit">Judul Aset</span></div>
            <div class="super-stock-stat-sub">
                <span class="badge-orange-sm">Menunggu Validasi</span>
            </div>
        </div>
    </div>

    {{-- Main Two-Column Layout --}}
    <div class="super-stock-body">
        {{-- Left Column: Table & Filters --}}
        <div class="super-stock-main">

            {{-- Filter Tabs Persis Figma --}}
            <div class="super-stock-tabs">
                <button type="button" class="super-stock-tab active" onclick="filterStockTab('all', this)">Semua Koleksi (12.450)</button>
                <button type="button" class="super-stock-tab" onclick="filterStockTab('khusus', this)">Koleksi Khusus / Langka (320)</button>
                <button type="button" class="super-stock-tab" onclick="filterStockTab('writeoff', this)">
                    <span>Usulan Write-Off / Rusak</span>
                    <span class="tab-badge-orange">14</span>
                </button>
                <button type="button" class="super-stock-tab" onclick="filterStockTab('hilang', this)">Eksemplar Hilang (28)</button>
            </div>

            {{-- Search & Filter Bar --}}
            <div class="super-stock-filter-bar">
                <div class="super-stock-search">
                    <span style="color:#94a3b8;font-size:12px">🔍</span>
                    <input type="text" id="stock-search-input" placeholder="Cari Judul, Penulis, No. Barcode, ISBN, atau DDC..." onkeyup="filterStockTable()">
                </div>
                <select id="stock-ddc-select" class="super-stock-select" onchange="filterStockTable()">
                    <option value="all">Semua Kelas DDC (000 - 900)</option>
                    <option value="000">000 - Ilmu Komputer &amp; Riset</option>
                    <option value="100">100 - Filsafat &amp; Psikologi</option>
                    <option value="800">800 - Sastra &amp; Fiksi</option>
                    <option value="900">900 - Sejarah &amp; Geografi</option>
                </select>
                <select id="stock-status-select" class="super-stock-select" onchange="filterStockTable()">
                    <option value="all">Semua Status Otorisasi</option>
                    <option value="terverifikasi">Terverifikasi</option>
                    <option value="tinggi">Permintaan Tinggi</option>
                    <option value="kosong">Terbit (Kosong)</option>
                </select>
            </div>

            {{-- Bulk Action Bar --}}
            <div class="super-stock-bulkbar">
                <div class="super-stock-bulkbar-left">
                    <input type="checkbox" id="check-all-stock" checked style="accent-color:#0f172a;width:14px;height:14px;cursor:pointer" onchange="toggleSelectAllStock(this)">
                    <span id="bulk-stock-label"><b>Pilih 1 Item Terpilih</b></span>
                </div>
                <div class="super-stock-bulkbar-right">
                    <span style="color:#cbd5e1;padding:0 2px">|</span>
                    <button type="button" class="btn-bulk-action" onclick="toast('Mencetak barcode &amp; label RFID massal untuk item terpilih...')">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                        <span>Cetak Barcode &amp; RFID Massal</span>
                    </button>
                    <span style="color:#cbd5e1">|</span>
                    <button type="button" class="btn-bulk-action" onclick="toast('Mengekspor metadata MARC ke berkas XML...')">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        <span>Ekspor Metadata MARC</span>
                    </button>
                    <span style="color:#cbd5e1">|</span>
                    <button type="button" class="btn-bulk-danger" onclick="toast('PERINGATAN: Otorisasi hapus permanen memerlukan konfirmasi otoritas root.')">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        <span>Otorisasi Hapus Permanen</span>
                    </button>
                </div>
            </div>

            {{-- Main Table Persis Figma (No thumbnail cover column, pure typography) --}}
            <div class="super-stock-table-wrap">
                <table class="super-stock-table" id="stock-table">
                    <thead>
                        <tr>
                            <th style="width:36px"><input type="checkbox" checked onchange="toggleSelectAllStock(this)"></th>
                            <th style="width:40%">INFORMASI BUKU &amp; PENGARANG</th>
                            <th style="width:18%">DDC / KLASIFIKASI</th>
                            <th style="width:16%">EKSEMPLAR</th>
                            <th style="width:16%">STATUS ASET</th>
                            <th style="width:10%;text-align:right">TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Row 1: Laskar Pelangi (Selected) --}}
                        <tr class="super-stock-row super-stock-row--selected"
                            data-title="laskar pelangi"
                            data-author="andrea hirata"
                            data-isbn="978-979-3062-79-2"
                            data-ddc="899.221"
                            data-status="terverifikasi"
                            onclick="inspectStockBook('Laskar Pelangi', 'Andrea Hirata • Bentang Pustaka', 'Cetakan ke-34 (2021)', '899.221 (Fiksi Dewasa)', '899.221 HIR l', 'INX-EK-0994 · ISO 15693')">
                            <td><input type="checkbox" class="stock-row-check" checked onclick="event.stopPropagation(); updateStockSelectedCount();"></td>
                            <td>
                                <div class="stock-book-info">
                                    <span class="stock-title-text">Laskar Pelangi</span>
                                    <span class="stock-author-text">Andrea Hirata</span>
                                    <span class="stock-isbn-text">ISBN: 978-979-3062-79-2</span>
                                </div>
                            </td>
                            <td>
                                <div class="ddc-cell-wrap">
                                    <span class="ddc-pill">899.221</span>
                                    <span class="ddc-sub">Sastra Indonesia</span>
                                </div>
                            </td>
                            <td>
                                <div class="ex-cell-wrap">
                                    <b class="ex-num">5</b>
                                    <span class="ex-sub">3 Di Rak • 2 Pinjam</span>
                                </div>
                            </td>
                            <td>
                                <span class="stock-status-pill status-pill-green">
                                    <span>●</span>
                                    <span>Terverifikasi</span>
                                </span>
                            </td>
                            <td style="text-align:right" onclick="event.stopPropagation();">
                                <div class="action-btn-group">
                                    <button type="button" class="tbl-action-btn" title="Lihat detail koleksi" onclick="toast('Membuka detail bibliografi Laskar Pelangi...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                    <button type="button" class="tbl-action-btn" title="Konfigurasi metadata" onclick="toast('Membuka konfigurasi metadata MARC...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 2: Sapiens --}}
                        <tr class="super-stock-row"
                            data-title="sapiens: riwayat singkat umat manusia"
                            data-author="yuval noah harari"
                            data-isbn="978-602-424-416-3"
                            data-ddc="909"
                            data-status="terverifikasi"
                            onclick="inspectStockBook('Sapiens: Riwayat Singkat Umat Manusia', 'Yuval Noah Harari • KPG', 'Cetakan ke-12 (2022)', '909 (Sejarah Dunia)', '909 HAR s', 'INX-EK-0380 · ISO 15693')">
                            <td><input type="checkbox" class="stock-row-check" onclick="event.stopPropagation(); updateStockSelectedCount();"></td>
                            <td>
                                <div class="stock-book-info">
                                    <span class="stock-title-text">Sapiens: Riwayat Singkat Umat Manusia</span>
                                    <span class="stock-author-text">Yuval Noah Harari</span>
                                    <span class="stock-isbn-text">ISBN: 978-602-424-416-3</span>
                                </div>
                            </td>
                            <td>
                                <div class="ddc-cell-wrap">
                                    <span class="ddc-pill">909</span>
                                    <span class="ddc-sub">Sejarah Dunia</span>
                                </div>
                            </td>
                            <td>
                                <div class="ex-cell-wrap">
                                    <b class="ex-num">4</b>
                                    <span class="ex-sub">2 Di Rak • 2 Pinjam</span>
                                </div>
                            </td>
                            <td>
                                <span class="stock-status-pill status-pill-green">
                                    <span>●</span>
                                    <span>Terverifikasi</span>
                                </span>
                            </td>
                            <td style="text-align:right" onclick="event.stopPropagation();">
                                <div class="action-btn-group">
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka detail bibliografi Sapiens...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka konfigurasi metadata MARC...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 3: Atomic Habits --}}
                        <tr class="super-stock-row"
                            data-title="atomic habits"
                            data-author="james clear"
                            data-isbn="978-602-063-317-6"
                            data-ddc="158.1"
                            data-status="tinggi"
                            onclick="inspectStockBook('Atomic Habits', 'James Clear • Gramedia Pustaka Utama', 'Cetakan ke-18 (2023)', '158.1 (Pengembangan Diri)', '158.1 CLE a', 'INX-EK-0711 · ISO 15693')">
                            <td><input type="checkbox" class="stock-row-check" onclick="event.stopPropagation(); updateStockSelectedCount();"></td>
                            <td>
                                <div class="stock-book-info">
                                    <span class="stock-title-text">Atomic Habits</span>
                                    <span class="stock-author-text">James Clear</span>
                                    <span class="stock-isbn-text">ISBN: 978-602-063-317-6</span>
                                </div>
                            </td>
                            <td>
                                <div class="ddc-cell-wrap">
                                    <span class="ddc-pill">158.1</span>
                                    <span class="ddc-sub">Pengembangan Diri</span>
                                </div>
                            </td>
                            <td>
                                <div class="ex-cell-wrap">
                                    <b class="ex-num">6</b>
                                    <span class="ex-sub ex-sub--warn">1 Di Rak (Kritis) • 5 Pinjam</span>
                                </div>
                            </td>
                            <td>
                                <span class="stock-status-pill status-pill-orange">
                                    <span>🔥</span>
                                    <span>Permintaan Tinggi</span>
                                </span>
                            </td>
                            <td style="text-align:right" onclick="event.stopPropagation();">
                                <div class="action-btn-group">
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka detail bibliografi Atomic Habits...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka konfigurasi metadata MARC...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 4: Metodologi Penelitian Kualitatif --}}
                        <tr class="super-stock-row"
                            data-title="metodologi penelitian kualitatif"
                            data-author="prof. dr. sugiyono"
                            data-isbn="978-602-289-325-7"
                            data-ddc="001.42"
                            data-status="terverifikasi"
                            onclick="inspectStockBook('Metodologi Penelitian Kualitatif', 'Prof. Dr. Sugiyono • Alfabeta', 'Edisi Revisi (2021)', '001.42 (Metode Penelitian)', '001.42 SUG m', 'INX-EK-0412 · ISO 15693')">
                            <td><input type="checkbox" class="stock-row-check" onclick="event.stopPropagation(); updateStockSelectedCount();"></td>
                            <td>
                                <div class="stock-book-info">
                                    <span class="stock-title-text">Metodologi Penelitian Kualitatif</span>
                                    <span class="stock-author-text">Prof. Dr. Sugiyono</span>
                                    <span class="stock-isbn-text">ISBN: 978-602-289-325-7</span>
                                </div>
                            </td>
                            <td>
                                <div class="ddc-cell-wrap">
                                    <span class="ddc-pill">001.42</span>
                                    <span class="ddc-sub">Metode Penelitian</span>
                                </div>
                            </td>
                            <td>
                                <div class="ex-cell-wrap">
                                    <b class="ex-num">8</b>
                                    <span class="ex-sub">7 Di Rak • 1 Pinjam</span>
                                </div>
                            </td>
                            <td>
                                <span class="stock-status-pill status-pill-green">
                                    <span>●</span>
                                    <span>Terverifikasi</span>
                                </span>
                            </td>
                            <td style="text-align:right" onclick="event.stopPropagation();">
                                <div class="action-btn-group">
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka detail bibliografi...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka konfigurasi metadata MARC...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Row 5: Algoritma & Pemrograman C++ --}}
                        <tr class="super-stock-row"
                            data-title="algoritma & pemrograman c++"
                            data-author="rinaldi munir"
                            data-isbn="978-623-7131-45-8"
                            data-ddc="005.13"
                            data-status="kosong"
                            onclick="inspectStockBook('Algoritma & Pemrograman C++', 'Rinaldi Munir • Informatika', 'Edisi ke-5 (2020)', '005.13 (Pemrograman Komputer)', '005.13 MUN a', 'INX-EK-0820 · ISO 15693')">
                            <td><input type="checkbox" class="stock-row-check" onclick="event.stopPropagation(); updateStockSelectedCount();"></td>
                            <td>
                                <div class="stock-book-info">
                                    <span class="stock-title-text">Algoritma &amp; Pemrograman C++</span>
                                    <span class="stock-author-text">Rinaldi Munir</span>
                                    <span class="stock-isbn-text">ISBN: 978-623-7131-45-8</span>
                                </div>
                            </td>
                            <td>
                                <div class="ddc-cell-wrap">
                                    <span class="ddc-pill">005.13</span>
                                    <span class="ddc-sub">Pemrograman Komputer</span>
                                </div>
                            </td>
                            <td>
                                <div class="ex-cell-wrap">
                                    <b class="ex-num">3</b>
                                    <span class="ex-sub ex-sub--danger">0 Di Rak • Habis Dipinjam</span>
                                </div>
                            </td>
                            <td>
                                <span class="stock-status-pill status-pill-gray">
                                    <span>⌛</span>
                                    <span>Terbit (Kosong)</span>
                                </span>
                            </td>
                            <td style="text-align:right" onclick="event.stopPropagation();">
                                <div class="action-btn-group">
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka detail bibliografi...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    </button>
                                    <button type="button" class="tbl-action-btn" onclick="toast('Membuka konfigurasi metadata MARC...')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- Pagination Footer Persis Figma --}}
                <div class="super-stock-pagination">
                    <span>Menampilkan 5 dari 12.450 total bibliografi</span>
                    <div class="super-stock-pager">
                        <button type="button" class="pager-prev" onclick="toast('Halaman pertama')">Sebelumnya</button>
                        <button type="button" class="pager-page pager-page--active">1</button>
                        <button type="button" class="pager-page" onclick="toast('Menuju halaman 2')">2</button>
                        <button type="button" class="pager-page" onclick="toast('Menuju halaman 3')">3</button>
                        <span class="pager-dots">...</span>
                        <button type="button" class="pager-page" onclick="toast('Menuju halaman 2.490')">2.490</button>
                        <button type="button" class="pager-next" onclick="toast('Menuju halaman berikutnya')">Selanjutnya</button>
                    </div>
                </div>
            </div>

            {{-- Bottom Compliance Bar Persis Figma --}}
            <div class="super-stock-compliance">
                <div class="super-stock-compliance-left">
                    <span class="compliance-circle-icon">@</span>
                    <div>
                        <b>Kepatuhan Standar Tata Kelola Aset Perpustakaan Daerah &amp; Kearsipan Nasional</b>
                        <p>Sesuai UU No. 43/2007 tentang Perpustakaan &amp; Permendagri No. 19/2016 tentang Pedoman Pengelolaan Barang Milik Daerah (BMD).</p>
                    </div>
                </div>
                <div class="super-stock-compliance-right">
                    <span class="compliance-label">ENKRIPSI DATA: AES-256 GCM</span>
                </div>
            </div>

        </div>

        {{-- Right Column: Inspeksi Master Bibliografi Persis Figma --}}
        <div class="super-stock-sidebar">
            <div class="super-stock-sidebar-header">
                <span class="super-stock-sidebar-dot"></span>
                <div>
                    <div class="super-stock-sidebar-title">INSPEKSI MASTER BIBLIOGRAFI</div>
                    <div class="super-stock-sidebar-sub">OTORISASI ROOT</div>
                </div>
            </div>

            {{-- Spine Label RFID Card (Dark internal card inside white sidebar) --}}
            <div class="super-stock-rfid-card">
                <div class="super-stock-rfid-top">
                    <span class="super-stock-rfid-brand">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        <span>INOVEXA CENTRAL SPINE LABEL</span>
                    </span>
                </div>
                <div class="super-stock-rfid-call" id="inspect-call-num">899.221 HIR l</div>
                <div class="super-stock-rfid-barcode">
                    <svg viewBox="0 0 200 30" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        @php
                            $barSeeds = [3,1,4,1,5,9,2,6,5,3,5,8,9,7,9,3,2,3,8,4,6,2,6,4,3,3,8,3,2,7,9,5,0,2,8,8,4,1,9,7,1,6,9,3,9,9];
                            $bx = 0;
                            $isBar = true;
                        @endphp
                        @foreach($barSeeds as $bw)
                            @php $bwPx = ($bw % 3) + 1; @endphp
                            @if($isBar)
                                <rect x="{{ $bx }}" y="0" width="{{ $bwPx * 2 }}" height="30" fill="#000"/>
                            @endif
                            @php $bx += $bwPx * 2; $isBar = !$isBar; @endphp
                        @endforeach
                    </svg>
                    <div class="super-stock-rfid-uid" id="inspect-rfid-uid">INX-EK-0994 · ISO 15693</div>
                </div>
                <div class="super-stock-rfid-footer">Enkripsi Master Tag: ISO 15693</div>
            </div>

            {{-- Book Detail Info --}}
            <div class="super-stock-detail-book">
                <h3 class="super-stock-detail-title" id="inspect-book-title">Laskar Pelangi</h3>
                <div class="super-stock-detail-author" id="inspect-book-author">Andrea Hirata • Bentang Pustaka</div>
                <div class="super-stock-detail-grid">
                    <div>
                        <span class="detail-label">Edisi / Cetakan</span>
                        <b id="inspect-book-edition">Cetakan ke-34 (2021)</b>
                    </div>
                    <div>
                        <span class="detail-label">Klasifikasi DDC</span>
                        <b id="inspect-book-ddc">899.221 (Fiksi Dewasa)</b>
                    </div>
                </div>
            </div>

            {{-- Daftar 5 Eksemplar Fisik --}}
            <div class="super-stock-ex-list-title">DAFTAR 5 EKSEMPLAR FISIK</div>
            <div class="super-stock-ex-list">
                <div class="super-stock-ex-item">
                    <span class="ex-radio-dot ex-radio-dot--orange"></span>
                    <span>INX-EK-0994-01</span>
                    <span class="ex-status-tag ex-status-tag--green">Di Rak</span>
                </div>
                <div class="super-stock-ex-item">
                    <span class="ex-radio-dot ex-radio-dot--orange"></span>
                    <span>INX-EK-0994-02</span>
                    <span class="ex-status-tag ex-status-tag--orange">Dipinjam</span>
                </div>
                <div class="super-stock-ex-item">
                    <span class="ex-radio-dot ex-radio-dot--orange"></span>
                    <span>INX-EK-0994-03</span>
                    <span class="ex-status-tag ex-status-tag--orange">Dipinjam</span>
                </div>
                <div class="super-stock-ex-item">
                    <span class="ex-radio-dot ex-radio-dot--orange"></span>
                    <span>INX-EK-0994-04</span>
                    <span class="ex-status-tag ex-status-tag--green">Di Rak</span>
                </div>
            </div>

            {{-- Kebijakan & Otorisasi Koleksi --}}
            <div class="super-stock-policy-section">
                <div class="super-stock-policy-title">KEBIJAKAN &amp; OTORISASI KOLEKSI</div>
                <div class="super-stock-policy-list">
                    <div class="super-stock-policy-item">
                        <span>Sirkulasi Terbuka Pemustaka</span>
                        <input type="checkbox" checked class="stock-toggle-switch">
                    </div>
                    <div class="super-stock-policy-item">
                        <span>Koleksi Khusus / Hanya Baca di Tempat</span>
                        <input type="checkbox" class="stock-toggle-switch">
                    </div>
                    <div class="super-stock-policy-item">
                        <span>Kunci Sinkronisasi Metadata</span>
                        <input type="checkbox" checked class="stock-toggle-switch">
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="super-stock-sidebar-actions">
                <button type="button" class="btn-sidebar-primary" onclick="toast('Membuka editor metadata MARC bibliografi...')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    <span>Edit Metadata Bibliografi</span>
                </button>
                <button type="button" class="btn-sidebar-secondary" onclick="toast('Membuka jejak audit riwayat eksemplar...')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span>Lihat Jejak Audit Eksemplar</span>
                </button>
                <button type="button" class="btn-sidebar-danger" onclick="toast('PERINGATAN: Otorisasi write-off permanen memerlukan konfirmasi otoritas root.')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    <span>Hapus Permanen Koleksi (Write-Off)</span>
                </button>
            </div>

            {{-- Integrasi Perpusnas --}}
            <div class="super-stock-integration-info">
                <div class="super-stock-integration-row">
                    <span class="integration-dot"></span>
                    <span>Pangkalan Data Perpustakaan Nasional (INLISLite)</span>
                </div>
                <div class="super-stock-integration-row">
                    <span class="integration-dot integration-dot--blue"></span>
                    <span>SHA-256 Hash Catalog Record Check</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add Book Modal --}}
<div class="modal" id="add-book-modal" role="dialog" aria-modal="true" onclick="if(event.target===this)closeModal('add-book-modal')">
    <div class="modal-box">
        <button class="modal-close" type="button" onclick="closeModal('add-book-modal')">×</button>
        <div class="lbl">SUPER ADMIN • MASTER BIBLIOGRAFI</div>
        <h2 style="margin:4px 0 14px">Tambah Judul / Eksemplar Baru</h2>
        <form method="POST" action="{{ route('stock.add') }}">
            @csrf
            <label class="form-label">Judul Buku <span style="color:#dc2626">*</span></label>
            <input class="form-input" type="text" name="t" placeholder="Masukkan judul lengkap..." required>
            <label class="form-label" style="margin-top:10px">Pengarang <span style="color:#dc2626">*</span></label>
            <input class="form-input" type="text" name="a" placeholder="Nama pengarang utama..." required>
            <label class="form-label" style="margin-top:10px">ISBN</label>
            <input class="form-input" type="text" placeholder="978-xxx-xxx-xxx-x">
            <label class="form-label" style="margin-top:10px">Klasifikasi DDC</label>
            <input class="form-input" type="text" placeholder="Contoh: 899.221">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:10px">
                <div>
                    <label class="form-label">Penerbit</label>
                    <input class="form-input" type="text" placeholder="Nama penerbit...">
                </div>
                <div>
                    <label class="form-label">Tahun Terbit</label>
                    <input class="form-input" type="number" placeholder="{{ date('Y') }}">
                </div>
            </div>
            <button class="btn" type="submit" style="width:100%;margin-top:16px;background:#0f172a;color:#fff;border-radius:8px">
                + Daftarkan ke Master Bibliografi
            </button>
        </form>
    </div>
</div>

{{-- Interaktivitas Client-Side --}}
<script>
    function filterStockTab(tab, btn) {
        document.querySelectorAll('.super-stock-tab').forEach(b => b.classList.remove('active'));
        if (btn) btn.classList.add('active');
        const rows = document.querySelectorAll('#stock-table tbody tr');
        rows.forEach(r => {
            if (tab === 'all') r.style.display = '';
            else if (tab === 'khusus') r.style.display = (r.dataset.status === 'terverifikasi') ? '' : 'none';
            else if (tab === 'writeoff') r.style.display = (r.dataset.status === 'kosong') ? '' : 'none';
            else if (tab === 'hilang') r.style.display = (r.dataset.status === 'tinggi') ? '' : 'none';
        });
    }

    function filterStockTable() {
        const query = (document.getElementById('stock-search-input').value || '').toLowerCase().trim();
        const ddc = document.getElementById('stock-ddc-select').value;
        const status = document.getElementById('stock-status-select').value;
        const rows = document.querySelectorAll('#stock-table tbody tr');

        rows.forEach(r => {
            const title = r.dataset.title || '';
            const author = r.dataset.author || '';
            const isbn = r.dataset.isbn || '';
            const rDdc = r.dataset.ddc || '';
            const rStatus = r.dataset.status || '';

            const matchQuery = !query || title.includes(query) || author.includes(query) || isbn.includes(query) || rDdc.includes(query);
            const matchDdc = ddc === 'all' || rDdc.startsWith(ddc.substring(0, 1));
            const matchStatus = status === 'all' || rStatus === status;

            if (matchQuery && matchDdc && matchStatus) r.style.display = '';
            else r.style.display = 'none';
        });
    }

    function toggleSelectAllStock(master) {
        const boxes = document.querySelectorAll('.stock-row-check');
        boxes.forEach(b => {
            b.checked = master.checked;
            const row = b.closest('tr');
            if (master.checked) row.classList.add('super-stock-row--selected');
            else row.classList.remove('super-stock-row--selected');
        });
        updateStockSelectedCount();
    }

    function updateStockSelectedCount() {
        const checked = document.querySelectorAll('.stock-row-check:checked').length;
        const label = document.getElementById('bulk-stock-label');
        if (label) {
            label.innerHTML = '<b>Pilih ' + checked + ' Item Terpilih</b>';
        }
        document.querySelectorAll('.stock-row-check').forEach(b => {
            const row = b.closest('tr');
            if (b.checked) row.classList.add('super-stock-row--selected');
            else row.classList.remove('super-stock-row--selected');
        });
    }

    function inspectStockBook(title, author, edition, ddc, callNum, uid) {
        const titleEl = document.getElementById('inspect-book-title');
        const authorEl = document.getElementById('inspect-book-author');
        const edEl = document.getElementById('inspect-book-edition');
        const ddcEl = document.getElementById('inspect-book-ddc');
        const callEl = document.getElementById('inspect-call-num');
        const uidEl = document.getElementById('inspect-rfid-uid');

        if (titleEl) titleEl.textContent = title;
        if (authorEl) authorEl.textContent = author;
        if (edEl) edEl.textContent = edition;
        if (ddcEl) ddcEl.textContent = ddc;
        if (callEl) callEl.textContent = callNum;
        if (uidEl) uidEl.textContent = uid;
    }
</script>
