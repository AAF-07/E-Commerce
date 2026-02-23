<?php

use App\Http\Controllers\AuthStaff;
use App\Http\Controllers\AuthUser;
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
Route::get('/admin/dashboard', function () {
    return view('Admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/staff', [AuthStaff::class, 'showstaff'])->name('admin.staff');
Route::post('/admin/staff', [AuthStaff::class, 'create'])->name('admin.staff.create');

Route::get('/admin/report', [ReportController::class, 'report'])->name('admin.report');

Route::get('/admin/backup', function () {
    return view('Admin.backup');
})->name('admin.backup');

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
