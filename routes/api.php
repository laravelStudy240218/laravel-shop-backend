<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Certification\ClientCertController;
use App\Http\Controllers\Certification\UserCertController;

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

//client 선 인증(IP)
Route::post('/cert/client',[ClientCertController::class,'certification']);

//client 인가 후 유저 인증
Route::middleware(\App\Http\Middleware\AuthorizationClient::class)->get('/cert/user',[UserCertController::class,'certification']);
