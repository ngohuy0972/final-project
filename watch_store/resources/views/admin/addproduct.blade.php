@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">
    <h5>ADD PRODUCT</h5>
    <hr>

    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row ">

            <div class="col-12">
                <label for="name" class="">{{ __('Name') }}</label>
                <div class="form-group">
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="price" class="">{{ __('Price') }}</label>
                <div class="form-group">
                    <div>
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')  }}" required autocomplete="price" autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="brand" class="">{{ __('Brand') }}</label>
                <div class="form-group">
                    <div>
                        <select name="brand" id="addproductbrand" class="form-control">
                            <option selected="true" value="" disabled hidden>Choose watch brand</option>
                            <option value="Patek Philippe">Patek Philippe</option>
                            <option value="Rolex">Rolex</option>
                            <option value="Hublot">Hublot</option>
                            <option value="Richard Mille">Richard Mille</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="category" class="">{{ __('Category') }}</label>
                <div class="form-group">
                    <div>
                        <select name="category" id="addproductcategory" class="form-control">
                            <option value="Watch">Watch</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')

                    <div style="color:red; font-weight:bold; font-size:0.7rem;">{{ $message }}</div>

                    @enderror
                </div>
            </div>
            


        </div>
        
        <button type="submit" class="all-button w-100">ADD PRODUCT</button>
    
    </form>

</div>
    
@endsection