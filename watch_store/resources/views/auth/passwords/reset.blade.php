{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


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
                          <a href="{{ route('login')}}" class="btn_3">Login now</a>
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