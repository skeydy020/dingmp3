<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Album\AlbumRequest;
use App\Http\Services\Album\AlbumAdminService;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    protected $albumService;

    public function __construct(AlbumAdminService $albumService)
    {
        $this->albumService = $albumService;
    }

    public function index()
    {
        return view('admin.album.list', [
            'title' => 'Danh Sách Album',
            'albums' => $this->albumService->get()
        ]);
    }

    public function create()
    {
        return view('admin.album.add', [
            'title' => 'Thêm Sản Phẩm Mới',
            'singers' => $this->albumService->getMenu()
        ]);
    }


    public function store(AlbumRequest $request)
    {
        $this->albumService->insert($request);

        return redirect()->back();
    }

    public function show(Album $album)
    {
        return view('admin.album.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'album' => $album,
            'singers' => $this->albumService->getMenu()
        ]);
    }


    public function update(Request $request, Album $album)
    {
        $result = $this->albumService->update($request, $album);
        if ($result) {
            return redirect('/admin/albums/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->albumService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
