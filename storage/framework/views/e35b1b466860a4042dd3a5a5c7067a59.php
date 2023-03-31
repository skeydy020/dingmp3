<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tiêu Đề</th>
            <th>Link</th>
            <th>Ảnh</th>
            <th>Trang Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($slider->id); ?></td>
                <td><?php echo e($slider->name); ?></td>
                <td><?php echo e($slider->url); ?></td>
                <td><a href="<?php echo e($slider->thumb); ?>" target="_blank">
                        <img src="<?php echo e($slider->thumb); ?>" height="40px">
                    </a>
                </td>
                <td><?php echo \App\Helper\Helper::active( $slider->active ); ?></td>
                <td><?php echo e($slider->updated_at); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/<?php echo e($slider->id); ?>">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('<?php echo e($slider->id); ?>', '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo $sliders->links(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/slider/list.blade.php ENDPATH**/ ?>