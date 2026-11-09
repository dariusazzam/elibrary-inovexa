<?php $__env->startSection('title', 'Edit Buku - ' . $book->title); ?>

<?php $__env->startSection('content'); ?>
<?php
    $bookCoverFiles = [
        'The Psychology of Money.jpeg',
        'Sapiens Riwayat Singkat Umat Manusia.jpeg',
        'Prinsip Desain Antarmuka Modern.jpeg',
        'Metodologi Penelitian Kualitatif.jpeg',
        'laskar pelangi.jpeg',
        'Filosofi Teras.jpeg',
        'Bumi Manusia.jpeg',
        'Atomic Habits.jpeg',
        'bisnis onlain.jpeg',
    ];
    $bookCoverAliases = [
        'atomichabitsperubahankecilhasilluarbiasa' => 'Atomic Habits.jpeg',
        'sapiensriwayatsingkatumatmanusia' => 'Sapiens Riwayat Singkat Umat Manusia.jpeg',
    ];
    $normalizeBookName = fn (string $name): string => preg_replace('/[^a-z0-9]/', '', strtolower($name));
    $normalizedTitle = $normalizeBookName($book->title);
    $coverImage = $bookCoverAliases[$normalizedTitle] ?? collect($bookCoverFiles)->first(function (string $file) use ($normalizeBookName, $normalizedTitle): bool {
        $fileName = pathinfo($file, PATHINFO_FILENAME);

        return $normalizeBookName($fileName) === $normalizedTitle
            || str_contains($normalizedTitle, $normalizeBookName($fileName))
            || str_contains($normalizeBookName($fileName), $normalizedTitle);
    });
?>

<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Data Buku</h1>
            <p class="text-sm text-gray-500">Perbarui informasi bibliografi buku: <?php echo e($book->title); ?></p>
        </div>
        <a href="<?php echo e(route('books.show', $book)); ?>" class="text-sm text-gray-600 hover:text-indigo-600 font-medium">
            &larr; Kembali ke Detail Buku
        </a>
    </div>

    <form method="POST" action="<?php echo e(route('books.update', $book)); ?>" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-5">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="flex items-center gap-4 rounded-lg bg-gray-50 border border-gray-200 p-4">
            <?php if($coverImage): ?>
                <img src="<?php echo e(asset('foto/' . $coverImage)); ?>?v=<?php echo e(filemtime(public_path('foto/' . $coverImage))); ?>" alt="Sampul <?php echo e($book->title); ?>"
                     class="h-28 w-20 rounded-md object-cover shadow-sm border border-gray-200">
            <?php else: ?>
                <div class="h-28 w-20 rounded-md border border-dashed border-gray-300 bg-white flex items-center justify-center text-center px-2 text-[10px] text-gray-400">
                    Foto buku belum tersedia
                </div>
            <?php endif; ?>
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Sampul Buku</p>
                <p class="mt-1 text-sm font-medium text-gray-900"><?php echo e($book->title); ?></p>
                <p class="mt-1 text-xs text-gray-500">Foto sampul diambil dari folder foto.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Buku <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="<?php echo e(old('title', $book->title)); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $book->category_id) == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->category_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">Nomor ISBN <span class="text-red-500">*</span></label>
                <input type="text" id="isbn" name="isbn" value="<?php echo e(old('isbn', $book->isbn)); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500 font-mono">
            </div>

            <div>
                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Pengarang / Penulis <span class="text-red-500">*</span></label>
                <input type="text" id="author" name="author" value="<?php echo e(old('author', $book->author)); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="publisher" class="block text-sm font-medium text-gray-700 mb-1">Penerbit <span class="text-red-500">*</span></label>
                <input type="text" id="publisher" name="publisher" value="<?php echo e(old('publisher', $book->publisher)); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="publish_year" class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit <span class="text-red-500">*</span></label>
                <input type="number" id="publish_year" name="publish_year" value="<?php echo e(old('publish_year', $book->publish_year)); ?>" min="1900" max="<?php echo e(date('Y') + 1); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t">
            <a href="<?php echo e(route('books.show', $book)); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md text-sm hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm font-medium">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\books\edit.blade.php ENDPATH**/ ?>