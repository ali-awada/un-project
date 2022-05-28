<?php

use App\Http\Controllers\Admin\AdminBrand;
use App\Http\Controllers\Admin\AdminCategory;
use App\Http\Controllers\Admin\AdminCurrency;
use App\Http\Controllers\UserCategory;
use App\http\Controllers\UserProduct;
use App\Http\Controllers\UserBrand;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::prefix("admin")->middleware(["auth", "superAdmin"])->group(function () {
    Route::get("/", function () {
        return view('admin.dashboard');
    });
    Route::resource("category", AdminCategory::class, [
        'names' => 'adminCategory'
    ]);
    Route::resource("brand", AdminBrand::class, [
        'names' => 'adminBrand'
    ]);
    Route::resource("currency", AdminCurrency::class, [
        'names' => 'adminCurrency'
    ]);
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [UserCategory::class, 'show'])->name('userCategory.show');
Route::get('/product/{id}', [UserProduct::class, 'show'])->name('userPoduct.show');
Route::get('/brand/{id}', [UserBrand::class, 'show'])->name('userBrand.show');


Route::prefix("dashboard")->middleware(["auth"])->group(function () {
    Route::get('/', function () {
        return view('user.dashboard');
    })->name('dashboard.index');
    Route::resource('product', \App\Http\Controllers\ProductController::class)->except(["show"]);
});
