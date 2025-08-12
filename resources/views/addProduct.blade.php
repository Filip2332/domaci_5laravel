@extends("layout")

@section("sadrzajStranice")

    <form method="POST" action="{{ route('saveProduct') }}">
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
            <input type="text" name="name" placeholder="Unesite ime proizvoda" value="{{ old('name') }}">
        </div>

        <div>
            <label>Opis</label>
            <input type="text" name="description" placeholder="Unesite opis proizvoda" value="{{ old('description') }}">
        </div>

        <div>
            <label>Količina</label>
            <input type="text" name="amount" placeholder="Unesite količinu proizvoda" value="{{ old('amount') }}">
        </div>

        <div>
            <label>Cena</label>
            <input type="text" name="price" placeholder="Unesite cenu proizvoda" value="{{ old('price') }}">
        </div>

        <button type="submit">Dodaj proizvod</button>
    </form>

@endsection



