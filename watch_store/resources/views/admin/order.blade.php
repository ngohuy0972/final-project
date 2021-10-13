@extends('layouts.admin')

@section ('content')

<div class="col-10 col-md-10 col-sm-10 col-lg-10">
    <div class="card">
        <div class="card-header">
            <h5>ORDER LIST</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">State</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                  <tr>                  
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ number_format($order->order_total) }} USD</td>
                    @if ($order->payment_id == '1')
                        <td style="color:red">NO PAID</td>               
                    @else
                        <td style="color:green">PAID</td>
                    @endif
                    {{-- <td>{{ $order->payment_id}}</td> --}}
                    <td>
                        <button class="btn-action btn-primary w-100 m-1"><a href="{{ route('orders.show',$order->id)}}" style="color:white;">DETAILS</a></button>
                        <form action="{{ route('orders.destroy',$order->id)}}" method="POST">
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
            {{-- <ul class="list-group">
                @foreach ($orders as $order)
                <a href="#" class="list-group-item latest-order">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="id" style="width:150px">Order ID: {{ $order->id }}</div>
                            <div class="name">Customer Name: {{ $order->name }}</div>
                            <div class="name">Product Name: {{ $order->product_name }}</div>
                            <div class="name">Total Price: {{ $order->order_total }}</div>
                            <div class="status text-success ml-auto">PAID</div> 
                        </div>
                    </div>
                </a>
                @endforeach
            </ul> --}}
        </div>
    </div>
</div>
    
@endsection