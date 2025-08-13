<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopingCartController extends Controller
{
    public function addToCart(CartAddRequest $request){
        Session::put('product', [
            $request->id => $request->amount
        ]);
    }
}
