<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Inovexa Technologies'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>?v=<?php echo e(filemtime(public_path('css/app.css'))); ?>">
</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>

    <div id="toast"></div>
    <script>window.TOAST = <?php echo json_encode(session('toast'), 15, 512) ?>;</script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\perangkat lunak\kelompok\elibrary-inovexa\resources\views/layouts/app.blade.php ENDPATH**/ ?>