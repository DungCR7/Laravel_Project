<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\Custommer;
use App\Models\Menu;
use App\Http\Requests\Menu\FormResquest;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
        ->join('custommers','orders.custommer_id','=','custommers.id')
        ->select('orders.*','custommers.*')
        ->get();

        
        $orders = order::paginate(10);

        return view('Admin.Order.list', 
         [  
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'orders'=>$orders,]);
        
        
    }
    function show($id   ){
        // dd($id);
        $orders = DB::table('orders')
        ->join('custommers','orders.custommer_id','=','custommers.id')
        ->join('orderdetails','orders.id','=','orderdetails.order_id')
        ->select('orders.*','custommers.*','orderdetails.*')
  
        ->where('order_id', $id) ->first();
        return view('Admin.Order.detail', compact('orders'),  [  
            'title' => 'Chi Tiết Đơn Đặt Hàng' ,
            'orders'=>$orders
        ]);
    }
    
    function delete($id){
        if($id != null){
            DB::table('orders')->where('id', $id)->delete();
        }
        return redirect()->route('q');
    }
    function update(Request $request, $id){
        $data = [
            'status' => $request->status,
        ];
        DB::table('orders') -> where('id', $id)
                            -> update($data);
        return redirect()->route('q');
    }
    function search(Request $request){
        $keyswords = $request->kewords_submit;
        $menus = DB::table('menus')->first();
        $product1 = DB::table('products')->where('products.name','like','%'.$keyswords.'%')->get();
    
    return view ('Client.search.search')->with('menus', $menus)->with('product1', $product1);
    }
    public function abouts(){
        return view ('Client.about');
       }
       public function contact(){
        return view ('Client.contact');
       }
       public function store(FormResquest $request)
    {
        try {
            Comment::create ([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'product_id ' => (int) $request->input('parent_id'),
                'phone' => (string) $request->input('phone'),
                'content' => (string) $request->input('content'),
            ]);
           
           
            Session::flash('success', 'Tạo danh mục thành công');
            
        } catch (\Exception $err) {
            
            
        Session::flash('error', $err->getMessage());
            return false;
        }
            
    }
    public function create()
    {  
        return view('Client.contact', [
            'title' => 'Comment',
           
            // 'menus' =>$this -> getParent()
           
        ]);
    }
}
