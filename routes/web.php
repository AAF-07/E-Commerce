<?php

use App\Http\Controllers\AuthStaff;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'show'])->name('home');

//Staff auth routes
Route::get('/staff', [AuthStaff::class, 'showLoginForm'])->name('staff.login');
Route::post('/staff', [AuthStaff::class, 'login'])->name('staff.login.post');
Route::post('/staff/logout', [AuthStaff::class, 'logout'])->name('staff.logout');

//staff protected routes
Route::get('/staff/dashboard', [AuthStaff::class, 'homestaff'])->name('staff.dashboard')->middleware('auth:staff');
Route::get('/staff/orders', function () {
    return view('Staff.orders');
});

Route::get('/staff/products', [ProductController::class, 'index'])->name('staff.products.index');

//tambah produk routes
Route::post('/staff/products/add', [ProductController::class, 'store'])->name('staff.products.store');
Route::get('/staff/products/add', [ProductController::class, 'create'])->name('staff.products.create');

//edit produk routes
Route::get('/staff/products/edit/{id}', [ProductController::class, 'edit'])->name('staff.products.edit');
Route::put('/staff/products/edit/{id}', [ProductController::class, 'update'])->name('staff.products.update');
Route::delete('/staff/products/delete/{id}', [ProductController::class, 'destroy'])->name('staff.products.destroy');

//Admin routes
Route::get('/admin/dashboard', [AuthStaff::class, 'homeadmin'])->name('admin.dashboard')->middleware('auth:staff');

Route::get('/admin/staff', [AuthStaff::class, 'showstaff'])->name('admin.staff');
Route::post('/admin/staff', [AuthStaff::class, 'create'])->name('admin.staff.create');

Route::get('/admin/report', [ReportController::class, 'report'])->name('admin.report');

Route::get('/admin/data' , function (){
    return view('Admin.backup');
});

Route::get('/admin/backup', [BackupController::class, 'backup'])->name('admin.backup');
Route::get('/admin/restore', [BackupController::class, 'restore'])->name('admin.restore');

Route::get('/admin/report/user', [ReportController::class, 'userReport'])->name('admin.report.user');
Route::get('/admin/report/earning', [ReportController::class, 'earningReport'])->name('admin.report.earning');
Route::get('/admin/report/order', [ReportController::class, 'orderReport'])->name('admin.report.order');
Route::get('/admin/report/lapor', [ReportController::class, 'lapor'])->name('admin.report.lapor');

//user auth routes
Route::get('/signup', [AuthUser::class, 'showSignupForm'])->name('user.signup');
Route::post('/signup', [AuthUser::class, 'signup'])->name('user.signup.post');

Route::get('/login', [AuthUser::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [AuthUser::class, 'login'])->name('user.login.post');
Route::post('/logout', [AuthUser::class, 'logout'])->name('user.logout');

//route produk
Route::get('/product', [ProductController::class, 'products'])->name('user.products');
Route::get('/product/{id}', [ProductController::class, 'productDetail'])->name('user.product');
Route::get('/product/category/{id}', [ProductController::class, 'productByCategory'])->name('user.products.category');

//route order
Route::get('/orders', [OrderController::class, 'pesanan'])->name('user.orders')->middleware('auth:user');

// Cart & Checkout routes
Route::get('/cart', [OrderController::class, 'Keranjang'])->name('user.cart')->middleware('auth:user');
Route::post('/cart/add', [OrderController::class, 'addToCart'])->name('user.cart.add')->middleware('auth:user');
Route::post('/cart/update/{rowId}', [OrderController::class, 'update'])->name('user.cart.update')->middleware('auth:user');
Route::post('/cart/remove/{rowId}', [OrderController::class, 'remove'])->name('user.cart.remove')->middleware('auth:user');

// Checkout routes
Route::post('/checkout', [OrderController::class, 'checkout'])->name('user.checkout')->middleware('auth:user');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('user.checkout')->middleware('auth:user');
Route::post('/checkout/alamat', [OrderController::class, 'alamatadd'])->name('checkout.alamat.add')->middleware('auth:user');

// Checkout callbacks
Route::get('/checkout/finish', [OrderController::class, 'finish'])->name('checkout.finish')->middleware('auth:user');
Route::get('/checkout/error', [OrderController::class, 'error'])->name('checkout.error');
Route::get('/checkout/pending', [OrderController::class, 'pending'])->name('checkout.pending')->middleware('auth:user');

// Orders routes
Route::get('/orders', [OrderController::class, 'pesanan'])->name('user.orders')->middleware('auth:user');
Route::get('/orders_detail', [OrderController::class, 'detailPesanan'])->name('user.orders.detail')->middleware('auth:user');

// Midtrans webhook (no auth needed)
Route::post('/webhooks/midtrans', [OrderController::class, 'handleWebhook'])->name('midtrans.webhook');


//route profile
Route::get('/profile', [AuthUser::class, 'profile'])->name('user.profile');

