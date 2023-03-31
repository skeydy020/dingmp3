<?php $__env->startSection('head'); ?>
    <script src="/ckeditor/ckeditor.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
           
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên bài hát</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control"  placeholder="Nhập tên bài hát">
                    </div>
                </div>
                <div class="form-group">
                <label for="menu">Ảnh bìa bài hát</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
            </div>
            <div class="form-group">
                <label for="menu">Bài hát</label>
                <input type="file"  class="form-control" id="upload2">
                <div id="mp3_show">

                </div>
                <input type="hidden" name="link" id="link">
            </div>
            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
            </div>
            <div class="form-group">
                <label>Lời bài hát</label>
                <textarea name="lyric" id="lyric" class="form-control"><?php echo e(old('lyric')); ?></textarea>
            </div>


            <div>
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
            <div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Album</label>
                        <select class="form-control" name="album_id">
                        <option value="0"> Không thuộc album</option>
                            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($album->id); ?>"><?php echo e($album->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>   <div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="menu_id">
                        <option value="0"> Không thuộc thể loại nào</option>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
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
            <button type="submit" class="btn btn-primary">Thêm Album</button>
        </div>
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('lyric');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/song/add.blade.php ENDPATH**/ ?>