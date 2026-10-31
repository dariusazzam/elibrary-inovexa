@php
    $covers = [
        1 => 'foto/laskar pelangi.jpeg',
        2 => 'foto/Filosofi Teras.jpeg',
        3 => 'foto/Sapiens Riwayat Singkat Umat Manusia.jpeg',
        4 => 'foto/Metodologi Penelitian Kualitatif.jpeg',
        5 => 'foto/Bumi Manusia.jpeg',
        6 => 'foto/Iwan Kenrianto.jpg',
        7 => 'foto/The Psychology of Money.jpeg',
        8 => 'foto/Prinsip Desain Antarmuka Modern.jpeg',
    ];
    $featured = $catalogBooks[0] ?? null;
@endphp

<div class="catalog-page">
    <div class="catalog-breadcrumb">PORTAL ANGGOTA <span>/</span> KATALOG BUKU</div>
    <div class="catalog-heading">
        <div>
            <h1>Eksplorasi Katalog Buku</h1>
            <p>Temukan buku fisik, e-book, dan koleksi rekomendasi yang tersedia untuk Anda.</p>
        </div>
        <a href="{{ route('dashboard', 'resv') }}" class="catalog-primary-action">+ Reservasi Buku</a>
    </div>

    <form method="GET" action="{{ route('dashboard', 'cat') }}" class="catalog-filter-card">
        <div class="catalog-search-field"><span>⌕</span><input name="q" value="{{ $catalogQuery }}" type="search" placeholder="Cari judul buku, pengarang, atau lokasi rak..." aria-label="Cari katalog"></div>
        <select name="category" aria-label="Filter kategori">
            <option value="">Semua Kategori</option>
            @foreach($catalogCategories as $category)
                <option value="{{ $category }}" {{ $catalogCategory === $category ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
        <select name="sort" aria-label="Urutkan katalog">
            <option value="popular" {{ $catalogSort === 'popular' ? 'selected' : '' }}>Urutkan: Terpopuler</option>
            <option value="newest" {{ $catalogSort === 'newest' ? 'selected' : '' }}>Terbaru</option>
            <option value="title" {{ $catalogSort === 'title' ? 'selected' : '' }}>Judul A-Z</option>
        </select>
        <button type="submit" class="catalog-filter-button">☷ Terapkan</button>
        @if($catalogQuery !== '' || $catalogCategory !== '' || $catalogSort !== 'popular')
            <a href="{{ route('dashboard', 'cat') }}" class="catalog-reset-button">Reset</a>
        @endif
    </form>

    @if($featured)
        <section class="catalog-featured">
            <div class="catalog-featured-cover" style="background-image:url('{{ asset($covers[$featured['id']] ?? '') }}')"></div>
            <div class="catalog-featured-copy">
                <span class="catalog-eyebrow">REKOMENDASI MINGGU INI</span>
                <h2>{{ $featured['t'] }}</h2>
                <p class="catalog-author">{{ $featured['a'] }} <span>•</span> {{ $featured['c'] }}</p>
                <p class="catalog-description">Koleksi pilihan perpustakaan yang paling banyak dibaca anggota. Tersedia di rak {{ $featured['s'] }} dan dapat dipesan melalui kartu digital Anda.</p>
                <div class="catalog-featured-meta"><span>● Tersedia di rak</span><span>★★★★★ <b>4.8</b></span></div>
                <a href="{{ route('dashboard', 'resv') }}" class="catalog-primary-action">Reservasi Sekarang</a>
            </div>
            <div class="catalog-featured-stat"><b>92%</b><span>rating pembaca</span><hr><b>215</b><span>halaman</span></div>
        </section>
    @endif

    <div class="catalog-section-head"><div><span class="catalog-eyebrow">KOLEKSI TERSEDIA</span><h2>Semua Buku Pilihan</h2></div><span class="catalog-count">{{ count($catalogBooks) }} koleksi ditemukan</span></div>
    <div class="catalog-book-grid">
        @forelse($catalogBooks as $b)
            <article class="catalog-book-card">
                <div class="catalog-book-cover" style="background-image:url('{{ asset($covers[$b['id']] ?? '') }}')"><span>{{ $b['c'] }}</span></div>
                <div class="catalog-book-info"><span class="catalog-book-category">{{ strtoupper($b['c']) }}</span><h3>{{ $b['t'] }}</h3><p>{{ $b['a'] }}</p><small>Rak {{ $b['s'] }} <span>•</span> {{ $b['h'] }} halaman</small></div>
                <div class="catalog-book-footer"><span class="catalog-available">● Tersedia</span><a href="{{ route('dashboard', 'resv') }}">Reservasi <b>→</b></a></div>
            </article>
        @empty
            <div class="catalog-empty-state"><strong>Koleksi tidak ditemukan</strong><span>Coba gunakan kata kunci atau kategori lain.</span><a href="{{ route('dashboard', 'cat') }}">Tampilkan semua koleksi</a></div>
        @endforelse
    </div>
</div>
