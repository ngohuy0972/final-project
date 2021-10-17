<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $products = Product::orderBy('created_at', 'DESC')
                                ->take(3)
                                ->get();

        return view('pages.shop')->with(compact('products'));
    }


    // DISPLAY FILTER TIME PAGE
    public function newest(){

        $products = Product::orderBy('created_at', 'DESC')
                                ->take(3)
                                ->get();

      return view('filter.newest')->with(compact('products'));
    // echo('new page'); 
    }

    // DISPLAY FILTER PRICE PAGE
    public function priceSort(){

        $products = Product::orderBy('price', 'ASC')
                                ->take(3)
                                ->get();

      return view('filter.price')->with(compact('products'));
    // echo('new page'); 
    }

    // DISPLAY FILTER NAME PAGE
    public function nameSort(){

        $products = Product::orderBy('name', 'ASC')
                                ->take(3)
                                ->get();

      return view('filter.name')->with(compact('products'));
    // echo('new page'); 
    }

    // FILTER TIME
    public function newestFilter(Request $request){
        $data = $request->all();
        // dd($data);
        if($data['time'] > 0){
            $products = Product::where('created_at', '<', $data['time'])
                                ->orderBy('created_at', 'DESC')
                                ->take(3)
                                ->get();
        } else {
            $products = Product::orderBy('created_at', 'DESC')
                                ->take(3)
                                ->get();
        }

        $output ='';

        if(!$products->isEmpty()) {
            foreach ($products as $item) {
                $last_created_at = $item->created_at;
                # code...
                $output .= '
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                                <img src="/storage/'.$item->image.'" alt="">
                                                <div class="img-cap">
                                                        <span><a href="javascript:void(0)" id="btn-add-cart" class="btn-add-cart" onclick="addToCart('.$item->id.')">Add to cart</a></span>
                                                </div>
                                                <div class="favorit-items">
                                                        <span class="flaticon-heart"></span>
                                                </div>
                                        </div>
                                        <div class="popular-caption">
                                                <h3><a href="'.route('shop.show',$item->id).'">'.$item->name.'</a></h3>
                                                <span>$ '.number_format($item->price).'</span>
                                        </div>
                                </div>
                            </div>
                            ';
            }
                $output .= '<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
                                <div class="room-btn pb-40">
                                    <button type="submit" id="btn-load-more" class="all-button" data-created="'.$last_created_at.'">View More Products</button>
                                </div>
                            </div>
                            ';
        } else {
            $output .= '<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
                <div class="room-btn pb-40">
                    <button type="submit" id="btn-load-more" class="all-button">Out Of Product </button>
                </div>
            </div>
            ';
        }

        // dd($last_created_at);
        echo $output;

    }

    // FILTER  PRICE
    public function priceFilter(Request $request){

        $data = $request->all();
        // dd($data);
        if($data['price'] > 0){
            $products = Product::where('price', '>', $data['price'])
                                ->orderBy('price', 'ASC')
                                ->take(3)
                                ->get();
        } else {
            $products = Product::orderBy('price', 'ASC')
                                ->take(3)
                                ->get();
        }

        $output ='';

        if(!$products->isEmpty()) {
            foreach ($products as $item) {
                $last_price = $item->price;
                # code...
                $output .= '
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                                <img src="/storage/'.$item->image.'" alt="">
                                                <div class="img-cap">
                                                        <span><a href="javascript:void(0)" id="btn-add-cart" class="btn-add-cart" onclick="addToCart('.$item->id.')">Add to cart</a></span>
                                                </div>
                                                <div class="favorit-items">
                                                        <span class="flaticon-heart"></span>
                                                </div>
                                        </div>
                                        <div class="popular-caption">
                                                <h3><a href="'.route('shop.show',$item->id).'">'.$item->name.'</a></h3>
                                                <span>$ '.number_format($item->price).'</span>
                                        </div>
                                </div>
                            </div>
                            ';
            }
                $output .= '<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
                                <div class="room-btn pb-40">
                                    <button type="submit" id="btn-load-more" class="all-button" data-price="'.$last_price.'">View More Products</button>
                                </div>
                            </div>
                            ';
        } else {
            $output .= '<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
                <div class="room-btn pb-40">
                    <button type="submit" id="btn-load-more" class="all-button">Out Of Product </button>
                </div>
            </div>
            ';
        }

        // dd($last_price);
        echo $output;

    }

    // FILTER NAME
    public function nameFilter(Request $request){

        $data = $request->all();
        // dd($data);
        if($data['name'] > 0){
            $products = Product::where('name', '>', $data['name'])
                                ->orderBy('name', 'ASC')
                                ->take(3)
                                ->get();
        } else {
            $products = Product::orderBy('name', 'ASC')
                                ->take(3)
                                ->get();
        }

        $output ='';

        if(!$products->isEmpty()) {
            foreach ($products as $item) {
                $last_name = $item->name;
                # code...
                $output .= '
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                                <img src="/storage/'.$item->image.'" alt="">
                                                <div class="img-cap">
                                                        <span><a href="javascript:void(0)" id="btn-add-cart" class="btn-add-cart" onclick="addToCart('.$item->id.')">Add to cart</a></span>
                                                </div>
                                                <div class="favorit-items">
                                                        <span class="flaticon-heart"></span>
                                                </div>
                                        </div>
                                        <div class="popular-caption">
                                                <h3><a href="'.route('shop.show',$item->id).'">'.$item->name.'</a></h3>
                                                <span>$ '.number_format($item->price).'</span>
                                        </div>
                                </div>
                            </div>
                            ';
            }
                $output .= '<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
                                <div class="room-btn pb-40">
                                    <button type="submit" id="btn-load-more" class="all-button" data-name="'.$last_name.'">View More Products</button>
                                </div>
                            </div>
                            ';
        } else {
            $output .= '<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
                <div class="room-btn pb-40">
                    <button type="submit" id="btn-load-more" class="all-button">Out Of Product </button>
                </div>
            </div>
            ';
        }

        // dd($last_price);
        echo $output;
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
        // dd($id);
        $productDetails = Product::where('id', '=', $id)->get();

        return view('product.productdetail')->with(compact('productDetails'));
        
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
