<?php


namespace App\Http\Services\Album;


use App\Models\Album;
use App\Models\songs;

class AlbumService
{
    const LIMIT = 3;

    public function get($page = null)
    {
        return Album::select('id', 'name', 'likes', 'thumb','singer_id')->with('singer')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Album::where('id', $id)->with('singer')
            ->where('active', 1)
            ->firstOrFail();
    }

    public function more($id)
    {
        return Album::select('id', 'name', 'likes', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(3)
            ->get();
    } public function baihatAlbum($id)
    {
        return songs::select('id', 'name', 'link')
            ->where('active', 1)
            ->where('album_id',$id)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->get();
    }
}
