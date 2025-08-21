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
        @php $total = 0; @endphp

        @foreach($products as $product)
            @php
                $orderPrice = $product->cart_amount * $product->price;
                $total += $orderPrice;
            @endphp
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->cart_amount }}</td>
                <td>{{ $product->price }} euros</td>
                <td>{{ $orderPrice }} euros</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="3" align="right"><strong>Total:</strong></td>
            <td><strong>{{ $total }} euros</strong></td>
        </tr>
        </tbody>
    </table>
@endsection





