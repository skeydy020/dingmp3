
<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="post">
                <div class="card-body">

                    <div class="form-group">
                        <label >Tên danh mục</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                    
                    
                    <div class="form-group">
                        <label >Danh mục cha</label>
                        <select class="form-control" name="parent_id">
                            <option value="0"> Danh mục cha </option>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                             ư
                        </select>
                    </div>


                    <div class="form-group">
                        <label >Mô tả</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea name="content" id="content" class="form-control"></textarea>
                    </div>  
                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                    
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?php echo csrf_field(); ?>
              </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace('content');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/menu/add.blade.php ENDPATH**/ ?>