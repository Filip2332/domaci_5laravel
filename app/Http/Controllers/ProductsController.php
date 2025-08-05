<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductsModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function allProducts(){
        $allProducts = ProductsModel::all();
        return view("allProducts",compact('allProducts'));
    }

    public function saveProduct(SaveProductRequest $request){

       $this->productRepository->createNew($request);

        return redirect()->route("sviProizvodi");
    }
    public function delete($product){
        $singleProduct = $this->productRepository->getProductById($product);

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


        $this->productRepository->editProduct($request, $product);

        return redirect()->route("sviProizvodi");
    }

}
