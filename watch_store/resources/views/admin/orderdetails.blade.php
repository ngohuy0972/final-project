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
                    <th scope="col">ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Qty</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">State</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <tr>                  
                      <td>{{ $order->id }}</td>
                      <td>{{ $order->name }}</td>
                      <td>{{ $order->product_name }}</td>
                      <td>$ {{ number_format($order->product_price * $order->product_sales_quantity) }}</td>
                      <td>{{ $order->product_sales_quantity }}</td>
                      @if ($order->payment_id == 1)
                        <td>COD</td>                 
                      @else
                        <td>Debit/VISA</td>
                      @endif
                      <td style="color:green">PAID</td>
                      <td>
                          <button class="btn-action btn-primary w-100 m-1"><a href="#" style="color:white;">EDIT</a></button>
                          <form action="#" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn-action btn-danger w-100 m-1">
                                REMOVE  
                            </button>
                        </form> 
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection