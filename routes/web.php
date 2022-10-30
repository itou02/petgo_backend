<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return response()->json([
        'status' => '已登錄',
        'user' =>Auth::user()->name,
    ]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('guest')->group(function () {
Route::patch('forget/revise/{id}', [UserController::class, 'password_revise']);
});

require __DIR__ . '/auth.php';
