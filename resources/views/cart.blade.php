@extends("layout")

@section("naslovStranice")
    Cart
@endsection

@section("sadrzajStranice")
    @foreach($products as $product)
        <p>{{ $product->name }}</p>
    @endforeach
@endsection
