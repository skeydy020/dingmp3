@extends('hh')
@section('content')
<h3 class="ltext-106 cl5 txt-center">
                    Những bài hát có trong Album {{ $album->name }}
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
@foreach($songs as $key => $song)
<option style="border: 1px solid black ; padding: 8px ;" selected value="{{ $song->link }}">{{ $song->name }}</option>
@endforeach
</select>
</form>
<div id="audio_container">
<audio controls  autoplay id="audio_player" src="{{ $songs[0]->link }}">
<div style="border: 1px solid black ; padding: 8px ;">
Sorry, your browser does not support this audio player.
</div>
</audio>
</div>
<div class="container mt-5">

    <div class="row" style="background-color: #ffffffbf">
    <div class="col-sm-4">
        <img src="    {{ $album->thumb }}" style= "width:100%">
    </div> 
          
    <div class="col-sm-8">
        <h4 style="font-size: 30px;">    {{ $album->name }} </h4>
       
        
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
          @include('albums.album')
          </div>
	</div>
        </div>
    </section>
  

@endsection