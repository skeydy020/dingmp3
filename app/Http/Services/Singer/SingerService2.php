<?php


namespace App\Http\Services\Singer;

use App\Models\Album;
use App\Models\MV;
use App\Models\Singer;
use App\Models\songs;

class SingerService2
{
    const LIMIT = 16;

    public function get($page = null)
    {
        return Singer::select('id', 'name', 'subcriber',  'thumb')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Singer::where('id', $id)
            ->where('active', 1)
            ->firstOrFail();
    }

    public function more($id)
    {
        return Singer::select('id', 'name', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
    public function singerAlbum($id)
    {
        return Album::select('id', 'name', 'thumb','likes')
            ->where('singer_id',$id)
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
    public function singerSong($id)
    {
        return songs::select('id', 'name', 'thumb','likes')
            ->where('singer_id',$id)
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
    public function singerMV($id)
    {
        return MV::select('id', 'name', 'thumb','likes')
            ->where('singer_id',$id)
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
