<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/threads',[\App\Http\Controllers\ThreadsController::class,'index']);
Route::get('/threads/create',[\App\Http\Controllers\ThreadsController::class,'create']);
Route::post('/threads',[\App\Http\Controllers\ThreadsController::class,'store']);
Route::get('/threads/{threads}',[\App\Http\Controllers\ThreadsController::class,'show']);
//Route::resource('threads','\App\Http\Controllers\ThreadsController');
Route::post('/threads/{threads}/replies', [App\Http\Controllers\RepliesController::class,'store']);
