<div style="margin-bottom:16px">
    <div class="lbl" style="color:var(--o);font-size:10px;font-weight:700;letter-spacing:.06em;margin-bottom:4px">Portal Anggota &rsaquo; E-Library &amp; Baca</div>
    <div style="display:flex;justify-content:space-between;align-items:flex-start">
        <div>
            <h2 style="font-size:24px;margin:0 0 4px;font-weight:800;letter-spacing:-.02em">E-Library &amp; Koleksi Digital</h2>
            <p style="color:var(--m);font-size:12.5px;margin:0">Akses ribuan e-book, jurnal ilmiah, audiobook, dan lanjutkan membaca secara langsung di peramban tanpa batas kuota fisik.</p>
        </div>
        <div style="display:flex;gap:8px">
            <a href="#" class="btn ghost" style="font-size:11.5px;padding:7px 12px">📥 Unduh Aplikasi Baca Win/Mac</a>
            <a href="#" class="btn" style="background:#153223;font-size:11.5px;padding:7px 12px">📖 Buka E-Reader Web</a>
        </div>
    </div>
</div>

{{-- Sub Tab Navigasi E-Library --}}
<div style="display:flex;gap:28px;border-bottom:1px solid var(--ln);margin-bottom:20px;font-size:13px;font-weight:600">
    <div style="padding-bottom:10px;border-bottom:2px solid #111;color:#111;display:flex;align-items:center;gap:6px;cursor:pointer">
        Sedang Dibaca <span style="background:#153223;color:#fff;font-size:10px;padding:1px 6px;border-radius:99px;font-weight:700">3</span>
    </div>
    <div style="padding-bottom:10px;color:var(--m);display:flex;align-items:center;gap:6px;cursor:pointer">
        Koleksi Favorit &amp; Bookmark <span style="background:#e5e7eb;color:var(--t);font-size:10px;padding:1px 6px;border-radius:99px;font-weight:700">12</span>
    </div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Jurnal &amp; Repositori Ilmiah</div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Audiobook Terpopuler</div>
    <div style="padding-bottom:10px;color:var(--m);cursor:pointer">Riwayat Bacaan Selesai</div>
</div>

