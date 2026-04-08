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

//STAFF order
Route::get('/staff/orders', [OrderController::class, 'orderstaff'])->name('staff.orders')->middleware('auth:staff');
Route::post('/staff/orders/{id}', [OrderController::class, 'updateStatus'])->name('staff.orders.update')->middleware('auth:staff');

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
Route::delete('/admin/staff/{id}', [AuthStaff::class, 'destroy'])->name('admin.staff.destroy');

Route::get('/admin/report', [ReportController::class, 'report'])->name('admin.report');

Route::get('/admin/data' , function (){
    return view('Admin.backup');
});

Route::get('/admin/backup', [BackupController::class, 'show'])->name('admin.backup');
Route::post('/admin/backup/download', [BackupController::class, 'backup'])->name('admin.backup.post');
Route::post('/admin/restore/process', [BackupController::class, 'restore'])->name('admin.restore.post');

Route::get('/admin/report/user', [ReportController::class, 'userReport'])->name('admin.report.user');
Route::get('/admin/report/order', [ReportController::class, 'orderReport'])->name('admin.report.order');
Route::get('/admin/report/lapor', [ReportController::class, 'lapor'])->name('admin.report.lapor');
Route::get('admin/report_detail/{id}', [ReportController::class, 'reportDetail'])->name('admin.report.detail');

//route produk
Route::get('/product', [ProductController::class, 'products'])->name('user.products');
Route::get('/product/bestseller', [ProductController::class, 'bestSeller'])->name('user.products.bestseller');
Route::get('/product/newest', [ProductController::class, 'newest'])->name('user.products.newest');
Route::get('/product/{id}', [ProductController::class, 'productDetail'])->name('user.product');
Route::get('/product/category/{id}', [ProductController::class, 'productByCategory'])->name('user.products.category');

Route::get('/search/{query}', [ProductController::class, 'search'])->name('user.products.search');

//route order
Route::get('/orders', [OrderController::class, 'pesanan'])->name('user.orders')->middleware('auth');

// Cart & Checkout routes
Route::get('/cart', [OrderController::class, 'Keranjang'])->name('user.cart')->middleware('auth');
Route::post('/cart/add', [OrderController::class, 'addToCart'])->name('user.cart.add')->middleware('auth');
Route::post('/cart/update/{rowId}', [OrderController::class, 'update'])->name('user.cart.update')->middleware('auth');
Route::post('/cart/remove/{rowId}', [OrderController::class, 'remove'])->name('user.cart.remove')->middleware('auth');

// Checkout routes
Route::post('/checkout', [OrderController::class, 'checkout'])->name('user.checkout')->middleware('auth');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('user.checkout')->middleware('auth');
Route::post('/checkout/alamat', [OrderController::class, 'alamatadd'])->name('checkout.alamat.add')->middleware('auth');

// Checkout callbacks
Route::get('/checkout/finish', [OrderController::class, 'finish'])->name('checkout.finish')->middleware('auth');
Route::get('/checkout/error', [OrderController::class, 'error'])->name('checkout.error');
Route::get('/checkout/pending', [OrderController::class, 'pending'])->name('checkout.pending')->middleware('auth');

// Orders routes
Route::get('/orders', [OrderController::class, 'pesanan'])->name('user.orders')->middleware('auth');
Route::get('/orders_detail/{id}', [OrderController::class, 'detailPesanan'])->name('user.orders.detail')->middleware('auth');
Route::post('/orders/report/{id}', [OrderController::class, 'lapor'])->name('user.orders.report')->middleware('auth');

// Midtrans webhook (no auth needed)
Route::post('/webhooks/midtrans', [OrderController::class, 'handleWebhook'])->name('midtrans.webhook');


//route profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        $notify = auth()->user()->notifications()->latest()->get();
        return view('User.profile', compact('notify'));
    })->name('user.profile');

    Route::post('/notifications/mark-as-read', [AuthUser::class, 'markAsRead'])->name('notifications.markRead');
    Route::post('/profile/photo', [AuthUser::class, 'addPhoto'])->name('user.profile.addphoto');
    route::delete('/profile/photo', [AuthUser::class, 'deletePhoto'])->name('user.profile.delphoto');
    Route::put('/profile/update', [AuthUser::class, 'update'])->name('user.profile.update');
    Route::post('/address/add', [AuthUser::class, 'addAddress'])->name('user.address.add');
    Route::put('/address/update', [AuthUser::class, 'updateAddress'])->name('user.address.update');
    Route::delete('/address/delete', [AuthUser::class, 'deleteAddress'])->name('user.address.delete');
});

Route::get('/about_us', function() {
    return view('User.about_us');
});

Route::get('/contact_us', function() {
    return view('User.contact_us');
});


require __DIR__.'/auth.php';
