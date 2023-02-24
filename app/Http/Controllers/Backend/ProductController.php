<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ForRequest;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = DB::table('products')
        
        // ->join ('menus' , 'products.menu_id', '=' ,'menus.id')
         ->get();
  
        
        $products = Product::paginate(7);
    //   dd($products);    
        return view('Admin.Product.list',
         [ 'title' => 'Danh sách sản phẩm','products'=> $products]);
        
        
    }

  
    public function create()
    {
        // return view('Admin.Product.add', [
        //     'title' => 'Thêm Sản phẩm mới',
        // ]);

        $menus = Menu::with('product')->get();
        return view('Admin.Product.add', [
            'title' => 'Thêm Sản phẩm mới',
            'menus' => $menus
        ]);
    }
  
    function delete($id){
        if($id != null){
            DB::table('products')->where('id', $id)->delete();
        }
        return redirect()->route('product.index');
    }
    public function store(ForRequest $request)
    {
    
        try {
            Product::create ($request ->all());
            
           
            Session::flash('success', 'Tạo sản phẩm thành công');
            
        } catch (\Exception $err) {
            // Session::flash('error', 'Tạo sản phẩm lỗi');
             Session::flash('error', $err->getMessage());
        //  log::info($err->getMessage());
            return false;
        }
            return redirect()->back();
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $products = DB::table('products')->where('id', $id)->first();
        return view('Admin.Product.edit', compact('products'),[
            'title' => 'Sửa Sản Phẩm ',
           
        ]
    
    );
    }

    
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'price_sale' => $request->price_sale,
            'image' => $request->image,
            'qty' => $request->qty,
            'size' => $request->size,
            'color' => $request->color,
            'updated_at' => $request->updated_at
        ];
        DB::table('products') -> where('id', $id)
                            -> update($data);
        return redirect()->route('product.index');
    }


    
    public function destroy($id)
    {
        //
    }
}
