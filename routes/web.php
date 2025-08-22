<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

Route::controller(CartController::class)->prefix('/cart')->name('front.')->group(function () {
    Route::get('', 'index')->name('cart');
    Route::post('/add', 'add')->name('cart.add');
    Route::put('/increase-qty/{rowId}', 'increase')->name('cart.increase');
    Route::put('/decrease-qty/{rowId}', 'decrease')->name('cart.decrease');
    Route::delete('/remove/{rowId}', 'remove')->name('cart.remove');
    Route::delete('/delete-all/{rowId}', 'deleteAll')->name('cart.delete.all');
});


//=================================================================Shop Controller
Route::get('/shop', [ShopController::class, 'index'])->name('front.shop');
Route::get('/shop/{slug}/details', [ShopController::class, 'show'])->name('front.details');
//=================================================================Front Controller
Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('front.home');
    Route::get('/about', 'about')->name('front.about');
    Route::get('/contact', 'contact')->name('front.contact');
    Route::post('/contact/store', 'contactStore')->name('front.contact.store');
});
Route::middleware(['auth', 'verified','role:admin',])->prefix('/admin')
    ->group(function () {
    //=================================================================AdminController
Route::controller(AdminController::class)->name('admin.')->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});
//=================================================================  BrandController

Route::controller(BrandController::class)->name('brand.')->group(
    function () {
Route::get('/brands', 'index')->name('index');
Route::get('/brands/create', 'create')->name('create');
Route::post('/brands/store', 'store')->name('store');
Route::get('/brands/edit/{id}', 'edit')->name('edit');
Route::put('/brands/update/{id}', 'update')->name('update');
Route::delete('/brands/delete/{id}', 'destroy')->name('destroy');
    });



    //=================================================================  CategoryController
    Route::resource('/category', CategoryController::class);
    //================================================================== ProductController
    Route::resource('/product', ProductController::class);
    //================================================================== OrderController
    // Route::resource('/order', OrderController::class);
    //================================================================== UserController
    // Route::resource('/user', UserController::class);

});





// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
