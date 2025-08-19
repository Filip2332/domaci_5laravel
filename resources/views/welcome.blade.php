@extends("layout")

@section("naslovStranice")
    Dashboard
@endsection

@section("sadrzajStranice")


        <div class="card shadow-sm rounded p-4">
            <h3 class="mb-3">Contact form</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Error:</strong> {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route("sendContact") }}">
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

                <button type="submit" class="btn btn-primary">Send message</button>
            </form>
        </div>

    </div>
@endsection
