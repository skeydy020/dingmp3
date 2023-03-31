

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên ca sĩ</th>
            <th>Hình ảnh</th>
            <th>Số người theo dõi</th>
            <th>Trang Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($singer->id); ?></td>
                <td><?php echo e($singer->name); ?></td>
               
                <td><a href="<?php echo e($singer->thumb); ?>" target="_blank">
                        <img src="<?php echo e($singer->thumb); ?>" height="40px">
                    </a>
                </td>
                <td><?php echo e($singer->subcriber); ?></td>
               
                <td><?php echo \App\Helper\Helper::active( $singer->active ); ?></td>
                <td><?php echo e($singer->updated_at); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/singers/edit/<?php echo e($singer->id); ?>">
                        <i class="fas fa-edit"></i>
                    <!-- </a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow(<?php echo e($singer->id); ?>, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a> -->
                    <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('<?php echo e($singer->id); ?> ', '/admin/singers/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo $singers->links(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/singer/list.blade.php ENDPATH**/ ?>