@extends("layout")

@section("naslovStranice", "Cart")

@section("sadrzajStranice")
    @foreach($products as $product)
        <p>{{ $product->name }}</p>
        <p>Amount: {{ $product->cart_amount }} euros</p>
        <p>Item price: {{ $product->price }} euros</p>
        <p>Order price:  {{ $product->cart_amount * $product->price }} euros</p>
    @endforeach
@endsection



