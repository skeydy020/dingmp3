<?php

namespace App\Http\Controllers;

use App\Http\Services\List\ListService;
use Illuminate\Http\Request;

class ListController extends Controller
{
    protected $listService;

    public function __construct(ListService $listService)
    {
        $this->listService = $listService;
    }

    public function index($id = '', $slug = '')
    {
        $list = $this->listService->show($id);
         $listmore = $this->listService->more($id);
        $detail = $this->listService->showdetail($id);
        return view('lists.listdetail', [
            'title' => $list->name,
             'list' => $list,
             'details' => $detail,
             'lists' => $listmore
        ]);
    }
}
