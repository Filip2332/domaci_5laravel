<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{
    public function index()
    {
        $korpa = Session::get('product',[]);

        if (count($korpa) == 0) {
            return redirect('/');
        }

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

    public function cartFinish()
    {
        $korpa = Session::get('product');
        $totalCartPrice = 0;

        foreach ($korpa as $item) {
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            $totalCartPrice += $item['amount'] * $product['price'];

            if ($item['amount'] > $product->amount) {
                return redirect()->back();
            }
        }
        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice,
        ]);

        foreach ($korpa as $item) {
            $product = ProductsModel::firstWhere(['id' => $item['product_id']]);
            $product->amount -= $item['amount'];
            $product->save();

            if ($item['amount'] > $product->amount) {
                return redirect()->back();
            }
        }

        OrderItems::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'amount' => $item['amount'],
            'price' => $totalCartPrice,
        ]);
        Session::remove('product');

        return view('thankyou');
    }
}


