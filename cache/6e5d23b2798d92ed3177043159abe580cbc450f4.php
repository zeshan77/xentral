<!doctype html>
<html lang="en">
<head>
    <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="bg-light">
<div class="container">

    <div class="mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>

<?php echo $__env->make('partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /Users/zeshankhattak/Code/Clients/Xentral/Apps/xentral-exercise/views/layouts/auth.blade.php ENDPATH**/ ?>