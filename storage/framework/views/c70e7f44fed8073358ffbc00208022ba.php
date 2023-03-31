<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Album</th>
            <th>Ca sĩ</th>
            <th>Likes</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($album->id); ?></td>
                <td><?php echo e($album->name); ?></td>
                <td><?php echo e($album->singer->name); ?></td>
                <td><?php echo e($album->likes); ?></td>
                   
                <td><?php echo \App\Helper\Helper::active( $album->active ); ?></td>
                <td><?php echo e($album->updated_at); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/albums/edit/<?php echo e($album->id); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('<?php echo e($album->id); ?>', '/admin/albums/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="card-footer clearfix">
        <?php echo $albums->links(); ?>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/album/list.blade.php ENDPATH**/ ?>