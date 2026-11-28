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
                    <button type="button" class="btn-bulk-action" onclick="window.location.href='{{ route('super.export.books') }}'">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                        <span>Ekspor Data Koleksi (.CSV)</span>
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
                        @foreach($lib->books as $bIdx => $b)
                        @php
                            $totalCopies = $b['st_total'] ?? ($b['st'] ?? 5);
                            $available = $b['st'] ?? 0;
                            $loaned = max(0, $totalCopies - $available);
                            $isbn = $b['isbn'] ?? ('978-602-' . str_pad($b['id'], 3, '0', STR_PAD_LEFT) . '-019-2');
                            $ddc = $b['ddc'] ?? (match($b['c'] ?? 'Umum') {
                                'Teknologi' => '005.13',
                                'Sains' => '500',
                                'Fiksi' => '899.221',
                                'Sejarah' => '909',
                                'Pengembangan Diri' => '158.1',
                                default => '020'
                            });
                            $callNum = $ddc . ' ' . strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $b['a'] ?? 'AUT'), 0, 3)) . ' ' . strtolower(substr(preg_replace('/[^a-zA-Z]/', '', $b['t'] ?? 't'), 0, 1));
                            $rfidUid = 'INX-EK-' . str_pad($b['id'], 4, '0', STR_PAD_LEFT) . ' · ISO 15693';
                            $statusType = $available === 0 ? 'kosong' : ($available <= 1 ? 'tinggi' : 'terverifikasi');
                        @endphp
                        <tr class="super-stock-row {{ $bIdx === 0 ? 'super-stock-row--selected' : '' }}"
                            data-id="{{ $b['id'] }}"
                            data-title="{{ strtolower($b['t']) }}"
                            data-author="{{ strtolower($b['a']) }}"
                            data-isbn="{{ strtolower($isbn) }}"
                            data-ddc="{{ $ddc }}"
                            data-status="{{ $statusType }}"
                            onclick="inspectStockBook('{{ addslashes($b['t']) }}', '{{ addslashes($b['a']) }} • Penerbit Inovexa', 'Cetakan Master', '{{ $ddc }} ({{ addslashes($b['c'] ?? 'Umum') }})', '{{ $callNum }}', '{{ $rfidUid }}', {{ $b['id'] }})">
                            <td><input type="checkbox" class="stock-row-check" {{ $bIdx === 0 ? 'checked' : '' }} onclick="event.stopPropagation(); updateStockSelectedCount();"></td>
                            <td>
                                <div class="stock-book-info">
                                    <span class="stock-title-text">{{ $b['t'] }}</span>
                                    <span class="stock-author-text">{{ $b['a'] }}</span>
                                    <span class="stock-isbn-text">ISBN: {{ $isbn }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="ddc-cell-wrap">
                                    <span class="ddc-pill">{{ $ddc }}</span>
                                    <span class="ddc-sub">{{ $b['c'] ?? 'Katalog Umum' }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="ex-cell-wrap">
                                    <b class="ex-num">{{ $totalCopies }}</b>
                                    <span class="ex-sub {{ $available === 0 ? 'ex-sub--danger' : ($available <= 1 ? 'ex-sub--warn' : '') }}">
                                        {{ $available }} Di Rak • {{ $loaned }} Pinjam
                                    </span>
                                </div>
                            </td>
                            <td>
                                @if($statusType === 'terverifikasi')
                                    <span class="stock-status-pill status-pill-green">
                                        <span>●</span>
                                        <span>Terverifikasi</span>
                                    </span>
                                @elseif($statusType === 'tinggi')
                                    <span class="stock-status-pill status-pill-orange">
                                        <span>🔥</span>
                                        <span>Permintaan Tinggi</span>
                                    </span>
                                @else
                                    <span class="stock-status-pill status-pill-gray">
                                        <span>⌛</span>
                                        <span>Terbit (Kosong)</span>
                                    </span>
                                @endif
                            </td>
                            <td style="text-align:right" onclick="event.stopPropagation();">
                                <div class="action-btn-group" style="display:inline-flex;gap:4px;align-items:center">
                                    <form action="{{ route('super.book.add_copy', $b['id']) }}" method="POST" style="display:inline;margin:0" title="Tambah 1 Eksemplar Fisik">
                                        @csrf
                                        <button type="submit" class="tbl-action-btn" style="color:#059669;font-weight:700;font-size:11px;padding:3px 6px">
                                            +1 Eks
                                        </button>
                                    </form>
                                    <button type="button" class="tbl-action-btn" title="Edit Metadata" onclick="openEditBookModal({{ $b['id'] }}, '{{ addslashes($b['t']) }}', '{{ addslashes($b['a']) }}', '{{ addslashes($b['c'] ?? 'Umum') }}', {{ $totalCopies }}, {{ $available }})">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                    </button>
                                    <form action="{{ route('super.book.delete', $b['id']) }}" method="POST" style="display:inline;margin:0" onsubmit="return confirm('Hapus permanen koleksi {{ addslashes($b['t']) }} dari pangkalan data inventaris?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="tbl-action-btn" style="color:#dc2626" title="Hapus Koleksi (Write-Off)">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
                <button type="button" class="btn-sidebar-primary" onclick="openEditCurrentBook()">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    <span>Edit Metadata Bibliografi</span>
                </button>
                <a href="{{ route('dashboard', 'sys') }}" class="btn-sidebar-secondary" style="text-decoration:none;display:inline-flex;align-items:center;justify-content:center;gap:6px">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span>Lihat Jejak Audit Eksemplar</span>
                </a>
                <form id="delete-book-form" action="{{ route('super.book.delete', $lib->books[0]['id'] ?? 1) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permanen koleksi buku ini dari inventaris?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-sidebar-danger" style="width:100%">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                        <span>Hapus Permanen Koleksi (Write-Off)</span>
                    </button>
                </form>
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
        <form method="POST" action="{{ route('super.book.create') }}">
            @csrf
            <label class="form-label">Judul Buku <span style="color:#dc2626">*</span></label>
            <input class="form-input" type="text" name="t" placeholder="Masukkan judul lengkap..." required>
            <label class="form-label" style="margin-top:10px">Pengarang <span style="color:#dc2626">*</span></label>
            <input class="form-input" type="text" name="a" placeholder="Nama pengarang utama..." required>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:10px">
                <div>
                    <label class="form-label">Kategori</label>
                    <select class="form-input" name="c">
                        <option value="Teknologi">Teknologi &amp; Komputer</option>
                        <option value="Sains">Sains &amp; Riset</option>
                        <option value="Fiksi">Sastra &amp; Fiksi</option>
                        <option value="Sejarah">Sejarah &amp; Budaya</option>
                        <option value="Pengembangan Diri">Pengembangan Diri</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Jumlah Eksemplar</label>
                    <input class="form-input" type="number" name="st_total" value="5" min="1" required>
                </div>
            </div>
            <div style="margin-top:10px">
                <label class="form-label">Tersedia di Rak Awal</label>
                <input class="form-input" type="number" name="st" value="5" min="0" required>
            </div>
            <button class="btn" type="submit" style="width:100%;margin-top:16px;background:#0f172a;color:#fff;border-radius:8px">
                + Daftarkan ke Master Bibliografi
            </button>
        </form>
    </div>
</div>

{{-- Edit Book Modal --}}
<div class="modal" id="edit-book-modal" role="dialog" aria-modal="true" onclick="if(event.target===this)closeModal('edit-book-modal')">
    <div class="modal-box">
        <button class="modal-close" type="button" onclick="closeModal('edit-book-modal')">×</button>
        <div class="lbl">SUPER ADMIN • MASTER BIBLIOGRAFI</div>
        <h2 style="margin:4px 0 14px">Edit Metadata Koleksi Buku</h2>
        <form method="POST" action="{{ route('super.book.update') }}">
            @csrf
            <input type="hidden" name="id" id="edit-book-id">
            <label class="form-label">Judul Buku <span style="color:#dc2626">*</span></label>
            <input class="form-input" type="text" name="t" id="edit-book-t" required>
            <label class="form-label" style="margin-top:10px">Pengarang <span style="color:#dc2626">*</span></label>
            <input class="form-input" type="text" name="a" id="edit-book-a" required>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-top:10px">
                <div>
                    <label class="form-label">Kategori</label>
                    <select class="form-input" name="c" id="edit-book-c">
                        <option value="Teknologi">Teknologi &amp; Komputer</option>
                        <option value="Sains">Sains &amp; Riset</option>
                        <option value="Fiksi">Sastra &amp; Fiksi</option>
                        <option value="Sejarah">Sejarah &amp; Budaya</option>
                        <option value="Pengembangan Diri">Pengembangan Diri</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Total Eksemplar</label>
                    <input class="form-input" type="number" name="st_total" id="edit-book-st-total" min="1" required>
                </div>
            </div>
            <div style="margin-top:10px">
                <label class="form-label">Stok Tersedia di Rak</label>
                <input class="form-input" type="number" name="st" id="edit-book-st" min="0" required>
            </div>
            <button class="btn" type="submit" style="width:100%;margin-top:16px;background:#059669;color:#fff;border-radius:8px">
                Simpan Perubahan Metadata
            </button>
        </form>
    </div>
</div>

{{-- Interaktivitas Client-Side --}}
<script>
    let currentSelectedBook = {
        id: {{ $lib->books[0]['id'] ?? 1 }},
        t: '{{ addslashes($lib->books[0]['t'] ?? 'Laskar Pelangi') }}',
        a: '{{ addslashes($lib->books[0]['a'] ?? 'Andrea Hirata') }}',
        c: '{{ addslashes($lib->books[0]['c'] ?? 'Fiksi') }}',
        st_total: {{ $lib->books[0]['st_total'] ?? 5 }},
        st: {{ $lib->books[0]['st'] ?? 3 }}
    };

    function openEditBookModal(id, t, a, c, st_total, st) {
        document.getElementById('edit-book-id').value = id;
        document.getElementById('edit-book-t').value = t;
        document.getElementById('edit-book-a').value = a;
        document.getElementById('edit-book-c').value = c;
        document.getElementById('edit-book-st-total').value = st_total;
        document.getElementById('edit-book-st').value = st;
        openModal('edit-book-modal');
    }

    function openEditCurrentBook() {
        if (currentSelectedBook) {
            openEditBookModal(
                currentSelectedBook.id,
                currentSelectedBook.t,
                currentSelectedBook.a,
                currentSelectedBook.c,
                currentSelectedBook.st_total,
                currentSelectedBook.st
            );
        } else {
            toast('Pilih buku dari tabel terlebih dahulu.');
        }
    }

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

    function inspectStockBook(title, author, edition, ddc, callNum, uid, id) {
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

        if (id) {
            currentSelectedBook.id = id;
            currentSelectedBook.t = title;
            currentSelectedBook.a = author.split(' • ')[0] || '';
            const deleteForm = document.getElementById('delete-book-form');
            if (deleteForm) {
                deleteForm.action = '{{ url("super/book") }}/' + id;
            }
        }
    }
</script>
