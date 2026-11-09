@php
    $books = [
        ['id' => 5, 'cover' => 'foto/Bumi Manusia.jpeg', 'title' => 'Bumi Manusia', 'author' => 'Pramoedya A. Toer', 'format' => 'E-Book', 'rating' => '4.9'],
        ['id' => 2, 'cover' => 'foto/Filosofi Teras.jpeg', 'title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'format' => 'E-Book', 'rating' => '4.8'],
        ['id' => 6, 'cover' => 'foto/Iwan Kenrianto.jpg', 'title' => 'Deep Work', 'author' => 'Cal Newport', 'format' => 'E-Book', 'rating' => '4.7'],
        ['id' => 4, 'cover' => 'foto/Metodologi Penelitian Kualitatif.jpeg', 'title' => 'Metodologi Penelitian', 'author' => 'Prof. Dr. Sugiyono', 'format' => 'Repositori', 'rating' => '4.9'],
        ['id' => 8, 'cover' => 'foto/Prinsip Desain Antarmuka Modern.jpeg', 'title' => 'Laut Bercerita', 'author' => 'Leila S. Chudori', 'format' => 'E-Book', 'rating' => '4.8'],
    ];
@endphp

<div class="elib-reference-page">
    <header class="elib-reference-header">
        <div>
            <div class="elib-kicker"><span class="member-wordmark">INOVE<span>X</span>A TECHNOLOGIES</span> / PORTAL ANGGOTA / E-LIBRARY &amp; BACA</div>
            <h1>E-Library &amp; Koleksi Digital</h1>
            <p>Akses ribuan e-book, jurnal ilmiah, audiobook, dan lanjutkan membaca secara langsung di peramban tanpa batasan.</p>
        </div>
        <a href="{{ route('elib.read', 2) }}" class="elib-reader-button">Buka E-Reader Web</a>
    </header>

    <nav class="elib-reference-tabs">
        <span class="is-active">Sedang Dibaca <b>3</b></span>
        <span>Koleksi Favorit <b class="muted">12</b></span>
        <span>Jurnal &amp; Repositori</span>
        <span>Audiobook</span>
        <span>Riwayat Baca Selesai</span>
    </nav>

    <section class="elib-reference-top">
        <article class="elib-continue-card">
            <div class="elib-section-label"><span>LANJUTKAN MEMBACA TERAKHIR</span><small>Terakhir dibuka 35 menit lalu</small></div>
            <div class="elib-continue-content">
                <div class="elib-hero-cover" style="background-image:url('{{ asset('foto/Filosofi Teras.jpeg') }}')"></div>
                <div class="elib-continue-copy">
                    <span class="elib-blue-tag">SELF-DEVELOPMENT &amp; FILSAFAT PRAKTIS</span>
                    <h2>Filosofi Teras: Panduan Stoikisme Generasi Modern</h2>
                    <p>Penulis: <strong>Henry Manampiring</strong> &bull; Penerbit Buku Kompas</p>
                    <div class="elib-progress-row"><span>Bab 6: Mengelola Emosi Negatif &amp; Dikotomi Kendali</span><strong>68%</strong></div>
                    <div class="elib-progress"><i style="width:68%"></i></div>
                    <small>Halaman 184 dari 270 halaman &bull; 2 Catatan &bull; 5 Sorotan</small>
                    <div class="elib-actions"><a href="{{ route('elib.read', 2) }}" class="elib-dark-button">Lanjutkan Membaca</a><button>Daftar Isi &amp; Catatan</button><button>Mode Offline</button></div>
                </div>
            </div>
        </article>

        <aside class="elib-stats-column">
            <article class="elib-stat-card">
                <div class="elib-stat-heading"><div><small>TIER AKSES</small><strong>DIGITAL SCHOLAR</strong></div><b>UNLIMITED</b></div>
                <div class="elib-stat-line"><span>Download Baca Offline</span><strong>8 / 10</strong></div>
                <small>Sisa slot unduh 2 judul e-book untuk dibaca tanpa jaringan.</small>
            </article>
            <article class="elib-stat-card">
                <h3>AKTIVITAS MEMBACA PEKAN INI</h3>
                <div class="elib-stat-pair"><div><small>WAKTU</small><strong>4.5 Jam</strong><em>+22% dari pekan lalu</em></div><div><small>HALAMAN</small><strong>142 Hal</strong><em>Rata-rata 20 hal/hari</em></div></div>
                <div class="elib-target"><span>Target Baca Bulanan <b>3 / 4 Buku</b></span><i><u></u></i><small>Tersisa 1 lagi untuk menyelesaikan tantangan literasi.</small></div>
            </article>
        </aside>
    </section>

    <section class="elib-shelf-section">
        <div class="elib-section-title"><div><h2>Rak Buku: Sedang Aktif Dibaca</h2><p>Koleksi digital yang sedang Anda baca.</p></div><a href="#">Lihat Semua Rak &rsaquo;</a></div>
        <div class="elib-active-grid">
            <article class="elib-active-card"><img src="{{ asset('foto/Sapiens Riwayat Singkat Umat Manusia.jpeg') }}" alt="Sapiens"><div><small>ANTROPOLOGI SEJARAH</small><h3>Sapiens: Riwayat Singkat Umat Manusia</h3><p>Yuval Noah Harari</p><span>Revolusi Kognitif <b>42% &bull; Hal 210</b></span><a href="{{ route('elib.read', 3) }}">Baca Sekarang</a></div></article>
            <article class="elib-active-card"><img src="{{ asset('foto/Filosofi Teras.jpeg') }}" alt="Atomic Habits"><div><small>PERILAKU &amp; PRODUKTIVITAS</small><h3>Atomic Habits</h3><p>James Clear</p><span>Selesai 10 dari 20 bab <b>55% &bull; Audio 05:42</b></span><a href="{{ route('elib.read', 2) }}">Baca / Dengar</a></div></article>
            <article class="elib-active-card"><img src="{{ asset('foto/laskar pelangi.jpeg') }}" alt="Jurnal Riset"><div><small>REPOSITORI ILMIAH NASIONAL</small><h3>Jurnal Riset Kecerdasan Buatan Vol. 14</h3><p>Pusat Sitasi Sains BRIN</p><span>Dokumen Terverifikasi DOI <b>Hal 14 dari 32</b></span><a href="{{ route('elib.read', 1) }}">Buka PDF Viewer</a></div></article>
        </div>
    </section>

    <section class="elib-popular-section">
        <div class="elib-section-title"><div><h2>Eksplorasi Rekomendasi Terpopuler</h2><p>Koleksi terkurasi berdasarkan minat dan tren bacaan anggota perpustakaan.</p></div></div>
        <div class="elib-format-tabs"><b>Semua Format</b><span>E-Book (EPUB)</span><span>PDF Interaktif</span><span>Audiobook</span><span>Akses Bebas DRM</span><span>Terbitan 2026 Terbaru</span></div>
        <div class="elib-book-grid">
            @foreach($books as $book)
                <article class="elib-book-card"><div class="elib-book-cover" style="background-image:url('{{ asset($book['cover']) }}')"></div><div class="elib-book-rating">★ {{ $book['rating'] }} <span>&bull; 142 pembaca</span></div><h3>{{ $book['title'] }}</h3><p>{{ $book['author'] }}</p><small>{{ $book['format'] }}</small><a href="{{ route('elib.read', $book['id']) }}">Baca Sekarang</a></article>
            @endforeach
        </div>
    </section>

    <footer class="elib-challenge"><div><small>REKOMENDASI AKURASI PUSTAKAWAN INOVEXA</small><strong>Temukan buku yang cocok untuk minat riset &amp; literasi Anda.</strong><p>Koleksi ini dipilih berdasarkan riwayat bacaan dan minat anggota perpustakaan.</p></div><div class="elib-circle-score">75%</div><div><small>LITERASI CHALLENGE 2026</small><strong>3 dari 4 Buku</strong><p>1 buku lagi menuju pencapaian literasi.</p></div></footer>
</div>
