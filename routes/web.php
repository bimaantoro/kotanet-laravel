<?php

use App\Http\Controllers\Admin\{
    CompanyAboutController as AdminCompanyAboutController,
    DashboardController,
    HeroSectionController as AdminHeroSectionController,
    ProductController as AdminProductController,
    ProfileController as AdminProfileController,
};
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('front.index');


    // Route::controller(LoginController::class)->group(function () {
    //     Route::get('/login', 'index')->name('login');
    //     Route::post('/login', 'authenticate')->name('authenticate');
    // });
});


Auth::routes();

// Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', DashboardController::class)
        ->name('dashboard');

    Route::resource('/product', AdminProductController::class);

    Route::resource('/about', AdminCompanyAboutController::class);

    Route::resource('/hero_section', AdminHeroSectionController::class);

    Route::controller(AdminProfileController::class)->as('profile.')->group(function () {
        Route::get('/profile', 'edit')->name('edit');
        Route::put('/profile', 'update')->name('update');
        Route::put('/password', 'updatePassword')->name('password.update');
        Route::delete('/profile', 'destroy')->name('destroy');
    });
});
