<?php


namespace App\Http\Services\Song;


use App\Models\songs;

class SongService
{
    const LIMIT = 16;

    public function get($page = null)
    {
        return songs::select('id', 'name', 'thumb','singer_id')->with('singer')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return songs::where('id', $id)
            ->where('active', 1)
            ->with('singer')
            ->firstOrFail();
    }

    public function more($id)
    {
        return songs::select('id', 'name',  'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
