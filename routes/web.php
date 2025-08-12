<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheck;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/welcome',[HomeController::class,'index']);

Route::view('/about','about');

Route::get('/kontakt',[ContactController::class,'index']);

Route::get("/shop",[ShopController::class,'getAllProducts']);

Route::view("/admin/add-product","addProduct");

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware("auth")->prefix("admin")->group(function(){

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(ContactController::class)->prefix("/contact")->group(function(){
        Route::get("/all","getAllContacts");
        Route::post("/send","sendContact")->name("sendContact");
        Route::delete("/delete/{contact}","deleteContact")->name("obrisiKontakt");
    });

    Route::controller(ProductsController::class)->prefix("/products")->group(function(){
       Route::get("/all","allProducts")->name("sviProizvodi");
       Route::post("/add","addProducts");
       Route::post("/save","saveProduct");
       Route::get("/edit/{product}","singleProduct")->name("product.single");
       Route::get("delete/{product}","delete")->name("obrisiProizvod");
       Route::post("save/{product}","edit")->name("product.save");
    });


});


require __DIR__.'/auth.php';
