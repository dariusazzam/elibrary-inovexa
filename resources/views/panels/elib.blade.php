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

    <nav class="elib-reference-tabs" id="elibTabs">
        <span class="is-active" style="cursor:pointer" onclick="switchElibTab(this, 'sedang')">Sedang Dibaca <b>3</b></span>
        <span style="cursor:pointer" onclick="switchElibTab(this, 'favorit')">Koleksi Favorit <b class="muted">12</b></span>
        <span style="cursor:pointer" onclick="switchElibTab(this, 'jurnal')">Jurnal &amp; Repositori</span>
        <span style="cursor:pointer" onclick="switchElibTab(this, 'audio')">Audiobook</span>
        <span style="cursor:pointer" onclick="switchElibTab(this, 'selesai')">Riwayat Baca Selesai</span>
    </nav>

    <div id="elibTabContent" style="margin-top:20px">
        <!-- Default Sedang Dibaca -->
    </div>

    <script>
    /* Ikon Lucide untuk konten tab yang dirakit lewat JS (path sama dengan komponen ikon) */
    const ELIB_ICONS = {
        star: '<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/>',
        'file-text': '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>',
        headphones: '<path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3"/>',
        play: '<polygon points="6 3 20 12 6 21 6 3"/>',
        'circle-check': '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>'
    };
    function ic(name, fill) {
        return '<svg viewBox="0 0 24 24" fill="' + (fill ? 'currentColor' : 'none') + '" stroke="' +
            (fill ? 'none' : 'currentColor') + '" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ' +
            'class="icon" style="vertical-align:-.125em" aria-hidden="true">' + (ELIB_ICONS[name] || '') + '</svg>';
    }

    function switchElibTab(el, tabName) {
        document.querySelectorAll('.elib-reference-tabs span').forEach(s => s.classList.remove('is-active'));
        el.classList.add('is-active');
        const container = document.getElementById('elibTabContent');
        if(tabName === 'favorit') {
            container.innerHTML = '<div style="padding:30px;background:#fff;border-radius:12px;border:1px solid #e2e8f0;text-align:center"><h3 style="margin-top:0">' + ic('star', true) + ' Koleksi Favorit Anda (12 Buku)</h3><p style="color:#64748b">Daftar buku pilihan yang Anda tandai sebagai favorit untuk dibaca kembali.</p><div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:14px;margin-top:16px"><div style="padding:14px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0"><b>Filosofi Teras</b><br><small>Henry Manampiring</small></div><div style="padding:14px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0"><b>Sapiens</b><br><small>Yuval Noah Harari</small></div><div style="padding:14px;background:#f8fafc;border-radius:8px;border:1px solid #e2e8f0"><b>Atomic Habits</b><br><small>James Clear</small></div></div></div>';
        } else if(tabName === 'jurnal') {
            container.innerHTML = '<div style="padding:30px;background:#fff;border-radius:12px;border:1px solid #e2e8f0;text-align:center"><h3 style="margin-top:0">' + ic('file-text') + ' Jurnal Ilmiah &amp; Repositori Nasional</h3><p style="color:#64748b">Akses dokumen riset, skripsi, tesis, dan jurnal terakreditasi BRIN / SINTA.</p><a href="{{ route('elib.read', 1) }}" class="elib-dark-button" style="display:inline-block;margin-top:10px;text-decoration:none">Buka Viewer Dokumen Riset</a></div>';
        } else if(tabName === 'audio') {
            container.innerHTML = '<div style="padding:30px;background:#fff;border-radius:12px;border:1px solid #e2e8f0;text-align:center"><h3 style="margin-top:0">' + ic('headphones') + ' Audiobook Perpustakaan</h3><p style="color:#64748b">Dengarkan ringkasan dan pembacaan buku populer langsung dari peramban.</p><div style="margin-top:12px;background:#f1f5f9;padding:12px;border-radius:8px">' + ic('play') + ' Memutar: <b>Atomic Habits (Bab 3 - Hukum Pertama Perubahan Perilaku)</b> [05:42 / 45:10]</div></div>';
        } else if(tabName === 'selesai') {
            container.innerHTML = '<div style="padding:30px;background:#fff;border-radius:12px;border:1px solid #e2e8f0;text-align:center"><h3 style="margin-top:0">' + ic('circle-check') + ' Riwayat Baca Selesai</h3><p style="color:#64748b">Anda telah menyelesaikan 18 judul buku sepanjang tahun 2026.</p></div>';
        } else {
            container.innerHTML = '';
            location.reload();
        }
    }
    </script>

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
                <article class="elib-book-card"><div class="elib-book-cover" style="background-image:url('{{ asset($book['cover']) }}')"></div><div class="elib-book-rating"><x-icon name="star" fill/> {{ $book['rating'] }} <span>&bull; 142 pembaca</span></div><h3>{{ $book['title'] }}</h3><p>{{ $book['author'] }}</p><small>{{ $book['format'] }}</small><a href="{{ route('elib.read', $book['id']) }}">Baca Sekarang</a></article>
            @endforeach
        </div>
    </section>

    <footer class="elib-challenge"><div><small>REKOMENDASI AKURASI PUSTAKAWAN INOVEXA</small><strong>Temukan buku yang cocok untuk minat riset &amp; literasi Anda.</strong><p>Koleksi ini dipilih berdasarkan riwayat bacaan dan minat anggota perpustakaan.</p></div><div class="elib-circle-score">75%</div><div><small>LITERASI CHALLENGE 2026</small><strong>3 dari 4 Buku</strong><p>1 buku lagi menuju pencapaian literasi.</p></div></footer>
</div>
