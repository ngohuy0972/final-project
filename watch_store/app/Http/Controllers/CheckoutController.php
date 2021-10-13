<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutValidationRequest;
use App\Mail\CheckoutConfirm;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Mail\MailConfirm;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cart.checkout');
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
    public function store(CheckoutValidationRequest $request)
    {
        //
        $shipping_info = new Shipping();
        $payment = new Payment();
        $order = new Order();
        $cart = new Cart();
        $user_id = Auth::id();

        // Insert shipping information
        $shipping_info->user_id = $user_id;
        $shipping_info->name = $request->first_name .' '. $request->last_name;
        $shipping_info->phone_number = $request->phone_number;
        $shipping_info->email = $request->shipping_email;
        $shipping_info->address = $request->shipping_address;
        $shipping_info->city = $request->city;
        $shipping_info->zip = $request->zip;
        $shipping_info->order_note = $request->order_note;
        $shipping_info->save();
        // echo($shipping_info->id);

        // Insert payment method
        $payment->payment_method = $request->payment_method;
        $payment->payment_status = 'PAID';
        $payment->save();
        // echo($payment->id);

        // Insert order
        $order->user_id = $user_id;
        $order->shipping_id = $shipping_info->id;
        $order->payment_id = $payment->payment_method;
        $order->order_total = $cart->total_price;
        $order->order_status = 'ORDERED';
        $order->save();
        $order_id = $order->id;

        // Insert Order Detail
        $order_detail = array();  // Using array because cart storage many products.
        foreach ($cart->items as $item) {
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $item['id'];
            $order_detail['product_name'] = $item['name'];
            $order_detail['product_price'] = $item['price'];
            $order_detail['product_sales_quantity'] = $item['quantity'];
            $order_detail['created_at'] = Carbon::now();
            $order_detail['updated_at'] = Carbon::now();
            DB::table('order_details')->insert($order_detail);
            // echo($item['name'] .'-'. $item['price']);
            // echo($cart->total_quantity);            
        }
        // Send Email confirm
        $shopping_list = session('cart');
        // dd($shopping_list);
        Mail::to($request->shipping_email)->send(new CheckoutConfirm($shopping_list));

        // Remove all products in cart after payment success
        Session::forget('cart');

        if($request->payment_method == '1') {
            return redirect()->route('payment-success');
        } else if($request->payment_method == '2') {
            return redirect()->route('payment-method');
        }
    
    }

    public function email(){

        return view('emails.checkoutconfirm');
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
    }
}
