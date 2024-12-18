<?php

use Illuminate\Support\Facades\Route;

Route::get("/", [\App\Http\Controllers\HomepageController::class, "welcome"]);




Route::get("/contact", [\App\Http\Controllers\contactController::class, "index"]);


Route::get("/shop", [\App\Http\Controllers\ShopController::class, "shop"]);
//Route::view("/shop", "shop");

Route::view("/about", "about");



