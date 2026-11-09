<?php $__env->startSection('title', 'Tambah Buku Baru'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Buku ke Katalog</h1>
            <p class="text-sm text-gray-500">Daftarkan koleksi buku fisik baru beserta stok awal eksemplar</p>
        </div>
        <a href="<?php echo e(route('books.index')); ?>" class="text-sm text-gray-600 hover:text-indigo-600 font-medium">
            &larr; Kembali ke Katalog
        </a>
    </div>

    <form method="POST" action="<?php echo e(route('books.store')); ?>" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-5">
        <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Buku <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                <select id="category_id" name="category_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Pilih Kategori --</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->category_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">Nomor ISBN <span class="text-red-500">*</span></label>
                <input type="text" id="isbn" name="isbn" value="<?php echo e(old('isbn')); ?>" required placeholder="Contoh: 978-602-..."
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500 font-mono">
            </div>

            <div>
                <label for="author" class="block text-sm font-medium text-gray-700 mb-1">Pengarang / Penulis <span class="text-red-500">*</span></label>
                <input type="text" id="author" name="author" value="<?php echo e(old('author')); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="publisher" class="block text-sm font-medium text-gray-700 mb-1">Penerbit <span class="text-red-500">*</span></label>
                <input type="text" id="publisher" name="publisher" value="<?php echo e(old('publisher')); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="publish_year" class="block text-sm font-medium text-gray-700 mb-1">Tahun Terbit <span class="text-red-500">*</span></label>
                <input type="number" id="publish_year" name="publish_year" value="<?php echo e(old('publish_year', date('Y'))); ?>" min="1900" max="<?php echo e(date('Y') + 1); ?>" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="border-t pt-4 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="initial_copies" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Eksemplar Awal</label>
                    <input type="number" id="initial_copies" name="initial_copies" value="<?php echo e(old('initial_copies', 1)); ?>" min="1" max="100"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
                    <p class="text-xs text-gray-500 mt-1">Sistem otomatis menghasilkan nomor inventaris.</p>
                </div>

                <div>
                    <label for="shelf_location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi Rak Awal</label>
                    <input type="text" id="shelf_location" name="shelf_location" value="<?php echo e(old('shelf_location', 'Rak Utama')); ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t">
            <a href="<?php echo e(route('books.index')); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md text-sm hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm font-medium">
                Simpan Buku
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\books\create.blade.php ENDPATH**/ ?>