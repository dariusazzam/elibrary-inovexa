<?php
    $id = $b['id'] ?? 1;
    $imgMap = [
        1 => 'foto/laskar pelangi.jpeg',
        2 => 'foto/Filosofi Teras.jpeg',
        3 => 'foto/Sapiens Riwayat Singkat Umat Manusia.jpeg',
        4 => 'foto/Metodologi Penelitian Kualitatif.jpeg',
        5 => 'foto/Bumi Manusia.jpeg',
        6 => 'foto/Iwan Kenrianto.jpg',
        7 => 'foto/The Psychology of Money.jpeg',
        8 => 'foto/Prinsip Desain Antarmuka Modern.jpeg',
    ];
    $img = $imgMap[$id] ?? null;
?>

<div class="cv" style="background:#faf8f5;color:#2c2419;border:1px solid #d9ccb2;padding:0;overflow:hidden">
    <span class="sh" style="background:#fff;color:#555;z-index:2;border:1px solid #d9ccb2"><?php echo e($lib->out($b['id']) ? 'Sirkulasi Aktif' : $b['s']); ?></span>
    <?php if($img && file_exists(public_path($img))): ?>
        <div style="width:100%;height:100%;background:url('<?php echo e(asset($img)); ?>') center/cover no-repeat;min-height:240px"></div>
    <?php else: ?>
        <?php
            $palette = ['hsl(' . (($b['h'] ?? 200)) . ' 35% 26%)', '#f5ecd9'];
        ?>
        <div class="cv" style="background:<?php echo e($palette[0]); ?>;color:<?php echo e($palette[1]); ?>;height:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;padding:16px">
            <small><?php echo e($b['a']); ?></small>
            <b><?php echo e($b['t']); ?></b>
            <small><?php echo e($b['c']); ?></small>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\userl\sip-perpus-inovexa\elibrary-inovexa\resources\views/partials/cover.blade.php ENDPATH**/ ?>