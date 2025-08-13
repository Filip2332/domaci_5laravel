<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopingCartController extends Controller
{
    public function addToCart(Request $request){
        dd($request->all());
    }
}
