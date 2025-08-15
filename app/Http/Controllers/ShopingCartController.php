<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{
    public function index()
    {
        $cart = Session::get('product', []);
        $ids = array_column($cart, 'product_id');

        $products = ProductsModel::whereIn('id', $ids)->get()->map(function ($p) use ($cart) {
            $p->cart_amount = collect($cart)->firstWhere('product_id', $p->id)['amount'] ?? 0;
            return $p;
        });

        return view('cart', compact('products'));
    }

    public function addToCart(CartAddRequest $request)
    {
        $product = ProductsModel::find($request->id);
        if ($product->amount < $request->amount) return back();

        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount
        ]);

        return redirect()->route('cartIndex');
    }
}


