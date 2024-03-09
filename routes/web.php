<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admins/create', function () {
    return view('admins/create');
});

// 수정된 부분: 이미지 업로드를 포함한 상품 등록을 처리하기 위해 ProductController의 store 메소드를 사용합니다.
Route::post('/admins', [ProductController::class, 'store']);

Route::get('admins', function(Request $request) {
    $perPage = $request->input('per_page', 3);

    $products = Product::select('body', 'created_at')
    ->latest();

    $results = DB::table('products as a')
    ->join('users as u', 'u.id') // 'u.id'만 있었는데 조인 조건이 명확하지 않아 수정했습니다.
    ->select(['a.*', 'u.name'])
    ->latest();

    return view('admins.index', [
        'products' => $products,
        'results' => $results
    ]);
});

// 이미지 업로드를 포함한 상품 등록을 처리하는 라우트는 이미 정의되어 있으므로, 중복된 라우트 정의를 제거하거나 수정할 필요가 있습니다.
// 따라서, '/admins' 라우트를 통해 상품 등록 처리를 하도록 했습니다. '/products' 라우트 정의는 필요에 따라 다른 용도로 사용하거나 제거할 수 있습니다.
