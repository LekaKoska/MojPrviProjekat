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

Route::get("/admin/delete-contact/{contacts}", [\App\Http\Controllers\contactController::class, "delete"])
    ->name("deleteContact");

Route::get("/admin/delete-product/{products}", [\App\Http\Controllers\ShopController::class, "delete"])
    ->name("deleteProduct");

Route::get("/admin/product/edit/{product}", [\App\Http\Controllers\ShopController::class, "update"])
    ->name("updateProduct");

Route::post("/admin/product/save/{singleProduct}", [\App\Http\Controllers\ShopController::class, "edit"])
    ->name("product.save");

Route::get("/admin/contact/edit/{singleContact}",[\App\Http\Controllers\contactController::class, "update"])
    ->name("contact.single");

Route::post("/admin/contact/save/{contactId}", [\App\Http\Controllers\contactController::class, "save"])
    ->name("contact.save");
