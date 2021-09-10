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
                          <h2>Register</h2>
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
                          <h2>Already account?</h2>
                          <p>There are advances being made in science and technology
                              everyday, and a good example of this is the</p>
                          <a href="{{ route('login')}}" class="btn_3">Log In now</a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="login_part_form">
                      <div class="login_part_form_iner">
                          <h3>Welcome to Timezone !<br>
                              Please fill out these field</h3>
                            <form class="row contact_form" method="POST" action="{{ route('register') }}">
                            @csrf

                              <div class="col-md-12 form-group p_star">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-md-12 form-group p_star">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                              <div class="col-md-12 form-group p_star">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="col-md-12 form-group p_star">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confrim Password">
                            </div>
                              <div class="col-md-12 form-group">
                                  <div class="creat_account d-flex align-items-center">
                                      <input type="checkbox" id="f-option" name="selector">
                                      <label for="f-option">Remember me</label>
                                  </div>
                                  <button type="submit" value="submit" class="btn_3">
                                      register
                                  </button>
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