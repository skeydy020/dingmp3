

<?php $__env->startSection('content'); ?>
    <a href='/admin/listdetails/add'>
    <button >Thêm bài hát vào list nhạc</button>
    </a>

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên bài hát</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $listdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $listdetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($listdetail->id); ?></td>
                <td><?php echo e($listdetail->song->name); ?></td>
                   
                <td><?php echo \App\Helper\Helper::active( $listdetail->active ); ?></td>
                <td><?php echo e($listdetail->updated_at); ?></td>
                <td>
                    
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('<?php echo e($listdetail->id); ?>', '/admin/listdetails/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="card-footer clearfix">
        <?php echo $listdetails->links(); ?>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/listdetail/list.blade.php ENDPATH**/ ?>