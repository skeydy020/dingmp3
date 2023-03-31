
<?php $__env->startSection('content'); ?>
<h3 class="ltext-106 cl5 txt-center">
                    Những bài hát có trong Album <?php echo e($album->name); ?>

                </h3>
                <script>
function change_audio_file()
{
  var file_list = document.getElementById('audio_list') ;
  var file_to_play = file_list.options[ file_list.selectedIndex ].value ;
  var player = document.getElementById('audio_player');
  player.src = file_to_play ;
}
</script>
<form>
<label for="audio_list">
</label>
<select style="width :100%" multiple class="form-label" onchange="change_audio_file();" id="audio_list">
<?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option style="border: 1px solid black ; padding: 8px ;" selected value="<?php echo e($song->link); ?>"><?php echo e($song->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</form>
<div id="audio_container">
<audio controls  autoplay id="audio_player" src="<?php echo e($songs[0]->link); ?>">
<div style="border: 1px solid black ; padding: 8px ;">
Sorry, your browser does not support this audio player.
</div>
</audio>
</div>
<div class="container mt-5">

    <div class="row" style="background-color: #ffffffbf">
    <div class="col-sm-4">
        <img src="    <?php echo e($album->thumb); ?>" style= "width:100%">
    </div> 
          
    <div class="col-sm-8">
        <h4 style="font-size: 30px;">    <?php echo e($album->name); ?> </h4>
       
        
        <div class="discount-note" style="border: 1px solid black;">
        <?=$album['description']?>
         </div>
        <button class="btn btn-success" style="width : 100%">Thích album </button>
    </div>
    </div>
    <div>   '<br/>'</div>
    <h3>Lượt thích</h3>
   
    <div class="discount-note" style="border: 1px solid black;">
                <?=$album['likes']?>
            </div>
    
</div>s
<section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    ALbum khác
                </h3>
            </div>
            <div class="sec-banner bg0">
	
		<div class="flex-w flex-c-m">
          <?php echo $__env->make('albums.album', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
	</div>
        </div>
    </section>
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('hh', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\dingmp3\resources\views/albums/content.blade.php ENDPATH**/ ?>