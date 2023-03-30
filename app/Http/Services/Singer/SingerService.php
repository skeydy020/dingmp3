<?php

namespace App\Http\Services\Singer;

use App\Models\Menu;
use App\Models\Singer;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class SingerService{
    public function get()
    {
        return Singer::orderByDesc('id')->paginate(15);
    }

    public function create($request){
        try{
            Singer::create([
                'name' => (string)$request->input('name'),
                'thumb' => (string)$request->input('thumb'),
                'subcriber' => (int)$request->input('subcriber'),
                'description' => (string)$request->input('description'),
                'active' => (string)$request->input('active'),
                'slug'=> Str::slug($request->input('name'),'-')
            ]);
            
            Session::flash('Success','Tạo danh mục thành công');

        }catch(\Exception $err){
            Session::flash('Error',$err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $singer): bool
    {
        try {
            $singer->fill($request->input());
            $singer->save();
            Session::flash('success', 'Cập nhật singer thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật singer Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
        // $singer->name = (string)$request->input('name');
        // $singer->description = (string)$request->input('description');
        // $singer->content = (string)$request->input('content');
        // $singer->active = (string)$request->input('active');
        // $singer->save();

        
        // Session::flash('success', 'Cập nhật thành công Danh mục');
        // return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $singer = Singer::where('id', $id)->first();
        if ($singer) {
            return Singer::where('id', $id)->delete();
        }

        return false;
    }


    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($menu, $request)
    {
        $query = $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }
}