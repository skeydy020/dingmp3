<?php


namespace App\Http\Services\ListDetail;

use App\Models\list_details;
use App\Models\User;
use App\Models\songs;
use App\Models\lists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;

class ListDetailAdminService
{
    public function getMenu()
    {
        return songs::where('active', 1)->get();
    }
    public function getLists()
    {
        return lists::where('active', 1)->get();
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
            list_details::create([
                'list_id' =>(Integer)$request->input('list_id'),
                'song_id' =>(Integer)$request->input('song_id'),
                'active' => (string)$request->input('active')
              
            ]);

            Session::flash('success', 'Thêm bài hát công');
        } catch (\Exception $err) {

            Session::flash('error', $err->getMessage());
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get($listdetail)
    {
        return list_details::with('song')->
            orderByDesc('id')
            ->where('list_id','=', $listdetail)->paginate(15);
    }

    public function update($request, $list)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $list->fill($request->input());
            $list->save();
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
        $list = list_details::where('id', $request->input('id'))->first();
        if ($list) {
            $list->delete();
            return true;
        }

        return false;
    }
}
