<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;

Route::get('/welcome',[HomeController::class,'index']);

Route::view('/about','about');

Route::get('/kontakt',[ContactController::class,'index']);

Route::post("/send-contact",[ContactController::class,"sendContact"]);

Route::get("/shop",[ShopController::class,'getAllProducts']);

Route::view("/admin/add-product","addProduct");


Route::middleware("auth", AdminCheck::class)->prefix("admin")->group(function(){
    Route::get("/all-contacts",[ContactController::class,"getAllContacts"]);

    Route::post("/add-products",[ShopController::class,'addProducts']);

    Route::post("/save-product",[ProductsController::class,'saveProduct']);

    Route::get("/all-products",[ProductsController::class,'allProducts'])
        ->name("sviProizvodi");

    Route::get("/delete-product/{product}",[ProductsController::class,"delete"])
        ->name("obrisiProizvod");

    Route::get("/delete-contact/{contact}",[ContactController::class,"delete"])
        ->name("obrisiKontakt");

    Route::get("/product/edit/{product}",[ProductsController::class,"singleProduct"])
        ->name("product.single");

    Route::post("/product/save/{product}",[ProductsController::class,"edit"])
        ->name("product.save");

});




require __DIR__.'/auth.php';
