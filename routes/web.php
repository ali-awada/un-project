<?php

use App\Http\Controllers\Admin\AdminBrand;
use App\Http\Controllers\Admin\AdminCategory;
use App\Http\Controllers\Admin\AdminCurrency;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
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
    Route::get('/contact-messages', function () {
        $messages = \App\Models\Contact::all();
        return view('admin.contact', compact('messages'));
    })->name('contact.admin');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [UserCategory::class, 'show'])->name('userCategory.show');
Route::get('/product/{id}', [UserProduct::class, 'show'])->name('userPoduct.show');
Route::get('/brand/{id}', [UserBrand::class, 'show'])->name('userBrand.show');
Route::get('/contact', [ContactController::class, 'add'])->name('contact');
Route::view('/about-us', 'about')->name('about');
Route::post('/contact/save', [ContactController::class, 'save'])->name('contact.save');
Route::post('/order/create', [OrderController::class, 'add'])->name('order.create');


Route::prefix("dashboard")->middleware(["auth"])->group(function () {
    Route::get('/', function () {
        return view('user.dashboard');
    })->name('dashboard.index');
    Route::resource('product', \App\Http\Controllers\ProductController::class)->except(["show"]);
    Route::get("/notifications", [\App\Http\Controllers\NotificationController::class, 'all'])->name('notis');
});
