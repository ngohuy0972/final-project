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
													<h2>Search Results</h2>
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
													<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New Arrivals</a>
													<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Price high to low</a>
													<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Most popular </a>
											</div>
									</nav>
									<!--End Nav Button  -->
							</div>
							<!-- Grid and List view -->
							<div class="grid-list-view">
							</div>
							<!-- Select items -->
							{{-- <div class="select-this">
									<form action="#">
											<div class="select-itms">
													<select name="select" id="select1">
															<option value="">40 per page</option>
															<option value="">50 per page</option>
															<option value="">60 per page</option>
															<option value="">70 per page</option>
													</select>
											</div>
									</form>
							</div> --}}
					</div>
					<!-- Nav Card -->
					<div class="tab-content" id="nav-tabContent">
							<!-- card one -->
							<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="row">
                    @foreach ($searchResults as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                      <div class="single-popular-items mb-50 text-center">
                          <div class="popular-img">
                              <img src="{{ asset('/storage/'.$item->image)}}" alt="">
                              <div class="img-cap">
                                  <span>Add to cart</span>
                              </div>
                              <div class="favorit-items">
                                  <span class="flaticon-heart"></span>
                              </div>
                          </div>
                          <div class="popular-caption">
                              <h3><a href="{{ route('shop.show',$item->id)}}">{{ $item->name}}</a></h3>
                              <span>$ {{ number_format($item->price )}}</span>
                          </div>
                      </div>
                  </div>
                    @endforeach
									</div>
                </div>
					</div>
					<!-- End Nav Card -->
			</div>
	</section>
	<!-- Latest Products End -->
</main>
@endsection