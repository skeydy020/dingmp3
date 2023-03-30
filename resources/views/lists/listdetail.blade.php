@extends('hh')
@section('content')




<h3 class="ltext-106 cl5 txt-center"> 
                   Những bài hát có trong tuyển tập {{ $list->name }}
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
@foreach($details as $key => $detail)
<option style="border: 1px solid black ; padding: 8px ;" selected value="{{ $detail->song->link }}">{{ $detail->song->name }}</option>
@endforeach
</select>
</form>
<div id="audio_container">
<audio controls  autoplay id="audio_player" src="{{ $details[0]->song->link }}">
<div style="border: 1px solid black ; padding: 8px ;">
Sorry, your browser does not support this audio player.
</div>
</audio>
</div>

<div class="container mt-5">

    <div class="row" style="background-color: #ffffffbf">
    <div class="col-sm-4">
        <img src="    {{ $list->thumb }}" style= "width:100%">
    </div> 
          
    <div class="col-sm-8">
        <h4 style="font-size: 30px;">    {{ $list->name }} </h4>
        </div>
        </div>
     
  
    
</div>
<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Những list nhạc khác
				</h3>
			</div>

			

				
					@include('lists.adminlist')

				
	
			</div>
		
	</section>
  

@endsection