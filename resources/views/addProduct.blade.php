@extends("layout")

@section("naslovStranice", "Add Product")

@section("sadrzajStranice")
    <div style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">

        <div style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 6px 18px rgba(0,0,0,0.1); width: 100%; max-width: 500px;">

            <h2 style="text-align: center; margin-bottom: 25px; color: #2c3e50;">Add a New Product</h2>

            @if($errors->any())
                <div style="background: #f8d7da; color: #842029; padding: 10px; border-radius: 6px; margin-bottom: 20px;">
                    <ul style="margin:0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('saveProduct') }}" style="display: flex; flex-direction: column; gap: 15px;">
                @csrf

                <div>
                    <label style="font-weight: bold; color: #333;">Name</label>
                    <input type="text" name="name" placeholder="Enter product name" value="{{ old('name') }}"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>

                <div>
                    <label style="font-weight: bold; color: #333;">Description</label>
                    <input type="text" name="description" placeholder="Enter product description" value="{{ old('description') }}"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>

                <div>
                    <label style="font-weight: bold; color: #333;">Amount</label>
                    <input type="text" name="amount" placeholder="Enter product amount" value="{{ old('amount') }}"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>

                <div>
                    <label style="font-weight: bold; color: #333;">Price</label>
                    <input type="text" name="price" placeholder="Enter product price" value="{{ old('price') }}"
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                </div>

                <button type="submit"
                        style="width: 100%; padding: 12px; background: #3498db; color: white; border: none; border-radius: 6px; font-weight: bold; font-size: 16px; cursor: pointer; transition: 0.3s;">
                    ➕ Add Product
                </button>
            </form>
        </div>
    </div>
@endsection
