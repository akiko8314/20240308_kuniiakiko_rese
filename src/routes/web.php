<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ReservationController;
use App\Http\Controllers\Auth\MyPageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Auth\FavoriteController;



Auth::routes();

Route::get('/my_page', [MyPageController::class, 'index'])->name('my_page.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/main_menu', [MenuController::class, 'index'])->name('main_menu');
});
Route::get('/sub_menu', [MenuController::class, 'index'])->name('sub_menu');
Route::get('/', [ShopController::class, 'index'])->name('shops');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');
Route::post('/shop/favorite/{id}', [ShopController::class, 'favorite'])->name('favorite');
Route::get('/shop_list/{shop}', [ShopController::class, 'show'])->name('shop_list.show');
Route::match(['get', 'post'], '/shops/search', [ShopController::class, 'search'])->name('shops.search');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservation.store');
Route::post('/shop/favorite/{id}', [FavoriteController::class, 'store'])->name('favorite');
Route::get('/shop/{id}', 'ShopController@show')->name('shop.detail');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservation.store');






