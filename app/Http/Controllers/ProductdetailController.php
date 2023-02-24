<?php

namespace App\Http\Controllers;
use App\Models\Productdetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Productdetail\FormResquest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class ProductdetailController extends Controller
{
    public function index()
    {
        $productdetails = DB::table('productdetails')
        // ->join ('menus' , 'products.menu_id', '=' ,'menus.id')
         ->get()
        ;
    //   dd($products);    
        return view('Admin.Productdetail.list',
         ['title' => 'Productdetail','productdetails'=> $productdetails]);
        }
         public function delete($id){
            if($id != null){
                DB::table('productdetails')->where('id', $id)->delete();
            }
            return redirect()->route('productdetails.index');
        }
    
        public function edit($id){
            $productdetails = DB::table('productdetails')->where('id', $id)->first();
            return view('Admin.Productdetail.edit', compact('productdetails'),
            [
                'title' => 'Sửa Sản Phẩm ',
               
            ]
        );
        }
    
        function update(Request $request, $id){
            $data = [
                'size' => $request->size,
                'color' => $request->color,
               
                
            ];
            DB::table('productdetails') -> where('id', $id)
                                -> update($data);
            return redirect()->route('productdetailider.index');
        }
    
    
    public function create()
    {
        
        
        $products = Product::with('productdetail')->get();
        return view('Admin.Productdetail.add', [
            'title' => 'Thêm slider mới ',
            'product' => $products
        ]);     
    }
    public function store(FormResquest $request)
    {
    
        try {
        //     Slider::create ([
        //         'name' => (string) $request->input('name'),
        //         'product_id' => (int) $request->input('product_id'),
        //         'url' => (string) $request->input('url'),
        //         'image' => (string) $request->input('image'),
        //     ]);
            
           
        //     Session::flash('success', 'Tạo sản phẩm thành công');
            $data = [
                
                'product_id' => $request->product_id,
                'size' => $request->size,
                'color' => $request->color
            ];
           
            DB::table('productdetails')->insert($data);
          
            Session::flash('success', 'Thêm chi tiết sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Session::flash('error', 'Tạo sản phẩm lỗi');
  
            return false;
        }
        
            return redirect()->back();
    }
    
}
