<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function paymentSuccess(){
        return view('cart.paymentsuccess');
    }

    public function paymentMethod(){
        return view('cart.paymentmethod');
    }
}
