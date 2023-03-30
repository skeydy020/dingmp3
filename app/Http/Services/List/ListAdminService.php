<?php


namespace App\Http\Services\List;


use App\Models\User;
use App\Models\lists;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;

class ListAdminService
{
    // public function getMenu()
    // {
    //     return U::where('active', 1)->get();
    // }

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
            lists::create([
                'name' => (string)$request->input('name'),
                'thumb' => (string)$request->input('thumb'),
                // 'user_id' =>(int)$request->input('user_id'),
                'user_id' =>Auth::id(),
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
        return lists::
            orderByDesc('id')->paginate(15);
    }

    public function update($request, $list)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $list->fill($request->input());
            $list->user_id = Auth::id();
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
        $list = lists::where('id', $request->input('id'))->first();
        if ($list) {
            $list->delete();
            return true;
        }

        return false;
    }
}
