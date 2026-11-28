@php
    /*
     | Reservasi & Gateway Notifikasi — KONSOL SUPER ADMIN (ROOT)
     | Implementasi frame Figma "Kelola reservasi" (node 285:10103).
     */
    $tabs = [
        ['key' => 'antrean', 'label' => 'Antrean'],
        ['key' => 'gateway', 'label' => 'Gateway Saluran'],
        ['key' => 'notif', 'label' => 'Notifikasi'],
        ['key' => 'template', 'label' => 'Template Pesan', 'suffix' => 'Otomatis'],
        ['key' => 'locker', 'label' => 'Monitoring Smart', 'suffix' => 'Locker'],
    ];
@endphp

<link rel="stylesheet" href="{{ asset('css/super-panels.css') }}?v={{ filemtime(public_path('css/super-panels.css')) }}">

<div class="sx-page">
    <header class="sx-head">
        <div class="sx-head-main">
            <nav class="sx-crumbs">
                <a href="{{ route('dashboard', 'ov') }}">Dashboard Super Admin</a>
                <span class="sep">/</span>
                <span class="current">Kelola Reservasi &amp; Notifikasi</span>
            </nav>

            <div class="sx-root-tag">
                <span class="dot"></span>
                OTORISASI KEBIJAKAN RESERVASI &amp; GATEWAY NOTIFIKASI (ROOT)
            </div>

            <h1 class="sx-h1">Kelola Reservasi &amp; Gateway<br>Notifikasi Terpusat</h1>
            <p class="sx-desc">
                Pusat tata kelola algoritma antrean pemesanan buku fisik, konfigurasi batas waktu pickup
                (Hold Shelf SLA), integrasi gateway multi-saluran notifikasi otomatis (WhatsApp, Email &amp; Push),
                serta orkestrasi Smart Locker IoT.
            </p>
        </div>

        <div class="sx-actions">
            <button type="button" class="sx-btn" onclick="window.location.href='{{ route('super.export.audit_logs') }}'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M9 15h6"/><path d="M9 11h3"/></svg>
                Audit Log Pengiriman (.CSV)
            </button>
            <button type="button" class="sx-btn" onclick="toast('Menguji koneksi gateway saluran WhatsApp, SES, &amp; FCM... Semua gateway berfungsi normal (Latency: 180ms).')">
                <svg width="15" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                Uji Gateway &amp; Saluran
            </button>
            <button type="button" class="sx-btn sx-btn-dark" onclick="openModal('modal-resv-config')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                + Konfigurasi Kebijakan
            </button>
        </div>
    </header>

    {{-- KPI --}}
    <section class="sx-kpis">
        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">TOTAL RESERVASI<br>AKTIF</span>
                <span class="sx-kpi-icon">
                    <svg width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">184 <small>+24 hari ini</small></div>
            <div class="sx-kpi-sub">128 di rak tunggu &bull; 56 di Smart Locker IoT</div>
            <div class="sx-kpi-track"><i style="width:68%"></i></div>
        </article>

        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">SLA PICKUP &amp;<br>TIMEOUT</span>
                <span class="sx-kpi-icon orange">
                    <svg width="15" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">48 Jam <small class="sage">Tepat Waktu 94.2%</small></div>
            <div class="sx-kpi-sub">Auto-cancel aktif jika melewati grace period</div>
            <div class="sx-kpi-track"><i class="orange" style="width:94%"></i></div>
        </article>

        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">HEALTH GATEWAY<br>NOTIF</span>
                <span class="sx-kpi-icon mint">
                    <svg width="17" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12h4l3 8 6-16 3 8h4"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">99.8% <small>Optimal</small></div>
            <div class="sx-kpi-sub">WA Latency 210ms &bull; SES 99.9% &bull; FCM Aktif</div>
            <div class="sx-kpi-track"></div>
        </article>

        <article class="sx-kpi">
            <div class="sx-kpi-top">
                <span class="sx-kpi-label">DISPATCH<br>BULAN INI</span>
                <span class="sx-kpi-icon">
                    <svg width="18" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4z"/><path d="M22 2 11 13"/></svg>
                </span>
            </div>
            <div class="sx-kpi-value">14.850 <small class="mute">/ 50.000 Kuota</small></div>
            <div class="sx-kpi-sub">Rp 0 biaya terlampaui (Tier Enterprise)</div>
            <div class="sx-kpi-track"><i class="dark" style="width:29%"></i></div>
        </article>
    </section>

    {{-- Workspace --}}
    <div class="sx-split">
        <div class="sx-col">
            <div class="sx-tabs" role="tablist">
                @foreach ($tabs as $i => $tab)
                    <button type="button"
                            class="sx-tab {{ $i === 0 ? 'active' : '' }}"
                            role="tab"
                            data-sx-tab="{{ $tab['key'] }}"
                            onclick="sxTab(this)">
                        @if ($tab['key'] === 'antrean')
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
                        @elseif ($tab['key'] === 'gateway')
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a15 15 0 0 1 0 18a15 15 0 0 1 0-18"/></svg>
                        @elseif ($tab['key'] === 'notif')
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                        @elseif ($tab['key'] === 'template')
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                        @else
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/></svg>
                        @endif
                        <span class="sx-tab-label">{{ $tab['label'] }}@isset($tab['suffix'])<br>{{ $tab['suffix'] }}@endisset</span>
                    </button>
                @endforeach
            </div>

            {{-- Matriks Kebijakan --}}
            <section class="sx-card">
                <div class="sx-card-head">
                    <div>
                        <div class="sx-card-title-group">
                            <span class="sx-swatch dark"></span>
                            <h2 class="sx-card-title">Matriks Kebijakan Reservasi Terpusat</h2>
                        </div>
                        <p class="sx-card-sub">Aturan algoritma batas alokasi koleksi fisik dan durasi toleransi pemustaka</p>
                    </div>
                    <span class="sx-mini-label">Engine Version: v4.8-active</span>
                </div>

                <div class="sx-split-even">
                    <div class="sx-card flat" style="gap:10px">
                        <div class="sx-row">
                            <span class="sx-badge neutral">Tier Umum</span>
                            <span class="sx-badge peach">Default</span>
                        </div>
                        <p class="sx-card-sub">Batas maksimal antrean buku fisik aktif yang dapat di-hold secara simultan.</p>
                        <div class="sx-split-even" style="gap:10px">
                            <div>
                                <div class="sx-mini-label mute">Maks. Buku</div>
                                <div class="sx-row"><span class="value">2 Judul Buku (Default)</span></div>
                            </div>
                            <div>
                                <div class="sx-mini-label mute">Durasi Hold Shelf</div>
                                <div class="sx-row"><span class="value">48 Jam (2 Hari)</span></div>
                            </div>
                        </div>
                    </div>

                    <div class="sx-card flat" style="gap:10px">
                        <div class="sx-row">
                            <span class="sx-badge neutral">Dosen, Peneliti &amp; Mitra Riset</span>
                            <span class="sx-badge peach">Akses Prioritas</span>
                        </div>
                        <p class="sx-card-sub">Alokasi khusus riset akademik dengan durasi reservasi diperpanjang.</p>
                        <div class="sx-split-even" style="gap:10px">
                            <div>
                                <div class="sx-mini-label mute">Maks. Buku</div>
                                <div class="sx-row"><span class="value">5 Judul Buku (Riset)</span></div>
                            </div>
                            <div>
                                <div class="sx-mini-label mute">Durasi Hold Shelf</div>
                                <div class="sx-row"><span class="value">72 Jam (3 Hari)</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sx-card flat" style="gap:10px">
                    <div class="sx-row">
                        <div class="sx-card-title-group">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#9b4500" stroke-width="2" stroke-linecap="round"><path d="M12 9v4M12 17h.01"/><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/></svg>
                            <b style="font-size:13px;color:var(--sx-ink)">Penegakan Penalti Pembatalan Otomatis (No-Show)</b>
                        </div>
                        <button type="button" class="sx-switch" role="switch" aria-checked="true" onclick="sxToggle(this)" aria-label="Penalti pembatalan otomatis"></button>
                    </div>
                    <p class="sx-card-sub">
                        Jika pemustaka 3 kali berturut-turut tidak mengambil buku pesanan sebelum tenggat SLA,
                        sistem otomatis membekukan hak reservasi selama 7 hari kalender.
                    </p>
                </div>

                <div class="sx-card flat" style="gap:10px">
                    <div class="sx-card-title-group">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
                        <b style="font-size:13px;color:var(--sx-ink)">Queue Priority Engine (Algoritma Penentu Alokasi)</b>
                    </div>
                    <div class="sx-split-even" style="gap:16px;align-items:center">
                        <p class="sx-card-sub">
                            Pilih model matematika pemrosesan antrean saat eksemplar buku dikembalikan
                            ke sirkulasi perpustakaan.
                        </p>
                        <select class="sx-select" aria-label="Queue priority engine">
                            <option>FIFO + Bobot Akademik (Direkomendasikan)</option>
                            <option>FIFO Murni (First In First Out)</option>
                            <option>Prioritas Pemustaka Aktif</option>
                        </select>
                    </div>
                </div>
            </section>

            {{-- Orkestrasi Gateway --}}
            <section class="sx-card">
                <div class="sx-card-head">
                    <div>
                        <div class="sx-card-title-group">
                            <span class="sx-swatch"></span>
                            <h2 class="sx-card-title">Orkestrasi Multi-Channel Gateway Notifikasi</h2>
                        </div>
                        <p class="sx-card-sub">Konektivitas penyedia layanan telekomunikasi eksternal untuk pengiriman slip reservasi</p>
                    </div>
                    <span class="sx-mini-label">+ Tambah Gateway Cadangan</span>
                </div>

                <div class="sx-kpis" style="grid-template-columns:repeat(3,minmax(0,1fr));gap:12px">
                    <article class="sx-card flat" style="gap:9px">
                        <div class="sx-row">
                            <b style="font-size:12.5px;color:var(--sx-ink)">WhatsApp Business Cloud</b>
                            <span class="sx-badge ok">AKTIF</span>
                        </div>
                        <div class="sx-card-sub" style="font-size:11px">Meta Official BSP Direct Node</div>
                        <div class="sx-row"><span class="label">Sesi Kuota</span><span class="value">28.450 / 50.000</span></div>
                        <div class="sx-track"><i style="width:57%"></i></div>
                        <div class="sx-kpi-split"><span>Latency: ~180ms</span><span>Health: 99.9%</span></div>
                        <button type="button" class="sx-btn sx-btn-muted sx-btn-sm sx-btn-block" onclick="toast('Konfigurasi token WhatsApp Business Cloud dibuka.')">Konfigurasi Token</button>
                    </article>

                    <article class="sx-card flat" style="gap:9px">
                        <div class="sx-row">
                            <b style="font-size:12.5px;color:var(--sx-ink)">AWS SES / SMTP Inovexa</b>
                            <span class="sx-badge ok">TERHUBUNG</span>
                        </div>
                        <div class="sx-card-sub" style="font-size:11px">Transactional Email Node ID-01</div>
                        <div class="sx-row"><span class="label">Delivery Success</span><span class="value">99.82%</span></div>
                        <div class="sx-track"><i class="orange" style="width:99%"></i></div>
                        <div class="sx-kpi-split"><span>DKIM / SPF: Valid</span><span>Bounce: &lt; 0.04%</span></div>
                        <button type="button" class="sx-btn sx-btn-muted sx-btn-sm sx-btn-block" onclick="toast('Pengaturan SMTP dibuka.')">Pengaturan SMTP</button>
                    </article>

                    <article class="sx-card flat" style="gap:9px">
                        <div class="sx-row">
                            <b style="font-size:12.5px;color:var(--sx-ink)">Mobile FCM &amp; Web PWA</b>
                            <span class="sx-badge ok">AKTIF</span>
                        </div>
                        <div class="sx-card-sub" style="font-size:11px">Google Firebase Engine</div>
                        <div class="sx-row"><span class="label">Device Terdaftar</span><span class="value">2.180 Perangkat</span></div>
                        <div class="sx-track"><i style="width:74%"></i></div>
                        <div class="sx-kpi-split"><span>Open Rate: 78.4%</span><span>PWA Push: Enabled</span></div>
                        <button type="button" class="sx-btn sx-btn-muted sx-btn-sm sx-btn-block" onclick="toast('Kelola API Key Firebase dibuka.')">Kelola API Key</button>
                    </article>
                </div>
            </section>

            {{-- Jejak Audit Dispatch --}}
            <section class="sx-card">
                <div class="sx-card-head">
                    <div class="sx-card-title-group">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
                        <div>
                            <h2 class="sx-card-title">Jejak Audit Dispatch &amp; Log Antrean Realtime</h2>
                            <p class="sx-card-sub">Aktivitas transmisi gateway dan keputusan sistem otomatis pada ekosistem sirkulasi</p>
                        </div>
                    </div>
                    <span class="sx-mini-label">Sinkronisasi: Realtime Webhook</span>
                </div>

                <div class="sx-table-wrap">
                    <table class="sx-table">
                        <thead>
                            <tr>
                                <th>ID RESERVASI</th>
                                <th>PEMUSTAKA</th>
                                <th>BUKU &amp; TANGGAL</th>
                                <th>STATUS</th>
                                <th style="text-align:right">AKSI OTORITAS ROOT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($lib->resv as $resv)
                            @php
                                $rId = $resv['id'] ?? 1;
                                $st = $resv['status'] ?? ($resv['st'] ?? 'waiting');
                                $isReady = in_array(strtolower($st), ['ready', 'siap', 'siap ambil']);
                                $isCancelled = in_array(strtolower($st), ['cancelled', 'dibatalkan', 'batal']);
                                $bookObj = is_numeric($resv['b'] ?? null) ? $lib->book((int) $resv['b']) : null;
                                $bTitle = $bookObj['t'] ?? ($resv['b'] ?? 'Buku Perpustakaan');
                            @endphp
                            <tr>
                                <td class="mono">RES-{{ str_pad($rId, 5, '0', STR_PAD_LEFT) }}</td>
                                <td><b>{{ $resv['w'] ?? 'Pemustaka' }}</b></td>
                                <td>
                                    <div style="font-weight:600">{{ $bTitle }}</div>
                                    <small style="color:#64748b">{{ $resv['d'] ?? date('d M Y') }}</small>
                                </td>
                                <td>
                                    @if($isReady)
                                        <span class="sx-badge ok">Siap Diambil</span>
                                    @elseif($isCancelled)
                                        <span class="sx-badge" style="background:#fee2e2;color:#dc2626">Dibatalkan</span>
                                    @else
                                        <span class="sx-badge peach">Antrean / Menunggu</span>
                                    @endif
                                </td>
                                <td style="text-align:right">
                                    <div style="display:inline-flex;gap:4px">
                                        @if(!$isReady && !$isCancelled)
                                        <form action="{{ route('super.reservation.status', $rId) }}" method="POST" style="display:inline;margin:0">
                                            @csrf
                                            <input type="hidden" name="status" value="ready">
                                            <button type="submit" class="sx-btn sx-btn-sm" style="background:#ecfdf5;color:#065f46;border:1px solid #a7f3d0" title="Setujui dan beri tahu pemustaka">
                                                ✓ Siap Ambil
                                            </button>
                                        </form>
                                        @endif
                                        @if(!$isCancelled)
                                        <form action="{{ route('super.reservation.status', $rId) }}" method="POST" style="display:inline;margin:0" onsubmit="return confirm('Batalkan reservasi ini?')">
                                            @csrf
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="sx-btn sx-btn-sm" style="background:#fee2e2;color:#dc2626;border:1px solid #fecaca" title="Batalkan reservasi">
                                                ✕ Batal
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align:center;padding:16px;color:#64748b">Belum ada antrean reservasi aktif.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="sx-table-footer">
                        <span>Menampilkan {{ count($lib->resv) }} antrean reservasi tercatat di sistem</span>
                        <a href="{{ route('super.export.circulation') }}" style="color:var(--sx-amber);font-weight:700;text-decoration:none">Ekspor Data Sirkulasi &amp; Reservasi (.CSV)</a>
                    </div>
                </div>
            </section>
        </div>

        {{-- Kolom kanan --}}
        <div class="sx-col">
            <section class="sx-card">
                <div class="sx-card-head">
                    <div class="sx-card-title-group">
                        <svg width="13" height="18" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <h2 class="sx-card-title" style="font-size:15px">Simulator Dispatch Pesan</h2>
                    </div>
                    <span class="sx-badge peach">SANDBOX MODE</span>
                </div>
                <p class="sx-card-sub">Uji variabel dinamis template notifikasi sebelum disinkronkan ke server produksi.</p>

                <div class="sx-field" style="margin-top:2px">
                    <span>Pilih Template Transaksional</span>
                    <select class="sx-select">
                        <option>Buku Siap Diambil (Ready for Pickup - Locker)</option>
                        <option>Pengingat Batas Waktu Pickup</option>
                        <option>Reservasi Otomatis Dibatalkan</option>
                    </select>
                </div>

                <div class="sx-toolbar" style="gap:14px;padding:9px 10px;border-radius:8px;background:var(--sx-bg)">
                    <label style="display:inline-flex;align-items:center;gap:6px;font-size:12.5px;font-weight:600;color:var(--sx-ink);cursor:pointer">
                        <input type="radio" name="sx-channel" checked style="accent-color:#0075ff"> WhatsApp
                    </label>
                    <label style="display:inline-flex;align-items:center;gap:6px;font-size:12.5px;font-weight:600;color:var(--sx-body);cursor:pointer">
                        <input type="radio" name="sx-channel" style="accent-color:#0075ff"> Email
                    </label>
                    <label style="display:inline-flex;align-items:center;gap:6px;font-size:12.5px;font-weight:600;color:var(--sx-body);cursor:pointer">
                        <input type="radio" name="sx-channel" style="accent-color:#0075ff"> Push
                    </label>
                </div>

                <div style="background:#efeae2;border-radius:12px;padding:14px;display:flex;flex-direction:column;gap:8px">
                    <div class="sx-row">
                        <span style="display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:700;color:#075e54">
                            <span style="width:8px;height:8px;border-radius:50%;background:#25d366;display:inline-block"></span>
                            &#127963; Perpustakaan Inovexa (Official)
                        </span>
                        <span style="font-family:'Liberation Mono',monospace;font-size:10px;color:#6b7280">11:25</span>
                    </div>

                    <div style="background:#fff;border-radius:8px;padding:12px;box-shadow:0 1px 2px rgba(0,0,0,.06);font-size:13px;line-height:1.62;color:#111b21">
                        <p style="margin:0 0 4px">Halo <b>Kevin Wijaya</b>,</p>
                        <p style="margin:0">Buku pesanan reservasi Anda:</p>
                        <p style="margin:0">&#128214; <b>Atomic Habits</b> (Call: 158.1 CLE)</p>
                        <p style="margin:0 0 10px">sudah siap diambil di <b>Smart Locker Gate B, Box #08</b>.</p>

                        <div style="background:var(--sx-bg);border-radius:4px;padding:8px;margin-bottom:10px">
                            <div style="font-size:11px;color:#4b5563">Kode PIN Buka Loker:</div>
                            <div style="font-family:'Liberation Mono',monospace;font-size:16px;font-weight:700;letter-spacing:1.6px;color:#131b2e">882194</div>
                        </div>

                        <p style="margin:0;font-size:11px;line-height:1.62;color:#4b5563">
                            Batas Waktu Pengambilan: <b style="color:var(--sx-red)">20 Okt 2026, 20:00 WIB</b>.
                            Setelah batas tersebut, pesanan otomatis dialihkan ke antrean berikutnya.
                        </p>
                        <div style="text-align:right;font-size:10px;color:#9ca3af;margin-top:6px">11:25 WIB &#10003;&#10003;</div>
                    </div>
                </div>

                <button type="button" class="sx-btn sx-btn-muted sx-btn-block" onclick="toast('Pesan uji coba dikirim ke nomor root.')">
                    <svg width="14" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m22 2-7 20-4-9-9-4z"/><path d="M22 2 11 13"/></svg>
                    Kirim Uji Coba (Test Dispatch) ke Nomor Root
                </button>
            </section>

            <section class="sx-card">
                <div class="sx-card-head">
                    <div class="sx-card-title-group">
                        <svg width="13" height="18" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/></svg>
                        <h2 class="sx-card-title" style="font-size:15px">Status Smart Locker IoT<br>Gateway</h2>
                    </div>
                    <span style="display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:700;color:var(--sx-ink)">
                        <span style="width:7px;height:7px;border-radius:50%;background:#224e41;display:inline-block"></span>
                        3 Unit Online
                    </span>
                </div>
                <p class="sx-card-sub">Alokasi loker pengambilan mandiri pemustaka 24/7 yang terhubung dengan modul telemetry MQTT.</p>

                @php
                    $lockers = [
                        ['name' => 'Gate B Lantai 1 (Lobi Selatan)', 'ping' => 'Ping 12ms', 'boxes' => '32 Box Loker', 'fill' => '18 Terisi / 14 Kosong', 'pct' => 56],
                        ['name' => 'Gate A Lantai 2 (Koleksi Riset)', 'ping' => 'Ping 14ms', 'boxes' => '16 Box Loker', 'fill' => '10 Terisi / 6 Kosong', 'pct' => 62],
                        ['name' => 'Lantai 3 (Ruang Baca Mandiri)', 'ping' => 'Ping 11ms', 'boxes' => '16 Box Loker', 'fill' => '5 Terisi / 11 Kosong', 'pct' => 31],
                    ];
                @endphp

                <div style="display:flex;flex-direction:column;gap:8px">
                    @foreach ($lockers as $locker)
                        <div class="sx-card flat" style="padding:14px;gap:8px;border-radius:12px">
                            <div class="sx-row">
                                <b style="font-size:12px;color:var(--sx-ink)">{{ $locker['name'] }}</b>
                                <span style="font-family:'Liberation Mono',monospace;font-size:11px;font-weight:700;color:#224e41">{{ $locker['ping'] }}</span>
                            </div>
                            <div class="sx-row">
                                <span style="font-size:12px;color:var(--sx-body)">{{ $locker['boxes'] }}</span>
                                <span style="font-size:12.5px;font-weight:600;color:var(--sx-ink)">{{ $locker['fill'] }}</span>
                            </div>
                            <div class="sx-track" style="height:8px"><i style="width:{{ $locker['pct'] }}%"></i></div>
                        </div>
                    @endforeach
                </div>

                <div class="sx-toolbar" style="gap:8px">
                    <button type="button" class="sx-btn sx-btn-soft sx-btn-sm" style="flex:1" onclick="toast('Kalibrasi sensor Smart Locker dijalankan.')">Kalibrasi Sensor</button>
                    <button type="button" class="sx-btn sx-btn-sm" style="flex:1;background:#ffdad6;border-color:transparent;color:#93000a;font-weight:700" onclick="toast('Emergency unlock dikirim ke seluruh unit.')">Emergency Unlock</button>
                </div>
            </section>

            <section class="sx-card flat" style="padding:16px;gap:6px">
                <div class="sx-card-title-group">
                    <svg width="14" height="15" viewBox="0 0 24 24" fill="none" stroke="#1b1c1a" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <b style="font-size:12px;color:var(--sx-ink)">Kepatuhan UU PDP &amp; Proteksi Data</b>
                </div>
                <p class="sx-card-sub" style="font-size:12.5px">
                    Sesuai UU Perlindungan Data Pribadi No. 27/2022: Nomor telepon, PIN loker, dan identitas
                    pemustaka dienkripsi End-to-End (TLS 1.3). Metadata log publik di-mask secara otomatis
                    untuk mencegah kebocoran informasi sirkulasi privat.
                </p>
                <div style="display:flex;gap:8px;font-size:11px;font-weight:600;color:var(--sx-mute);margin-top:2px">
                    <span>Hash: SHA-256</span>
                    <span>&bull;</span>
                    <span>Zero-Knowledge Pinning</span>
                </div>
            </section>
        </div>
    </div>

    <div class="sx-footstrip">
        <div class="left">
            <svg width="16" height="15" viewBox="0 0 24 24" fill="none" stroke="#45464d" stroke-width="2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            <span>Kepatuhan Standar Infrastruktur Layanan Informasi Perpustakaan &amp; Gateway Telekomunikasi ISO 27001:2022</span>
        </div>
        <div class="right">
            <span class="hi">Inovexa Dispatch Engine v4.8</span>
            <span class="sep">&bull;</span>
            <span class="hi">Cluster Node ID-01 (Jakarta Central)</span>
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