<h2>Pengaturan</h2>
<form method="POST" action="<?php echo e(route('settings.save')); ?>">
    <?php echo csrf_field(); ?>
    <div class="fm">
        <label>Lama pinjam (hari)
            <input class="in" name="dur" type="number" min="1" max="365" value="<?php echo e($lib->cfg['dur']); ?>">
        </label>
        <label>Denda per hari (Rp)
            <input class="in" name="fine" type="number" min="0" value="<?php echo e($lib->cfg['fine']); ?>">
        </label>
    </div>
    <?php if($errors->any()): ?><div class="err"><?php echo e($errors->first()); ?></div><?php endif; ?>
    <button class="btn">Simpan perubahan</button>
</form>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views\panels\sys.blade.php ENDPATH**/ ?>