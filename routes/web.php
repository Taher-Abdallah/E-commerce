<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Front\FrontController;



Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('front.home');
    Route::get('/shop', 'shop')->name('front.shop');
    Route::get('/about', 'about')->name('front.about');
    Route::get('/contact', 'contact')->name('front.contact');
    Route::post('/contact/store', 'contactStore')->name('front.contact.store');
});

Route::middleware(['auth', 'verified','role:admin',])->group(function () {
Route::controller(AdminController::class)->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/admin/dashboard', 'index')->name('dashboard');
    Route::get('/admin/category', 'showCategory')->name('category.show');
});

Route::controller(BrandController::class)->prefix('/admin')->name('brand.')->group(
    function () {
Route::get('/brands', 'index')->name('index');
Route::get('/brands/create', 'create')->name('create');
Route::post('/brands/store', 'store')->name('store');
Route::get('/brands/edit/{id}', 'edit')->name('edit');
Route::put('/brands/update/{id}', 'update')->name('update');
Route::delete('/brands/delete/{id}', 'destroy')->name('destroy');
    });
});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
