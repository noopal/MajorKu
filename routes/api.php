<?php

use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/program-studi/{jurusanId}', function ($jurusanId) {
    $programStudis = Prodi::where('jurusan_id', $jurusanId)->get();
    return $programStudis;
});

Route::get('/blog/{jurusanId}', function ($jurusanId) {
    $programStudis = Prodi::where('jurusan_id', $jurusanId)->get();
    return $programStudis;
});

Route::post('/midtrans/charge', 'MidtransController@charge');
// Route::get('/register')/