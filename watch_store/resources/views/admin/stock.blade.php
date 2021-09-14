@extends('layouts.admin')

@section ('content')

<div class="col-10 col-md-10 col-sm-10 col-lg-10">

    @if(Session::has('success'))
    <div class="row">
      <div class="col-12">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      </div>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h5>STOCK LIST</h5>
        </div>
        <div class="card-body">
            {{-- <a href="{{ route('admin.addstockform') }}" class="btn btn-success mb-2" style="color:white; width:150px;">ADD SIZE</a> --}}
            <select name="product-list" id="product-list" onchange="product_stock()" class="w-100 p-2 mb-2">
                <option selected="true" value="" disabled hidden>Choose product</option>
                @foreach ($products as $item)
                <option value="{{ $item->id }}">{{ $item->id." - ".$item->name }}</option>
                @endforeach
                
            </select>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Color</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="stock-list">
                  
                </tbody>
              </table>
        </div>
    </div>
</div>

<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script>
  
  function product_stock(){
    var id = document.getElementById('product-list').value;
    
    $.ajax({
      url:" {{ route('stock-show')}}",
      method: 'POST',
      headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      data: {
        id:id,
      },
      success:function(data){
        $('#stock-list').html(data);
      }
    })
  }

  // $('#product_list').change(function(){
  //   // product_stock();
  //   alert('xin chao');
  // });

</script>
    
@endsection