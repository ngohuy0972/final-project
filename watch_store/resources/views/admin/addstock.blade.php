@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10">

    <h5>ADD COLOR</h5>
    <hr>

    <form method="POST" action="{{ route('stock.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row ">

            <div class="col-12">
                <label for="product" class="">{{ __('Product') }}</label>
                <div class="form-group">
                    <select name="productid" id="addproductstock" onchange="product_stock()" class="form-control">
                        <option selected="true" value="" disabled hidden>Choose product</option>
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}">{{ $item->id.' - '.$item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-12">
                <label for="color" class="">{{ __('Color') }}</label>
                <div class="form-group">
                    <div>
                        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required autocomplete="color" autofocus>
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
                        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity')}}" required autocomplete="quantity" autofocus>
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        
        <button type="submit" class="all-button w-100">ADD STOCK</button>
    
    </form>

</div>
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>
  
  function product_stock(){
    var id = document.getElementById('addproductstock').value;
    // alert(id);

    $.ajax({
      url:" {{ route('stock.store')}}",
      method: 'POST',
      headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      data: {
        id:id,
      },
      success:function(data){
        // $('#stock-list').html(data);
      }
    })
  }

  // $('#product_list').change(function(){
  //   // product_stock();
  //   alert('xin chao');
  // });

</script>
    
@endsection