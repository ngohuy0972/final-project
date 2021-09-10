@extends('layouts.admin')

@section ('content')

<div class="col-10 col-md-10 col-sm-10 col-lg-10">
    <div class="card">
        <div class="card-header">
            <h5>USER LIST</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Zipcode</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                {{-- @foreach ($users as $user) --}}
                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="#" class="btn-action btn-primary w-100 m-1" style="color:white;">EDIT</a>
                      <a href="#" class="btn-action btn-danger w-100 m-1" style="color:white;">REMOVE</a>
                  </td>
                  </tr>
                {{-- @endforeach --}}
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection