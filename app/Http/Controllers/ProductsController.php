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
    public function delete($product){
        $singleProduct = ProductsModel::where(['id' => $product])->first();

        if($singleProduct === null){
            die("Ne postoji ovaj prozivod");
        }
        $singleProduct->delete();
        return redirect()->back();
    }

}
