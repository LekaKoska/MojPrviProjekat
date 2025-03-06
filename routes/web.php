<?php

use App\Http\Controllers\contactController;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;


Route::view("/about", "about");
Route::get("/", [HomepageController::class, "welcome"]);

Route::view("/contact", "contact");
Route::controller(contactController::class)->prefix("/contact")->name("contacts.")->group(function ()
{
    Route::get("/all", "getAllContacts");
    Route::post("/send", "sendContact")
    ->name("send");
    Route::get("edit/{singleContact}", "update")
    ->name("single");
    Route::get("/delete/{contacts}","delete")
        ->name("delete");
    Route::post("/save/{contactId}", "save")
    ->name("save");
});

Route::post("/cart/add", [ShoppingCartController::class, "addToCart"])
    ->name("cart.add");

Route::get("/cart", [ShoppingCartController::class, "showCart"])
    ->name("cart.view");

Route::controller(ShopController::class)->prefix("/product")->name("products.")->group(function ()
{

    Route::get("/shop", "getAllProducts");
    Route::get("/{product}", "permalink")
    ->name("permalink");
    Route::get("/delete/{products}","delete")
        ->name("delete");

    Route::get("/edit/{product}","update")
        ->name("update");

    Route::post("/save/{singleProduct}", "edit")
        ->name("save");
});



Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("admin")->group(function ()
{



});



require __DIR__. '/auth.php';


