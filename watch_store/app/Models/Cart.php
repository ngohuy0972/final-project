<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items = [];
    public $total_price = 0;
    public $total_quantity = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();   
    }

    // Add to cart
    public function addCart($products, $quantity = 1){
        // dd($products);
        $item = [
            'id'=>$products->id,
            'name'=>$products->name,
            'price'=>$products->price,
            'quantity'=>$quantity,
            'image'=>$products->image,
        ];

        if(isset($this->items[$products->id])){

            $this->items[$products->id]['quantity'] += $quantity;
        } else {
            $this->items[$products->id] = $item;
        }
        
        session(['cart' => $this->items]);
    }

    // Remove product from cart
    public function removeCart($id){
        
        if(isset($this->items[$id])){

            unset($this->items[$id]);
        }

        session(['cart' => $this->items]);
    }

    // Update cart
    public function updateCart($id, $quantity = 1){
        
        if(isset($this->items[$id])){
            $this->items[$id]['quantity'] = $quantity;
        }

        session(['cart' => $this->items]);
    }

    // Clear cart
    public function clearCart(){

        session(['cart' => '']);
    }


    private function get_total_price(){

        $total_price = 0;
        foreach ($this->items as $item) {
            # code...
            $total_price += $item['price'] * $item['quantity'];
        }
        return $total_price;
    }

    private function get_total_quantity(){

        $total_quantity = 0;
        foreach ($this->items as $item) {
            # code...
            $total_quantity += $item['quantity'];
        }
        return $total_quantity;
    }

}
