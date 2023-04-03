<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiSensorController;
use App\Http\Controllers\ApiController;
use App\Models\MSensor;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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

Route::get('/sensor', [ApiController::class, 'index']);
// Route::get('sensor', [ApiController::class, 'index']);
Route::get('/sensor/{id}', [ApiController::class, 'show']);
Route::get('/sensors/latest', [ApiController::class, 'latest']);
Route::get('/sensors/date_range', [ApiController::class, 'getByDateRange']);

// Route::post('/api-post', [ApiController::class, 'store']);
Route::post('post', [ApiController::class, 'store']);