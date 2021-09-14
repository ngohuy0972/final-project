@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-12 col-md-12 col-sm-12 col-lg-10">
  @foreach ($users_profile as $user)
    <form method="POST" action="{{ route('profiles.store',$user->id)}}" enctype="multipart/form-data">
        @csrf
        {{-- @method('PATCH') --}}
        <h5>EDIT PROFILES</h5>
          <hr>  
          
          <div class="row">
          
            <div class="col-12 mx-auto">
               
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>
        
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number:') }}</label>
        
                    <div class="col-md-6">
                        <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ $user->phonenumber }}" required autocomplete="phonenumber" autofocus>
        
                        @error('phonenumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country:') }}</label>
        
                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $user->country }}" equired autocomplete="country" autofocus>
        
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City:') }}</label>
        
                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" required autocomplete="city" autofocus>
        
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address:') }}</label>
        
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>
        
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Zipcode:') }}</label>
        
                    <div class="col-md-6">
                        <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ $user->zipcode }}" required autocomplete="zipcode" autofocus>
        
                        @error('zipcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn button-primary w-100">
                            {{ __('Done') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
         
    </form>
    @endforeach
</div>
</div>
@endsection