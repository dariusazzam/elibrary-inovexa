<?php $__env->startSection('title', 'E-Library & Digital Library'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Perpustakaan Digital (E-Library)</h1>
            <p class="text-sm text-gray-500">Akses koleksi dokumen digital, e-book, jurnal, dan karya ilmiah</p>
        </div>

        <div class="flex items-center gap-2">
            <a href="<?php echo e(route('elibrary.history')); ?>" class="inline-flex items-center bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-medium px-3 py-2 rounded-md shadow-sm">
                Riwayat Membaca
            </a>
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->isStaffOrAdmin()): ?>
                    <button onclick="document.getElementById('uploadModal').classList.toggle('hidden')" class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm">
                        + Unggah Dokumen Digital
                    </button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Upload Modal for Staff/Admin -->
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isStaffOrAdmin()): ?>
            <div id="uploadModal" class="hidden bg-white p-6 rounded-xl border border-indigo-200 shadow-md">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h3 class="font-bold text-gray-900">Form Unggah E-Library</h3>
                    <button onclick="document.getElementById('uploadModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 text-lg">&times;</button>
                </div>

                <form method="POST" action="<?php echo e(route('elibrary.store')); ?>" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Pilih Judul Buku <span class="text-red-500">*</span></label>
                        <select name="book_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="">-- Pilih Buku Referensi --</option>
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($book->id); ?>"><?php echo e($book->title); ?> (<?php echo e($book->author); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Tipe Dokumen <span class="text-red-500">*</span></label>
                        <select name="doc_type" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="ebook">E-Book</option>
                            <option value="jurnal">Jurnal Ilmiah</option>
                            <option value="artikel">Artikel</option>
                            <option value="skripsi">Skripsi / Tugas Akhir</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-1">Tingkat Akses <span class="text-red-500">*</span></label>
                        <select name="access_level" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            <option value="public">Publik (Semua Pengunjung)</option>
                            <option value="member_only">Hanya Anggota Terdaftar</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium text-gray-700 mb-1">File Dokumen PDF <span class="text-red-500">*</span></label>
                        <input type="file" name="file" accept=".pdf" required class="w-full px-3 py-1.5 border border-gray-300 rounded-md text-xs">
                        <p class="text-[11px] text-gray-500 mt-1">Maksimal 20 MB, format PDF.</p>
                    </div>

                    <div class="md:col-span-2 flex justify-end gap-2 pt-2 border-t">
                        <button type="button" onclick="document.getElementById('uploadModal').classList.add('hidden')" class="px-4 py-2 border rounded-md text-gray-600 hover:bg-gray-50">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-md">Unggah Sekarang</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Filter & Search Bar -->
    <form method="GET" action="<?php echo e(route('elibrary.index')); ?>" class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col md:flex-row gap-3">
        <div class="flex-1">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari judul digital, pengarang..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
        </div>
        <div class="w-full md:w-44">
            <select name="doc_type" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                <option value="">Semua Dokumen</option>
                <option value="ebook" <?php echo e(request('doc_type') === 'ebook' ? 'selected' : ''); ?>>E-Book</option>
                <option value="jurnal" <?php echo e(request('doc_type') === 'jurnal' ? 'selected' : ''); ?>>Jurnal</option>
                <option value="artikel" <?php echo e(request('doc_type') === 'artikel' ? 'selected' : ''); ?>>Artikel</option>
                <option value="skripsi" <?php echo e(request('doc_type') === 'skripsi' ? 'selected' : ''); ?>>Skripsi</option>
            </select>
        </div>
        <div class="w-full md:w-44">
            <select name="access_level" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                <option value="">Semua Akses</option>
                <option value="public" <?php echo e(request('access_level') === 'public' ? 'selected' : ''); ?>>Publik</option>
                <option value="member_only" <?php echo e(request('access_level') === 'member_only' ? 'selected' : ''); ?>>Khusus Anggota</option>
            </select>
        </div>
        <button type="submit" class="bg-gray-800 hover:bg-black text-white text-sm px-4 py-2 rounded-md">
            Filter
        </button>
        <?php if(request()->hasAny(['search', 'doc_type', 'access_level'])): ?>
            <a href="<?php echo e(route('elibrary.index')); ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-800 px-2 py-2">
                Reset
            </a>
        <?php endif; ?>
    </form>

    <!-- Ebooks Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php $__empty_1 = true; $__currentLoopData = $ebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-5 flex flex-col justify-between hover:border-indigo-300 transition">
                <div>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-indigo-50 text-indigo-700 px-2 py-0.5 rounded">
                            <?php echo e($ebook->doc_type); ?>

                        </span>
                        <span class="text-[10px] <?php echo e($ebook->access_level === 'public' ? 'text-emerald-700 bg-emerald-50' : 'text-amber-700 bg-amber-50'); ?> px-2 py-0.5 rounded font-medium">
                            <?php echo e($ebook->access_level === 'public' ? 'Publik' : 'Member'); ?>

                        </span>
                    </div>

                    <h3 class="font-bold text-gray-900 mt-3 text-base line-clamp-2">
                        <?php echo e($ebook->book->title ?? 'Judul Tidak Tersedia'); ?>

                    </h3>
                    <p class="text-xs text-gray-600 mt-1">Penulis: <?php echo e($ebook->book->author ?? '-'); ?></p>
                    <p class="text-xs text-gray-400 mt-0.5">Kategori: <?php echo e($ebook->book->category->category_name ?? '-'); ?></p>
                </div>

                <div class="mt-5 pt-3 border-t border-gray-100 space-y-2">
                    <div class="flex items-center gap-2">
                        <a href="<?php echo e(route('elibrary.read', $ebook)); ?>" target="_blank" class="flex-1 text-center bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold py-2 rounded">
                            Baca Online
                        </a>
                        <a href="<?php echo e(route('elibrary.download', $ebook)); ?>" class="px-3 py-2 border border-gray-300 hover:bg-gray-50 text-gray-700 text-xs font-semibold rounded">
                            Unduh
                        </a>
                    </div>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->isStaffOrAdmin()): ?>
                            <form method="POST" action="<?php echo e(route('elibrary.destroy', $ebook)); ?>" onsubmit="return confirm('Hapus dokumen digital ini?')" class="text-right">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-[11px] text-red-600 hover:text-red-800">
                                    Hapus Dokumen
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full bg-white p-8 text-center text-gray-500 rounded-xl border border-gray-200">
                Belum ada dokumen digital yang diunggah.
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        <?php echo e($ebooks->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\elibrary\index.blade.php ENDPATH**/ ?>