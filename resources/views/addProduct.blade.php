@extends("layout")

@section("sadrzajStranice")

    <form method="post" action="/admin/save-product">
        {{csrf_field()}}

        <div>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif
        </div>
        <div>
            <label>Ime</label>
            <input type="text" name="name" placeholder="Unesite ime prozivoda" value="{{old("name")}}">
        </div>

        <div>
            <label>Opis</label>
            <input type="text" name="description" placeholder="Unesite opis prozivoda" value="{{old("description")}}">
        </div>

        <div>
            <label>Kolicina</label>
            <input type="text" name="amount" placeholder="Unesite kolicinu prozivoda" value="{{old("amount")}}">
        </div>

        <div>
            <label>Cena</label>
            <input type="text" name="price" placeholder="Unesite cenu prozivoda" value="{{old("price")}}">
        </div>
        <button>Kreiraj proizvod</button>
    </form>

@endsection


