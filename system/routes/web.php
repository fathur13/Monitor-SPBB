<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorLaravel;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgetPasswordController;

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

Route::get('/api', [ApiController::class, 'view']);
Route::get('/api-restfull', [ApiController::class, 'ViewRestfull']);
// Route::post('/store-api', [MSensorController::class, 'store'])->name('msensors.store');
Route::middleware('auth')->group(function () {
    Route::get('/index', [SensorLaravel::class, 'index'])->name('index');
    Route::get('/bacasuhu', [SensorLaravel::class, 'bacasuhu']);
    Route::get('/bacakelembapan', [SensorLaravel::class, 'bacakelembapan']);
    Route::get('/bacacuaca', [SensorLaravel::class, 'bacacuaca']);
    Route::get('/get-kid-status', [SensorLaravel::class, 'getKIDStatus'])->name('get-kid-status');
    Route::get('/apichart', [SensorLaravel::class, 'apiChart']);
    //route untuk menyimpan nilai sensor ke arduino
    Route::get('/simpan/{nilaisuhu}/{nilaikelembapan}', [SensorLaravel::class, 'simpansensor']);
});
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('actionlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('actionlogout');

// Forgte Password
Route::get('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->middleware('guest')->name('password.request');
Route::post('/forget-password', [ForgetPasswordController::class, 'postForgetPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'risetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgetPasswordController::class, 'postRisetPassword'])->middleware('guest')->name('password.update');
