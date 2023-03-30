<!DOCTYPE html>
<html lang="en">
<head>
@include('head')
</head>
<body class="animsition">
	
	@include('header')
	@include('nhaccuatui')


	<!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">

                @foreach($sliders as $slider)

                    <div class="item-slick1" style="background-image: url('{{ $slider->thumb }}');">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                HOT
                            </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $slider->name }}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{ $slider->url }}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Nghe ngay
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



	<!-- Product -->
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Bài hát
				</h3>
			</div>

			

				
					@include('songs.allsong')

				
	
			</div>
		</div>
	</section>
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					MV
				</h3>
			</div>

			
		@include('mvs.allmv')
				
	
			</div>
		</div>
	</section>



	

	<!-- Banner -->
	<div class="sec-banner bg0">
		<h3 class="ltext-105 cl5 txt-center respon1">
					Album
				</h3>
		<div class="flex-w flex-c-m">
			@include('albums.album')
		</div>
	</div>
	<!-- List nhạc -->
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Những list nhạc tiêu biểu
				</h3>
			</div>

			

				
					@include('lists.adminlist')

				
	
			</div>
		</div>
	</section>

	<!-- album -->
	<section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">
			<div class="p-b-32">
				<h3 class="ltext-105 cl5 txt-center respon1">
					Nghệ sĩ
				</h3>
			</div>

			
		@include('singers.allsinger')
				
	
			</div>
		</div>
	</section>
	<p>background music</p>
	<audio controls autoplay >
						<source src="/template/bgmusic/unwelcome.mp3" type="audio/mpeg">
						Your browser does not support the audio element.
						</audio>

@include('footer')
</body>
</html>