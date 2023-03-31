<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên MV</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control"  placeholder="Nhập tên MV">
                    </div>
                </div>
                    <div class="form-group">
                    <label for="menu">Ảnh bìa MV</label>
                    <input type="file"  class="form-control" id="upload">
                        <div id="image_show">

                    </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
           

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
            </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ca sĩ</label>
                        <select class="form-control" name="singer_id">
                            <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($singer->id); ?>"><?php echo e($singer->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>link</label>
                <textarea name="link" id="link" class="form-control"><?php echo e(old('link')); ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Lượt like</label>
                        <input type="number" name="likes" value="<?php echo e(old('likes')); ?>"  class="form-control" >
                    </div>
                </div>

            </div>

           
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm MV</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace('description');
    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/mv/add.blade.php ENDPATH**/ ?>