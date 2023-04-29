<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\FloorsController;
use App\Http\Controllers\HousesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ConversationsController;

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


Route::post('/Register', [AuthController::class, 'register']);
Route::post('/Login', [AuthController::class, 'Login']);
Route::get('/Houses/index', [HousesController::class,'index']);
Route::get('/Houses/index/{id}', [HousesController::class,'show']);
Route::post('/accept/{id}', [adminController::class,'accept']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('/Houses', HousesController::class);
    Route::apiResource('/Floors', FloorsController::class);
    Route::apiResource('/Rooms', RoomsController::class);
    Route::apiResource('/conversation', ConversationsController::class);
    Route::apiResource('/Messages', MessagesController::class);
    Route::apiResource('/messages', MessagesController::class);
    Route::apiResource('/conditions', ConditionController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
