<?php

use App\Http\Controllers\Api\CollectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::ApiResource('/collector', 'App\Http\Controllers\Api\CollectorController');
Route::ApiResource('/sector', 'App\Http\Controllers\Api\SectorController');

Route::post('/assign-col-sec', [App\Http\Controllers\Api\CollectorController::class, 'assignCollector']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



