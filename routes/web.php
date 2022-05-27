<?php

use App\Http\Controllers\Admin\AdminBrand;
use App\Http\Controllers\Admin\AdminCategory;
use App\Http\Controllers\Admin\AdminCurrency;
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

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix("dashboard")->middleware(["auth"])->group(function () {
    Route::get('/', function () {
        return view('user.dashboard');
    })->name('dashboard.index');
    Route::resource('product', \App\Http\Controllers\ProductController::class)->except(["show"]);
});
