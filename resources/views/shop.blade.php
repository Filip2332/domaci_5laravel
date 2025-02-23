@extends("layout")

@section("naslovStranice")

Shop

@endsection
@section("sadrzajStranice")


<form method="post" action="/admin/add-products">
    @if($errors->any())
        <p>Error: {{$errors->first()}}</p>
    @endif

    {{csrf_field()}}
    <input name="name" type="text" placeholder="Name">
    <input name="description" type="text" placeholder="Description">
    <input name="amount" type="text" placeholder="Amount">
        <input name="price" type="text" placeholder="Price">
    <button>Add product</button>
</form>
@endsection


