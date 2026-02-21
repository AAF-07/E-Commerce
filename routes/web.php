<?php

use App\Http\Controllers\AuthStaff;
use App\Http\Controllers\AuthUser;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductController::class . '@show')->name('home');

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
route::get('/staff/products/add', [ProductController::class, 'create'])->name('staff.products.create');

//edit produk routes
route::get('/staff/products/edit/{id}', [ProductController::class, 'edit'])->name('staff.products.edit');
route::put('/staff/products/edit/{id}', [ProductController::class, 'update'])->name('staff.products.update');

route::delete('/staff/products/delete/{id}', [ProductController::class, 'destroy'])->name('staff.products.destroy');

route::get('/staff/logout', [AuthStaff::class, 'logout'])->name('staff.logout');

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

route::get('/admin/report/lapor', ReportController::class . '@lapor')->name('admin.report.lapor');


//user auth routes
Route::get('/signup', [AuthUser::class, 'showsignupForm'])->name('user.signup');
Route::post('/signup', [AuthUser::class, 'signup'])->name('user.signup.post');

Route::get('/login', [AuthUser::class, 'showLoginForm'])->name('user.login');
Route::post('/login', [AuthUser::class, 'login'])->name('user.login.post');
