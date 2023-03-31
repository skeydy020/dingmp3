

<?php $__env->startSection('content'); ?>
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên list nhạc</th>
            <th>Hình ảnh</th>
            <th>Người tạo</th>
            <th>Trạng Thái</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($list->id); ?></td>
                <td><?php echo e($list->name); ?></td>
               
                <td><a href="<?php echo e($list->thumb); ?>" target="_blank">
                        <img src="<?php echo e($list->thumb); ?>" height="40px">
                    </a>
                </td>
                <td><?php echo e($list->user_id); ?></td>
               
                <td><?php echo e($list->active); ?></td>
                <td><?php echo e($list->updated_at); ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/listdetails/list/<?php echo e($list->id); ?>">
                        <i class="far fa-clipboard"></i>
    
                    <a class="btn btn-secondary btn-sm" href="/admin/lists/edit/<?php echo e($list->id); ?>">
                        <i class="fas fa-edit"></i>	
                    <!-- </a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="removeRow(<?php echo e($list->id); ?>, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a> -->
                    <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow('<?php echo e($list->id); ?> ', '/admin/lists/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/list/list.blade.php ENDPATH**/ ?>