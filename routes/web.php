<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome',[\App\Http\Controllers\HomeController::class,'index']);

Route::view('/about','about');


Route::get('/kontakt',[\App\Http\Controllers\ContactController::class,'index']);



Route::get("/admin/all-contacts",[\App\Http\Controllers\ContactController::class,"getAllContacts"]);

Route::post("/send-contact",[\App\Http\Controllers\ContactController::class,"sendContact"]);

Route::post("/admin/add-products",[\App\Http\Controllers\ShopController::class,'addProducts']);

Route::get("/shop",[\App\Http\Controllers\ShopController::class,'getAllProducts']);

Route::get("/admin/all-products",[\App\Http\Controllers\ProductsController::class,'allProducts']);

Route::get("/admin/delete-product/{product}",[\App\Http\Controllers\ProductsController::class,"delete"]);

Route::get("/admin/delete-contact/{contact}",[\App\Http\Controllers\ContactController::class,"delete"]);
