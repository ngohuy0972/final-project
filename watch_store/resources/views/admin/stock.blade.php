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
            <select name="product-list" id="product-list" class="w-100 p-2 mb-2">
                <option selected="true" value="" disabled hidden>Choose product</option>
                {{-- @foreach ($product_id as $id)
                <option value="{{ $id->id }}">{{ $id->id." - ".$id->name }}</option>
                @endforeach --}}
                
            </select>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Size</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="stock-list">
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="#" class="btn-action btn-primary w-100 m-1" style="color:white;">EDIT</a>
                      <a href="#" class="btn-action btn-danger w-100 m-1" style="color:white;">REMOVE</a>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection