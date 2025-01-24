<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;



Route::get("/", [\App\Http\Controllers\HomepageController::class, "welcome"]);

Route::get("/contact", [\App\Http\Controllers\contactController::class, "index"]);

Route::post("/send-contact",[\App\Http\Controllers\contactController::class, "sendContact"]);

Route::get("/shop", [\App\Http\Controllers\ShopController::class, "getAllProducts"]);

Route::view("/about", "about");

Route::get("/forecast", [\App\Http\Controllers\WeatherController::class, "index"]);


Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function ()
{
    Route::get("/products", [\App\Http\Controllers\ShopController::class, "viewProducts"]);

    Route::get("/all-contacts", [\App\Http\Controllers\contactController::class, "getAllContacts"]);

    Route::get("/add-product", [\App\Http\Controllers\ShopController::class, "index"]);

    Route::post("/send-product", [\App\Http\Controllers\ShopController::class, "addProduct"]);

    Route::get("/delete-contact/{contacts}", [\App\Http\Controllers\contactController::class, "delete"])
        ->name("deleteContact");

    Route::get("/delete-product/{products}", [\App\Http\Controllers\ShopController::class, "delete"])
        ->name("deleteProduct");

    Route::get("/product/edit/{product}", [\App\Http\Controllers\ShopController::class, "update"])
        ->name("updateProduct");

    Route::post("/product/save/{singleProduct}", [\App\Http\Controllers\ShopController::class, "edit"])
        ->name("product.save");

    Route::get("/contact/edit/{singleContact}",[\App\Http\Controllers\contactController::class, "update"])
        ->name("contact.single");

    Route::post("/contact/save/{contactId}", [\App\Http\Controllers\contactController::class, "save"])
        ->name("contact.save");


});



require __DIR__. '/auth.php';


