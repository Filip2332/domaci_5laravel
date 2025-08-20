@extends("layout")

@section("naslovStranice", "Cart")

@section("sadrzajStranice")
    <table border="1" cellpadding="10">
        <thead>
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Item price</th>
            <th>Order price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->cart_amount }} euros</td>
                <td>{{ $product->price }} euros</td>
                <td>{{ $product->cart_amount * $product->price }} euros</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection




