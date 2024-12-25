<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [\App\Http\Controllers\HomepageController::class, "welcome"]);




Route::get("/contact", [\App\Http\Controllers\contactController::class, "index"]);


Route::get("/shop", [\App\Http\Controllers\ShopController::class, "getAllProducts"]);


Route::view("/about", "about");


Route::get("/admin/all-contacts", [\App\Http\Controllers\contactController::class, "getAllContacts"]);

Route::post("/send-contact",[\App\Http\Controllers\contactController::class, "sendContact"]);

Route::get("/admin/add-product", [\App\Http\Controllers\ShopController::class, "index"]);

Route::post("/admin/send-product", [\App\Http\Controllers\ShopController::class, "addProduct"]);

Route::get("/admin/products", [\App\Http\Controllers\ShopController::class, "viewProducts"]);




