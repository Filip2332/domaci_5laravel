<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return redirect('/welcome');
});


Route::get("/shop",[ShopController::class,'getAllProducts']);
Route::get('/welcome',[HomeController::class,'index']);

Route::get("/products/{product}",[ProductsController::class,'permalink'])->name('productsPermalink');

Route::view('/about','about');

Route::get('/kontakt',[ContactController::class,'index']);

Route::post("/cart/add",[ShopController::class,'addToCart'])->name("cartAdd");

Route::view("/admin/add-product","addProduct");

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware("auth")->prefix("admin")->group(function(){

    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::controller(ContactController::class)->prefix("/contact")->group(function(){
        Route::get("/all","getAllContacts");
        Route::post("/send","sendContact")->name("sendContact");
        Route::delete("/delete/{contact}","deleteContact")->name("deleteContact");
    });

    Route::controller(ProductsController::class)->prefix("/products")->group(function(){
        Route::get("/all","allProducts")->name("allProducts");
        Route::post("/add","addProducts")->name("addProduct");
        Route::post("/save","saveProduct")->name("saveProduct");
        Route::get("/edit/{product}","singleProduct")->name("singleProduct");
        Route::get("delete/{product}","delete")->name("deleteProduct");
        Route::post("save/{product}","edit")->name("editProduct");
    });



});


require __DIR__.'/auth.php';
