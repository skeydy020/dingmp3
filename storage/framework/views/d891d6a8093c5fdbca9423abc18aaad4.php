<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên Album</label>
                        <input type="text" name="name" value="<?php echo e($album->name); ?>" class="form-control"
                               placeholder="Nhập tên Album">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ca sĩ</label>
                        <select class="form-control" name="singer_id">
                            <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($singer->id); ?>" <?php echo e($album->singer_id == $singer->id ? 'selected' : ''); ?>>
                                    <?php echo e($singer->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">likes</label>
                        <input type="number" name="likes" value="<?php echo e($album->likes); ?>"  class="form-control" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control"><?php echo e($album->description); ?></textarea>
            </div>

            

            <div class="form-group">
                <label for="menu">Ảnh Album</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="<?php echo e($album->thumb); ?>" target="_blank">
                        <img src="<?php echo e($album->thumb); ?>" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="<?php echo e($album->thumb); ?>" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        <?php echo e($album->active == 1 ? ' checked=""' : ''); ?>>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        <?php echo e($album->active == 0 ? ' checked=""' : ''); ?>>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Album</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace('description');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/album/edit.blade.php ENDPATH**/ ?>