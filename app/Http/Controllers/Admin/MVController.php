<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MV\MVRequest;
use App\Http\Services\MV\MVAdminService;
use App\Models\MV;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MVController extends Controller
{
    protected $mvService;

    public function __construct(MVAdminService $mvService)
    {
        $this->mvService = $mvService;
    }

    public function index()
    {
        return view('admin.mv.list', [
            'title' => 'Danh Sách MV',
            'mvs' => $this->mvService->get()
        ]);
    }

    public function create()
    {
        return view('admin.mv.add', [
            'title' => 'Thêm MV Mới',
            'singers' => $this->mvService->getMenu()
        ]);
    }


    public function store(MVRequest $request)
    {
        $this->mvService->insert($request);

        return redirect()->back();
    }

    public function show(MV $mv)
    {
        return view('admin.mv.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'mv' => $mv,
            'singers' => $this->mvService->getMenu()
        ]);
    }


    public function update(Request $request, MV $mv)
    {
        $result = $this->mvService->update($request, $mv);
        if ($result) {
            return redirect('/admin/mvs/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->mvService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công mv'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
