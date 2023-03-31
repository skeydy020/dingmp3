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
                        <input type="text" name="name" value="<?php echo e($song->name); ?>" class="form-control"
                               placeholder="Nhập tên bài hát">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ca sĩ</label>
                        <select class="form-control" name="singer_id">
                            <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($singer->id); ?>" <?php echo e($song->singer_id == $singer->id ? 'selected' : ''); ?>>
                                    <?php echo e($singer->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                        <label>Album</label>
                        <select class="form-control" name="album_id">
                        <option value="0"> Không thuộc album nào</option>
                            <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($album->id); ?>" <?php echo e($song->album_id == $album->id ? 'selected' : ''); ?>>
                                    <?php echo e($album->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="menu_id">
                        <option value="0"> Không thuộc thể loại nào</option>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($menu->id); ?>" <?php echo e($song->menu_id == $menu->id ? 'selected' : ''); ?>>
                                    <?php echo e($menu->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">likes</label>
                        <input type="number" name="likes" value="<?php echo e($song->likes); ?>"  class="form-control" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control"><?php echo e($song->description); ?></textarea>
            </div>
            <div class="form-group">
                <label>Lời bài hát </label>
                <textarea name="lyric" class="form-control"><?php echo e($song->lyric); ?></textarea>
            </div>

            

            <div class="form-group">
                <label for="menu">Ảnh bài hát</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="<?php echo e($song->thumb); ?>" target="_blank">
                        <img src="<?php echo e($song->thumb); ?>" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="<?php echo e($song->thumb); ?>" id="thumb">
            </div>
            <div class="form-group">
                <label for="menu">Bài hát</label>
                <input type="file"  class="form-control" id="upload2">
                <div id="mp3_show">
                <a href="<?php echo e($song->link); ?>" target="_blank">
                    <audio controls><source src="<?php echo e($song->link); ?>" type="audio/mpeg"></audio>
                 </a>
                </div>
                <input type="hidden" name="link" value="<?php echo e($song->link); ?>" id="link">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        <?php echo e($song->active == 1 ? ' checked=""' : ''); ?>>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        <?php echo e($song->active == 0 ? ' checked=""' : ''); ?>>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật bài hát</button>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/admin/song/edit.blade.php ENDPATH**/ ?>