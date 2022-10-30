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

// 首頁 已接上
Route::get('/', [ExperienceController::class, 'get_comment']); // 評論

Route::middleware('guest')->group(function () { // 遊客
    // 頁面測試
    Route::get('test', function () {
        dd("Testing");
    });

    // 使用者
    Route::patch('forget/revise/{id}', [UserController::class, 'password_revise']); // 修改密碼

    Route::get('pet-list', [PetController::class, 'pet_list']); // 寵物清單


    // 體驗
    Route::get('experience/experiencer-illustrate/card', [ExperienceController::class, 'get_all_experiences']); // 所有飼主體驗
    Route::get('experience/experiencer-illustrate/card/search', [ExperienceController::class, 'select_experiences']); // 體驗查詢
});

Route::middleware('auth')->group(function () { // 會員
    // 頁面測試
    Route::get('TEST', function () {
        dd("Testing");
    });

    // 使用者
    Route::get('member', [UserController::class, 'user_info']); // 會員資料
    Route::patch('member/reset-password/', [UserController::class, 'password_reset']); // 更改密碼

    // 寵物
    Route::delete('pet-list', [PetController::class, 'delete_pet']); // 刪除寵物

    // 體驗
    Route::get('experience/experiencer-illustrate/card/ex-pet-detail/ex-form', [ExperienceController::class, 'basic_info']); // 體驗申請
});