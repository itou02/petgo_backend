<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\PetController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SharedController;
use App\Http\Controllers\Api\AnotherController;


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

// 首頁 已接上
Route::get('/', [ExperienceController::class, 'get_comment']); // 評論

Route::get('csrf_token' ,function () {
    return response()->json([
        'csrftoken' => csrf_token(),
    ]);
});//測試取csrftoken

Route::post('getarea',[AnotherController::class, 'getareas']);//地區下拉

Route::middleware('guest')->group(function () {///////////////////////////////////////////////////遊客
    // 頁面測試
    Route::get('test/{id}',  function () {
        dd('ret');
    });
    Route::get('test', function () {
        dd(Auth::user());
    });
    

    // 使用者
    Route::patch('forget/revise/{id}', [UserController::class, 'password_revise']); // 修改密碼

    // 體驗
    Route::get('experience/experiencer-illustrate/card', [ExperienceController::class, 'get_all_experiences']); // 所有飼主體驗
    Route::get('experience/experiencer-illustrate/card/search', [ExperienceController::class, 'select_experiences']); // 體驗查詢
});

Route::middleware('auth')->group(function () { /////////////////////////////////////////////////// 會員
    // 頁面測試
    Route::get('TEST', function () {
        dd("Testing");
    });

    // 使用者
    Route::get('member', [UserController::class, 'user_info']); // 會員資料
    Route::patch('member/reset-password/', [UserController::class, 'password_reset']); // 更改密碼
    Route::get('mycomment',[CommentController::class, 'index']);//我的評論
    // Route::get('comment/ex-pet-detail');//我的評論/體驗寵物詳細資料
    Route::get('rearing-pet',[UserController::class, 'rearing_pet']);//自身經歷讀取
    //Route::patch();
    // Route::get();

    // 寵物
    Route::get('pet-list', [PetController::class, 'pet_list']); // 寵物清單

    // 體驗
    Route::get('experience/experiencer-illustrate/card/ex-pet-detail/ex-form', [ExperienceController::class, 'basic_info']); // 體驗申請

    //共養
    Route::get('share-already-login',[SharedController::class, 'index']);//共養首頁
});
