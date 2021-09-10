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
            <h5>PRODUCT LIST</h5>
        </div>
        <div class="card-body">
          <a href="{{ route('product.create') }}" class="btn-create-form btn-success mb-4" style="color:white; width:150px;">ADD PRODUCT</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $item)
                  <tr>
                    <th scope="row"></th>
                    <td><img style="height:100px;" src="{{ asset('/storage/'.$item->image )}}" alt=""></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->category }}</td>
                    <td>
                        <a href="#" class="btn-action btn-primary w-100 m-1" style="color:white;">EDIT</a>
                        <a href="#" class="btn-action btn-danger w-100 m-1" style="color:white;">REMOVE</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection