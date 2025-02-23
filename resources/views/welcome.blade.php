@extends("layout")

@section("naslovStranice")
    Home
@endsection

@section("sadrzajStranice")
    @if($trenutniSat >= 0 && $trenutniSat <= 12)
        <p>Dobro jutro</p>
    @endif
    <form method="post" action="/send-contact">
        @if($errors->any())
<p>Error: {{$errors->first()}}</p>
        @endif

        {{csrf_field()}}
        <input name="email" type="text" placeholder="Email">
        <input name="subject" type="text" placeholder="Title">
        <textarea name="description"></textarea>
        <button>Contact us</button>
    </form>
    <p>Trenutno vreme je:{{$trenutnoVreme}}</p>
@endsection
