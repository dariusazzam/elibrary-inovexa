@php
    /*
     | Lihat Keseluruhan Laporan — KONSOL SUPER ADMIN (ROOT)
     | Implementasi frame Figma "Lihat keseluruhan laporan" (node 285:9357).
     */
    $monthly = [
        ['m' => 'Jan', 'fisik' => 60, 'elib' => 38],
        ['m' => 'Feb', 'fisik' => 68, 'elib' => 44],
        ['m' => 'Mar', 'fisik' => 88, 'elib' => 72, 'tag' => 'UTS', 'peak' => true],
        ['m' => 'Apr', 'fisik' => 52, 'elib' => 48],
        ['m' => 'Mei', 'fisik' => 70, 'elib' => 58],
        ['m' => 'Jun', 'fisik' => 94, 'elib' => 82, 'tag' => 'UAS', 'peak' => true],
        ['m' => 'Jul', 'fisik' => 40, 'elib' => 46],
        ['m' => 'Agu', 'fisik' => 48, 'elib' => 52],
        ['m' => 'Sep', 'fisik' => 75, 'elib' => 62],
        ['m' => 'Okt', 'fisik' => 91, 'elib' => 76, 'tag' => 'UTS', 'peak' => true],
        ['m' => 'Nov', 'fisik' => 80, 'elib' => 69],
        ['m' => 'Des', 'fisik' => 98, 'elib' => 89, 'tag' => 'UAS', 'peak' => true],
    ];

    $ddc = [
        ['label' => 'Ilmu Komputer & Sistem Digital (000-099)', 'pct' => 32, 'color' => '#1b1c1a'],
        ['label' => 'Kesusastraan & Fiksi Budaya (800-899)', 'pct' => 24, 'color' => '#9b4500'],
        ['label' => 'Ilmu Sosial, Hukum & Kebijakan (300-399)', 'pct' => 18, 'color' => '#fd8a42'],
        ['label' => 'Teknologi & Sains Terapan (600-699)', 'pct' => 16, 'color' => '#76777d'],
        ['label' => 'Filsafat, Agama & Lainnya (100-299 / 900)', 'pct' => 10, 'color' => '#dbdad7'],
    ];

    $reports = [
        [
            'modul' => 'Laporan Akreditasi &amp; Evaluasi Kinerja',
            'sumber' => 'Instrumen Akreditasi Nasional RI<br>Periode Audit: Q1 - Q3 2026 (Komprehensif)',
            'cakupan' => '6 Indikator<br><small>SNP</small>',
            'aset' => 'Koleksi, Sarpras, Layanan, SDM',
            'legal' => ['PDF', 'Berstempel Digital'],
            'status' => ['ok', 'Siap Cetak'],
            'actions' => ['Pratinjau', 'Unduh Rekapitulasi'],
        ],
        [
            'modul' => 'Rekapitulasi Inventarisasi Koleksi &amp; Nilai Aset Buku (BMD)',
            'sumber' => 'Barang Milik Daerah (BMD) Kode Rekening 1.3.2.05<br>Kondisi Fisik: 98.4% Baik &bull; 1.6% Restorasi',
            'cakupan' => '12.450 Judul /<br>38.820 Eks.',
            'aset' => 'Nilai Aset: Rp 4,82 Miliar',
            'legal' => ['XLSX + CSV', 'Resmi Terverifikasi'],
            'status' => ['ok', 'Terverifikasi'],
            'actions' => ['Pratinjau', 'Unduh Excel'],
        ],
        [
            'modul' => 'Laporan Finansial Kas Daerah &amp; Rekonsiliasi Kas Daerah',
            'sumber' => 'Buku Kas Umum (BKU)<br>Penerimaan Retribusi Daerah Perwakilan Wilayah',
            'cakupan' => 'Total: Rp<br>14.850.000',
            'aset' => 'NTPN Tertera: 100% Sah',
            'legal' => ['PDF Rekap', 'Auditor BKU'],
            'status' => ['ok', 'Sinkron'],
            'actions' => ['Pratinjau', 'Unduh PDF'],
        ],
        [
            'modul' => 'Statistik Penggunaan E-Library, Repositori &amp; Akses Terbuka Terakreditasi',
            'sumber' => '6.000 Judul E-Book &bull; 842 Sesi Konkuren Puncak',
            'cakupan' => '184.200 Kali<br>Akses Bab',
            'aset' => 'Rerata Baca: 38 Menit/Sesi',
            'legal' => ['PDF Matriks', 'DRM Lisensi Sah'],
            'status' => ['ok', 'Lunas Uji'],
            'actions' => ['Pratinjau', 'Unduh PDF'],
        ],
        [
            'modul' => 'Laporan Kepatuhan Keamanan Sistem, Log Forensik &amp; Cadangan Data',
            'sumber' => 'Badan Siber Sandi Negara (BSSN)<br>Uptime Server: 99.98% &bull; Integritas SHA-256 Otentik',
            'cakupan' => 'SLA 99.98%<br>Uptime',
            'aset' => 'RTO: 15m &bull; RPO: 5m',
            'legal' => ['PDF', 'Terenkripsi Root'],
            'status' => ['ok', 'Lulus Audit'],
            'actions' => ['Pratinjau', 'Unduh PDF'],
        ],
    ];
