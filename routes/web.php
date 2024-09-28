<?php

use App\Http\Controllers\Admin\{
    CategoryController as AdminCategoryController,
    ProductController as AdminProductController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/product', AdminProductController::class);
});
