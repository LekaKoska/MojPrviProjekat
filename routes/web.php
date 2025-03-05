<?php

use App\Http\Controllers\contactController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::view("/about", "about");
Route::get("/", [HomepageController::class, "welcome"]);

Route::view("/contact", "contact");
Route::controller(contactController::class)->prefix("/contact")->group(function ()
{
    Route::get("/all", "getAllContacts");
    Route::post("/send", "sendContact")
    ->name("contact.send");
    Route::get("edit/{singleContact}", "update")
    ->name("contact.single");
    Route::get("/delete/{contacts}","delete")
        ->name("contact.delete");
    Route::post("/save/{contactId}", "save")
    ->name("contact.save");
});


Route::controller(ShopController::class)->prefix("/product")->group(function ()
{
    Route::get("/shop", "getAllProducts");

    Route::get("/delete/{products}","delete")
        ->name("product.delete");

    Route::get("/edit/{product}","update")
        ->name("product.update");

    Route::post("/save/{singleProduct}", "edit")
        ->name("product.save");
});



Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function ()
{



});



require __DIR__. '/auth.php';


