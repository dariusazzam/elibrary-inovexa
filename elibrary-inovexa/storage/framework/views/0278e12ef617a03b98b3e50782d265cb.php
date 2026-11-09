<?php
    $rows = [
        ['Cari & reservasi katalog', '✓', '✓', '✓'],
        ['Kartu digital', '✓', '–', '–'],
        ['Sirkulasi & denda', '–', '✓', '✓'],
        ['Stok buku', '–', '✓', '✓'],
        ['Kelola pengguna & peran', '–', '–', '✓'],
        ['Pengaturan sistem', '–', '–', '✓'],
    ];
?>
<h2>Hak Akses</h2>
<div class="tw"><table>
    <tr><th>Fitur</th><th>Anggota</th><th>Admin Pegawai</th><th>Super Admin</th></tr>
    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr><?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><td><?php echo e($cell); ?></td><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table></div>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views/panels/roles.blade.php ENDPATH**/ ?>