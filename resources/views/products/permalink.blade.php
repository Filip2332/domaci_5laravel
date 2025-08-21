@extends("layout")

@section("naslovStranice")
    {{ $product->name }}
@endsection

@section("sadrzajStranice")
    <div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; font-family: Arial, sans-serif;">

        <div style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.1); width: 100%; max-width: 500px;">

            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif

            <h2 style="margin-bottom: 15px; color: #2c3e50;">{{ $product->name }}</h2>
            <p style="margin-bottom: 20px; color: #555;">{{ $product->description }}</p>
            <p style="margin-bottom: 25px; font-weight: bold; color: #333;">Price: {{ $product->price }} €</p>


            <form method="POST" action="{{ route('cartAdd') }}" style="display: flex; flex-direction: column; gap: 15px;">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="number" name="amount" placeholder="Enter amount" min="1" value="1"
                       style="padding: 10px; border: 1px solid #ccc; border-radius: 6px; width: 100%;">
                <button type="submit"
                        style="padding: 12px; background: #3498db; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; transition: 0.3s;">
                    🛒 Add to Cart
                </button>
            </form>


            <form method="GET" action="{{ route('cartRemove', $product->id) }}" style="margin-top: 15px;">
                <button type="submit"
                        style="padding: 12px; background: #e74c3c; color: white; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; width: 100%; transition: 0.3s;">
                    ❌ Remove from Cart
                </button>
            </form>

        </div>
    </div>
@endsection


