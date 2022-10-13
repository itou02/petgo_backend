<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ExperienceController;

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

Route::middleware('guest')->group(function () {
    // 頁面測試
    Route::get('test', function () {
        dd("Testing");
    });

    // 首頁
    Route::get('/', [ExperienceController::class, 'get_comment']);

    // 使用者
    Route::patch('forget/revise/{id}', [UserController::class, 'password_revise']);

    // 體驗
    Route::get('experience', [ExperienceController::class, 'get_all_experiences']);
});

Route::middleware('auth')->group(function () {
    // 頁面測試
    Route::get('TEST', function () {
        dd("Testing");
    });

    // 使用者
    Route::get('member', [UserController::class, 'user_info']);
    Route::patch('member/reset-password/{id}', [UserController::class, 'password_reset']);
});
