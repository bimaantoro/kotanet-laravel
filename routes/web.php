<?php

use App\Http\Controllers\Admin\{
    CategoryController as AdminCategoryController,
    CompanyAboutController as AdminCompanyAboutController,
    ProductController as AdminProductController,
};
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingController::class)->name('landing');

Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {
    Route::resource('/product', AdminProductController::class);

    Route::resource('/about', AdminCompanyAboutController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