<div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start">
    {{-- Kolom Kiri: Lanjutkan Membaca Terakhir --}}
    <div class="card" style="background:#fff;padding:22px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
            <span style="font-size:10px;font-weight:700;color:var(--m);letter-spacing:.05em">LANJUTKAN MEMBACA TERAKHIR</span>
            <span style="font-size:11px;color:var(--m)">⏱️ Terakhir dibuka 35 menit lalu</span>
        </div>

        <div style="display:flex;gap:20px;align-items:center">
            <div style="width:110px;height:150px;border-radius:8px;background:url('{{ asset('foto/Filosofi Teras.jpeg') }}') center/cover no-repeat;flex-shrink:0;box-shadow:0 6px 16px rgba(0,0,0,.15)"></div>
            <div style="flex:1">
                <span class="pill" style="background:#e0f2fe;color:#0369a1;font-size:9px;margin-bottom:6px;display:inline-block">SELF DEVELOPMENT &amp; FILSAFAT PRAKTIS</span>
                <h3 style="margin:0 0 4px;font-size:18px;font-weight:800">Filosofi Teras: Panduan Stoikisme Generasi Modern</h3>
                <small style="color:var(--m);font-size:12px;display:block;margin-bottom:12px">Penulis: <b>Henry Manampiring</b> &bull; Penerbit Buku Kompas</small>

                <div style="margin-bottom:12px">
                    <div style="display:flex;justify-content:space-between;font-size:11.5px;margin-bottom:4px">
                        <span style="color:var(--t)">📖 Bab 6: Mengelola Emosi Negatif &amp; Dikotomi Kendali</span>
                        <b style="color:var(--ok)">68%</b>
                    </div>
                    <div style="width:100%;height:6px;background:#e5e7eb;border-radius:99px;overflow:hidden">
                        <div style="width:68%;height:100%;background:#166534;border-radius:99px"></div>
                    </div>
                    <small style="font-size:10.5px;color:var(--m);display:block;margin-top:4px">Halaman 184 dari 270 halaman &bull; 📝 2 Catatan &bull; 📌 5 Sorotan</small>
                </div>

                <div style="display:flex;gap:10px;align-items:center;margin-top:14px">
                    <a href="{{ route('elib.read', 2) }}" class="btn" style="background:#153223;font-size:12px;padding:8px 16px">▶ Lanjutkan Membaca</a>
                    <button class="btn ghost" style="font-size:12px;padding:8px 12px">📑 Daftar Isi &amp; Catatan</button>
                    <button class="btn ghost" style="font-size:12px;padding:8px 12px">📥 Mode Baca Offline</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan: Tier Akses & Aktivitas Membaca --}}
    <div style="display:flex;flex-direction:column;gap:16px">
        <div class="card" style="background:#fff;padding:18px">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;border-bottom:1px solid var(--ln);padding-bottom:10px">
                <div>
                    <span style="font-size:9px;color:var(--m);font-weight:700">TIER AKSES</span>
                    <h4 style="margin:2px 0 0;font-size:14px">DIGITAL DIGITAL SCHOLAR</h4>
                </div>
                <span class="pill" style="background:#dcebe2;color:var(--ok);font-weight:700">Unlimited</span>
            </div>

            <div style="display:flex;justify-content:space-between;align-items:center;font-size:12px;margin-bottom:12px">
                <span style="color:var(--m)">Download Baca Offline</span>
                <b>8 / 10 Judul</b>
            </div>
            <small style="font-size:10px;color:var(--m);display:block;margin-top:-6px;margin-bottom:12px">Sisa slot unduh 2 judul e-book untuk dibaca tanpa jaringan.</small>
        </div>

        <div class="card" style="background:#fff;padding:18px">
            <h4 style="margin:0 0 12px;font-size:13px;font-weight:700">AKTIVITAS MEMBACA PEKAN INI</h4>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:14px;font-size:12px">
                <div>
                    <span style="color:var(--m);font-size:10px">⏱️ WAKTU</span>
                    <div style="font-size:16px;font-weight:800;color:var(--t)">4.5 Jam</div>
                    <small style="color:var(--ok);font-size:10px">+ 22% dari pekan lalu</small>
                </div>
                <div>
                    <span style="color:var(--m);font-size:10px">📄 HALAMAN</span>
                    <div style="font-size:16px;font-weight:800;color:var(--t)">142 Hal</div>
                    <small style="color:var(--m);font-size:10px">Rata-rata 20 hal/hari</small>
                </div>
            </div>

            <div style="border-top:1px solid var(--ln);padding-top:12px">
                <div style="display:flex;justify-content:space-between;font-size:11.5px;margin-bottom:4px">
                    <span style="color:var(--m)">Target Baca Bulanan</span>
                    <b>3 / 4 Buku (75%)</b>
                </div>
                <div style="width:100%;height:5px;background:#e5e7eb;border-radius:99px;overflow:hidden">
                    <div style="width:75%;height:100%;background:#b45309;border-radius:99px"></div>
                </div>
                <small style="font-size:10.5px;color:var(--m);display:block;margin-top:4px">Tersisa 1 lagi untuk menyelesaikan tantangan literasi Oktober 2026.</small>
            </div>
        </div>
    </div>
</div>

