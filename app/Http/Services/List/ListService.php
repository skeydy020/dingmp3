<?php


namespace App\Http\Services\List;

use App\Models\list_details;
use App\Models\lists;

class ListService
{
    const LIMIT = 16;

    public function get($page = null)
    {
        return lists::select('id', 'name', 'thumb','user_id')
            ->where('user_id',1)
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })

            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return lists::where('id', $id)
            ->firstOrFail();
    }
    public function showdetail($id)
    {
        return list_details::where('list_id', $id)->with('song')
        ->orderByDesc('id') ->get();
    }

    public function more($id)
    {
        return lists::select('id', 'name', 'thumb','user_id')
            ->where('user_id',1)
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
