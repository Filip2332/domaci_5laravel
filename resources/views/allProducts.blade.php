@extends("layout")

@section("sadrzajStranice")

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allProducts as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('deleteProduct', ['product' => $product->id]) }}">Delete</a>
                    <a href="{{ route('singleProduct', ['product' => $product->id]) }}">Edit</a>
                    <a href="{{ route('productsPermalink', ['product' => $product->id]) }}">More</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <style>
        .table-container {
            width: 100%;
            max-width: 1000px;
            margin: 40px auto;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        thead {
            background: #2c3e50;
            color: white;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
        }
        tr:nth-child(even) {
            background: #f8f9fa;
        }
        tr:hover {
            background: #f1f1f1;
        }
        a {
            color: #2980b9;
            text-decoration: none;
            margin: 0 5px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
@endsection

