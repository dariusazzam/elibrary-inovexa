<?php $__env->startSection('title', auth()->user()->isMember() ? 'Reservasi Buku Saya' : 'Manajemen Antrean Reservasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">
                <?php echo e(auth()->user()->isMember() ? 'Antrean Reservasi Buku Saya' : 'Daftar Antrean Reservasi Buku'); ?>

            </h1>
            <p class="text-sm text-gray-500">
                <?php echo e(auth()->user()->isMember() ? 'Daftar buku yang sedang Anda antrekan saat semua eksemplar sedang dipinjam' : 'Kelola antrean peminjaman buku yang stoknya sedang dipinjam anggota lain'); ?>

            </p>
        </div>

        <?php if(auth()->user()->isMember()): ?>
            <a href="<?php echo e(route('books.index')); ?>" class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-md shadow-sm">
                Cari Buku untuk Direservasi &rarr;
            </a>
        <?php endif; ?>
    </div>

    <!-- Filter (for Admin/Staff) -->
    <?php if(auth()->user()->isStaffOrAdmin()): ?>
        <form method="GET" action="<?php echo e(route('admin.reservations.index')); ?>" class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm">
                    <option value="">Semua Status Antrean</option>
                    <option value="pending" <?php echo e(request('status') === 'pending' ? 'selected' : ''); ?>>Pending (Menunggu)</option>
                    <option value="diambil" <?php echo e(request('status') === 'diambil' ? 'selected' : ''); ?>>Diambil</option>
                    <option value="kadaluarsa" <?php echo e(request('status') === 'kadaluarsa' ? 'selected' : ''); ?>>Kadaluarsa</option>
                </select>
            </div>
            <button type="submit" class="bg-gray-800 hover:bg-black text-white text-sm px-4 py-2 rounded-md">
                Filter
            </button>
            <?php if(request()->has('status')): ?>
                <a href="<?php echo e(route('admin.reservations.index')); ?>" class="inline-flex items-center text-sm text-gray-500 hover:text-gray-800 px-2 py-2">
                    Reset
                </a>
            <?php endif; ?>
        </form>
    <?php endif; ?>

    <!-- Reservations Table -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-600 text-xs uppercase font-medium">
                    <tr>
                        <th class="px-6 py-3">No. Antrean</th>
                        <?php if(!auth()->user()->isMember()): ?>
                            <th class="px-6 py-3">Anggota</th>
                        <?php endif; ?>
                        <th class="px-6 py-3">Judul Buku</th>
                        <th class="px-6 py-3">Batas Kedaluwarsa</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <span class="font-mono font-bold text-indigo-700 bg-indigo-50 px-2.5 py-1 rounded">
                                    #<?php echo e($reservation->queue_number); ?>

                                </span>
                            </td>

                            <?php if(!auth()->user()->isMember()): ?>
                                <td class="px-6 py-4">
                                    <div class="font-medium text-gray-900"><?php echo e($reservation->user->name ?? '-'); ?></div>
                                    <div class="text-xs text-gray-400 font-mono"><?php echo e($reservation->user->member_number ?? '-'); ?></div>
                                </td>
                            <?php endif; ?>

                            <td class="px-6 py-4">
                                <a href="<?php echo e(route('books.show', $reservation->book_id)); ?>" class="font-medium text-gray-900 hover:text-indigo-600">
                                    <?php echo e($reservation->book->title ?? '-'); ?>

                                </a>
                                <div class="text-xs text-gray-400">Penulis: <?php echo e($reservation->book->author ?? '-'); ?></div>
                            </td>

                            <td class="px-6 py-4 text-xs text-gray-500">
                                <?php echo e(\Carbon\Carbon::parse($reservation->expiration_date)->format('d M Y, H:i')); ?>

                            </td>

                            <td class="px-6 py-4">
                                <?php if($reservation->status === 'pending'): ?>
                                    <span class="text-xs bg-amber-50 text-amber-700 border border-amber-200 px-2 py-0.5 rounded-full font-medium">
                                        Menunggu Antrean
                                    </span>
                                <?php elseif($reservation->status === 'diambil'): ?>
                                    <span class="text-xs bg-emerald-50 text-emerald-700 border border-emerald-200 px-2 py-0.5 rounded-full font-medium">
                                        Sudah Diambil
                                    </span>
                                <?php else: ?>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full font-medium">
                                        Kadaluarsa
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="px-6 py-4 text-right space-x-2">
                                <?php if($reservation->status === 'pending'): ?>
                                    <?php if(auth()->user()->isStaffOrAdmin()): ?>
                                        <form method="POST" action="<?php echo e(route('reservations.taken', $reservation)); ?>" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="text-xs bg-emerald-50 text-emerald-700 hover:bg-emerald-100 px-2 py-1 rounded font-medium">
                                                Tandai Diambil
                                            </button>
                                        </form>

                                        <form method="POST" action="<?php echo e(route('admin.reservations.cancel', $reservation)); ?>" class="inline" onsubmit="return confirm('Batalkan antrean reservasi ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-xs text-red-600 hover:text-red-800">
                                                Batalkan
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <form method="POST" action="<?php echo e(route('reservations.cancel', $reservation)); ?>" class="inline" onsubmit="return confirm('Batalkan antrean reservasi ini?')">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="text-xs text-red-600 hover:text-red-800">
                                                Batalkan Reservasi
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="<?php echo e(auth()->user()->isMember() ? '5' : '6'); ?>" class="px-6 py-8 text-center text-gray-500 text-sm">
                                Tidak ada data antrean reservasi.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-100">
            <?php echo e($reservations->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\reservations\index.blade.php ENDPATH**/ ?>