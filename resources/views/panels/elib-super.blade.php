@php
    /*
     | Pusat Repositori Digital & Otorisasi DRM — KONSOL SUPER ADMIN (ROOT)
     | Implementasi frame Figma "Kelola e library" (node 285:10849).
     */
    $tabs = [
        ['label' => 'Semua E-Resource (6.000)', 'active' => true],
        ['label' => 'E-Book & Monograf (4.200)'],
        ['label' => 'Jurnal & Riset (1.550)'],
        ['label' => 'Audiobook (250)'],
    ];

    $collections = !empty($lib->ebooks) ? $lib->ebooks : [
        [
            'id' => 1,
            'badge' => 'PDF/EPUB', 'badgeClass' => 'neutral',
            'title' => 'Metodologi Penelitian Terapan & Analisis Data',
            'tag' => 'UNLIMITED MULTI-USER', 'tagClass' => 'ok',
            'line' => 'Dr. Ir. Hendra S., M.Sc. &bull; Inovexa Press (2025) &bull; ISBN: 978-623-01-4412-8 &bull; 48.2 MB',
            'foot' => 'Watermark Dinamis Aktif (IP &amp; NIA) &bull; 1.420x diunduh &amp; dibaca',
            'progress' => null,
            'drm_enabled' => true,
        ],
        [
            'id' => 2,
            'badge' => 'EPUB 3.0', 'badgeClass' => 'peach',
            'title' => 'Principles of Modern Software Engineering (10th Ed)',
            'tag' => '50 KONKUREN SESI', 'tagClass' => 'neutral',
            'line' => 'Ian Sommerville &bull; Pearson International License &bull; ISBN: 978-013-394303-0 &bull; 24.8 MB',
            'foot' => 'Adobe Content Server LCP Proteksi Ketat',
            'progress' => ['label' => '38 / 50 kuota sedang aktif terpakai', 'pct' => 76],
            'drm_enabled' => true,
        ],
        [
            'id' => 3,
            'badge' => 'EPUB+AUDIO', 'badgeClass' => 'neutral',
            'title' => 'Filosofi Teras: Panduan Praktis Mental Tangguh',
            'tag' => 'KOMPAS GRAMEDIA (TIER A)', 'tagClass' => 'neutral',
            'line' => 'Henry Manampiring &bull; Penerbit Buku Kompas &bull; ISBN: 978-602-412-518-9 &bull; 18.5 MB',
            'foot' => 'Read-Only Web &amp; Mobile Sandboxed Reader &bull; 820x dibaca &bull; 0 unduh offline diizinkan',
            'progress' => null,
            'drm_enabled' => true,
        ],
        [
            'id' => 4,
            'badge' => 'JOURNAL', 'badgeClass' => 'neutral',
            'title' => 'Jurnal Riset Kecerdasan Buatan Terapan Vol. 14 No. 2',
            'tag' => 'OPEN ACCESS (CC-BY 4.0)', 'tagClass' => 'ok',
            'line' => 'SCOPUS Q2 / SINTA 1 &bull; Pusat Publikasi BRIN &amp; Inovexa Research &bull; DOI: 10.14710/jkat.v14i2.2026 &bull; 14.1 MB',
            'foot' => 'Public Watermark Repo &amp; OAI-PMH Harvester Enabled &bull; 2.840x unduhan sitasi',
            'progress' => null,
            'drm_enabled' => false,
        ],
    ];

    $drmPolicies = [
        ['title' => 'Anti-Screen Capture &amp; Cetak', 'desc' => 'Memblokir Print Screen, OBS, dan ekstensi perekam browser.', 'on' => true],
        ['title' => 'Watermark Dinamis Transparan', 'desc' => 'Menyisipkan NIA pemustaka, cap waktu, dan alamat IP pada tiap lembar.', 'on' => true],
        ['title' => 'Batas Maks. Unduh Offline Mobile', 'desc' => 'Maksimal 3 Dokumen dengan masa berlaku sandboxed 14 hari.', 'on' => true],
        ['title' => 'Auto-Revoke Pelanggaran Anomali', 'desc' => 'Pencabutan token baca instan bila terdeteksi scraping atau bot.', 'on' => true],
    ];
@endphp

<link rel="stylesheet" href="{{ asset('css/super-panels.css') }}?v={{ filemtime(public_path('css/super-panels.css')) }}">

