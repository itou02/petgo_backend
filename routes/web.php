<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// Route::middleware('token')->group(function () {
//     Route::get('/dashboard', function (Request $request) {
//         return response()->json([
//             'status' => '已登錄',
//             'user' =>$request['userData']->name,
//         ]);
//     });
// });

require __DIR__.'/auth.php';
