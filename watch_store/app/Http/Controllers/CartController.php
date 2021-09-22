<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index(){

        // $product_cart = Cart::all();

        return view('cart.cart');
    }

    public function addCart(Cart $cart, $id){
        
        $products = Product::find($id);
        // dd($id);
        $cart->addCart($products);
        // dd(session('cart'));
        return redirect()->back();
    }

    public function updateCart(Cart $cart, $id){
        
        $quantity = request()->quantity ? request()->quantity : 1;
        // dd($quantity);
        $cart->updateCart($id,$quantity);

        return redirect()->back();
    }

    public function removeCart(Cart $cart, $id){
        
        $cart->removeCart($id);

        return redirect()->back();
    }

    public function clearCart(Cart $cart){
        
        $cart->clearCart();

        return redirect()->back();
    }


}
