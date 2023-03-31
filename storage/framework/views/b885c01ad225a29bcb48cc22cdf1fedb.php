<div class="row isotope-grid" >
    <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="<?php echo e($song->thumb); ?>" alt="<?php echo e($song->name); ?>">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/bai-hat/<?php echo e($song->id); ?>-<?php echo e(Str::slug($song->name, '-')); ?>.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo e($song->name); ?>

                        </a>

                        <p>
                            <?php echo e($song->singer->name); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php /**PATH D:\Programs\XAMPP\htdocs\dingmp3\resources\views/songs/allsong.blade.php ENDPATH**/ ?>