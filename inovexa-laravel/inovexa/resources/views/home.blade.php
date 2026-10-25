@extends('layouts.app')

@section('content')
@php
    $portals = [
        ['member', 'Portal Anggota (Warga)', 'Akses katalog online, reservasi buku, kartu digital, dan baca e-library secara mandiri.', 'Masuk Layanan Anggota', '', 'Akses Warga', '#dcebe2', '🪪'],
        ['admin', 'Meja Kerja Petugas (Admin)', 'Layanan sirkulasi pinjam-kembali, input denda keterlambatan, dan pencatatan buku fisik.', 'Masuk Portal Sirkulasi', 'or', 'Akses Meja Petugas', '#f7e3cf', '🗂'],
        ['super', 'Konsol Super Admin', 'Pengaturan hak akses peran, data master pengguna, dan konfigurasi sistem perpustakaan.', 'Masuk Konsol Admin', 'nv', 'Tata Kelola Pusat', '#e2e6f0', '⚙'],
    ];
@endphp

<nav><div class="w">
    <div class="logo"><i>▤</i><div>Inovexa<small>PUBLIC LIBRARY</small></div></div>
    <div class="links">
        <a href="#top" style="background:var(--b);font-weight:600">Beranda</a>
        <a href="#katalog">Katalog Buku</a>
        <a href="#layanan">Layanan Warga</a>
        <a href="#tentang">Tentang</a>
    </div>
    @if(session('user'))
        <a class="btn k" href="{{ route('dashboard') }}">Dashboard</a>
    @else
        <a class="btn k" href="{{ route('login') }}">Masuk Akun</a>
    @endif
    <span class="av" style="width:26px;height:26px;background:#111;color:#fff;font-size:12px">☺</span>
</div></nav>

