<?php
namespace App\Http\Services;

use App\Models\order;
use App\Models\orderdetail;
use App\Models\Custommer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartServices
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'image')
           
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $customer = Custommer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);
           
            $this->infoProductCart($carts, $customer->id);
            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');
           
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }

        return true;
    }
    


    protected function infoProductCart($carts, $customer_id)
    {
        $total = 0;
        $status = '0';
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'image')
            ->whereIn('id', $productId)
            ->get();
        
        $data = [];
        
        foreach ($products as $product) {
            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
            $priceEnd = $price * $carts[$product->id];
            $total += $priceEnd;
            $product_id = $product->id; 
            $carts[$product->id];
        }
            $order = order::create([
           'custommer_id' => $customer_id,
           'total' =>  $total,
           'status'=>$status,
       ]);
            
            $order_id = $order ->id;
            foreach ($products as $product) {   
                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                $priceEnd = $price * $carts[$product->id];
                orderdetail::create([
                'order_id' =>$order_id,
                'product_id' => $product_id,
                'price'=>$priceEnd,
                'qty' => $carts[$product->id],
                ]);
            }
            
       
    }

    

    public function getCustomer()
    {
        return Custommer::orderByDesc('id')->paginate(15);
    }

    public function getProductForCart($customer)
    {
        return $customer->order()->with(['orderdetail' => function ($query) {
            $query->select('qty', 'price', '	product_id ');
        }])->get();
    }
}