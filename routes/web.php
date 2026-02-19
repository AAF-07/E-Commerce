<?php

use App\Http\Controllers\AuthStaff;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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

route::get('/staff/products', [ProductController::class, 'index'])->name('staff.products.index');

//tambah produk routes
route::post('/staff/products/add', [ProductController::class, 'store'])->name('staff.products.store');
route::get('/staff/products/add', function () {
    return view('Staff.Product.add');
})->name('staff.products.add');

//edit produk routes
route::get('/staff/products/edit/{id}', [ProductController::class, 'edit'])->name('staff.products.edit');
route::put('/staff/products/edit/{id}', [ProductController::class, 'update'])->name('staff.products.update');

route::delete('/staff/products/delete/{id}', [ProductController::class, 'destroy'])->name('staff.products.destroy');

//Admin routes
route::get('/admin/dashboard', function () {
    return view('Admin.dashboard');
})->name('admin.dashboard');

route::get('/admin/staff', function () {
    return view('Admin.staff');
})->name('admin.staff');

route::get('/admin/report', function () {
    return view('Admin.report');
})->name('admin.report');

route::get('/admin/backup', function () {
    return view('Admin.backup');
})->name('admin.backup');

route::get('/admin/report/user', ReportController::class . '@userReport')->name('admin.report.user');

route::get('/admin/report/earning', ReportController::class . '@earningReport')->name('admin.report.earning');

route::get('/admin/report/order', ReportController::class . '@orderReport')->name('admin.report.order');
