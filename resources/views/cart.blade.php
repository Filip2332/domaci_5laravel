@extends("layout")

@section("naslovStranice")
    Cart
@endsection

@section("sadrzajStranice")
    @foreach($cart as $product => $amount)
        {{ $product." ".$amount }}
    @endforeach
@endsection
