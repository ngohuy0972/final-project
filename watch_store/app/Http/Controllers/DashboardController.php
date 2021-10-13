<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index(){

        $totaluser = User::count();
        $totalprice = Product::sum('price');
        $totalproduct = Product::count();
        $totalorder = Order::count();
        $latestorder = DB::table('orders')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
                        ->join('payments', 'orders.payment_id', '=', 'payments.id')
                        ->select('orders.id', 
                                'orders.order_total',
                                'shippings.name',
                                'orders.payment_id')
                        ->orderBy('orders.id', 'DESC')        
                        ->distinct('order_details.order_id')
                        ->take(1)
                        ->get();

        return view('admin.dashboard')->with(compact('latestorder', 'totalprice', 'totaluser', 'totalproduct', 'totalorder'));
    }
}
