@extends("layout")

@section("naslovStranice")
    Dashboard
@endsection

@section("sadrzajStranice")
    <div class="container py-4">

        @if($trenutniSat >= 0 && $trenutniSat <= 12)
            <div class="alert alert-info text-center">
                Dobro jutro!
            </div>
        @elseif($trenutniSat > 12 && $trenutniSat <= 18)
            <div class="alert alert-info text-center">
                Dobar dan!
            </div>
        @else
            <div class="alert alert-info text-center">
                Dobro veče!
            </div>
        @endif

        <div class="card shadow-sm rounded p-4">
            <h3 class="mb-3">Kontakt forma</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Greška:</strong> {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="/send-contact">
                {{ csrf_field() }}

                <div class="mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input name="subject" type="text" class="form-control" placeholder="Naslov poruke" required>
                </div>

                <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Poruka" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Pošalji poruku</button>
            </form>
        </div>

        <p class="mt-4 text-muted text-center">
            Trenutno vreme je: <strong>{{ $trenutnoVreme }}</strong>
        </p>
    </div>
@endsection
