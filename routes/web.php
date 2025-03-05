<?php

use App\Http\Controllers\contactController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::view("/about", "about");
Route::get("/", [HomepageController::class, "welcome"]);


Route::controller(contactController::class)->group(function ()
{
    Route::get("/contact", "index");
    Route::get("/all-contacts", "getAllContacts");
    Route::post("/send-contact", "sendContact");
    Route::get("/contact/edit/{singleContact}", "update")->name("contact.single");
    Route::post("/contact/save/{contactId}", "save")->name("contact.save");
});


Route::controller(ShopController::class)->group(function ()
{
    Route::get("/shop", "getAllProducts");
    Route::get("/delete-contact/{contacts}","delete")
        ->name("deleteContact");
    Route::get("/delete-product/{products}","delete")
        ->name("deleteProduct");

    Route::get("/product/edit/{product}","update")
        ->name("updateProduct");

    Route::post("/product/save/{singleProduct}", "edit")
        ->name("product.save");
});



Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function ()
{



});



require __DIR__. '/auth.php';


