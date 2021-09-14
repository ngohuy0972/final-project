@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">

    <h5>EDIT STOCK</h5>
    <hr>
    @foreach ($stock_color as $item)
        
    <form method="POST" action="{{ route('stock.update', $item->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row ">

            <div class="col-12">
                <label for="color" class="">{{ __('Color') }}</label>
                <div class="form-group">
                    <div>
                        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') ?? $item->color}}" required autocomplete="color" autofocus>
                        @error('color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="quantity" class="">{{ __('Quantity') }}</label>
                <div class="form-group">
                    <div>
                        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') ?? $item->quantity}}" required autocomplete="quantity" autofocus>
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary w-100">EDIT STOCK</button>
    
    </form>
    @endforeach

</div>
    
@endsection