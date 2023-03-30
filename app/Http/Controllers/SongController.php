<?php

namespace App\Http\Controllers;

use App\Http\Services\Song\SongService;
use Illuminate\Http\Request;

class SongController extends Controller
{
    protected $songService;

    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    public function index($id = '', $slug = '')
    {
        $song = $this->songService->show($id);
         $songsMore = $this->songService->more($id);

        return view('songs.content', [
            'title' => $song->name,
             'song' => $song,
             'songs' => $songsMore
        ]);
    }
}
