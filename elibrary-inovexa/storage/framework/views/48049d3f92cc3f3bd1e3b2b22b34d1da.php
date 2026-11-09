<?php $__env->startSection('title', $book->title); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Breadcrumb & Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b pb-4">
        <div>
            <a href="<?php echo e(route('books.index')); ?>" class="text-xs text-indigo-600 hover:underline mb-1 inline-block">&larr; Kembali ke Katalog</a>
            <h1 class="text-2xl font-bold text-gray-900"><?php echo e($book->title); ?></h1>
            <p class="text-sm text-gray-500">Penulis: <?php echo e($book->author); ?> &bull; Penerbit: <?php echo e($book->publisher); ?> (<?php echo e($book->publish_year); ?>)</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->isMember()): ?>
                    <?php
                        $availableCount = $book->copies->where('is_available', true)->where('condition_status', 'baik')->count();
                    ?>
                    <?php if($availableCount === 0): ?>
                        <form method="POST" action="<?php echo e(route('reservations.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="book_id" value="<?php echo e($book->id); ?>">
                            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm">
                                Ambil Antrean Reservasi
                            </button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(auth()->user()->isStaffOrAdmin()): ?>
                    <a href="<?php echo e(route('books.edit', $book)); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md">
                        Edit Buku
                    </a>
                    <form method="POST" action="<?php echo e(route('books.destroy', $book)); ?>" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini beserta seluruh eksemplarnya?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded-md">
                            Hapus
                        </button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Book Information & Summary Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4">
            <h2 class="text-lg font-bold text-gray-900 border-b pb-2">Informasi Bibliografi</h2>
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-3 text-sm">
                <div>
                    <dt class="text-gray-500 font-medium">Kategori</dt>
                    <dd class="text-gray-900 font-semibold"><?php echo e($book->category->category_name ?? '-'); ?></dd>
                </div>
                <div>
                    <dt class="text-gray-500 font-medium">Nomor ISBN</dt>
                    <dd class="text-gray-900 font-mono"><?php echo e($book->isbn); ?></dd>
                </div>
                <div>
                    <dt class="text-gray-500 font-medium">Pengarang / Penulis</dt>
                    <dd class="text-gray-900"><?php echo e($book->author); ?></dd>
                </div>
                <div>
                    <dt class="text-gray-500 font-medium">Penerbit</dt>
                    <dd class="text-gray-900"><?php echo e($book->publisher); ?></dd>
                </div>
                <div>
                    <dt class="text-gray-500 font-medium">Tahun Terbit</dt>
                    <dd class="text-gray-900"><?php echo e($book->publish_year); ?></dd>
                </div>
                <div>
                    <dt class="text-gray-500 font-medium">Total Eksemplar Fisik</dt>
                    <dd class="text-gray-900"><?php echo e($book->copies->count()); ?> Eksemplar</dd>
                </div>
            </dl>

            <!-- Digital Version / E-Book attached -->
            <?php if($book->ebooks->count() > 0): ?>
                <div class="pt-4 border-t">
                    <h3 class="text-sm font-bold text-gray-800 mb-2">Versi Digital / E-Library:</h3>
                    <div class="space-y-2">
                        <?php $__currentLoopData = $book->ebooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center justify-between p-3 bg-indigo-50 border border-indigo-100 rounded-lg text-sm">
                                <div>
                                    <span class="font-semibold text-indigo-900 uppercase text-xs"><?php echo e($ebook->doc_type); ?></span>
                                    <span class="text-xs text-indigo-600 ml-2">Akses: <?php echo e($ebook->access_level); ?></span>
                                </div>
                                <div class="flex gap-2">
                                    <a href="<?php echo e(route('elibrary.read', $ebook)); ?>" target="_blank" class="px-3 py-1 bg-indigo-600 text-white rounded text-xs hover:bg-indigo-700">
                                        Baca Online
                                    </a>
                                    <a href="<?php echo e(route('elibrary.download', $ebook)); ?>" class="px-3 py-1 bg-white text-indigo-700 border border-indigo-200 rounded text-xs hover:bg-indigo-50">
                                        Unduh
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Availability Status Widget -->
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="text-base font-bold text-gray-900 mb-2">Status Ketersediaan</h3>
                <?php
                    $availableCopies = $book->copies->where('is_available', true)->where('condition_status', 'baik')->count();
                    $totalCopies = $book->copies->count();
                ?>
                <div class="text-3xl font-extrabold <?php echo e($availableCopies > 0 ? 'text-emerald-600' : 'text-rose-600'); ?> my-3">
                    <?php echo e($availableCopies); ?> / <?php echo e($totalCopies); ?>

                </div>
                <p class="text-xs text-gray-500">
                    <?php echo e($availableCopies > 0 ? 'Eksemplar siap dipinjam di ruang sirkulasi perpustakaan.' : 'Semua eksemplar sedang dipinjam atau tidak tersedia. Anggota dapat melakukan reservasi.'); ?>

                </p>

                <!-- Active Reservations queue -->
                <div class="mt-4 pt-4 border-t">
                    <div class="text-xs font-semibold text-gray-600 uppercase">Antrean Reservasi Aktif</div>
                    <div class="text-xl font-bold text-amber-600 mt-1"><?php echo e($book->reservations->count()); ?> Antrean</div>
                </div>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->isStaffOrAdmin() && $availableCopies > 0): ?>
                    <div class="mt-6">
                        <a href="<?php echo e(route('loans.create')); ?>" class="block text-center w-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold py-2 rounded-md">
                            Proses Peminjaman Buku Ini
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Copies Inventory Management (Staff/Admin) -->
    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-4">
        <div class="flex items-center justify-between border-b pb-3">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Daftar Eksemplar Inventaris Fisik</h2>
                <p class="text-xs text-gray-500">Nomor barcode/inventaris, lokasi rak dan kondisi buku</p>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <?php if(auth()->user()->isStaffOrAdmin()): ?>
                    <!-- Quick Add Copy Form -->
                    <form method="POST" action="<?php echo e(route('books.copies.store', $book)); ?>" class="flex items-center gap-2">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="shelf_location" placeholder="Lokasi Rak (cth: Rak A-2)" required
                               class="px-2 py-1.5 border border-gray-300 rounded text-xs w-36">
                        <input type="text" name="inventory_code" placeholder="Kode Inventaris"
                               class="px-2 py-1.5 border border-gray-300 rounded text-xs w-36">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium px-3 py-1.5 rounded">
                            + Tambah Eksemplar
                        </button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-medium">
                    <tr>
                        <th class="px-4 py-2.5">Kode Inventaris</th>
                        <th class="px-4 py-2.5">Lokasi Rak</th>
                        <th class="px-4 py-2.5">Kondisi</th>
                        <th class="px-4 py-2.5">Ketersediaan</th>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->isStaffOrAdmin()): ?>
                                <th class="px-4 py-2.5 text-right">Aksi</th>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $book->copies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $copy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-mono font-medium text-gray-900"><?php echo e($copy->inventory_code); ?></td>
                            <td class="px-4 py-3 text-gray-700"><?php echo e($copy->shelf_location); ?></td>
                            <td class="px-4 py-3">
                                <?php if($copy->condition_status === 'baik'): ?>
                                    <span class="text-xs bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-medium">Baik</span>
                                <?php elseif($copy->condition_status === 'rusak'): ?>
                                    <span class="text-xs bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full font-medium">Rusak</span>
                                <?php else: ?>
                                    <span class="text-xs bg-rose-100 text-rose-800 px-2 py-0.5 rounded-full font-medium">Hilang</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-3">
                                <?php if($copy->is_available): ?>
                                    <span class="text-xs text-emerald-600 font-semibold">&bull; Tersedia</span>
                                <?php else: ?>
                                    <span class="text-xs text-rose-600 font-semibold">&bull; Dipinjam / Tidak Tersedia</span>
                                <?php endif; ?>
                            </td>
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->user()->isStaffOrAdmin()): ?>
                                    <td class="px-4 py-3 text-right">
                                        <form method="POST" action="<?php echo e(route('books.copies.destroy', $copy)); ?>" class="inline" onsubmit="return confirm('Hapus eksemplar ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-xs text-rose-600 hover:text-rose-800">Hapus</button>
                                        </form>
                                    </td>
                                <?php endif; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500 text-xs">
                                Belum ada eksemplar terdaftar untuk buku ini.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\books\show.blade.php ENDPATH**/ ?>