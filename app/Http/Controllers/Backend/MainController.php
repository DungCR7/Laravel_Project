<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        
        $ordercount =  DB::table('orders')
            ->where('status', '=', 0)
            ->count();
         $order =  DB::table('orders')
            ->where('status', '=', 1)
            ->count();

        $prdcount =  DB::table('products')
            ->count();

        $money =  DB::table('orders')
            ->where('status', '=', 1)
            ->sum('total');

        $doanhthu =  DB::table('orders')

            ->whereBetween('updated_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->where('status', '=', 1)
            ->get();

        $doanhthuthang =  DB::table('orders')

            ->whereBetween('updated_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->where('status', '=', 1)
            ->sum('total');


        $doanhthuthang3 =  DB::table('orders')
            ->select(
                DB::raw("MONTHNAME(updated_at) as month_name")
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month_name')
            ->get();

        return view( 'Admin.home',['title'=>'Trang quản trị Admin'],
        compact('ordercount', 'order','prdcount', 'money', 'doanhthu', 'doanhthuthang', 'doanhthuthang3'));

       }
}
