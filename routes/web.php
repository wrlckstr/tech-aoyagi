<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 管理者権限のみ
Route::group(['middleware'=>['auth','can:admin']],function(){
    // User画面
    Route::get('/user/index',[App\Http\Controllers\UserController::class,'index'])->name('user.index');
    Route::post('/user/edit',[App\Http\Controllers\UserController::class,'edit_koushin']);
    Route::get('/user/edit/{id}',[App\Http\Controllers\UserController::class,'edit']);
    Route::post('/destroy/{id}',[App\Http\Controllers\UserController::class,'destroy']);

});


Route::get('/items/index', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
Route::get('/items/detail/{id}',[App\Http\Controllers\ItemController::class,'detail']);
    
// 編集者のみ
Route::group(['middleware'=>['auth','can:editor']],function(){
    Route::get('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/items/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/items/edit/{id}',[App\Http\Controllers\ItemController::class,'edit']);
    Route::post('/items/edit',[App\Http\Controllers\ItemController::class,'kousin']);
    Route::post('/destroy1/{id}',[App\Http\Controllers\ItemController::class,'destroy1']);   
    }); 