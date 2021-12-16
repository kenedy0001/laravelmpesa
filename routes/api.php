<?php

use App\Http\Controllers\B2cController;
use App\Http\Controllers\LnmonlineController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('v1/stk/push',[LnmonlineController::class, 'customerMpesaSTKPush']);
Route::post('v1/access/token', [LnmonlineController::class, 'generateAccessToken']);
Route::post('v1/trans/validation', [B2cController::class , 'mpesaValidation']);
Route::post('v1/trans/confirmation', [B2cController::class, 'mpesaConfirmation']);
Route::post('v1/trans/register/url', [B2cController::class, 'mpesaRegisterUrls');