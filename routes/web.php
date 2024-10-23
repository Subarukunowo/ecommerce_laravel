<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\FlashSaleController;

// Guest Routes
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');
// Rute untuk proses login
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/post-login', [AuthController::class, 'login']);
});

// Admin Routes
Route::group(['middleware' => 'admin'], function() {
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit'); // Halaman edit produk
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update'); // Proses update produk
    Route::delete('/product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');
    Route::get('/distributors', [DistributorController::class, 'index'])->name('admin.distributors.index');
    
    Route::get('/distributors', [DistributorController::class, 'index'])->name('admin.distributors.index');
    Route::get('/distributors/create', [DistributorController::class, 'create'])->name('distributor.create');
    Route::post('/distributors', [DistributorController::class, 'store'])->name('distributor.store');
    Route::get('/distributor/edit/{id}', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::get('/distributor/detail/{id}', [DistributorController::class, 'detail'])->name('distributor.detail');
    Route::get('/distributor/detail/{id}', [DistributorController::class, 'detail'])->name('admin.distributors.detail');

    Route::get('/admin/distributor/detail/{id}', [DistributorController::class, 'detail'])->name('distributor.detail');

    Route::delete('/admin/distributor/delete/{id}', [DistributorController::class, 'delete'])->name('distributor.delete');


    Route::put('/distributors/{id}', [DistributorController::class, 'update'])->name('admin.distributors.update');
    
  
    Route::get('/admin/flashsale', [FlashsaleController::class, 'index'])->name('admin.flashsale'); // Pastikan ini ada
    Route::get('/admin/flashsale/detail/{id}', [FlashsaleController::class, 'detail'])->name('flashsale.detail');
    Route::get('/flashsale/edit/{id}', [FlashsaleController::class, 'edit'])->name('flashsale.edit');
    Route::post('/flashsale/update/{id}', [FlashsaleController::class, 'update'])->name('flashsale.update');
    Route::delete('/flashsale/delete/{id}', [FlashsaleController::class, 'delete'])->name('flashsale.delete');
    
   
// Product Route
Route::get('/product', [ProductController::class,'index'])-> name('admin.product');
Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
Route::get('/user/product/detail/{id}',[UserController::class,'detail_product'])->name('user.detail.product');
Route::get('/product/purchase/{productId}/{userId}', [UserController::class,'purchase']);
Route::middleware(['auth', 'admin'])->group(function() {

});

});

// User Routes
Route::group(['middleware' => 'web'], function() {
    Route::get('/user', [UserController::class,'index']) -> name('user.dashboard');

    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');
    Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::post('/product/{id}/buy', [ProductController::class, 'buy'])->name('product.buy');


});
// Rute untuk Flash Sale 
Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase'])->name('product.purchase');
// Route untuk user melihat detail flash sale
Route::get('/user/flashsale/detail/{id}', [UserController::class, 'detail_flashsale'])->name('user.detail.flashsale');






// Flash Sale Routes
Route::get('/flashsale', [FlashSaleController::class, 'index'])->name('flashsale.index');
Route::get('/flashsale/create', [FlashSaleController::class, 'create'])->name('flashsale.create');
Route::post('/flashsale', [FlashSaleController::class, 'store'])->name('flashsale.store');
Route::get('/flashsale/{id}/edit', [FlashSaleController::class, 'edit'])->name('flashsale.edit');
Route::put('/flashsale/{id}', [FlashSaleController::class, 'update'])->name('flashsale.update');
Route::delete('/flashsale/{id}', [FlashSaleController::class, 'delete'])->name('flashsale.delete');

?>