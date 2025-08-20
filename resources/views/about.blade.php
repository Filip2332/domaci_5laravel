@extends("layout")

@section("naslovStranice")
    About
@endsection

@section("sadrzajStranice")
    <div style="max-width: 900px; margin: 50px auto; padding: 20px; font-family: Arial, sans-serif; line-height: 1.6;">


        <h1 style="text-align: center; margin-bottom: 20px; color: #2c3e50; font-size: 2.5rem;">
            About <span style="color: #3498db;">Shop n Go</span>
        </h1>


        <p style="text-align: center; font-size: 18px; color: #555; margin-bottom: 40px;">
            Shop n Go is an online platform where you can <strong>buy and sell products</strong> quickly, safely, and easily.
            Our mission is to connect people and simplify online shopping.
        </p>

        <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 40px;">

            <div style="flex: 1; min-width: 250px; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                <h3 style="color: #3498db;">⚡ Fast Shopping</h3>
                <p>Purchase products in just a few clicks. Simple interface and clear categories make it easy to find what you need.</p>
            </div>

            <div style="flex: 1; min-width: 250px; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                <h3 style="color: #3498db;">🔒 Security</h3>
                <p>Your safety is our priority – all data and transactions are fully protected.</p>
            </div>

            <div style="flex: 1; min-width: 250px; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                <h3 style="color: #3498db;">🌍 Connectivity</h3>
                <p>Our mission is to connect buyers and sellers in one convenient online marketplace.</p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="/admin/products/all"
               style="display: inline-block; padding: 15px 30px; background: #3498db; color: white; text-decoration: none; font-weight: bold; border-radius: 8px; transition: 0.3s;">
                🛒 Visit Our Shop
            </a>
        </div>
    </div>
@endsection

