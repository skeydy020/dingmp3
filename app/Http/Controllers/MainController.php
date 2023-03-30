<?php

namespace App\Http\Controllers;

use App\Http\Services\Album\AlbumService;
use App\Http\Services\List\ListService;
use App\Http\Services\MV\MVService;
use App\Http\Services\Singer\SingerService2;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Song\SongService;
use App\Models\songs;
use Illuminate\Http\Request;

class MainController extends Controller
{   
    protected $song;
    protected $slider;
    protected $mv;
    protected $singer;
    protected $album;
    protected $list;
    public function __construct(SongService $songs, MVService $mvs, SliderService $sliders,SingerService2 $singers,AlbumService $albums,ListService $lists)
{
  
    $this->song = $songs;
    $this->mv = $mvs;
    $this->slider = $sliders;
    $this->singer = $singers;
    $this->album= $albums;
    $this->list=$lists;
  
}
    public function index(){
        return view('main',[
            'title' => 'Trang nghe nhạc uy tín hàng đầu Châu Á',
            'songs' => $this->song->get(),
            'mvs'=> $this->mv->get(),
            'sliders' =>$this->slider->get(),
            'singers' => $this->singer->get(),
            'albums' => $this->album->get(),
            'lists' =>$this->list->get()
        ]);
    }
}
