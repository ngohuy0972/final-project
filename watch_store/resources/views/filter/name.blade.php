@extends('layouts.app')

@section('content')
<main>
	<div id='notify-add-success'>
		Add product Successfully.
	</div>
	<!-- Hero Area Start-->
	<div class="slider-area ">
			<div class="single-slider slider-height2 d-flex align-items-center">
					<div class="container">
							<div class="row">
									<div class="col-xl-12">
											<div class="hero-cap text-center">
													<h2>Name A-Z</h2>
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
                        <a href="{{ route('sort-name')}}" class="nav-item nav-link active" id="namesort" > Name A-Z </a>
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
											<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
												<div class="single-popular-items mb-50 text-center">
														<div class="popular-img">
																<img src="{{ asset('/storage/'.$item->image)}}" alt="">
																<div class="img-cap">
																		<span><a href="javascript:void(0)" id="btn-add-cart" class="btn-add-cart" onclick="addToCart({{$item->id}})">Add to cart</a></span>
																</div>
																<div class="favorit-items">
																		<span class="flaticon-heart"></span>
																</div>
														</div>
														<div class="popular-caption">
																<h3><a href="{{ route('shop.show',$item->id)}}">{{ $item->name }}</a></h3>
																<span>$ {{ number_format($item->price)}}</span>
														</div>
												</div>
											</div>
										@endforeach
										<div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12" style="width: 100%;">
											<div class="room-btn pb-40">
													<button type="submit" id="btn-load-more" class="all-button" data-name="{{ $item->name}}">View More Products</button>
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

	$(document).on('click', '#btn-load-more', function(){
		var name = $(this).data(name);
		nameSort(name);
	})
  
  function nameSort(name = ''){

    $.ajax({
      url:" {{ route('name-sort')}}",
      method: 'POST',
      headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      data: {
        name:name,
      },
      success:function(data){
				// $('#list-product').html(data);
				$('#btn-load-more').remove();
        $('#list-product').append(data);
      }
    })
  }

	function addToCart(id){
		// alert(id);

		$.ajax({
      url:"add/"+id,
      method: 'GET',
      headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      data: {},
      success:function(data){
				// alert('Th??m s???n ph??m th??nh c??ng')
				
      }
    })
	}

	$(document).on('click', '#btn-add-cart', function(){
		setTimeout(openNotify,500);
		setTimeout(closeNotify,2000);
	})

	function openNotify(){
		$('#notify-add-success').fadeIn();
		document.getElementById('notify-add-success').style.display = "block";
	}

	function closeNotify(){
		document.getElementById('notify-add-success').style.display = "none";

	}
</script>
@endsection