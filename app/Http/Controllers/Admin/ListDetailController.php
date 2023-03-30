<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\List\ListRequest;
use App\Http\Requests\Listdetail\ListDetailRequest;
use App\Http\Services\List\ListAdminService;
use App\Http\Services\ListDetail\ListDetailAdminService;
use App\Models\list_details;
use App\Models\lists;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ListDetailController extends Controller
{
    protected $listdetailService;

    public function __construct(ListDetailAdminService $listdetailService)
    {
        $this->listdetailService = $listdetailService;
        
    }

    public function index( $listdetail)
    {
      
       return view('admin.listdetail.list', [
        'title' =>'Danh sách bài trong list nhạc',
        'listdetails' => $this->listdetailService->get($listdetail)
    ]); 
        
    } 
    public function zui()
    {
        return view('zui', [
            'title' => 'hehe'
        ]);
    }

    public function create()
    {
        return view('admin.listdetail.add', [
            'title' => 'Thêm bài hát Mới',
            'songs' => $this->listdetailService->getMenu(),
            'lists' => $this->listdetailService->getLists()
        ]);
    }


    public function store(ListDetailRequest $request)
    {
        $this->listdetailService->insert($request);

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
        $result = $this->listdetailService->update($request, $list);
        if ($result) {
            return redirect('/admin/lists/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->listdetailService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài nhạc'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
