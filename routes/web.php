<?php

use App\Http\Controllers\SelectController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/select', [SelectController::class, 'index']);
// Route::get('/select/prodis', [SelectController::class, 'getProdis']);
// Route::get('/select/perguruan-tinggis', [SelectController::class, 'getPerguruanTinggis']);

// Route untuk menampilkan halaman form select jurusan dan program studi
Route::get('/form', [SelectController::class, 'showForm']);

// Route untuk menampilkan perguruan tinggi berdasarkan program studi yang dipilih
Route::post('/perguruan-tinggi', [SelectController::class, 'getPerguruanTinggi']);

// Route untuk menampilkan halaman blog
Route::get('/blog', [WelcomeController::class, 'index']);
