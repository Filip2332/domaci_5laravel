<?php

namespace App\Http\Controllers;
use App\Models\ContactModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function getAllProducts(){

        $allProducts = ProductsModel::all();
        return view('shop', compact('allProducts'));
    }

}
