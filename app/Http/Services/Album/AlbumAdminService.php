<?php


namespace App\Http\Services\Album;


use App\Models\Singer;
use App\Models\Album;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;

class AlbumAdminService
{
    public function getMenu()
    {
        return Singer::where('active', 1)->get();
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
            Album::create([
                'name' => (string)$request->input('name'),
                'thumb' => (string)$request->input('thumb'),
                'description' => (string)$request->input('description'),
                'singer_id' =>(int)$request->input('singer_id'),
               
                'likes' => (int)$request->input('likes'),
                'active' => (string)$request->input('active')
              
            ]);

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Album::with('singer')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $album)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $album->fill($request->input());
            $album->save();
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
        $album = Album::where('id', $request->input('id'))->first();
        if ($album) {
            $album->delete();
            return true;
        }

        return false;
    }
}
