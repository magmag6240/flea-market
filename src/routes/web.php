<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMailController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\SearchController;

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
Route::get('/item/{item_id}', [MarketController::class, 'item_detail'])->name('user.item_detail');
Route::get('/item/search', [SearchController::class, 'search'])->name('user.search');


Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'user_list'])->name('admin.user_list');
        Route::delete('/user/{user_id}', [AdminController::class, 'user_destroy'])->name('admin.user_delete');
        Route::get('/user/comment_list/{user_id}', [AdminController::class, 'user_comment_list'])->name('admin.user_comment_list');
        Route::delete('/user/comment/{comment_id}', [AdminController::class, 'comment_destroy'])->name('admin.user_comment_delete');
        Route::get('/mail/{user_id}', [AdminController::class, 'mail'])->name('admin.mail');
        Route::post('/mail/send/{user_id}', [AdminController::class, 'mail_send'])->name('admin.mail.send');
    });

    Route::get('/like/{item_id}', [LikeController::class, 'like'])->name('like');
    Route::get('/unlike/{item_id}', [LikeController::class, 'unlike'])->name('unlike');
    Route::get('/comments/{item_id}', [CommentController::class, 'index'])->name('user.comment');
    Route::post('/comments/{item_id}', [CommentController::class, 'comment_store'])->name('user.comment_store');
    Route::delete('/comments/{comment_id}', [CommentController::class, 'comment_destroy'])->name('user.comment_delete');
    Route::get('/sell', [MarketController::class, 'sell'])->name('user.sell');
    Route::post('/sell', [MarketController::class, 'sell_store'])->name('user.sell_store');
    Route::get('/purchase/{item_id}', [MarketController::class, 'purchase'])->name('user.purchase');
    Route::patch('/purchase/{item_id}', [MarketController::class, 'purchase_store'])->name('user.purchase_store');
    Route::get('/purchase/payment/{item_id}', [MypageController::class, 'payment_edit'])->name('user.payment_edit');
    Route::patch('/purchase/payment/{item_id}', [MypageController::class, 'payment_update'])->name('user.payment_update');
    Route::get('/purchase/address/{item_id}', [MypageController::class, 'address_edit'])->name('user.address_edit');
    Route::patch('/purchase/address/{item_id}', [MypageController::class, 'address_update'])->name('user.address_update');
    Route::get('/mypage', [MypageController::class, 'index'])->name('user.mypage');
    Route::get('/mylist', [MypageController::class, 'mylist'])->name('user.mylist');
    Route::get('/mypage/profile', [MypageController::class, 'profile_edit'])->name('user.profile_edit');
    Route::post('/mypage/profile', [MypageController::class, 'profile_store'])->name('user.profile_store');
    Route::patch('/mypage/profile', [MypageController::class, 'profile_update'])->name('user.profile_update');

});
