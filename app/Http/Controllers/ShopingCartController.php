<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{

    public function index()
    {
        $cart = Session::get('product', []);
        return view('cart', ['cart' => $cart]);
    }


    public function addToCart(CartAddRequest $request){
        $product = ProductsModel::where(['id' => $request->id])->first();

        if($product->amount < $request->amount){
            return redirect()->back();
        }

        $cart = Session::get('product', []);
        $cart[] = [
            'product_id' => $request->id,
            'amount' => $request->amount,
        ];
        Session::put('product', $cart);
        return redirect()->route('cartIndex');
    }

}
