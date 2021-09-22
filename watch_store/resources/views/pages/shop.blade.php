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
													<h2>Watch Shop</h2>
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
					<div class="row product-btn justify-content-between mb-40">
							<div class="properties__button">
									<!--Nav Button  -->
									<nav>                                                      
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
												<a href="{{ route('sort-new')}}" class="nav-item nav-link" id="newest" >New Arrivals</a>
                        <a href="{{ route('sort-price')}}" class="nav-item nav-link" id="pricesort" >Low Price</a>
                        <a href="{{ route('sort-name')}}" class="nav-item nav-link" id="namesort" > Name A-Z </a>
											</div>
									</nav>
									<!--End Nav Button  -->
							</div>
							<!-- Grid and List view -->
							<div class="grid-list-view">
							</div>
					</div>
					<!-- Nav Card -->
					<div class="tab-content" id="nav-tabContent">
							<!-- card one -->
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="row" id="list-product">
										@foreach ($products as $item)
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
												<div class="single-popular-items mb-50 text-center">
														<div class="popular-img">
																<img src="{{ asset('/storage/'.$item->image)}}" alt="">
																<div class="img-cap">
																	<span><a href="{{ route('cart-add',$item->id	)}}" id="btn-add-cart" class="btn-add-cart" onclick="addToCart()">Add to cart</a></span>
																	<input type="hidden" name="pro_id" id="pro_id" value="{{$item->id}}">
																</div>
																<div class="favorit-items">
																		<span class="flaticon-heart"></span>
																</div>
														</div>
														<div class="popular-caption">
																<h3><a href="{{ route('product.show',$item->id)}}">{{ $item->name }}</a></h3>
																<span>$ {{ number_format($item->price) }}</span>
														</div>
												</div>
											</div>
										@endforeach
										<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
											<div class="room-btn pt-70">
													<button type="submit" id="btn-load-more" class="all-button" data-created="{{ $item->created_at}}">View More Products</button>
											</div>
									</div>
									</div>
									<!-- Button Load More-->
									
							</div>
					</div>
					<!-- End Nav Card -->
			</div>
	</section>
	<!-- Latest Products End -->
</main>
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>

	// Loadmore Products
	$(document).on('click', '#btn-load-more', function(){
		var created_at = $(this).data(created_at);
		newest(created_at);
	})
  
  function newest(created_at = ''){

    $.ajax({
      url:" {{ route('newest')}}",
      method: 'POST',
      headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      data: {
        time:created_at,
      },
      success:function(data){
				// $('#list-product').html(data);
				$('#btn-load-more').remove();
        $('#list-product').append(data);
      }
    })
  }

</script>
@endsection