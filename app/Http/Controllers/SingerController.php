<?php

namespace App\Http\Controllers;

use App\Http\Services\Singer\SingerService2;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    protected $singerService;

    public function __construct(SingerService2 $singerService)
    {
        $this->singerService = $singerService;
    }

    public function index($id = '', $slug = '')
    {
        $singer = $this->singerService->show($id);
        $album = $this->singerService->singerAlbum($id);
        $song = $this->singerService->singerSong($id);
        $mv = $this->singerService->singerMV($id);

        $singermore = $this->singerService->more($id);

        return view('singers.content', [
            'title' => $singer->name,
             'singer' => $singer,
             'albums' => $album,
             'songs' => $song,
             'mvs' => $mv,
             'singers' => $singermore
        ]);
    }
}
