<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getAllProducts(){
        $allProducts = ProductsModel::all();
        return view('shop', compact('allProducts'));
    }
    public function addProducts(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "description" => "required|string",
            "amount" => "required|string",
            "price" => "required|string",
        ]);



        ProductsModel::create([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "amount" => $request->get("amount"),
            "price" => $request->get("price"),
        ]);

        return redirect("/admin/all-products");
    }

}
