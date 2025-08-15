@extends("layout")

@section("naslovStranice", "Cart")

@section("sadrzajStranice")
    @foreach($products as $product)
        <p>{{ $product->name }}</p>
        <p>{{ $product->cart_amount }}</p>
        <p>{{ $product->price }}</p>
        <p>{{ $product->cart_amount * $product->price }}</p>
    @endforeach
@endsection



