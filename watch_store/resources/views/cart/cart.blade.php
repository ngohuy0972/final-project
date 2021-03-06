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
                          <h2>Cart List</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th></th>
                <th scope="col">Quantity</th>
                <th>Actions</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $n = 1;
              ?>
              @foreach ($cart->items as $item)
              <tr>
                <td>
                  {{$n}}
                </td>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="{{ asset('/storage/'.$item['image'])}}" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{ $item['name']}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>$ {{number_format($item['price'])}}</h5>
                </td>
                <td>
                  <div class="product_count">
                    <form action="{{ route('cart-update',$item['id'])}}" method="GET">
                      <td>
                        <input class="input-number" name="quantity" type="text" value="{{$item['quantity']}}">
                      </td>
                      <td>
                        <button type="submit" class="btn-update-cart">Update</button>
                        <a href="{{ route('cart-remove',$item['id'])}}" class="btn-remove-cart">Remove</button>
                      </td>
                    </form>
                  </div>
                </td>
                <td>
                  <h5>${{number_format($item['price'] * $item['quantity'])}}</h5>
                </td>
              </tr>
              <?php
                  $n++;
              ?>
            @endforeach 
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>${{number_format($cart->total_price)}}</h5>
                </td>
              </tr>
              {{-- <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <li>
                        Flat Rate: $5.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Free Shipping
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li>
                        Flat Rate: $10.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                      <li class="active">
                        Local Delivery: $2.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li>
                    </ul>
                    <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                      <option value="1">Bangladesh</option>
                      <option value="2">India</option>
                      <option value="4">Pakistan</option>
                    </select>
                    <select class="shipping_select section_bg">
                      <option value="1">Select a State</option>
                      <option value="2">Select a State</option>
                      <option value="4">Select a State</option>
                    </select>
                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a>
                  </div>
                </td>
              </tr> --}}
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="all-button" href="{{ route('shop.index')}}">Continue Shopping</a>
            <a class="all-button checkout_btn_1" href="{{ route('checkout.index')}}">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
</main>
@endsection