<?php


namespace App\Http\Services\Song;


use App\Models\Singer;
use App\Models\Album;
use App\Models\Menu;
use App\Models\songs;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;

class SongAdminService
{
    public function getMenu()
    {
        return Singer::where('active', 1)->get();
    }
    public function getAlbum()
    {
        return Album::where('active', 1)->get();
    }   
    public function getTheLoai()
    {
        return Menu::where('active', 1)->get();
    }   
    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
       //dd($request->input());
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            // Album::create($request->all());
            songs::create([
                'name' => (string)$request->input('name'),
                'thumb' => (string)$request->input('thumb'),
                'link' => (string)$request->input('link'),
                'description' => (string)$request->input('description'),
                'lyric' => (string)$request->input('lyric'),
                'album_id' =>(int)$request->input('album_id'),
                'singer_id' =>(int)$request->input('singer_id'),
                'menu_id' => (int)$request->input('menu_id'),
                'likes' => (int)$request->input('likes'),
                'active' => (string)$request->input('active')
              
            ]);

            Session::flash('success', 'Thêm bài hát thành công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return songs::with('singer','album','menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $song)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $song->fill($request->input());
            $song->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $song = songs::where('id', $request->input('id'))->first();
        if ($song) {
            $song->delete();
            return true;
        }

        return false;
    }
}
