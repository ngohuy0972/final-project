<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = DB::table('orders')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
                        ->join('payments', 'orders.payment_id', '=', 'payments.payment_method')
                        ->select('orders.id', 
                                'orders.order_total',
                                'shippings.name',
                                'orders.payment_id')
                        ->distinct('order_details.order_id')
                        ->get();
 
        return view('admin.order')->with(compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $orders = DB::table('orders')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
                        ->join('payments', 'orders.payment_id', '=', 'payments.id')
                        ->where('orders.id', '=', $id)
                        ->select('orders.id', 
                                'order_details.product_price',
                                'order_details.product_id',
                                'shippings.name', 
                                'order_details.product_name',
                                'order_details.product_sales_quantity',
                                'orders.payment_id')
                        ->distinct('order_details.order_id')
                        ->get();
        // dd($orders);                
 
        return view('admin.orderdetails')->with(compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $orders = Order::where('id', '=', $id)->delete();
        $order_details = OrderDetails::where('order_id', '=', $id)->delete();
        $shippings = Shipping::where('id', '=', $id)->delete();
        $payments = Payment::where('id', '=', $id)->delete();

        // dd($orders);
        // $orders->delete();

        return redirect()->back();
    }
}
