

<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên list nhạc</label>
                        <input type="text" name="name" value="<?php echo e($list->name); ?>" class="form-control"
                               placeholder="Nhập tên list nhạc">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh bìa</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="<?php echo e($list->thumb); ?>" target="_blank">
                        <img src="<?php echo e($list->thumb); ?>" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="<?php echo e($list->thumb); ?>" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        <?php echo e($list->active == 1 ? ' checked=""' : ''); ?>>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        <?php echo e($list->active == 0 ? ' checked=""' : ''); ?>>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật List nhạc</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/list/edit.blade.php ENDPATH**/ ?>