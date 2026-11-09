<?php $__env->startSection('title', 'Proses Pengembalian Pinjaman #' . $loan->id); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Form Pengembalian Buku</h1>
            <p class="text-sm text-gray-500">Konfirmasi pengembalian buku dan penyelesaian denda keterlambatan</p>
        </div>
        <a href="<?php echo e(route('loans.show', $loan)); ?>" class="text-sm text-gray-600 hover:text-indigo-600 font-medium">
            &larr; Batal & Kembali
        </a>
    </div>

    <form method="POST" action="<?php echo e(route('returns.store')); ?>" class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm space-y-6">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="loan_id" value="<?php echo e($loan->id); ?>">

        <!-- Loan summary -->
        <div class="bg-gray-50 p-4 rounded-lg space-y-2 text-sm border border-gray-200">
            <div class="flex justify-between">
                <span class="text-gray-500">Peminjam:</span>
                <span class="font-bold text-gray-900"><?php echo e($loan->user->name); ?> (<?php echo e($loan->user->member_number); ?>)</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Tanggal Pinjam:</span>
                <span><?php echo e(\Carbon\Carbon::parse($loan->borrow_date)->format('d M Y')); ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Batas Jatuh Tempo:</span>
                <span class="font-semibold text-gray-900"><?php echo e(\Carbon\Carbon::parse($loan->due_date)->format('d M Y')); ?></span>
            </div>
            <div class="flex justify-between border-t pt-2">
                <span class="text-gray-500">Tanggal Kembali (Hari Ini):</span>
                <span class="font-bold text-indigo-700"><?php echo e(now()->format('d M Y')); ?></span>
            </div>
        </div>

        <!-- Books list -->
        <div>
            <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Buku yang Akan Dikembalikan:</h3>
            <ul class="divide-y divide-gray-100 border border-gray-200 rounded-lg">
                <?php $__currentLoopData = $loan->loanDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="p-3 text-sm flex justify-between items-center bg-white">
                        <div>
                            <span class="font-medium text-gray-900"><?php echo e($detail->copy->book->title ?? '-'); ?></span>
                            <div class="text-xs text-gray-400 font-mono"><?php echo e($detail->copy->inventory_code ?? '-'); ?></div>
                        </div>
                        <span class="text-xs bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded font-medium">Kondisi: Baik</span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <!-- Penalty calculation widget -->
        <div class="p-4 rounded-lg <?php echo e($lateDays > 0 ? 'bg-rose-50 border border-rose-200' : 'bg-emerald-50 border border-emerald-200'); ?>">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-semibold <?php echo e($lateDays > 0 ? 'text-rose-900' : 'text-emerald-900'); ?>">
                    Keterlambatan:
                </span>
                <span class="text-base font-bold <?php echo e($lateDays > 0 ? 'text-rose-700' : 'text-emerald-700'); ?>">
                    <?php echo e($lateDays > 0 ? $lateDays . ' Hari' : 'Tepat Waktu (0 Hari)'); ?>

                </span>
            </div>

            <?php if($lateDays > 0): ?>
                <div class="flex justify-between text-xs text-rose-800 border-t border-rose-200 pt-2">
                    <span>Tarif Denda per Hari:</span>
                    <span>Rp <?php echo e(number_format($finePerDay, 0, ',', '.')); ?></span>
                </div>
                <div class="flex justify-between text-base font-bold text-rose-900 pt-1">
                    <span>Total Denda:</span>
                    <span class="font-mono">Rp <?php echo e(number_format($estimatedFine, 0, ',', '.')); ?></span>
                </div>

                <!-- Payment status selector -->
                <div class="mt-4 pt-4 border-t border-rose-200">
                    <label class="block text-xs font-bold uppercase tracking-wider text-rose-900 mb-2">Status Pembayaran Denda:</label>
                    <div class="grid grid-cols-2 gap-3 text-xs">
                        <label class="flex items-center gap-2 bg-white p-2.5 rounded border border-rose-300 cursor-pointer">
                            <input type="radio" name="payment_status" value="belum_bayar" checked class="text-indigo-600">
                            <span>Bayar Nanti (Belum Bayar)</span>
                        </label>
                        <label class="flex items-center gap-2 bg-white p-2.5 rounded border border-rose-300 cursor-pointer">
                            <input type="radio" name="payment_status" value="lunas" class="text-indigo-600">
                            <span class="font-semibold text-emerald-700">Lunas Dibayar Sekarang</span>
                        </label>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-xs text-emerald-800">Buku dikembalikan sebelum atau tepat pada batas waktu. Tidak ada tagihan denda.</p>
            <?php endif; ?>
        </div>

        <div class="flex items-center justify-end gap-3 pt-3 border-t">
            <a href="<?php echo e(route('loans.show', $loan)); ?>" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md text-sm hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm font-semibold">
                Konfirmasi Pengembalian Buku
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\returns\create.blade.php ENDPATH**/ ?>