{{-- Rak Buku: Sedang Aktif Dibaca --}}
<div style="margin-top:28px">
    <div class="row" style="margin-bottom:14px">
        <h3 style="margin:0;font-size:16px;font-weight:700">Rak Buku: Sedang Aktif Dibaca</h3>
        <a href="#" onclick="toast('Menampilkan seluruh rak');return false" style="color:var(--o);font-weight:600;font-size:12px">Lihat Semua Rak ›</a>
    </div>

    <div class="g3" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr))">
        {{-- Item Rak 1 --}}
        <div class="card" style="background:#fff;display:flex;gap:14px;align-items:center;padding:16px">
            <div style="width:64px;height:84px;border-radius:6px;background:url('{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}') center/cover no-repeat;flex-shrink:0;border:1px solid var(--ln)"></div>
            <div style="flex:1">
                <span style="font-size:9px;color:var(--m);font-weight:700">ANTROPOLOGI SEJARAH</span>
                <h4 style="margin:2px 0;font-size:14px;font-weight:700">Sapiens: Riwayat Singkat Umat Manusia</h4>
                <small style="color:var(--m);font-size:11px">Yuval Noah Harari</small>
                <div style="margin-top:8px;font-size:11px;color:var(--m)">📍 Bab 2: Pohon Pengetahuan</div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px;font-size:11px;border-top:1px solid var(--ln);padding-top:6px">
                    <span style="color:var(--ok)">Revolusi Kognitif</span>
                    <b>42% &bull; Hal 210</b>
                </div>
                <a href="{{ route('elib.read', 3) }}" class="btn" style="width:100%;margin-top:10px;font-size:11px;padding:6px;background:#153223;text-align:center">📖 Baca Sekarang</a>
            </div>
        </div>

        {{-- Item Rak 2 --}}
        <div class="card" style="background:#fff;display:flex;gap:14px;align-items:center;padding:16px">
            <div style="width:64px;height:84px;border-radius:6px;background:url('{{ asset('foto/Filosofi Teras.jpeg') }}') center/cover no-repeat;flex-shrink:0;border:1px solid var(--ln)"></div>
            <div style="flex:1">
                <span style="font-size:9px;color:var(--m);font-weight:700">PERILAKU &amp; PRODUKTIVITAS</span>
                <h4 style="margin:2px 0;font-size:14px;font-weight:700">Atomic Habits</h4>
                <small style="color:var(--m);font-size:11px">James Clear</small>
                <div style="margin-top:8px;font-size:11px;color:var(--m)">🎧 Hukuman &amp; Perubahan Perilaku</div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px;font-size:11px;border-top:1px solid var(--ln);padding-top:6px">
                    <span style="color:#b45309">Selesai 10 dari 20 bab</span>
                    <b>55% &bull; Audio 05:42</b>
                </div>
                <a href="{{ route('elib.read', 2) }}" class="btn" style="width:100%;margin-top:10px;font-size:11px;padding:6px;background:#153223;text-align:center">🎧 Baca / Dengar</a>
            </div>
        </div>

        {{-- Item Rak 3 --}}
        <div class="card" style="background:#fff;display:flex;gap:14px;align-items:center;padding:16px">
            <div style="width:64px;height:84px;border-radius:6px;background:url('{{ asset('foto/laskar pelangi.jpeg') }}') center/cover no-repeat;flex-shrink:0;border:1px solid var(--ln)"></div>
            <div style="flex:1">
                <span style="font-size:9px;color:var(--m);font-weight:700">REPOSITORI ILMIAH NASIONAL</span>
                <h4 style="margin:2px 0;font-size:14px;font-weight:700">Jurnal Riset Kecerdasan Buatan Vol. 14</h4>
                <small style="color:var(--m);font-size:11px">Pusat Sitasi Sains BRIN</small>
                <div style="margin-top:8px;font-size:11px;color:var(--m)">📄 Paper: LLM for Library Discovery</div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px;font-size:11px;border-top:1px solid var(--ln);padding-top:6px">
                    <span style="color:var(--ok)">Dokumen Terverifikasi DOI</span>
                    <b>Hal 14 dari 32</b>
                </div>
                <a href="{{ route('elib.read', 1) }}" class="btn ghost" style="width:100%;margin-top:10px;font-size:11px;padding:6px;text-align:center">📥 Buka PDF Viewer</a>
            </div>
        </div>
    </div>
</div>

