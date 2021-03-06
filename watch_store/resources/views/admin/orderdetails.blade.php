@extends('layouts.admin')

@section ('content')

<div class="col-10 col-md-10 col-sm-10 col-lg-10">
    <div class="card">
        <div class="card-header">
            <h5>ORDER DETAILS</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Qty</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">State</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <tr>                  
                      <td>{{ $order->product_id }}</td>
                      <td>{{ $order->name }}</td>
                      <td>{{ $order->product_name }}</td>
                      <td>$ {{ number_format($order->product_price * $order->product_sales_quantity) }}</td>
                      <td>{{ $order->product_sales_quantity }}</td>
                      @if ($order->payment_id == 1)
                        <td>COD</td>                 
                      @else
                        <td>Debit/VISA</td>
                      @endif
                      @if ($order->payment_id == 1)
                        <td style="color:red">NO PAID</td>               
                      @else
                        <td style="color:green">PAID</td>
                      @endif
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection