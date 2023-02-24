<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\Slider\SilderForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Http\Requests\Product\ForRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class SliderController extends Controller

{
    public function index()
    {
        $sliders = DB::table('sliders')
       
         ->get()
        ;
 
        return view('Admin.Slider.list',
         ['title' => 'Slider','sliders'=> $sliders]);
        }
         public function delete($id){
            if($id != null){
                DB::table('sliders')->where('id', $id)->delete();
            }
            return redirect()->route('Slider.index');
        }
    
        public function edit($id){
            $Slider = DB::table('sliders')->where('id', $id)->first();
            return view('Admin.Slider.edit', compact('Slider'),
            [
                'title' => 'Sửa Sản Phẩm ',
               
            ]
        );
        }
    
        function update(Request $request, $id){
            $data = [
                'name' => $request->name,
                'url' => $request->url,
                'image' => $request->image,
                
            ];
            DB::table('sliders') -> where('id', $id)
                                -> update($data);
            return redirect()->route('Slider.index');
        }
    
    
    public function create()
    {
        
        
        $products = Product::with('slider')->get();
        return view('Admin.Slider.add', [
            'title' => 'Thêm slider mới ',
            'product' => $products
        ]);     
    }
    public function store(ForRequest $request)
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
                'name' => $request->name,
                'product_id' => $request->product_id,
                'url' => $request->url,
                'image' => $request->image
            ];
           
            DB::table('sliders')->insert($data);
          
            Session::flash('success', 'Tạo tiêu đề thành công thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Session::flash('error', 'Tạo sản phẩm lỗi');
  
            return false;
        }
        
            return redirect()->back();
    }
    
}