<div class="w" id="top">
    <section class="hero">
        <span class="tag"><b style="color:#f97316">●</b> SISTEM TEMU KEMBALI INFORMASI (OPAC TERPADU)</span>
        <h1>Pusat Literasi &amp; Layanan Perpustakaan Umum</h1>
        <p>Jelajahi puluhan ribu koleksi buku fisik, naskah arsip, dan repositori digital untuk seluruh warga kota.</p>

        <form class="sb" method="GET" action="{{ route('home') }}#katalog">
            <span style="color:#555;padding-left:6px">⌕</span>
            <input name="q" value="{{ $q }}" aria-label="Cari katalog" placeholder="Cari judul buku, pengarang, subjek katalog (e.g. Sejarah, Fiksi)">
            @if($topic)<input type="hidden" name="topic" value="{{ $topic }}">@endif
            <button class="btn or">Cari Katalog →</button>
        </form>

        <div class="chips">
            <span style="font-size:11px;color:#b9cbc0">Rekomendasi Topik:</span>
            @foreach(\App\Support\Library::TOPICS as $t)
                <a class="chip {{ $topic === $t ? 'on' : '' }}"
                   href="{{ route('home', ['topic' => $topic === $t ? null : $t]) }}#katalog">{{ $t }}</a>
            @endforeach
        </div>
    </section>

    <section class="sec">
        <div class="band">
            <div class="row" style="margin-bottom:18px">
                <div><div class="lbl">PORTAL AKSES PERAN</div><h2 style="margin:0">Pintu Masuk Terpadu Sistem</h2></div>
                <span style="font-size:11px;color:var(--m);max-width:300px">Akses terkelola sesuai peran terdaftar untuk memfasilitasi aktivitas operasional, penelusuran, dan sirkulasi.</span>
            </div>
            <div class="g3">
                @foreach($portals as $p)
                <div class="card">
                    <span class="pill" style="float:right">{{ $p[5] }}</span>
                    <div class="ic" style="background:{{ $p[6] }}">{{ $p[7] }}</div>
                    <h3>{{ $p[1] }}</h3>
                    <p>{{ $p[2] }}</p>
                    <a class="btn {{ $p[4] }}" style="width:100%" href="{{ route('login', $p[0]) }}">{{ $p[3] }} →</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="sec" id="katalog">
        <div class="row">
            <div><div class="lbl">KATALOG TERPILIH</div><h2>Koleksi Pilihan Minggu Ini</h2></div>
            <a href="{{ route('home', ['all' => 1]) }}#katalog">Lihat Semua Katalog ›</a>
        </div>
        <div class="g3" id="grid">
            @forelse($books as $b)
                @include('partials.book-card')
            @empty
                <p style="color:var(--m)">Tidak ada buku yang cocok. Coba kata kunci atau topik lain.</p>
            @endforelse
        </div>
    </section>

    <section class="sec" id="layanan">
        <div class="band"><div class="g3" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr))">
            <div class="card">
                <h3>👥 Layanan Perpustakaan</h3>
                <p>Kemudahan akses bacaan dan fasilitas inklusif bagi publik</p>
                <ul class="ck">
                    <li><b>✓ Kartu Anggota Digital Gratis</b><span>Cukup verifikasi NIK KTP Anda untuk langsung mendapatkan barcode peminjaman mandiri.</span></li>
                    <li><b>✓ Bebas Denda untuk Pelajar &amp; Anak</b><span>Kebijakan pembebasan denda keterlambatan bagi anak dan siswa guna mendukung minat baca.</span></li>
                    <li><b>✓ Pojok Baca Digital &amp; Akses Internet</b><span>Tersedia 30 unit komputer riset dan jaringan internet terbuka untuk seluruh pengunjung.</span></li>
                </ul>
                <a href="{{ route('register') }}" style="font-size:12px;font-weight:600;color:var(--t)">Pelajari Tata Tertib &amp; Pendaftaran Anggota →</a>
            </div>
            <div class="card">
                <h3>🕘 Jam Layanan &amp; Fasilitas</h3>
                <p>Informasi operasional gedung dan lokasi pengembalian</p>
                <div style="background:var(--b);padding:12px;border-radius:8px;margin-bottom:14px;display:flex;justify-content:space-between;align-items:center">
                    <div><small style="color:var(--m)">SENIN – SABTU</small><br><b style="font-size:16px">08.00 – 20.00 WIB</b></div>
                    <span class="pill" style="background:#dcebe2;color:var(--ok)">Layanan Penuh</span>
                </div>
                <ul class="ck">
                    <li><b>📥 Drop-Box Mandiri 24 Jam</b><span>Kembalikan buku kapan saja tanpa antre melalui slot pengembalian otomatis di gerbang utama.</span></li>
                    <li><b>📍 Lobi Barat Perpustakaan</b><span>Gedung Perpustakaan Umum Kota, Jl. Perpustakaan Kota No. 42.</span></li>
                </ul>
                <button class="btn ghost" type="button" style="font-size:11px;padding:7px 10px" onclick="openModal('contact-modal')">Hubungi Meja Sirkulasi</button>
            </div>
        </div></div>
    </section>

    <footer id="tentang">
        <div>
            <div class="logo" style="color:var(--t);margin-bottom:8px"><i>▤</i>Inovexa Public Library</div>
            Pusat literasi sipil modern yang berdedikasi melayani keterbukaan informasi, arsip daerah, serta ruang bertumbuh bagi segenap warga.
        </div>
        <div>
            <h5>LOKASI &amp; JAM OPERASIONAL</h5>
            <div>Jl. Perpustakaan Kota No. 42, Kebayoran Baru, Jakarta Selatan 12140</div>
            <div>Senin – Jumat: 08.00 – 20.00 WIB</div>
            <div>Sabtu – Minggu: 09.00 – 17.00 WIB</div>
        </div>
        <div>
            <h5>NAVIGASI CEPAT</h5>
            <div><a href="#top">Beranda Utama</a></div>
            <div><a href="#katalog">Pencarian Koleksi</a></div>
            <div><a href="{{ route('register') }}">Kartu Anggota Digital</a></div>
            <div><a href="#layanan">Visi &amp; Tata Tertib</a></div>
        </div>
        <div style="grid-column:1/-1;border-top:1px solid var(--ln);padding-top:16px;display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap">
            <span>© {{ date('Y') }} Inovexa Public Library. Seluruh hak cipta dilindungi.</span>
            <span>
                <a href="#tentang">Privasi</a> &nbsp;&nbsp;
                <a href="#layanan">Aksesibilitas</a> &nbsp;&nbsp;
                <a href="#" onclick="openModal('contact-modal');return false">Kontak</a>
            </span>
        </div>
    </footer>
</div>

<div class="modal" id="contact-modal" role="dialog" aria-modal="true" aria-labelledby="contact-title" onclick="if(event.target === this) closeModal('contact-modal')">
    <div class="modal-box">
        <button class="modal-close" type="button" aria-label="Tutup" onclick="closeModal('contact-modal')">×</button>
        <div class="lbl">PUSAT BANTUAN</div>
        <h2 id="contact-title">Meja Sirkulasi &amp; Informasi</h2>
        <p style="color:var(--m)">Petugas siap membantu masalah pengembalian, perpanjangan pinjaman, atau aktivasi kartu anggota.</p>
        <div class="card" style="background:var(--b);margin-top:14px">
            <b>☎ Telepon:</b> (021) 555-0142<br>
            <b>✉ Email:</b> layanan@inovexa.test<br>
            <b>⌂ Lokasi:</b> Lobi Barat, Gedung Perpustakaan Umum Kota
        </div>
        <p style="font-size:12px;color:var(--m);margin-bottom:0">Jam respons petugas: Senin–Sabtu, 08.00–20.00 WIB.</p>
    </div>
</div>
@endsection
