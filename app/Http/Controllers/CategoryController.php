<?php

namespace App\Http\Controllers;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request, $id, $slug = '')
    {
        $menus = $this->menuService->getId($id);
        $products = $this->menuService->getProduct($menus, $request);
    
        return view('Client.menu', [
            'title' => $menus->name,
            'products' => $products,
            'menus'  => $menus
        ]);
    }
}
