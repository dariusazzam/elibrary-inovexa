<h2>Pengguna</h2>
<div class="tw"><table>
    <tr><th>Nama</th><th>ID</th><th>Peran</th><th>Status</th><th></th></tr>
    <?php $__currentLoopData = $lib->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($x['n']); ?></td><td><?php echo e($x['i']); ?></td><td><?php echo e($x['r']); ?></td>
        <td><?php echo e($x['on'] ? 'Aktif' : 'Nonaktif'); ?></td>
        <td>
            <form class="inline" method="POST" action="<?php echo e(route('user.toggle', $i)); ?>">
                <?php echo csrf_field(); ?><button class="btn ghost"><?php echo e($x['on'] ? 'Nonaktifkan' : 'Aktifkan'); ?></button>
            </form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table></div>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views/panels/users.blade.php ENDPATH**/ ?>