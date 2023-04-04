<?php

use Amirsahra\Illustrator\Facade\Illustrator;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
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

Route::post('/upload',function (\Illuminate\Http\Request $request){
    Illustrator::upload($request->imageInput);

    return Redirect::back()->with(['msg' => 'successfully']);
})->name('uploadImage');

Route::get('/t', function () {
   dd(\Illuminate\Support\Facades\Response::apiResult('hi'));
       //->data(['amir'=>'sahra'])
       //->build());
});
