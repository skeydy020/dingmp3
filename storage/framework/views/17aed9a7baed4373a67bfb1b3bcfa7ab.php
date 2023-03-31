


<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th> 
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php echo \App\Helper\Helper::menu($menus); ?>

        </tbody>

    </table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\trainlaravel\resources\views/admin/menu/list.blade.php ENDPATH**/ ?>