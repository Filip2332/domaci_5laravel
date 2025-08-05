<?php

namespace App\Repositories;


use App\Models\ProductsModel;
use http\Env\Request;

class ProductRepository
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
    }

    public function createNew($request)
    {
        $this->productModel->create([
            "name"=>$request->get("name"),
            "description"=>$request->get("description"),
            "amount"=>$request->get("amount"),
            "price"=>$request->get("price"),
        ]);
    }

    public function getProductById($id){
        return $this->productModel->where(['id' => $id])->first();
    }

    public function editProduct($request, $product){

        $product = ProductsModel::find($product->id);

        if (!$product) {
            return redirect()->back()->with('error', 'Proizvod nije pronađen.');
        }

        $product->name = $request->get("name");
        $product->description = $request->get("description");
        $product->amount = $request->get("amount");
        $product->price = $request->get("price");
        $product->save();
    }
}
