<?php if(isset($errors)): ?>
    <div class="alert alert-danger text-left" role="alert">
        <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="m-0 p-0"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['errors'])): ?>
    <div class="alert alert-danger text-left" role="alert">
        <?php $__currentLoopData = $_SESSION['errors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="m-0 p-0"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php $_SESSION['errors'] = null; ?>
<?php endif; ?>

<?php if(isset($message)): ?>
    <div class="alert alert-success text-left" role="alert">
        <p class="m-0 p-0"><?php echo e($message); ?></p>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-success text-left" role="alert">
        <p class="m-0 p-0"><?php echo e($_SESSION['message']); ?></p>
    </div>
    <?php $_SESSION['message'] = null; ?>
<?php endif; ?><?php /**PATH /Users/zeshankhattak/Code/Clients/Xentral/Apps/xentral-exercise/views/partials/alerts.blade.php ENDPATH**/ ?>