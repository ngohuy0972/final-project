@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">
    <h5>EDIT USER</h5>
    <hr>
    @foreach ($users as $user)
    <form method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row ">

          <div class="col-12">
            <label for="name" class="">{{ __('Name') }}</label>
            <div class="form-group">
                <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

            <div class="col-12">
              <label for="phonenumber" class="">{{ __('Phonenumber') }}</label>
              <div class="form-group">
                  <div>
                      <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ $user->phonenumber }}" required autocomplete="phonenumber" autofocus>
                      @error('phonenumber')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
          </div>

            <div class="col-12">
              <label for="country" class="">{{ __('Country') }}</label>
              <div class="form-group">
                  <div>
                      <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $user->country }}" required autocomplete="country" autofocus>
                      @error('country')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
          </div>

            <div class="col-12">
              <label for="city" class="">{{ __('City') }}</label>
              <div class="form-group">
                  <div>
                      <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" required autocomplete="city" autofocus>
                      @error('city')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
          </div>

            <div class="col-12">
              <label for="address" class="">{{ __('Address') }}</label>
              <div class="form-group">
                  <div>
                      <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>
                      @error('address')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
          </div>

            <div class="col-12">
              <label for="zipcode" class="">{{ __('Zipcode') }}</label>
              <div class="form-group">
                  <div>
                      <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ $user->zipcode }}" required autocomplete="zipcode" autofocus>
                      @error('zipcode')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
            </div>

            <div class="col-12">
              <label for="role" class="">{{ __('Role') }}</label>
              <div class="form-group">
                  <div>
                      <select name="role" id="addproductbrand" class="form-control">
                          <option value="User" {{$user->role == "User" ? 'selected' : ''}}>User</option>
                          <option value="Admin" {{$user->role == "Admin" ? 'selected' : ''}}>Admin</option>
                      </select>
                  </div>
              </div>
          </div>
          
          </div>
          <hr>
        
        <button type="submit" class="all-button w-100">UPDATE USER</button>
    
    </form>
    @endforeach
</div>
    
@endsection