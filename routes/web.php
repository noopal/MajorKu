<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;

// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout']);
// Route::middleware(['admin'])->group(function () {
//   Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
// });

// Route::get('/user/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
// Route::post('/user/login', [UserAuthController::class, 'login']);
// Route::post('/user/logout', [UserAuthController::class, 'logout']);
// Route::middleware(['user'])->group(function () {
//   Route::get('/user/dashboard', [UserController::class, 'dashboard']);
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
  Route::get('/', [HomeController::class, 'adminIndex'])->name('admin.home');
  Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('admin');

Route::group(['middleware' => 'user', 'prefix' => 'user'], function () {
  Route::get('/', [HomeController::class, 'userIndex'])->name('user.home');
  Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
  // Route untuk menampilkan perguruan tinggi berdasarkan program studi yang dipilih
});
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->middleware('user');

Route::group(
  ['middleware' => 'auth', 'prefix' => 'user'],
  function () {
    Route::get('/perguruan-tinggi', [UserController::class, 'getPerguruanTinggi'])->name('user.perguruan-tinggi');
  }
);
Route::middleware(['auth', 'check_payment'])->group(function () {
  Route::get('/perguruan-tinggi', [UserController::class, 'index'])->name('perguruan-tinggi')->middleware('check_pembayaran');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
Route::post('/pembayaran/checkout', [PembayaranController::class, 'checkout'])->name('pembayaran.checkout');
Route::post('/pembayaran/notification', [PembayaranController::class, 'notification'])->name('pembayaran.notification');