@endphp

<link rel="stylesheet" href="{{ asset('css/super-panels.css') }}?v={{ filemtime(public_path('css/super-panels.css')) }}">

<div class="sx-page">
    <header class="sx-head">
        <div class="sx-head-main">
            <nav class="sx-crumbs">
                <a href="{{ route('dashboard', 'ov') }}">Dashboard Super Admin</a>
                <span class="sep">/</span>
                <span class="current">Lihat Keseluruhan Laporan</span>
            </nav>

            <div class="sx-root-tag solid" style="margin-top:10px">
                <span class="dot"></span>
                MODUL KONSOLIDASI &amp; AUDIT LAPORAN EKOSISTEM GLOBAL (ROOT)
            </div>
            <div class="sx-meta-line">
                <span class="sep" style="color:var(--sx-faint)">&bull;</span>
                Otoritas Audit: INX-ADM-2026-04 (Ari &bull; Kepala TI)
            </div>
        </div>

        <div class="sx-actions">
            <button type="button" class="sx-btn" onclick="toast('Rentang waktu aktif: Semester I - II TA 2026')">
                <svg width="14" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                Rentang: FY 2026 (Sem I - II)
                <svg width="8" height="5" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M1 1l4 4 4-4"/></svg>
            </button>
            <button type="button" class="sx-btn sx-btn-dark" onclick="window.location.href='{{ route('super.reports.export', 'akreditasi') }}'">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/></svg>
                Ekspor Rekapitulasi Eksekutif (.CSV)
            </button>
            <button type="button" class="sx-btn sx-btn-muted" onclick="window.location.href='{{ route('super.reports.export', 'sirkulasi') }}'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                Dataset (.CSV)
            </button>
        </div>
    </header>

    <section class="sx-kpis">
        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">SIRKULASI<br>TAHUNAN</span>
                <span class="sx-kpi-chip">&#8593; +16.4%<br>YoY</span>
            </div>
            <div class="sx-kpi-value">68.420</div>
            <div class="sx-kpi-sub">Total akumulasi transaksi sirkulasi aktif</div>
            <div class="sx-kpi-split" style="margin-top:2px"><span>Fisik: 42.100</span><span class="e">E-Lib: 26.320</span></div>
            <div class="sx-kpi-track"><i class="orange" style="width:62%"></i></div>
        </article>

        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">PEMUSTAKA<br>AKTIF</span>
                <span class="sx-kpi-chip plain">Valid<br>KTP/NIM</span>
            </div>
            <div class="sx-kpi-value">2.450</div>
            <div class="sx-kpi-sub">Anggota terverifikasi ekosistem terpadu</div>
            <div class="sx-kpi-split" style="margin-top:2px"><span>Mhs: 1.890</span><span>Dosen: 42</span><span>Umum: 518</span></div>
            <div class="sx-kpi-track"><i class="dark" style="width:77%"></i></div>
        </article>

        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">EFEKTIVITAS<br>KOLEKSI</span>
                <span class="sx-kpi-chip peach">Kategori A<br>(Prima)</span>
            </div>
            <div class="sx-kpi-value">88.6%</div>
            <div class="sx-kpi-sub">Rasio pemanfaatan stok &amp; lisensi digital</div>
            <div class="sx-kpi-split" style="margin-top:2px"><span>Fisik: 82.9% dipinjam</span><span class="e">E-Book: 94.2% terbaca</span></div>
            <div class="sx-kpi-track"><i class="orange" style="width:89%"></i></div>
        </article>

        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">KASDA &amp; DENDA<br>RETRIBUSI</span>
                <span class="sx-kpi-chip plain">100%<br>Klir</span>
            </div>
            <div class="sx-kpi-value">Rp 14.85M</div>
            <div class="sx-kpi-sub">Rp 14.850.000 (Selisih Fisik Rp 0)</div>
            <div class="sx-kpi-split" style="margin-top:2px"><span>QRIS / Bank Jateng</span><span class="e">Oto-Rekonsiliasi BKU</span></div>
            <div class="sx-kpi-track"><i class="dark" style="width:100%"></i></div>
        </article>
    </section>

    <div class="sx-split-8-4">
        {{-- Tren sirkulasi --}}
        <section class="sx-card">
            <div class="sx-card-head">
                <div>
                    <div class="sx-card-title-group">
                        <span class="sx-swatch"></span>
                        <h2 class="sx-card-title">Tren Sirkulasi Buku Fisik vs E-Library</h2>
                    </div>
                    <p class="sx-card-sub">Perbandingan bulanan siklus pinjaman fisik vs pembaca digital e-library (TA 2026)</p>
                </div>
                <div style="display:flex;gap:12px;align-items:center">
                    <span style="display:inline-flex;align-items:center;gap:6px;font-size:10.5px;font-weight:700;color:var(--sx-body)">
                        <span style="width:10px;height:10px;border-radius:2px;background:#131b2e;display:inline-block"></span> Fisik
                    </span>
                    <span style="display:inline-flex;align-items:center;gap:6px;font-size:10.5px;font-weight:700;color:var(--sx-body)">
                        <span style="width:8px;height:10px;border-radius:2px;background:#fd8a42;display:inline-block"></span> E-Library
                    </span>
                </div>
            </div>

            <div style="display:flex;gap:10px;align-items:flex-end;height:250px;padding:18px 8px 0;position:relative">
                <div aria-hidden="true" style="position:absolute;inset:0 18px 32px 8px;display:flex;flex-direction:column;justify-content:space-between;opacity:.2;pointer-events:none">
                    @for ($i = 0; $i < 4; $i++)
                        <div style="height:1px;background:#c6c6cd"></div>
                    @endfor
                </div>

                @foreach ($monthly as $bar)
                    <div style="flex:1;display:flex;flex-direction:column;align-items:center;justify-content:flex-end;height:100%;min-width:0;position:relative">
                        <div style="display:flex;gap:3px;align-items:flex-end;justify-content:center;width:100%;height:190px;position:relative">
                            @isset($bar['tag'])
                                <span style="position:absolute;top:-10px;left:50%;transform:translateX(-50%) scale(.9);background:#ffdbca;color:#331200;font-size:9px;font-weight:700;letter-spacing:.4px;padding:2px 5px;border-radius:4px;white-space:nowrap">{{ $bar['tag'] }}</span>
                            @endisset
                            <div style="width:12px;height:{{ $bar['fisik'] }}%;border-radius:4px 4px 0 0;background:{{ ! empty($bar['peak']) ? '#000' : '#131b2e' }}"></div>
                            <div style="width:12px;height:{{ $bar['elib'] }}%;border-radius:4px 4px 0 0;background:#fd8a42"></div>
                        </div>
                        <span style="font-size:10px;font-weight:700;letter-spacing:.4px;padding-top:8px;color:{{ ! empty($bar['peak']) ? '#9b4500' : '#45464d' }}">{{ $bar['m'] }}</span>
                    </div>
                @endforeach
            </div>

            <div class="sx-card flat" style="padding:12px;gap:6px">
                <div style="display:flex;gap:8px;align-items:flex-start">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round" style="flex-shrink:0;margin-top:1px"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg>
                    <p style="margin:0;font-size:12px;line-height:1.6;color:var(--sx-body)">
                        Lonjakan puncak beban sirkulasi mencapai <b style="color:var(--sx-ink)">188%</b> pada siklus
                        evaluasi akademik (Juni &amp; Desember).
                    </p>
                </div>
                <b style="font-size:10.5px;font-weight:600;letter-spacing:.55px;color:var(--sx-ink)">Kapasitas Rak Siaga</b>
            </div>
        </section>

        {{-- Distribusi DDC --}}
        <section class="sx-card">
            <div class="sx-card-head">
                <div>
                    <div class="sx-card-title-group">
                        <span class="sx-swatch dark"></span>
                        <h2 class="sx-card-title">Distribusi Minat Koleksi (DDC)</h2>
                    </div>
                    <p class="sx-card-sub">Klasifikasi 10 Divisi Utama &amp; Preferensi Pemustaka 2026</p>
                </div>
                <span class="sx-mini-label">DEWEY<br>DECIMAL</span>
            </div>

            <div style="display:flex;justify-content:center;padding:16px 0 8px">
                <div style="position:relative;width:160px;height:160px">
                    <div style="width:160px;height:160px;border-radius:50%;background:conic-gradient(#1b1c1a 0 32%,#9b4500 32% 56%,#fd8a42 56% 74%,#76777d 74% 90%,#dbdad7 90% 100%)"></div>
                    <div style="position:absolute;inset:26px;background:#fff;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center">
                        <b style="font-size:18px;color:var(--sx-ink);line-height:1.2">100%</b>
                        <span style="font-size:10px;font-weight:700;letter-spacing:.55px;color:var(--sx-body)">KONSOLIDASI</span>
                    </div>
                </div>
            </div>

            <div style="display:flex;flex-direction:column;gap:2px">
                @foreach ($ddc as $row)
                    <div class="sx-row" style="padding:7px 8px;border-radius:4px">
                        <span style="display:inline-flex;align-items:center;gap:8px;min-width:0">
                            <span style="width:12px;height:12px;border-radius:50%;background:{{ $row['color'] }};flex-shrink:0"></span>
                            <span style="font-size:11.5px;font-weight:600;letter-spacing:.3px;color:{{ $row['pct'] === 10 ? '#45464d' : '#1b1c1a' }}">{{ $row['label'] }}</span>
                        </span>
                        <b style="font-size:11.5px;letter-spacing:.3px;color:{{ $row['pct'] === 10 ? '#45464d' : '#1b1c1a' }}">{{ $row['pct'] }}%</b>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    {{-- Direktori laporan --}}
    <section class="sx-card">
        <div class="sx-card-head">
            <div>
                <div class="sx-card-title-group">
                    <svg width="14" height="16" viewBox="0 0 24 24" fill="none" stroke="#1b1c1a" stroke-width="2" stroke-linecap="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
                    <h2 class="sx-card-title">Direktori &amp; Matriks Laporan Terpadu</h2>
                </div>
                <p class="sx-card-sub">Dokumen resmi instansional terstandarisasi untuk audit BPK, akreditasi Perpusnas, dan evaluasi berkala pimpinan daerah.</p>
            </div>
            <div style="text-align:right">
                <div class="sx-mini-label mute">Format Output:</div>
                <span class="sx-badge outline">ISO 11620:2014 Compliant</span>
            </div>
        </div>

        <div class="sx-table-wrap">
            <table class="sx-table">
                <thead>
                    <tr>
                        <th>KODE &amp; MODUL LAPORAN RESMI</th>
                        <th>CAKUPAN ASET</th>
                        <th>LEGALITAS</th>
                        <th>FORMAT &amp; STATUS</th>
                        <th>STATUS BERKAS</th>
                        <th>TINDAKAN EKSEKUTIF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $r)
                        <tr>
                            <td>
                                <b>{!! $r['modul'] !!}</b>
                                <small>{!! $r['sumber'] !!}</small>
                            </td>
                            <td>{!! $r['cakupan'] !!}</td>
                            <td>{!! $r['aset'] !!}</td>
                            <td>
                                <span class="sx-badge neutral">{{ $r['legal'][0] }}</span>
                                <small>{{ $r['legal'][1] }}</small>
                            </td>
                            <td><span class="sx-badge {{ $r['status'][0] }}">{{ $r['status'][1] }}</span></td>
                            <td>
                                <div style="display:flex;gap:6px;flex-wrap:wrap">
                                    @php
                                        $exportType = match($loop->index) {
                                            0 => 'akreditasi',
                                            1 => 'inventaris',
                                            default => 'sirkulasi'
                                        };
                                    @endphp
                                    <button type="button" class="sx-btn sx-btn-sm" style="padding:5px 9px" onclick="window.location.href='{{ route('super.reports.export', $exportType) }}'">{{ $r['actions'][0] }}</button>
                                    <a href="{{ route('super.reports.export', $exportType) }}" class="sx-btn sx-btn-sm sx-btn-dark" style="padding:5px 9px;text-decoration:none;display:inline-flex;align-items:center">
                                        {{ $r['actions'][1] }}
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- Pengesahan digital + akreditasi --}}
    <div class="sx-split-8-4">
        <section class="sx-card">
            <div class="sx-card-head">
                <div class="sx-card-title-group">
                    <svg width="17" height="16" viewBox="0 0 24 24" fill="none" stroke="#1b1c1a" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    <h2 class="sx-card-title">Validasi &amp; Pengesahan Dokumen Digital</h2>
                </div>
                <span class="sx-badge peach">OTENTIKASI KRIPTOGRAFIS</span>
            </div>

            <p class="sx-card-sub">
                Laporan yang dihasilkan dijamin sah secara hukum berdasarkan UU ITE No. 11/2008 &amp;
                PP No. 71/2019 tentang Penyelenggaraan Sistem Transaksi Elektronik.
            </p>

            <div class="sx-card flat" style="padding:16px;gap:16px;flex-direction:row;flex-wrap:wrap;align-items:center">
                <div style="display:flex;gap:12px;align-items:center;flex:1;min-width:210px">
                    <div style="width:48px;height:48px;border-radius:8px;background:#131b2e;color:#fff;display:grid;place-items:center;font-size:17px;font-weight:800;flex-shrink:0">AR</div>
                    <div>
                        <b style="font-size:13.5px;color:var(--sx-ink);display:block">Ari, S.Kom., M.T.I.</b>
                        <span style="font-size:11px;font-weight:600;letter-spacing:.55px;color:var(--sx-amber);display:block">Kepala TI / Super Admin Root</span>
                        <span style="font-size:11px;font-weight:700;letter-spacing:.55px;color:var(--sx-body);display:block">NIP: INX-ADM-2026-04</span>
                    </div>
                </div>

                <div style="flex:1;min-width:210px;display:flex;flex-direction:column;gap:5px">
                    <div class="sx-row">
                        <span style="font-size:11px;font-weight:700;letter-spacing:.55px;color:var(--sx-body)">Kode Verifikasi:</span>
                        <span class="mono" style="font-size:11px;font-weight:700;color:var(--sx-ink)">INOVEXA-REP-2026-ROOT</span>
                    </div>
                    <div class="sx-row">
                        <span style="font-size:11px;font-weight:700;letter-spacing:.55px;color:var(--sx-body)">Stempel Waktu:</span>
                        <span style="font-size:11px;font-weight:700;color:var(--sx-ink)">15 Okt 2026 &bull; 14:32:08 WIB</span>
                    </div>
                    <div class="sx-row">
                        <span style="font-size:11px;font-weight:700;letter-spacing:.55px;color:var(--sx-body)">Sertifikat Root:</span>
                        <span style="font-size:11px;font-weight:700;color:var(--sx-amber)">&#10003; BSrE / BSSN Valid</span>
                    </div>
                </div>
            </div>

            <div style="display:flex;flex-direction:column;gap:8px;padding-top:4px">
                <span style="display:inline-flex;align-items:center;gap:8px;font-size:12.5px;color:var(--sx-body)">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><path d="M14 14h3v3h-3zM19 19h2v2h-2z"/></svg>
                    QR Code tertanam otomatis di lembar pengesahan setiap file unduhan.
                </span>
                <button type="button" class="sx-btn sx-btn-sm" style="align-self:flex-start;border:0;background:transparent;color:var(--sx-amber);font-weight:700;padding:0" onclick="toast('Uji validitas tanda tangan dijalankan.')">
                    Uji Validitas Tanda Tangan &rarr;
                </button>
            </div>
        </section>

        <section class="sx-card dark">
            <div class="sx-card-head">
                <span style="font-size:10.5px;font-weight:700;letter-spacing:1.1px;text-transform:uppercase;color:var(--sx-sage)">PERPUSTAKAAN NASIONAL RI</span>
                <svg width="22" height="21" viewBox="0 0 24 24" fill="none" stroke="#fd8a42" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            </div>

            <div>
                <div style="font-size:31px;font-weight:800;letter-spacing:-.9px;color:#fff;line-height:1.2">Akreditasi &ldquo;A&rdquo;</div>
                <div style="font-size:17px;font-weight:600;color:#fd8a42;line-height:1.35">Kualifikasi Unggul &amp;<br>Paripurna</div>
                <p style="margin:8px 0 0;font-size:12.5px;line-height:1.6;color:var(--sx-sage)">
                    Nomor Sertifikat:<br>
                    <b style="color:#fff">0418/LAP.PT/XII.2025</b>. Berlaku hingga Desember 2030
                    untuk seluruh layanan terintegrasi fisik &amp; digital.
                </p>
            </div>

            <div style="display:flex;align-items:center;justify-content:space-between;gap:10px;background:rgba(19,27,46,.8);border-radius:8px;padding:14px 12px;position:relative;z-index:1">
                <span style="display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:700;letter-spacing:.55px;color:#fff">
                    <svg width="13" height="17" viewBox="0 0 24 24" fill="none" stroke="#fd8a42" stroke-width="2" stroke-linecap="round"><path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                    Skor Penilaian Mutu
                </span>
                <span style="font-size:17px;font-weight:700;color:#fd8a42;text-align:right;line-height:1.3">96.8 /<br>100</span>
            </div>
        </section>
    </div>

    <div class="sx-footstrip">
        <div class="left">
            <svg width="14" height="15" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Kepatuhan Hukum: <b class="hi">UU No. 43/2007 tentang Perpustakaan</b> &amp; <b class="hi">Peraturan Perpustakaan Nasional RI No. 13/2017</b> (Standar Nasional Perpustakaan).</span>
        </div>
        <div class="right">
            <span class="hi">Sistem Pelaporan Terkonsolidasi V4.8.2</span>
            <span class="sep">&bull;</span>
            <span class="warn">SINKRONISASI PUSAT AKTIF</span>
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
</script>