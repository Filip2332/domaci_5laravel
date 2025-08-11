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


    Route::controller(ContactController::class)->group(function(){
        Route::get("/contact/all","getAllContacts");
        Route::post("/contact/send","sendContact")->name("sendContact");
        Route::delete("/contact/delete/{contact}","deleteContact")->name("obrisiKontakt");
    });

    Route::controller(ProductsController::class)->group(function(){
       Route::get("all-products","getAllProducts")->name("sviProizvodi");
       Route::post("add-products","addProducts");
       Route::post("save-product","saveProduct");
       Route::get("product/edit/{product}","singleProduct")->name("product.single");
       Route::get("product/delete/{product}","delete")->name("obrisiProizvod");
       Route::post("product/save/{product}","edit")->name("product.save");
    });


});




require __DIR__.'/auth.php';
