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

        // dd($data);
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
            <button class="btn-action btn-primary w-100 m-1"><a href="'. route('stock.edit',$stock->id).'" style="color:white;">EDIT</a></button>
            <form action="'.route('stock.destroy', $stock->id).'" method="POST">
                <input type="hidden" name="_token" value="'. csrf_token() .'">
                <input type="hidden" name="_method" value="DELETE">
              <button class="btn-action btn-danger w-100 m-1">
                  REMOVE  
              </button>
          </form> 
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
        $products = Product::all();

        return view('admin.addstock')->with(compact('products'));
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
        $data = $request->all();
        
        // dd($data);

        $stock_color = new Stock();
        $stock_color->product_id = $data['product-id'];
        $stock_color->color = $request->color;
        $stock_color->quantity = $request->quantity;
        
        $stock_color->save();

        return redirect()->route('stock.index');
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
        // dd($id);
        $stock_color = Stock::where('id', '=', $id)->get();

        return view('admin.editstock')->with(compact('stock_color'));

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

        $stock_color = Stock::find($id);
        $stock_color->color = $request->color;
        $stock_color->quantity = $request->quantity;

        $stock_color->save();

        return redirect()->route('stock.index')->with('Update Successfully');
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
        Stock::where('id','=',$id)->delete();

        return redirect()->route('stock.index')->with('Delete Successfully');
    }
}
