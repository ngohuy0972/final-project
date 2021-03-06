@extends('layouts.admin')

@section ('content')
    <div class="col-10 col-md-10 col-sm-10 col-lg-10">
        @if(Session::has('success'))
        <div class="row">
        <div class="col-12">
            <div id="charge-message" class="alert alert-success">
            {{ Session::get('success') }}
            </div>
        </div>
        </div>
        @endif
        
        <div class="row">
            <div class="col-4 totaluser">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-user" style="color: #ff2020">&nbsp TOTAL USER</i>
                    </div>
                    <div class="card-body">
                        <h5>{{ $totaluser }} users</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 totalproduct">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-box" style="color: #ff2020">&nbsp TOTAL PRODUCT</i>
                    </div>
                    <div class="card-body">
                        <h5>{{ $totalproduct }} products</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 totalmoney">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-money-bill"  style="color: #ff2020">&nbsp TOTAL MONEY</i>
                    </div>
                    <div class="card-body">
                        
                        <h5>{{ number_format($totalprice)}} USD</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-8 latestorder mt-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-cart-plus"  style="color: #ff2020">&nbsp LATEST ORDER</i>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">State</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($latestorder as $order)
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <tr>                  
                                  <td>{{ $order->id }}</td>
                                  <td>{{ $order->name }}</td>
                                  <td>$ {{ number_format($order->order_total) }}</td>
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
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-file-alt"  style="color: #ff2020">&nbsp TOTAL ORDER</i>
                    </div>
                    <div class="card-body">
                        <h5>{{ $totalorder }} orders</h5>
                        <ul class="list-group">
                            {{-- @foreach ($latest as $order)
                            <a href="{{ route('admin.showorder',['id'=>$order->id]) }}" class="list-group-item latest-order">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <div class="id" style="width:150px">Order ID: {{ $order->id }}</div>
                                        <div class="name">Customer Name: {{ $order->name }}</div>
                                        <div class="status text-success ml-auto">PAID</div> 
                                    </div>
                                </div>
                            </a>
                            @endforeach --}}
                        </ul>
                    </div>
                    {{-- <div class="card-body">
                        <form method="POST" action="{{ route('admin.reminder') }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <textarea name="reminder" id="" cols="27" rows="10">{{ $reminder->reminder ?? ''}}</textarea>
                            <button type="submit" class="button-primary w-100">UPDATE</button>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection