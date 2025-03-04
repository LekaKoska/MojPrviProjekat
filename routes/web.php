<?php

use App\Http\Controllers\contactController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;



Route::get("/", [HomepageController::class, "welcome"]);

Route::get("/contact", [contactController::class, "index"]);

Route::post("/send-contact",[contactController::class, "sendContact"]);

Route::get("/shop", [ShopController::class, "getAllProducts"]);

Route::view("/about", "about");




Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function ()
{
    Route::get("/products", [ShopController::class, "viewProducts"]);

    Route::get("/all-contacts", [contactController::class, "getAllContacts"]);

    Route::get("/add-product", [ShopController::class, "index"]);

    Route::post("/send-product", [ShopController::class, "addProduct"]);

    Route::get("/delete-contact/{contacts}", [contactController::class, "delete"])
        ->name("deleteContact");

    Route::get("/delete-product/{products}", [ShopController::class, "delete"])
        ->name("deleteProduct");

    Route::get("/product/edit/{product}", [ShopController::class, "update"])
        ->name("updateProduct");

    Route::post("/product/save/{singleProduct}", [ShopController::class, "edit"])
        ->name("product.save");

    Route::get("/contact/edit/{singleContact}",[contactController::class, "update"])
        ->name("contact.single");

    Route::post("/contact/save/{contactId}", [contactController::class, "save"])
        ->name("contact.save");


});



require __DIR__. '/auth.php';


