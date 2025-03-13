<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function allProducts(){
        $allProducts = ProductsModel::all();
        return view("allProducts",compact('allProducts'));
    }

    public function saveProduct(Request $request){
        $request->validate([
           "name"=>"required|unique:products",
            "description"=>"required",
            "amount"=>"required|min:0",
            "price"=>"required|min:0",
        ]);
        ProductsModel::create([
           "name"=>$request->get("name"),
           "description"=>$request->get("description"),
           "amount"=>$request->get("amount"),
           "price"=>$request->get("price"),
        ]);
        return redirect()->route("sviProizvodi");
    }
    public function delete($product){
        $singleProduct = ProductsModel::where(['id' => $product])->first();

        if($singleProduct === null){
            die("Ne postoji ovaj prozivod");
        }
        $singleProduct->delete();
        return redirect()->back();
    }
    public function singleProduct(Request $request,ProductsModel $product){

        return view("products.edit",compact('product'));
    }
    public function edit(Request $request, ProductsModel $product){

        $product = ProductsModel::where(['id' => $product])->first();


        $product ->name = $request ->get("name");
        $product ->description = $request ->get("description");
        $product ->amount = $request ->get("amount");
        $product ->price = $request ->get("price");
        $product ->save();

        return redirect()->back();
    }

}
