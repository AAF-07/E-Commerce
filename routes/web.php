<?php

use App\Http\Controllers\AuthStaff;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/staff', [AuthStaff::class, 'showLoginForm'])->name('staff.login');
Route::post('/staff', [AuthStaff::class, 'login'])->name('staff.login.post');

route::get('/staff/dashboard', function () {
    return view('Staff.dashboard');
});
