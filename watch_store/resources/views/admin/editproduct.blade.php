@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">
    <h5>EDIT PRODUCT</h5>
    <hr>
    @foreach ($products as $item)
    <form method="POST" action="{{ route('product.update',$item->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row ">

            <div class="col-12">
                <label for="name" class="">{{ __('Name') }}</label>
                <div class="form-group">
                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
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
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $item->price  }}" required autocomplete="price" autofocus>
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
                            <option value="Patek Philippe" {{$item->brand == "Patek Philippe" ? 'selected' : ''}}>Patek Philippe</option>
                            <option value="Rolex" {{$item->brand == "Rolex" ? 'selected' : ''}}>Rolex</option>
                            <option value="Hublot" {{$item->brand == "Hublot" ? 'selected' : ''}}>Hublot</option>
                            <option value="Richard Mille" {{$item->brand == "Richard Mille" ? 'selected' : ''}}>Richard Mille</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="category" class="">{{ __('Category') }}</label>
                <div class="form-group">
                    <div>
                        <select name="category" id="addproductcategory" class="form-control">
                            <option value="Watch">{{$item->category}}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="image" class="">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="{{$item->image}}">
                    <img src="{{ asset('/storage/'.$item->image )}}" alt="" style="width:25%">
                    @error('image')

                    <div style="color:red; font-weight:bold; font-size:0.7rem;">{{ $message }}</div>

                    @enderror
                </div>
            </div>
            


        </div>
        
        <button type="submit" class="btn btn-success w-100">UPDATE PRODUCT</button>
    
    </form>
    @endforeach
</div>
    
@endsection