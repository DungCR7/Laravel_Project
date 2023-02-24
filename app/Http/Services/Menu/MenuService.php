<?php
namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function show()
    {
        return Menu::select('name', 'id')
            ->orderbyDesc('id')
            ->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }


    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }


    public function getId($id)
    {
        return Menu::where('id', $id)->firstOrFail();
    }

    public function getProduct($menu, $request)
    {
     
        return  $menu -> product()
           ->select('id', 'name', 'price', 'price_sale', 'image','color','size')
           ->orderByDesc('id')
            ->paginate(12);
    }
}