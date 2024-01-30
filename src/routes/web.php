<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\ShopManager\ShopManagerController;
use App\Http\Controllers\ShopManager\ShopManagerLoginController;
use App\Http\Controllers\ShopManager\ShopManagerMailController;
use App\Http\Controllers\ShopManager\ShopManagerRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminMailController;
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

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'store']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/shop_manager_list', [AdminController::class, 'show'])->name('admin.show');
        Route::get('/new_shop_manager', [AdminController::class, 'new'])->name('admin.new_shop_manager');
        Route::post('/new_shop_manager/mail', [AdminMailController::class, 'new_shop_manager_mail'])->name('admin.new_shop_manager.mail');
        Route::get('/mail', [AdminMailController::class, 'index'])->name('admin.mail.index');
        Route::post('/mail/send', [AdminMailController::class, 'mail_all_users'])->name('admin.mail.send');
    });
});

Route::prefix('shop_manager')->group(function () {
    Route::get('login', [ShopManagerLoginController::class, 'create'])->name('shop_manager.login');
    Route::post('login', [ShopManagerLoginController::class, 'store']);
    Route::get('register', [ShopManagerRegisterController::class, 'create'])->name('shop_manager.register');
    Route::post('register', [ShopManagerRegisterController::class, 'store']);

    Route::middleware('auth:shop_manager')->group(function () {
        Route::get('/', [ShopManagerController::class, 'index']);
        Route::get('/new', [ShopManagerController::class, 'new'])->name('shop_manager.new');
        Route::post('/store', [ShopManagerController::class, 'store'])->name('shop_manager.store');
        Route::get('/shop_list', [ShopManagerController::class, 'shop_list'])->name('shop_manager.shop_list');
        Route::get('/edit/{shop_id}', [ShopManagerController::class, 'edit'])->name('shop_manager.edit');
        Route::patch('/update/{shop_id}', [ShopManagerController::class, 'update'])->name('shop_manager.update');
        Route::get('/reserve_list/{shop_id}', [ShopManagerController::class, 'reserve_list'])->name('shop_manager.reserve_list');
        Route::get('/menu/new/{shop_id}', [ShopManagerController::class, 'menu_new'])->name('shop_manager.menu.new');
        Route::post('/menu/store/{shop_id}', [ShopManagerController::class, 'menu_store'])->name('shop_manager.menu.store');
        Route::get('/menu/list/{shop_id}', [ShopManagerController::class, 'menu_list'])->name('shop_manager.menu.list');
        Route::get('/menu/edit/{menu_id}', [ShopManagerController::class, 'menu_edit'])->name('shop_manager.menu.edit');
        Route::patch('/menu/update/{menu_id}', [ShopManagerController::class, 'menu_update'])->name('shop_manager.menu.update');
        Route::get('/qr_code', [ShopManagerController::class, 'qr_code'])->name('shop_manager.qr_code');
        Route::get('/mail', [ShopManagerMailController::class, 'index'])->name('shop_manager.mail.index');
        Route::post('/mail/send', [ShopManagerMailController::class, 'send'])->name('shop_manager.mail.send');
    });
});

Route::middleware('auth:web')->group(function () {
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