<div class="sx-page">
    <header class="sx-head">
        <div class="sx-head-main">
            <nav class="sx-crumbs">
                <a href="{{ route('dashboard', 'ov') }}">Dashboard Super Admin</a>
                <span class="sep">/</span>
                <span class="current">Kelola E-Library</span>
            </nav>

            <h1 class="sx-h1">Pusat Repositori Digital &amp;<br>Otorisasi DRM</h1>
            <p class="sx-desc">
                Pengendalian terpusat atas 6.000 monograf, jurnal bereputasi, lisensi penerbit komersial,
                dan proteksi kekayaan intelektual digital Inovexa Regional Library Network.
            </p>
        </div>

        <div class="sx-actions row" style="max-width:430px;justify-content:flex-end">
            <button type="button" class="sx-btn sx-btn-soft" onclick="window.location.href='{{ route('dashboard', 'sys') }}'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                Audit Akses DRM
            </button>
            <button type="button" class="sx-btn sx-btn-soft" onclick="toast('Sinkronisasi CDN Edge &amp; Cloud Storage selesai (0 latency).')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 12a9 9 0 1 1-3-6.7"/><path d="M21 3v6h-6"/></svg>
                Sinkronisasi Cloud Storage
            </button>
            <button type="button" class="sx-btn sx-btn-dark" style="width:100%" onclick="openModal('modal-upload-ebook')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m17 8-5-5-5 5"/><path d="M12 3v12"/></svg>
                + Unggah Master E-Book &amp; Jurnal
            </button>
        </div>
    </header>

    <section class="sx-kpis">
        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">TOTAL JUDUL &amp;<br>REPOSITORI</span>
                <span class="sx-kpi-icon">
                    <svg width="15" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">6.000 <small>Judul</small></div>
            <div class="sx-kpi-sub"><b style="color:var(--sx-sage)">&#8593; +320 judul bulan ini</b></div>
            <div class="sx-kpi-sub" style="font-size:11.5px;color:var(--sx-mute)">EPUB, PDF A-1b, Scopus Q1-Q4, Audiobook M4B</div>
        </article>

        <article class="sx-kpi tone-orange">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">LISENSI DRM &amp;<br>KUOTA MITRA</span>
                <span class="sx-kpi-icon orange">
                    <svg width="15" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">84 <small class="mute">/ 90 Aktif</small></div>
            <div class="sx-kpi-split"><span style="color:var(--sx-amber)">93.3% Kepatuhan Kuota</span><span>6 Menunggu Perpanjangan</span></div>
            <div class="sx-kpi-track"><i class="orange" style="width:93%"></i></div>
        </article>

        <article class="sx-kpi tone-mint">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">OBJECT STORAGE<br>&amp; CDN</span>
                <span class="sx-kpi-icon">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">3.8 <small class="mute">/ 10 TB</small></div>
            <div class="sx-kpi-sub">AWS S3 + Cloudflare R2 &bull; Latensi 42ms</div>
            <div class="sx-kpi-track"><i class="dark" style="width:38%"></i></div>
        </article>

        <article class="sx-kpi tone-mint">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">AKSES BACA<br>KONKUREN</span>
                <span class="sx-kpi-icon mint">
                    <svg width="17" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">842 <small class="mute">Sesi Aktif</small></div>
            <div class="sx-kpi-split"><span>Puncak: 1.450 Sesi/Hari</span><span style="color:#b91c1c">0 Pelanggaran</span></div>
            <div class="sx-kpi-track"><i style="width:58%"></i></div>
        </article>
    </section>

    <div class="sx-split-8-4">
        <div class="sx-col">
            <div class="sx-tabs">
                @foreach ($tabs as $tab)
                    <button type="button" class="sx-tab {{ ! empty($tab['active']) ? 'active' : '' }}" onclick="sxTab(this)">{{ $tab['label'] }}</button>
                @endforeach
            </div>

            <section class="sx-card">
                <div class="sx-card-head">
                    <div class="sx-card-title-group">
                        <span class="sx-swatch dark"></span>
                        <b style="font-size:12.5px;color:var(--sx-ink)">Batch Actions:</b>
                        <button type="button" class="sx-btn sx-btn-sm sx-btn-muted" onclick="window.location.href='{{ route('super.export.books') }}'">Ekspor Metadata MARC21 (.CSV)</button>
                    </div>
                </div>

                <div class="sx-toolbar">
                    <div class="sx-search">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
                        <input class="sx-input" type="text" placeholder="Cari ISBN/ISSN, judul, pengarang, DOI, atau ID digital...">
                    </div>
                    <select class="sx-select" style="max-width:190px">
                        <option>Semua Lisensi (All)</option>
                        <option>Unlimited Multi-User</option>
                        <option>Limited Concurrent</option>
                        <option>Open Access</option>
                    </select>
                    <select class="sx-select" style="max-width:180px">
                        <option>Status DRM: Semua</option>
                        <option>DRM Aktif</option>
                        <option>Tanpa DRM</option>
                    </select>
                </div>

                <div style="display:flex;flex-direction:column;gap:10px">
                    @foreach ($collections as $item)
                        <article class="sx-card" style="padding:16px;gap:10px;box-shadow:none;border:1px solid var(--sx-line)">
                            <div style="display:flex;gap:14px;align-items:flex-start">
                                <div style="width:54px;min-height:64px;border-radius:8px;background:var(--sx-bg);border:1px solid var(--sx-line);display:grid;place-items:center;flex-shrink:0;text-align:center;padding:6px">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="1.7" stroke-linecap="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                                    <span style="font-size:7.5px;font-weight:800;letter-spacing:.4px;color:var(--sx-mute);margin-top:4px">{{ $item['badge'] ?? 'PDF' }}</span>
                                </div>

                                <div style="flex:1;min-width:0">
                                    <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:10px;flex-wrap:wrap">
                                        <div style="min-width:0">
                                            <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap">
                                                <b style="font-size:13px;color:var(--sx-ink)">{{ $item['title'] }}</b>
                                                <span class="sx-badge {{ $item['tagClass'] ?? 'ok' }}">{{ $item['tag'] ?? 'DIGITAL' }}</span>
                                            </div>
                                            <p style="margin:4px 0 0;font-size:11px;line-height:1.5;color:var(--sx-mute)">{!! $item['line'] !!}</p>
                                        </div>
                                        <div style="display:flex;gap:6px;flex-shrink:0;align-items:center">
                                            <a href="{{ route('elib.read', $item['id'] ?? 1) }}" class="sx-btn sx-btn-sm" style="padding:6px 9px;text-decoration:none;display:inline-flex;align-items:center" title="Pratinjau / Baca">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
                                            </a>
                                            <form action="{{ route('super.elib.drm', $item['id'] ?? 1) }}" method="POST" style="display:inline;margin:0">
                                                @csrf
                                                <button type="submit" class="sx-btn sx-btn-sm" style="font-weight:700;font-size:11px" title="Ubah Kebijakan Proteksi DRM">
                                                    {{ !empty($item['drm_enabled']) ? '🛡️ DRM: ON' : '🔓 Open' }}
                                                </button>
                                            </form>
                                            @if(!empty($item['id']) && $item['id'] > 2)
                                            <form action="{{ route('super.elib.delete', $item['id']) }}" method="POST" style="display:inline;margin:0" onsubmit="return confirm('Hapus aset digital {{ addslashes($item['title']) }} dari repositori?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="sx-btn sx-btn-sm" style="color:#dc2626;padding:6px 8px;font-size:11px" title="Hapus Aset">
                                                    ✕
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>

                                    <div style="margin-top:6px;font-size:10.5px;line-height:1.5;color:var(--sx-body)">{!! $item['foot'] !!}</div>

                                    @if (!empty($item['progress']))
                                        <div style="margin-top:8px;display:flex;align-items:center;gap:10px">
                                            <div class="sx-track" style="flex:1"><i class="orange" style="width:{{ $item['progress']['pct'] }}%"></i></div>
                                            <span style="font-size:10.5px;font-weight:600;color:var(--sx-mute);white-space:nowrap">{{ $item['progress']['label'] }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="sx-table-footer" style="background:transparent;padding:0;border-top:1px solid var(--sx-line);padding-top:12px">
                    <span>Menampilkan 5 dari 6.000 dokumen digital terindeks</span>
                    <div class="sx-pager">
                        <button type="button" disabled>Sebelumnya</button>
                        <button type="button" class="active">1</button>
                        <button type="button">2</button>
                        <button type="button">3</button>
                        <span style="padding:0 4px;color:var(--sx-mute)">...</span>
                        <button type="button">1200</button>
                        <button type="button">Selanjutnya</button>
                    </div>
                </div>
            </section>
        </div>

        <div class="sx-col">
            <section class="sx-card">
                <div class="sx-card-head">
                    <div class="sx-card-title-group">
                        <svg width="15" height="17" viewBox="0 0 24 24" fill="none" stroke="#1b1c1a" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <h2 class="sx-card-title" style="font-size:15px">Kebijakan Keamanan DRM</h2>
                    </div>
                    <span class="sx-badge ok">ROOT LEVEL</span>
                </div>
                <p class="sx-card-sub">
                    Konfigurasi sistem DRM global yang diterapkan langsung pada engine pembaca
                    Web Reader dan aplikasi Android/iOS Inovexa.
                </p>

                <div style="display:flex;flex-direction:column;gap:14px;margin-top:2px">
                    @foreach ($drmPolicies as $policy)
                        <div>
                            <div class="sx-row" style="align-items:flex-start">
                                <div style="min-width:0">
                                    <b style="font-size:12.5px;color:var(--sx-ink)">{!! $policy['title'] !!}</b>
                                    <p style="margin:2px 0 0;font-size:11px;line-height:1.5;color:var(--sx-mute)">{{ $policy['desc'] }}</p>
                                </div>
                                <button type="button" class="sx-switch" role="switch" aria-checked="true" onclick="sxToggle(this)" aria-label="{{ strip_tags($policy['title']) }}"></button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="sx-btn sx-btn-muted sx-btn-block" onclick="toast('Kebijakan DRM global diperbarui.')">Perbarui Kebijakan DRM Global</button>
            </section>

            <section class="sx-card">
                <div class="sx-card-head">
                    <div class="sx-card-title-group">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#1b1c1a" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18a15 15 0 0 1 0-18"/></svg>
                        <h2 class="sx-card-title" style="font-size:15px">Integrasi Node &amp; CDN Gateway</h2>
                    </div>
                    <span style="width:8px;height:8px;border-radius:50%;background:#1f9d55;display:inline-block"></span>
                </div>

                @php
                    $nodes = [
                        ['name' => 'Cloudflare R2 &amp; Stream Edge', 'status' => 'Online (99.99%)', 'detail' => 'Node: Singapore SG-01 (Geo-redundant)'],
                        ['name' => 'Audio Streaming Server', 'status' => '450 Mbps Active', 'detail' => 'HLS / AAC 128kbps &bull; Rerata Buffer: 0.8s'],
                        ['name' => 'Storage Cleanup Daemon', 'status' => 'Tiap 24 Jam', 'detail' => 'Pembersihan cache terenkripsi sesi kadaluwarsa otomatis.'],
                    ];
                @endphp

                <div style="display:flex;flex-direction:column;gap:10px">
                    @foreach ($nodes as $node)
                        <div class="sx-card flat" style="padding:12px;gap:5px;border-radius:10px">
                            <div class="sx-row">
                                <b style="font-size:12px;color:var(--sx-ink)">{!! $node['name'] !!}</b>
                                <span style="font-size:10.5px;font-weight:700;color:var(--sx-sage);white-space:nowrap">{{ $node['status'] }}</span>
                            </div>
                            <div style="font-size:10.5px;line-height:1.5;color:var(--sx-mute)">{!! $node['detail'] !!}</div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="sx-card dark">
                <div class="sx-card-title-group">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#fd8a42" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <b style="font-size:13px;color:#fff">Kepatuhan Hak Cipta &amp; WIPO</b>
                </div>
                <p class="sx-card-sub" style="color:#a9c6bb;font-size:12.5px">
                    Sistem repositori Inovexa beroperasi penuh sesuai ketentuan <b style="color:#fff">UU RI No. 28 Tahun 2014
                    tentang Hak Cipta</b> serta standar <b style="color:#fff">WIPO Copyright Treaty (WCT)</b>.
                    Seluruh berkas master diproteksi sertifikasi digital tersandikan.
                </p>
                <div class="sx-row" style="margin-top:4px">
                    <span style="font-size:11px;font-weight:600;color:#608d7d">Sertifikat ID: INX-WIPO-2026</span>
                    <button type="button" class="sx-btn sx-btn-sm" style="background:rgba(19,27,46,.8);border-color:transparent;color:#fff" onclick="toast('Dokumen lisensi WIPO diunduh.')">Unduh Dokumen Lisensi</button>
                </div>
            </section>
        </div>
    </div>

    {{-- MODAL UNGGAH MASTER E-BOOK / JURNAL --}}
    <div class="modal" id="modal-upload-ebook" role="dialog" aria-modal="true" style="display:none" onclick="if(event.target===this)closeModal('modal-upload-ebook')">
        <div class="modal-box" style="background:#fff;border-radius:12px;max-width:540px;width:90%;padding:24px;position:relative">
            <button class="modal-close" type="button" style="position:absolute;top:16px;right:16px;background:none;border:none;font-size:18px;cursor:pointer" onclick="closeModal('modal-upload-ebook')">✕</button>
            <div style="font-size:10px;font-weight:700;color:var(--sx-amber);letter-spacing:1px;text-transform:uppercase">SUPER ADMIN • REPOSITORI DIGITAL</div>
            <h2 style="font-size:18px;font-weight:800;color:var(--sx-ink);margin:4px 0 12px">Unggah Master E-Book &amp; Jurnal</h2>
            <form method="POST" action="{{ route('super.elib.create') }}">
                @csrf
                <div style="margin-bottom:10px">
                    <label style="display:block;font-size:11.5px;font-weight:700;margin-bottom:4px;color:var(--sx-ink)">Judul E-Resource <span style="color:#dc2626">*</span></label>
                    <input type="text" name="title" class="sx-input" style="width:100%" placeholder="Contoh: Metodologi Penelitian Terapan..." required>
                </div>
                <div style="margin-bottom:10px">
                    <label style="display:block;font-size:11.5px;font-weight:700;margin-bottom:4px;color:var(--sx-ink)">Pengarang / Penulis <span style="color:#dc2626">*</span></label>
                    <input type="text" name="author" class="sx-input" style="width:100%" placeholder="Nama penulis utama..." required>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:10px">
                    <div>
                        <label style="display:block;font-size:11.5px;font-weight:700;margin-bottom:4px;color:var(--sx-ink)">Format Berkas</label>
                        <select name="format" class="sx-select" style="width:100%">
                            <option value="PDF">PDF (ISO 19005 A-1b)</option>
                            <option value="EPUB">EPUB 3.0</option>
                            <option value="EPUB+AUDIO">EPUB + Audiobook</option>
                            <option value="JOURNAL">SCOPUS / Open Journal</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block;font-size:11.5px;font-weight:700;margin-bottom:4px;color:var(--sx-ink)">Lisensi Hak Cipta</label>
                        <select name="license" class="sx-select" style="width:100%">
                            <option value="UNLIMITED MULTI-USER">UNLIMITED MULTI-USER</option>
                            <option value="50 KONKUREN SESI">50 KONKUREN SESI</option>
                            <option value="OPEN ACCESS (CC-BY 4.0)">OPEN ACCESS (CC-BY 4.0)</option>
                            <option value="KOMPAS GRAMEDIA (TIER A)">KOMPAS GRAMEDIA (TIER A)</option>
                        </select>
                    </div>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:14px">
                    <div>
                        <label style="display:block;font-size:11.5px;font-weight:700;margin-bottom:4px;color:var(--sx-ink)">Penerbit / Afiliasi</label>
                        <input type="text" name="publisher" class="sx-input" style="width:100%" placeholder="Inovexa Press" value="Inovexa Press">
                    </div>
                    <div>
                        <label style="display:block;font-size:11.5px;font-weight:700;margin-bottom:4px;color:var(--sx-ink)">Ukuran Berkas Master</label>
                        <input type="text" name="file_size" class="sx-input" style="width:100%" placeholder="18.5 MB" value="18.5 MB">
                    </div>
                </div>
                <div style="margin-bottom:16px;background:#f8fafc;border:1px solid #e2e8f0;padding:10px;border-radius:6px;display:flex;align-items:center;gap:10px">
                    <input type="checkbox" name="drm_enabled" value="1" id="drm-check" checked style="accent-color:#153223;width:16px;height:16px">
                    <label for="drm-check" style="font-size:11.5px;color:var(--sx-ink);font-weight:600;cursor:pointer">
                        Aktifkan Proteksi DRM &amp; Watermark Dinamis (NIA + IP Pemustaka)
                    </label>
                </div>
                <button type="submit" class="sx-btn sx-btn-dark" style="width:100%;padding:10px;font-weight:700;font-size:12.5px">
                    + Publikasikan Master ke Repositori Digital
                </button>
            </form>
        </div>
    </div>

    <div class="sx-footstrip">
        <div class="left">
            <svg width="16" height="15" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Terakreditasi Kemenristek/BRIN Repositori Ilmiah Nasional</span>
            <span class="sep">&bull;</span>
            <span>Perpustakaan Nasional RI (Perpusnas) Interoperabilitas MARC21/Dublin Core</span>
        </div>
        <div class="right">
            <span class="hi">ISO/IEC 27001:2022 Certified Digital Asset Security</span>
            <span class="sep">&bull;</span>
            <span class="hi">Server Time: WIB (UTC+7)</span>
        </div>
    </div>
</div>

<script>
    function sxTab(el) {
        el.closest('.sx-tabs').querySelectorAll('.sx-tab').forEach(function (tab) {
            tab.classList.remove('active');
        });
        el.classList.add('active');
    }

    function sxToggle(el) {
        var on = el.getAttribute('aria-checked') === 'true';
        el.setAttribute('aria-checked', on ? 'false' : 'true');
    }
</script>