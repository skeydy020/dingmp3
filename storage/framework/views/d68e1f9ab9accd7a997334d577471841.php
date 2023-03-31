<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên bài hát</th>
            <th>Ca sĩ</th>
            <th>Album</th>
            <th>Thể loại</th>
            <th>Likes</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($song->id); ?></td>
                <td><?php echo e($song->name); ?></td>
                <td><?php echo e($song->singer->name); ?></td>
                <td><?php echo e($song->album->name); ?></td>
                <td><?php echo e($song->menu->name); ?></td>
                <td><?php echo e($song->likes); ?></td>
                   
                <td><?php echo \App\Helper\Helper::active( $song->active ); ?></td>
                <td><?php echo e($song->updated_at); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/songs/edit/<?php echo e($song->id); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('<?php echo e($song->id); ?>', '/admin/songs/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="card-footer clearfix">
        <?php echo $songs->links(); ?>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/song/list.blade.php ENDPATH**/ ?>