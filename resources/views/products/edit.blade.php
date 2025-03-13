@extends("layout")

@section("sadrzajStranice")


<form method="post" action="{{route("product.save",["product"=> $product->id])}}">
    {{csrf_field()}}
    <div>
        <label>Name</label>
        <input value="{{$product->name}}" type="text" name="name">
    </div>
    <div>
        <label>Description</label>
        <input value="{{$product->description}}" type="text" name="description">
    </div>
    <div>
        <label>Price</label>
        <input value="{{$product->price}}" type="text" name="price">
    </div>
    <div>
        <label>Amount</label>
        <input value="{{$product->amount}}" type="text" name="amount">
    </div>
    <button>Submit</button>
</form>

@endsection
