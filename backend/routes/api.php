<?php

use App\Http\Controllers\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\V1\Auth\LoginController;
use App\Http\Controllers\V1\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/ActionClasses', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'','name'=>'','middleware'=>'auth:sanctum'],function (){
    Route::post('logout',[LoginController::class,'logout']);
});

Route::post('login',[LoginController::class,'login']);
Route::post('register',[RegisterController::class,'register']);

Route::group(['prefix'=>'password/','as'=>'password.'],function (){
    Route::post('forgot',ForgotPasswordController::class)->name('forgot');
    Route::post('reset',ForgotPasswordController::class)->name('reset');
});

