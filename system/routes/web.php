<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SensorLaravel;
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

Route::get('/coba', [SensorLaravel::class, 'coba']);

Route::get('/api', [ApiController::class, 'view']);
Route::get('/api-restfull', [ApiController::class, 'ViewRestfull']);
// Route::post('/store-api', [MSensorController::class, 'store'])->name('msensors.store');


Route::get('/index', [SensorLaravel::class, 'index']);
Route::get('/bacasuhu', [SensorLaravel::class, 'bacasuhu']);
Route::get('/bacakelembapan', [SensorLaravel::class, 'bacakelembapan']);
//route untuk menyimpan nilai sensor ke arduino
Route::get('/simpan/{nilaisuhu}/{nilaikelembapan}', [SensorLaravel::class, 'simpansensor']);
Route::get('/get-kid-status', [SensorLaravel::class, 'getKIDStatus'])->name('get-kid-status');

