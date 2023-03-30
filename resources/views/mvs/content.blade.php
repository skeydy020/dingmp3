@extends('hh')
@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/mv/{{ $mv->singer->id }}-{{ Str::slug($mv->singer->name) }}.html"
               class="stext-109 cl8 hov-cl1 trans-04">
                {{ $mv->singer->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <h2>
				{{ $title }}
			</h2>
        </div>
    </div>


<div class="container">

<iframe width="1120" height="630" src=" <?=$mv['link']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

</div>                                                                      

<div class="container mt-5">

    <div class="row" style="background-color: #ffffffbf">
    <div class="col-sm-4">
        <img src="    {{ $mv->thumb }}" style= "width:100%">
    </div> 
          
    <div class="col-sm-8">
        <h4 style="font-size: 30px;">    {{ $mv->name }} </h4>
       
        
        <div class="discount-note" style="border: 1px solid black;">
        <?=$mv['description']?>
         </div>
        <button class="btn btn-success" style="width : 100%">Thêm vào list nhạc </button>
    </div>
    </div>
    <div>   '<br/>'</div>
    <h3>Lời bài hát</h3>
   
    <div class="discount-note" style="border: 1px solid black;">
                <?=$mv['likes']?>
            </div>
    
</div>


</div>



    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

          @include('mvs.allmv')
        </div>
    </section>

@endsection
