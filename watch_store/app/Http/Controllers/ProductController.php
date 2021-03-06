<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        return view('admin.product')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addproduct');
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
        $products = new Product();

        $products->name = $request->name;
        $products->brand = $request->brand;
        $products->price = $request->price;
        $products->image = $request->file('image')->store('/uploads/images', 'public');
        $products->category = $request->category;

        $products->save();

        return redirect()->route('product.index')->with('Add product successfully');

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
        $products = Product::where('id', '=', $id)->get();
        // echo($id.'+'.$products);

        return view('admin.editproduct')->with(compact('products'));
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
        $products = Product::find($id);
        $image = request('image');

        if ($products->image == null) {
            $imagePath = request('image')->store('/uploads/images', 'public');
            
            $products->name = $request->name;
            $products->price = $request->price;
            $products->brand = $request->brand;
            $products->category = $request->category;
            $products->image = $imagePath;
        } else {
            if ($image) {
                $detinationPath = '/uploads/images' . $products->image;
                if (file_exists($detinationPath)) {
                    unlink($detinationPath);
                }
                $imagePath = request('image')->store('/uploads/images', 'public');
                $products->name = $request->name;
                $products->price = $request->price;
                $products->brand = $request->brand;
                $products->category = $request->category;
                $products->image = $imagePath;
            } else{
                $products->name = $request->name;
                $products->price = $request->price;
                $products->brand = $request->brand;
                $products->category = $request->category;
                // $products->image = $imagePath;
            }
            $products->save();
        }
        $products->save();

        return redirect()->route('product.index')->with('update', 'Update Data Successfully');
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
        $products = Product::where('id', '=', $id)->delete();
        $stock = Stock::where('product_id', '=', $id)->delete();
        
        return redirect()->route('product.index')->with('Delete Successfully');
    }
}
