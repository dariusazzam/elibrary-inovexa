<?php $out = $lib->out($b['id']); ?>
<div class="card bk">
    <?php echo $__env->make('partials.cover', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <span class="st <?php echo e($out ? 'no' : 'ok'); ?>">● <?php echo e($out ? 'Sedang Dipinjam' : 'Tersedia di Rak'); ?></span>
    <h4><?php echo e($b['t']); ?></h4>
    <small><?php echo e($b['a']); ?> · <?php echo e($b['c']); ?></small>
    <form method="POST" action="<?php echo e(route('reserve', $b['id'])); ?>">
        <?php echo csrf_field(); ?>
        <button class="btn <?php echo e($out ? 'ghost' : ''); ?>"><?php echo e($out ? 'Masuk Antrean' : 'Reservasi'); ?></button>
    </form>
</div>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\partials\book-card.blade.php ENDPATH**/ ?>