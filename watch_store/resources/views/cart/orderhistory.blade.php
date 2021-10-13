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
													<h2>Orders History</h2>
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
            <h2>Your Orders</h2>
              <ul class="list">
                <table class="table" style="color: #415094;">
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
                        <td>
                            <button class="btn-action btn-primary w-100 m-1"><a href="{{ route('order-history.show',$order->id)}}" style="color:white;">DETAILS</a></button>
                            {{-- <form action="{{ route('orders.destroy',$order->id)}}" method="POST">
                              @method('DELETE')
                              @csrf
                              <button class="btn-action btn-danger w-100 m-1">
                                  REMOVE  
                              </button>
                          </form>  --}}
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
        </div>
			</div>
	</section>
	<!-- Latest Products End -->
</main>
@endsection