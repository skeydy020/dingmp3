<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body > <!--class="animsition" -->

<!-- Header -->
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH E:\laragon\www\dingmp3\resources\views/hh.blade.php ENDPATH**/ ?>