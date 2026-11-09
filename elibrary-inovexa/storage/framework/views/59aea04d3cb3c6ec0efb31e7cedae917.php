<?php $__env->startSection('title', 'Transaksi Peminjaman Baru'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Catat Peminjaman Buku</h1>
            <p class="text-sm text-gray-500">Maksimal <?php echo e($maxBooksBorrowed); ?> eksemplar per anggota, durasi peminjaman <?php echo e($maxBorrowDays); ?> hari.</p>
        </div>
        <a href="<?php echo e(route('loans.index')); ?>" class="text-sm text-gray-600 hover:text-indigo-600 font-medium">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <form method="POST" action="<?php echo e(route('loans.store')); ?>" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-6">
        <?php echo csrf_field(); ?>

        <!-- Member Selection -->
        <div>
            <label for="user_id" class="block text-sm font-semibold text-gray-800 mb-1">
                Pilih Anggota Peminjam <span class="text-red-500">*</span>
            </label>
            <select id="user_id" name="user_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-indigo-500">
                <option value="">-- Pilih Anggota (Nama / Nomor Anggota) --</option>
                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($member->id); ?>" <?php echo e(old('user_id') == $member->id ? 'selected' : ''); ?>>
                        <?php echo e($member->name); ?> - <?php echo e($member->member_number); ?> (<?php echo e($member->email); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Book Copies Selection -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label class="block text-sm font-semibold text-gray-800">
                    Pilih Eksemplar Buku yang Dipinjam <span class="text-red-500">*</span>
                </label>
                <span class="text-xs text-gray-500">Maks. <?php echo e($maxBooksBorrowed); ?> buku</span>
            </div>

            <div class="border border-gray-200 rounded-lg max-h-80 overflow-y-auto divide-y divide-gray-100 p-2 bg-gray-50">
                <?php $__empty_1 = true; $__currentLoopData = $availableCopies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $copy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <label class="flex items-center gap-3 p-2.5 hover:bg-white rounded cursor-pointer transition">
                        <input type="checkbox" name="copy_ids[]" value="<?php echo e($copy->id); ?>"
                               <?php echo e(is_array(old('copy_ids')) && in_array($copy->id, old('copy_ids')) ? 'checked' : ''); ?>

                               class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                        <div class="flex-1 text-sm">
                            <span class="font-bold text-gray-900"><?php echo e($copy->book->title ?? '-'); ?></span>
                            <div class="text-xs text-gray-500 flex gap-3 mt-0.5">
                                <span class="font-mono text-indigo-700 bg-indigo-50 px-1.5 py-0.5 rounded"><?php echo e($copy->inventory_code); ?></span>
                                <span>Lokasi: <?php echo e($copy->shelf_location); ?></span>
                                <span>Penulis: <?php echo e($copy->book->author ?? '-'); ?></span>
                            </div>
                        </div>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-6 text-center text-xs text-gray-500">
                        Tidak ada eksemplar buku yang tersedia untuk dipinjam saat ini.
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="bg-indigo-50 p-4 rounded-lg text-xs text-indigo-800 space-y-1">
            <div class="font-bold">Informasi Kebijakan Perpustakaan:</div>
            <div>&bull; Tanggal Pinjam: <strong class="font-mono"><?php echo e(now()->format('d M Y')); ?></strong></div>
            <div>&bull; Estimasi Jatuh Tempo: <strong class="font-mono"><?php echo e(now()->addDays($maxBorrowDays)->format('d M Y')); ?></strong> (<?php echo e($maxBorrowDays); ?> hari)</div>
            <div>&bull; Reservasi buku terkait oleh anggota ini otomatis akan ditandai selesai/diambil.</div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-3 border-t">
            <a href="<?php echo e(route('loans.index')); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md text-sm hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm font-medium">
                Simpan Transaksi Pinjaman
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\loans\create.blade.php ENDPATH**/ ?>