<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\List\ListRequest;
use App\Http\Services\List\ListAdminService;
use App\Models\lists;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    protected $listService;

    public function __construct(ListAdminService $listService)
    {
        $this->listService = $listService;
        
    }

    public function index()
    {
        return view('admin.list.list', [
            'title' => 'Danh Sách bài hát',
            'lists' => $this->listService->get()
        ]);
    } public function zui()
    {
        return view('zui', [
            'title' => 'hehe'
        ]);
    }

    public function create()
    {
        return view('admin.list.add', [
            'title' => 'Thêm bài hát Mới'
        ]);
    }


    public function store(ListRequest $request)
    {
        $this->listService->insert($request);

        return redirect()->back();
    }

    public function show(lists $list)
    {
        return view('admin.list.edit', [
            'title' => 'Chỉnh Sửa bài hát',
            'list' => $list
        ]);
    }


    public function update(Request $request, lists $list)
    {
        $result = $this->listService->update($request, $list);
        if ($result) {
            return redirect('/admin/lists/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->listService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công list nhạc'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
