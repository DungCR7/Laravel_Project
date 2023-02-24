<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Menu\FormResquest;
class MainsController extends Controller
{
    protected $menu;
    protected $slider;
    protected $product;
    public function __construct( MenuService $menu , SliderService $slider , ProductService $product )
    {

        $this->menu = $menu;
        $this->slider = $slider;
        $this->product =$product;

    }
    public function index(){
        $menu = DB::table('menus')->get();
        return view('Client.main',[
            'title'=>'Shop bán quần áo ',
            'menus'=> $this ->menu->Show(),
            'sliders'=>$this->slider->show(),
            'products'=>$this->product->get()
            ])->with('menus',$menu);
    
    }
}
