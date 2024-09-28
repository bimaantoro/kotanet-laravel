<?php

use App\Http\Controllers\Admin\{
    CategoryController as AdminCategoryController,
    CompanyAboutController as AdminCompanyAboutController,
    ProductController as AdminProductController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {
    Route::resource('/product', AdminProductController::class);

    Route::resource('/about', AdminCompanyAboutController::class);
});
