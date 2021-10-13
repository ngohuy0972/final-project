@extends('layouts.app')

@section('content')
      <!-- Hero Area Start-->
      <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Check Out</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================Checkout Area =================-->
    <section class="checkout_area section_padding">
      <div class="container">
        <div class="billing_details">
          <form class="row contact_form" action="{{ route('checkout.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-lg-8">
                <h3>Billing Details</h3>
                
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" id="first" name="first_name"  placeholder="First name (*)" />
                    @error('first_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" id="last" name="last_name" placeholder="Last name (*)" />
                    @error('last_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" id="phone_number" name="phone_number" placeholder="Phone Number (*)" />
                    @error('phone_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control @error('shipping_email') is-invalid @enderror" value="{{ old('shipping_email') }}" id="shipping_email" name="shipping_email" placeholder="Email Address (*)" />
                    @error('shipping_email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control @error('shipping_address') is-invalid @enderror" value="{{ old('shipping_address') }}" id="shipping_address" name="shipping_address" placeholder="Shipping Address (*)" />
                    @error('shipping_address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-12 form-group p_star">
                    <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" id="city" name="city" placeholder="City (*)" />
                    @error('city')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control @error('zip') is-invalid @enderror" value="{{ old('zip') }}" id="zip" name="zip" placeholder="Postcode/ZIP" />
                    @error('zip')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" name="order_note" id="order_note" rows="1" value="{{ old('order_note') }}"
                      placeholder="Order Notes"></textarea>
                  </div>
                
              </div>
              <div class="col-lg-4">
                <div class="order_box">
                  <h2>Your Order</h2>
                  <ul class="list">
                    <li>
                      <a href="#">Product
                        <span>Total</span>
                      </a>
                    </li>
                    @foreach ($cart->items as $item)                      
                    <li>
                      <a href="#">{{ $item['name']}}
                        <span class="middle">{{ $item['quantity']}}</span>
                        <span class="last">$ {{ number_format($item['price'])}}</span>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                  <ul class="list list_2">
                    <li>
                      <a href="#">Subtotal
                        <span>$ {{ number_format($cart->total_price)}}</span>
                      </a>
                    </li>

                    @if ($cart->total_quantity != NULL)
                    <li>
                      <a href="#">Shipping
                        <span>Flat rate: $ {{ number_format($cart->shipping_price)}}</span>
                      </a>
                    </li>  
                    <li>
                      <a href="#">Total
                        <span>$ {{ number_format($cart->total_price + $cart->shipping_price)}}</span>
                      </a>
                    </li>
                    @else
                    <li>
                      <a href="#">Shipping
                        <span>Flat rate: $ 0</span>
                      </a>
                    </li>
                    <li>
                      <a href="#">Total
                        <span>$ 0</span>
                      </a>
                    </li>
                    @endif

                  </ul>
                  <div class="payment_item">
                    <div class="radion_btn">
                      <input type="radio" id="f-option5" value="1" name="payment_method" value="{{ old('payment_method') }}" checked/>
                      <label for="f-option5">Shipping COD</label>
                      <div class="check"></div>
                    </div>
                  </div>
                  <div class="payment_item active">
                    <div class="radion_btn">
                      <input type="radio" id="f-option6" value="2" name="payment_method" value="{{ old('payment_method') }}"/>
                      <label for="f-option6">Check payments </label>
                      <div class="check"></div>
                    </div>
                  </div>
                  @if ($cart->total_quantity != NULL)
                    <button class="btn_3 col-md-12" type="submit">Check Out</button>
                  @else
                    <a class="btn_3 col-md-12" href="javascript:void(0)">Check Out</a>
                  @endif
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection