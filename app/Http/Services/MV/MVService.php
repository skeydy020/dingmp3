<?php


namespace App\Http\Services\MV;


use App\Models\MV;

class MVService
{
    const LIMIT = 16;

    public function get($page = null)
    {
        return MV::select('id', 'name', 'likes',  'thumb')->with('singer')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return MV::where('id', $id)
            ->where('active', 1)
            ->with('singer')
            ->firstOrFail();
    }

    public function more($id)
    {
        return MV::select('id', 'name', 'thumb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
