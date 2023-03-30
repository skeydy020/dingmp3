<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Singer\SingerService;
use App\Models\Singer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    protected $singerService;

    public function __construct(SingerService $singerService)
    {
        $this->singerService = $singerService;
    }


    public function create(){
        return view('admin.singer.add',[
            'title'=>'Thêm danh mục'    
            
        ]);
    }
    public function store(CreateFormRequest $request){
            
        
         $result = $this->singerService->create($request);

         return redirect()->back();
    }

    public function index(){
        return view('admin.singer.list',[
            'title' => 'Danh sách các danh mục',
            'singers'=> $this->singerService->get()
        ]);
    } 

    public function show(Singer $singer)
    {
        return view('admin.singer.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $singer->name,
            'singer' => $singer
        ]);
    }

    public function update(Singer $singer, CreateFormRequest $request)
    {
        $this->singerService->update($request, $singer);

        return redirect('/admin/singers/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->singerService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công ca sĩ'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

}
