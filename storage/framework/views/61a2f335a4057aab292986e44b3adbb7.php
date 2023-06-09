<div class="wrap-slick2">
<div class="slick2">
    <?php $__currentLoopData = $singers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $singer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
								<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-pic hov-img0">
											<img class="rounded-circle"  src="<?php echo e($singer->thumb); ?>" alt="IMG-PRODUCT">

											<!-- <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
												Quick View
											</a> -->
										</div>

										<div class="block2-txt flex-w flex-t p-t-14">
											<div class="block2-txt-child1 flex-col-l ">
												<a href="/ca-si/<?php echo e($singer->id); ?>-<?php echo e(Str::slug($singer->name, '-')); ?>.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                                <?php echo e($singer->name); ?>

												</a>

												<span class="stext-105 cl3">
                                                <?php echo e($singer->subcriber); ?> Người theo dõi
												</span>
											</div>

											<div class="block2-txt-child2 flex-r p-t-3">
												<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
													<img class="icon-heart1 dis-block trans-04" src="/template/images/icons/icon-heart-01.png" alt="ICON">
													<img class="icon-heart2 dis-block trans-04 ab-t-l" src="/template/images/icons/icon-heart-02.png" alt="ICON">
												</a>
											</div>
										</div>
									</div>
								</div>

							
					
					
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
                    </div>
<?php /**PATH D:\Programs\XAMPP\htdocs\dingmp3\resources\views/singers/allsinger.blade.php ENDPATH**/ ?>