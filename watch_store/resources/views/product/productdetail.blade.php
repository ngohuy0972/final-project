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
                          <h2>Watch Details</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Hero Area End-->
  <!--================Single Product Area =================-->
  <div class="product_image_area">
    @foreach ($productDetails as $item)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="product_img_slide owl-carousel">
                <div class="single_product_img">
                    <img src="{{ asset('/storage/'.$item->image)}}" alt="#" class="img-fluid">
                </div>
                <div class="single_product_img">
                    <img src="{{ asset('/storage/'.$item->image)}}" alt="#" class="img-fluid">
                </div>
                <div class="single_product_img">
                    <img src="{{ asset('/storage/'.$item->image)}}" alt="#" class="img-fluid">
                </div>
            </div>
            </div>
            <div class="col-lg-8">
            <div class="single_product_text text-center">
              <h3>{{ $item->name}}</h3>
              <p>
                Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness. Credibly innovate granular internal or organic sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with optimal networks.
              </p>
              <div class="card_area">
                <div class="quantity">Price</div>
                {{-- <div class="product_count_area">
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div>
                </div> --}}
                <div class="total-price">100,000$</div>
                <div class="add_to_cart">
                    <a href="{{ route('cart-add',$item->id	)}}" class="btn_3">add to cart</a>
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
    @endforeach
  </div>
  <!--================End Single Product Area =================-->
</main>
@endsection