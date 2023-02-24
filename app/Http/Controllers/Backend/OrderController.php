<?php

namespace App\Http\Controllers\Backend;
use App\Models\order;
use App\Http\Controllers\Controller;
use App\Http\Services\CartServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $order = DB::table('orders')
      ->join('custommers','orders.custommer_id ','=','custommers.id')
      ->select('orders.*','custommers.name')
      ->get();
        return view('Admin.Order.list', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'order'=>$order,
            
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
