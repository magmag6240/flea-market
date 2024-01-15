<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MypageController;
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

Route::get('/', [MarketController::class, 'top'])->name('user.top');
Route::get('/like/{product_id}', [LikeController::class, 'like'])->name('like');
Route::get('/unlike/{product_id}', [LikeController::class, 'unlike'])->name('unlike');
Route::get('/item/{item_id}', [MarketController::class, 'item_detail'])->name('user.item_detail');

Route::middleware('auth')->group(function(){

    Route::get('/sell', [MarketController::class, 'sell'])->name('user.sell');
    Route::get('/purchase/{item_id}', [MarketController::class, 'purchase'])->name('user.purchase');
    Route::get('/purchase/address/{item_id}', [MarketController::class, 'address_edit'])->name('user.address_edit');
    Route::patch('/purchase/address/{item_id}', [MypageController::class, 'address_update'])->name('user.address_update');
    Route::get('/mypage', [MypageController::class, 'index'])->name('user.mypage');
    Route::get('/mypage/profile', [MypageController::class, 'profile_edit'])->name('user.profile_edit');
    Route::patch('/mypage/profile', [MypageController::class, 'profile_update'])->name('user.profile_update');

});