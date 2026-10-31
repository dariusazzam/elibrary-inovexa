<?php
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
?>

<div class="catalog-page">
    <div class="catalog-breadcrumb">PORTAL ANGGOTA <span>/</span> KATALOG BUKU</div>
    <div class="catalog-heading">
        <div>
            <h1>Eksplorasi Katalog Buku</h1>
            <p>Temukan buku fisik, e-book, dan koleksi rekomendasi yang tersedia untuk Anda.</p>
        </div>
        <a href="<?php echo e(route('dashboard', 'resv')); ?>" class="catalog-primary-action">+ Reservasi Buku</a>
    </div>

    <form method="GET" action="<?php echo e(route('dashboard', 'cat')); ?>" class="catalog-filter-card">
        <div class="catalog-search-field"><span>⌕</span><input name="q" value="<?php echo e($catalogQuery); ?>" type="search" placeholder="Cari judul buku, pengarang, atau lokasi rak..." aria-label="Cari katalog"></div>
        <select name="category" aria-label="Filter kategori">
            <option value="">Semua Kategori</option>
            <?php $__currentLoopData = $catalogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category); ?>" <?php echo e($catalogCategory === $category ? 'selected' : ''); ?>><?php echo e($category); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <select name="sort" aria-label="Urutkan katalog">
            <option value="popular" <?php echo e($catalogSort === 'popular' ? 'selected' : ''); ?>>Urutkan: Terpopuler</option>
            <option value="newest" <?php echo e($catalogSort === 'newest' ? 'selected' : ''); ?>>Terbaru</option>
            <option value="title" <?php echo e($catalogSort === 'title' ? 'selected' : ''); ?>>Judul A-Z</option>
        </select>
        <button type="submit" class="catalog-filter-button">☷ Terapkan</button>
        <?php if($catalogQuery !== '' || $catalogCategory !== '' || $catalogSort !== 'popular'): ?>
            <a href="<?php echo e(route('dashboard', 'cat')); ?>" class="catalog-reset-button">Reset</a>
        <?php endif; ?>
    </form>

    <?php if($featured): ?>
        <section class="catalog-featured">
            <div class="catalog-featured-cover" style="background-image:url('<?php echo e(asset($covers[$featured['id']] ?? '')); ?>')"></div>
            <div class="catalog-featured-copy">
                <span class="catalog-eyebrow">REKOMENDASI MINGGU INI</span>
                <h2><?php echo e($featured['t']); ?></h2>
                <p class="catalog-author"><?php echo e($featured['a']); ?> <span>•</span> <?php echo e($featured['c']); ?></p>
                <p class="catalog-description">Koleksi pilihan perpustakaan yang paling banyak dibaca anggota. Tersedia di rak <?php echo e($featured['s']); ?> dan dapat dipesan melalui kartu digital Anda.</p>
                <div class="catalog-featured-meta"><span>● Tersedia di rak</span><span>★★★★★ <b>4.8</b></span></div>
                <a href="<?php echo e(route('dashboard', 'resv')); ?>" class="catalog-primary-action">Reservasi Sekarang</a>
            </div>
            <div class="catalog-featured-stat"><b>92%</b><span>rating pembaca</span><hr><b>215</b><span>halaman</span></div>
        </section>
    <?php endif; ?>

    <div class="catalog-section-head"><div><span class="catalog-eyebrow">KOLEKSI TERSEDIA</span><h2>Semua Buku Pilihan</h2></div><span class="catalog-count"><?php echo e(count($catalogBooks)); ?> koleksi ditemukan</span></div>
    <div class="catalog-book-grid">
        <?php $__empty_1 = true; $__currentLoopData = $catalogBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <article class="catalog-book-card">
                <div class="catalog-book-cover" style="background-image:url('<?php echo e(asset($covers[$b['id']] ?? '')); ?>')"><span><?php echo e($b['c']); ?></span></div>
                <div class="catalog-book-info"><span class="catalog-book-category"><?php echo e(strtoupper($b['c'])); ?></span><h3><?php echo e($b['t']); ?></h3><p><?php echo e($b['a']); ?></p><small>Rak <?php echo e($b['s']); ?> <span>•</span> <?php echo e($b['h']); ?> halaman</small></div>
                <div class="catalog-book-footer"><span class="catalog-available">● Tersedia</span><a href="<?php echo e(route('dashboard', 'resv')); ?>">Reservasi <b>→</b></a></div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="catalog-empty-state"><strong>Koleksi tidak ditemukan</strong><span>Coba gunakan kata kunci atau kategori lain.</span><a href="<?php echo e(route('dashboard', 'cat')); ?>">Tampilkan semua koleksi</a></div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\panels\cat.blade.php ENDPATH**/ ?>