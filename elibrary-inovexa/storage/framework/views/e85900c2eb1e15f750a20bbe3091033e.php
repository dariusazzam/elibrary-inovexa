<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Peminjaman Buku #<?php echo e($loan->id); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; font-size: 12px; }
        }
    </style>
</head>
<body class="bg-gray-100 p-6 flex flex-col items-center min-h-screen text-gray-900 font-sans">
    <div class="no-print mb-4 flex gap-3">
        <button onclick="window.print()" class="bg-indigo-600 text-white px-4 py-2 rounded text-sm font-semibold shadow hover:bg-indigo-700">
            Cetak Struk (Print)
        </button>
        <a href="<?php echo e(route('loans.show', $loan)); ?>" class="bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm font-semibold hover:bg-gray-300">
            Tutup
        </a>
    </div>

    <div class="bg-white w-full max-w-md p-6 border border-gray-300 shadow-sm rounded-lg font-mono text-xs">
        <div class="text-center border-b pb-4 mb-4">
            <h1 class="text-base font-bold uppercase tracking-wider">SIP-PERPUSTAKAAN</h1>
            <p class="text-[10px] text-gray-500">Bukti Transaksi Peminjaman Buku</p>
        </div>

        <div class="space-y-1 mb-4 text-[11px]">
            <div class="flex justify-between">
                <span>No. Transaksi:</span>
                <span class="font-bold">#<?php echo e($loan->id); ?></span>
            </div>
            <div class="flex justify-between">
                <span>Tanggal Pinjam:</span>
                <span><?php echo e(\Carbon\Carbon::parse($loan->borrow_date)->format('d/m/Y')); ?></span>
            </div>
            <div class="flex justify-between">
                <span>Jatuh Tempo:</span>
                <span class="font-bold"><?php echo e(\Carbon\Carbon::parse($loan->due_date)->format('d/m/Y')); ?></span>
            </div>
            <div class="flex justify-between">
                <span>Peminjam:</span>
                <span><?php echo e($loan->user->name); ?> (<?php echo e($loan->user->member_number); ?>)</span>
            </div>
            <div class="flex justify-between">
                <span>Petugas:</span>
                <span><?php echo e($loan->admin->name ?? 'Admin'); ?></span>
            </div>
        </div>

        <div class="border-t border-b py-2 my-2">
            <div class="font-bold mb-2">Daftar Buku:</div>
            <div class="space-y-2">
                <?php $__currentLoopData = $loan->loanDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border-b border-dashed pb-1 last:border-b-0">
                        <div class="font-bold"><?php echo e($detail->copy->book->title); ?></div>
                        <div class="text-[10px] text-gray-500">
                            Barcode: <?php echo e($detail->copy->inventory_code); ?> | Rak: <?php echo e($detail->copy->shelf_location); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="text-[10px] text-gray-500 text-center mt-6 space-y-1">
            <p>* Harap mengembalikan buku tepat waktu sebelum tanggal jatuh tempo.</p>
            <p>* Keterlambatan dikenakan denda sesuai peraturan yang berlaku.</p>
            <p class="mt-4 font-bold uppercase">Terima Kasih</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\loans\slip.blade.php ENDPATH**/ ?>