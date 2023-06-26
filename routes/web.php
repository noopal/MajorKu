<?php

use App\Http\Controllers\SelectController;
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

Route::get('/select', [SelectController::class, 'index']);
Route::get('/select/prodis', [SelectController::class, 'getProdis']);
Route::get('/select/perguruan-tinggis', [SelectController::class, 'getPerguruanTinggis']);
