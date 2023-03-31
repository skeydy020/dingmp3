<div class="row isotope-grid" >
    <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="<?php echo e($list->thumb); ?>" alt="<?php echo e($list->name); ?>">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/list/<?php echo e($list->id); ?>-<?php echo e(Str::slug($list->name, '-')); ?>.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            <?php echo e($list->name); ?>

                        </a>

                        
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php /**PATH D:\Programs\XAMPP\htdocs\dingmp3\resources\views/lists/adminlist.blade.php ENDPATH**/ ?>