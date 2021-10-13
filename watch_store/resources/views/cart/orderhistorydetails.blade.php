@extends('layouts.app')

@section('content')
<main>
	<!-- Hero Area Start-->
	<div class="slider-area ">
			<div class="single-slider slider-height2 d-flex align-items-center">
					<div class="container">
							<div class="row">
									<div class="col-xl-12">
											<div class="hero-cap text-center">
													<h2>Orders History Details</h2>
											</div>
									</div>
							</div>
					</div>
			</div>
	</div>
	<!-- Hero Area End-->
	<!-- Latest Products Start -->
	<section class="popular-items latest-padding">
			<div class="container">
        <div class="col-12 col-md-12 col-sm-12 col-lg-12">
          <div class="order_box">
            <h2>Your Order Details</h2>
            <ul class="list">
              <table class="table" style="color: #415094;">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">State</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <tr>                  
                      <td>{{ $order->product_id }}</td>
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
	</section>
	<!-- Latest Products End -->
</main>
@endsection