{{-- Eksplorasi Rekomendasi Terpopuler --}}
<div style="margin-top:32px">
    <div class="row" style="margin-bottom:14px">
        <div>
            <h3 style="margin:0;font-size:16px;font-weight:700">Eksplorasi Rekomendasi Terpopuler</h3>
            <small style="color:var(--m);font-size:11.5px">Koleksi terkurasi berdasarkan minat riset &amp; tren bacaan anggota perpustakaan Inovexa.</small>
        </div>
    </div>

    {{-- Filter Format --}}
    <div style="display:flex;gap:10px;margin-bottom:18px;flex-wrap:wrap;font-size:12px;align-items:center">
        <span class="chip on" style="background:#153223;color:#fff;padding:6px 14px;border-radius:99px">Semua Format</span>
        <span class="chip" style="background:#e5e7eb;color:var(--t);padding:6px 14px;border-radius:99px">E-Book (EPUB)</span>
        <span class="chip" style="background:#e5e7eb;color:var(--t);padding:6px 14px;border-radius:99px">PDF Interaktif</span>
        <span class="chip" style="background:#e5e7eb;color:var(--t);padding:6px 14px;border-radius:99px">Audiobook</span>
        <span class="chip" style="background:#e5e7eb;color:var(--t);padding:6px 14px;border-radius:99px">Akses Bebas DRM</span>
        <span class="chip" style="background:#e5e7eb;color:var(--t);padding:6px 14px;border-radius:99px">Terbitan 2026 Terbaru</span>
    </div>

@php
    $imgList = [
        1 => 'foto/laskar pelangi.jpeg',
        2 => 'foto/Filosofi Teras.jpeg',
        3 => 'foto/Sapiens Riwayat Singkat Umat Manusia.jpeg',
        4 => 'foto/Metodologi Penelitian Kualitatif.jpeg',
        5 => 'foto/Bumi Manusia.jpeg',
        6 => 'foto/The Psychology of Money.jpeg',
        7 => 'foto/Bisnis Online Revolution.jpeg',
        8 => 'foto/Prinsip Desain Antarmuka Modern.jpeg',
    ];
@endphp
<div class="g3" style="grid-template-columns:repeat(auto-fit,minmax(240px,1fr))">
    @foreach($lib->books as $b)
    @php $imgFile = $imgList[$b['id']] ?? null; @endphp
    <div class="card" style="background:#fff;padding:16px;display:flex;flex-direction:column;justify-content:space-between">
        <div>
            <div style="width:100%;height:160px;border-radius:6px;background:{{ $imgFile ? "url('" . asset($imgFile) . "') center/contain no-repeat" : '#1b2d48' }};border:1px solid var(--ln);margin-bottom:12px;background-color:#fafaf9;display:flex;align-items:center;justify-content:center;color:#fff;font-size:11px;font-weight:600">
                @unless($imgFile) [ Belum ada foto ] @endunless
            </div>
            <span class="pill" style="background:#f3f4f6;color:var(--t);font-size:9px;margin-bottom:6px;display:inline-block">{{ strtoupper($b['c']) }}</span>
            <h4 style="margin:0 0 2px;font-size:15px;font-weight:700">{{ $b['t'] }}</h4>
            <small style="color:var(--m);font-size:11.5px">{{ $b['a'] }}</small>
        </div>
        <div style="margin-top:14px;border-top:1px solid var(--ln);padding-top:10px;display:flex;justify-content:space-between;align-items:center">
            <a href="{{ route('elib.read', $b['id']) }}" class="btn" style="font-size:11px;padding:6px 14px;background:#153223">📖 Baca Sekarang</a>
            <span style="font-size:11px;color:var(--ok);font-weight:600">✓ Bebas DRM</span>
        </div>
    </div>
    @endforeach
</div>
</div>

{{-- 3 KARTU SAMPUL Buku Sesuai Permintaan (Image 2 & 3) --}}
<div style="margin-top:40px;border-top:2px dashed var(--ln);padding-top:30px">
    <div style="margin-bottom:18px">
        <div class="lbl" style="color:var(--o);font-size:10px;font-weight:700;letter-spacing:.06em;margin-bottom:4px">REPOSITORI KHUSUS &amp; RAK KOLEKSI</div>
        <h3 style="font-size:20px;font-weight:800;margin:0">Koleksi Unggulan Rak Akademik &amp; Fiksi</h3>
        <p style="color:var(--m);font-size:12px;margin:2px 0 0">Tampilan visual sampul rak perpustakaan daerah sesuai standar katalogisasi.</p>
    </div>

    <div class="g3" style="grid-template-columns:repeat(auto-fit,minmax(280px,1fr))">
        {{-- Card 1 --}}
        <div class="card" style="background:#fff;border:1px solid var(--ln);border-radius:14px;padding:20px;display:flex;flex-direction:column;justify-content:space-between">
            <div style="background:url('{{ asset('foto/Metodologi Penelitian Kualitatif.jpeg') }}') center/contain no-repeat;border-radius:10px;padding:24px 16px;text-align:center;min-height:260px;position:relative">
                <span style="position:absolute;top:10px;right:10px;background:#112224;color:#fff;font-size:9px;font-weight:700;padding:3px 8px;border-radius:99px">Rak Sains 04</span>
            </div>
            <div>
                <h4 style="margin:14px 0 2px;font-size:16px;font-weight:800">Metodologi Penelitian Kualitatif</h4>
                <small style="color:var(--m);font-size:12px">Prof. Dr. Sugiyono &bull; Sains &amp; Data</small>
                <div style="font-size:11.5px;color:var(--ok);font-weight:600;margin:8px 0 14px">● Tersedia 3 Bab Digital</div>
                <a href="{{ route('elib.read', 4) }}" class="btn" style="width:100%;background:#153223;font-size:12px;padding:9px;text-align:center">📖 Baca Sekarang</a>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="card" style="background:#fff;border:1px solid var(--ln);border-radius:14px;padding:20px;display:flex;flex-direction:column;justify-content:space-between">
            <div style="background:url('{{ asset('foto/Bumi Manusia.jpeg') }}') center/contain no-repeat;border-radius:10px;padding:24px 16px;text-align:center;min-height:260px;position:relative">
                <span style="position:absolute;top:10px;right:10px;background:#2b150e;color:#fff;font-size:9px;font-weight:700;padding:3px 8px;border-radius:99px">Sirkulasi Aktif</span>
            </div>
            <div>
                <h4 style="margin:14px 0 2px;font-size:16px;font-weight:800">Bumi Manusia</h4>
                <small style="color:var(--m);font-size:12px">Pramoedya A. Toer &bull; Fiksi &amp; Sastra</small>
                <div style="font-size:11.5px;color:var(--ok);font-weight:600;margin:8px 0 14px">● Tersedia 3 Bab Digital</div>
                <a href="{{ route('elib.read', 5) }}" class="btn" style="width:100%;background:#153223;font-size:12px;padding:9px;text-align:center">📖 Baca Sekarang</a>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="card" style="background:#fff;border:1px solid var(--ln);border-radius:14px;padding:20px;display:flex;flex-direction:column;justify-content:space-between">
            <div style="background:url('{{ asset('foto/The Psychology of Money.jpeg') }}') center/contain no-repeat;border-radius:10px;padding:24px 16px;text-align:center;min-height:260px;position:relative">
                <span style="position:absolute;top:10px;right:10px;background:#132419;color:#fff;font-size:9px;font-weight:700;padding:3px 8px;border-radius:99px">Rak Bisnis 03</span>
            </div>
            <div>
                <h4 style="margin:14px 0 2px;font-size:16px;font-weight:800">The Psychology of Money</h4>
                <small style="color:var(--m);font-size:12px">Morgan Housel &bull; Bisnis &amp; Finansial</small>
                <div style="font-size:11.5px;color:var(--ok);font-weight:600;margin:8px 0 14px">● Tersedia 3 Bab Digital Scholar</div>
                <a href="{{ route('elib.read', 7) }}" class="btn" style="width:100%;background:#153223;font-size:12px;padding:9px;text-align:center">📖 Baca Sekarang</a>
            </div>
        </div>
    </div>
</div>
