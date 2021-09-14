<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;

class StockController extends Controller
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

        return view('admin.stock')->with(compact('products'));
    }

    public function stockShow(Request $request){
        $data = $request->all();

        $stocks = Stock::where('product_id', '=', $data['id'])->get();

        $output ='';
        foreach($stocks as $stock)
        {
            $output .='
            <tr >
            <th scope="row">
                '.$stock->color.'
            </th>
            <td>
                '.$stock->quantity.'
            </td>
            <td>
                  <a href="/admin-stock/edit/'.$stock->id.'" class="btn-action btn-primary w-100 m-1" style="color:white; width:100px;">EDIT</a>
                  <a href="/admin-stock/remove/'.$stock->id.'" class="btn-action btn-danger w-100 m-1" style="color:white; width:100px;">REMOVE</a>
            </td>
            </tr>
      
            ';
        }

        return $output;
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
