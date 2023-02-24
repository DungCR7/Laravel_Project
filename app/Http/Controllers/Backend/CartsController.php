<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Custommer;
use App\Models\order;
use App\Models\orderdetail;
use Illuminate\Http\Request;
use App\Http\Services\CartServices;
class CartsController extends Controller
{
    protected $cart, $order ;
    public function __construct(CartServices $cart ,order $order)
    {
        $this->cart = $cart;
        $this->order = $order;
    }
    public function index()
    {    
        // $orders = DB::table('orders')
        //     ->Join('custommers', 'custommers.id', '=', 'orders.custommer_id ')
        //     ->get();
       
      
        // ->join ('menus' , 'products.menu_id', '=' ,'menus.id')
   
  
        
        $orders = Order::paginate(7);
        return view('Admin.Order.list', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'orders'=> $orders,
            
        ]);
    }

    public function show(Custommer $customer ,order $order)
    {
        $carts = $this->cart->getProductForCart($customer);
        return view('Admin.Order.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name, 
            'customer' => $customer,
            'carts' => $carts,
            'order'=>$order,
        ]);
    }
    public function updateStatus(Request $request ,$id)
    {
        $order =  $this->order->findOrFail($id);
        $order->update(['status' => $request->status]);
        return  response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);

    }

}
