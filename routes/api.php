<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\ProductController;

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

// 회원가입
Route::post('/register', [AuthController::class, 'register']);

// 로그인
Route::post('/login', [AuthController::class, 'login']);

// 인증 체크
Route::middleware('auth:sanctum')->group(function () {
    // 유저 정보 수정
    Route::put('/user/update', [AuthController::class, 'update']);

    // 유저 삭제
    Route::delete('/user/destroy', [AuthController::class, 'destroy']);

    // 유저 로그아웃
    Route::post('/logout', [AuthController::class, 'logout']);

    // 상품 목록 조회
    Route::get('/products', [ProductController::class, 'index']);
    
    // 상품 상세 조회
    Route::get('/products/{id}', [ProductController::class, 'show']);

    // 관리자 계정 생성
    // Route::post('/user/create-admin', [AdminController::class, 'create']);
});


// 관리자 로그인
Route::post('/admin/login', [AdminController::class, 'login']);

// 관리자 전용 API
Route::middleware('auth:admin')->group(function () {
    // 상품 생성
    Route::resource('products', ProductController::class);
    // 카테고리 생성
    Route::resource('categories', ProductCategoryController::class);
});

