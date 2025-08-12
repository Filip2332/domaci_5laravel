
@extends("layout")

@section("sadrzajStranice")

    <form method="POST" action="{{ route('editProduct', $product->id) }}">
        @csrf

        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p style="color:red;">{{ $error }}</p>
                @endforeach
            @endif
        </div>

        <div>
            <label>Ime</label>
            <input type="text" name="name" placeholder="Unesite ime proizvoda" value="{{ old('name', $product->name) }}">
        </div>

        <div>
            <label>Opis</label>
            <input type="text" name="description" placeholder="Unesite opis proizvoda" value="{{ old('description', $product->description) }}">
        </div>

        <div>
            <label>Količina</label>
            <input type="text" name="amount" placeholder="Unesite količinu proizvoda" value="{{ old('amount', $product->amount) }}">
        </div>

        <div>
            <label>Cena</label>
            <input type="text" name="price" placeholder="Unesite cenu proizvoda" value="{{ old('price', $product->price) }}">
        </div>

        <button type="submit">Sačuvaj izmene</button>
    </form>

@endsection
