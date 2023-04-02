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
    //$ActionClasses =User::where('username','amir')->first();
    //$ActionClasses = User::first();

    $user = User::all('_id')->find('642850a44b038ba5ec0cb9c6');
    $post = \App\Models\Post::all();
    dd($user->posts());
    // return view('welcome');
});
