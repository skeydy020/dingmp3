<?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="size-202 m-lr-auto respon4">
				<!-- Block1 -->
				<div class="block1 wrap-pic-w">
					<img src="<?php echo e($album->thumb); ?>" alt="IMG-BANNER">

					<a href="/album/<?php echo e($album->id); ?>-<?php echo e(Str::slug($album->name, '-')); ?>.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
                            <?php echo e($album->name); ?>

							</span>

							<span class="block1-info stext-102 trans-04">
                            <?php echo e($album->singer->name); ?>

							</span>
						</div>

						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Nghe ngay
							</div>
						</div>
					</a>
				</div>
			</div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH D:\Programs\XAMPP\htdocs\dingmp3\resources\views/albums/album.blade.php ENDPATH**/ ?>