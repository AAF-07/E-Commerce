<?php

use App\Http\Controllers\AuthStaff;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

//Staff auth routes
Route::get('/staff', [AuthStaff::class, 'showLoginForm'])->name('staff.login');
Route::post('/staff', [AuthStaff::class, 'login'])->name('staff.login.post');

route::post('/staff/logout', [AuthStaff::class, 'logout'])->name('staff.logout');

//staff protected routes
route::get('/staff/dashboard', function () {
    return view('Staff.dashboard');
});

route::get('/staff/orders', function () {
    return view('Staff.orders');
});

//tambah produk routes
route::post('/staff/products/add', [ProductController::class, 'store'])->name('staff.products.store');
route::get('/staff/products/add', function () {
    return view('Staff.Product.add');
})->name('staff.products.add');

//edit produk routes
route::get('/staff/products/edit/{id}', [ProductController::class, 'edit'])->name('staff.products.edit');
route::put('/staff/products/edit/{id}', [ProductController::class, 'update'])->name('staff.products.update');

route::get('/staff/products', [ProductController::class, 'index'])->name('staff.products.index');
