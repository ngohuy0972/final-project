@component('mail::message')
# Dear !!

Thank you for shopping at TimeZone.

@component('mail::table')
<table class="table table-light">
  <thead>
    <tr>
      <td>Image</td>
      <td>Product</td>
      <td>Price</td>
      <td>Quantity</td>
      <td>Total</td>
    </tr>
  </thead>
  @foreach ($shopping_list as $item)
  <tbody>
    <tr>
      <td><img src="{{ asset('/storage/'.$item['image'])}}" alt="" /></td>
      <td>{{ $item['name'] }}</td>
      <td>{{ $item['price'] }}</td>
      <td>{{ $item['quantity'] }}</td>
      <td>{{ $item['quantity'] * $item['price'] }}</td>
    </tr>
  </tbody>
  @endforeach
</table>
@endcomponent

Thanks & Regards !
@endcomponent
