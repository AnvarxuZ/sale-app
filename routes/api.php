<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// auth routes
Route::apiResource("products", ProductController::class);

Route::post("calculate-price", [ProductController::class,"calculatePrice"])->name("products.calculate_price");