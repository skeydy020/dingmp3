<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Song\SongRequest;
use App\Http\Services\Song\SongAdminService;
use App\Models\songs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    protected $songService;

    public function __construct(SongAdminService $songService)
    {
        $this->songService = $songService;
        // if(Auth::check()){
        //     view()->share('nguoidung',Auth::user());
        // }
    }

    public function index()
    {
        return view('admin.song.list', [
            'title' => 'Danh Sách bài hát',
            'songs' => $this->songService->get()
        ]);
    }

    public function create()
    {
        return view('admin.song.add', [
            'title' => 'Thêm bài hát Mới',
            'singers' => $this->songService->getMenu(),
            'albums' => $this->songService->getAlbum(),
            'menus' => $this->songService->getTheLoai()
        ]);
    }


    public function store(SongRequest $request)
    {
        $this->songService->insert($request);

        return redirect()->back();
    }

    public function show(songs $song)
    {
        return view('admin.song.edit', [
            'title' => 'Chỉnh Sửa bài hát',
            'song' => $song,
            'singers' => $this->songService->getMenu(),
            'albums' => $this->songService->getAlbum(),
            'menus' => $this->songService->getTheLoai()
        ]);
    }


    public function update(Request $request, songs $song)
    {
        $result = $this->songService->update($request, $song);
        if ($result) {
            return redirect('/admin/songs/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->songService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài hát'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
