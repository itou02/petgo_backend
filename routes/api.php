<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\PetController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/',[ExperienceController::class, 'get_comment'])->middleware('cors') ;

Route::middleware('cors')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::middleware('guest')->group(function () { //遊客
    // 頁面測試
        Route::get('test', function () {
            dd("Testing");
            // return ['message'=>'hello'];
        });

        Route::get('pets', [PetController::class, 'index']); //我的寵物清單讀取


        // 首頁 已接上 缺圖片
        Route::get('/', [ExperienceController::class, 'get_comment']);

        // 使用者
        Route::patch('forget/revise/{id}', [UserController::class, 'password_revise']); //修改密碼

    });
    Route::middleware('auth')->group(function () { //使用者
        //使用者->寵物
        // Route::get('pets', [PetController::class, 'index']); //我的寵物清單讀取

        // 首頁 已接上 缺圖片
        Route::get('/Home', [ExperienceController::class, 'get_comment']);
        
        //使用者
        Route::get('member', [UserController::class, 'user_info']); //會員資料
        Route::patch('member/reset-password/{id}', [UserController::class, 'password_reset']);

        //體驗
        Route::get('Experience/experiencer-illustrate/card', [ExperienceController::class, 'get_all_experiences']); //清單讀取
    });
});