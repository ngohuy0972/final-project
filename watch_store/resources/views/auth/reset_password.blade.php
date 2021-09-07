@extends('app.layout')

@section('content')
<main>
  <!-- Hero Area Start-->
  <div class="slider-area ">
      <div class="single-slider slider-height2 d-flex align-items-center">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>Reset Password</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Hero Area End-->
  <!--================login_part Area =================-->
  <section class="login_part section_padding ">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-6 col-md-6">
                  <div class="login_part_text text-center">
                      <div class="login_part_text_iner">
                          <h2>Already Account?</h2>
                          <p>There are advances being made in science and technology
                              everyday, and a good example of this is the</p>
                          <a href="{{ route('login.index')}}" class="btn_3">Login now</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="login_part_form">
                      <div class="login_part_form_iner">
                          <h3>Please fill out your email <br>
                                in bellow</h3>
                          <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                              <div class="col-md-12 form-group p_star">
                                  <input type="email" class="form-control" id="email" name="email" value=""
                                      placeholder="Email address">
                              </div>
                              <div class="col-md-12 form-group">
                                  <button type="submit" value="submit" class="btn_3">
                                      Reset your password
                                  </button>
                                  {{-- <a class="lost_pass" href="#">forget password?</a> --}}
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--================login_part end =================-->
</main>
@endsection