<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
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

    public function permalink(ProductsModel $product){
        return view("products.permalink",compact('product'));
    }

    public function saveProduct(SaveProductRequest $request){

       $this->productRepository->createNew($request);

        return redirect()->route("allProducts");
    }
    public function delete(ProductsModel $product){

        $product->delete();
        return redirect()->back();
    }
    public function singleProduct(ProductsModel $product){

        return view("products.edit",compact('product'));
    }
    public function edit(EditProductRequest $request, ProductsModel $product){


        $this->productRepository->editProduct($request, $product);

        return redirect()->route("allProducts");
    }

}
