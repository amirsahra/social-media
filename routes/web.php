<?php

use App\Models\Profile;
use App\Models\User;
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

    /*$ActionClasses = User::create([
        'username' => 'amir',
        'email' => 'amir@example.com',
        'profile' => [
            'first_name' => 'amir hossein',
            'last_name' => 'sahranavard',
        ],
    ]);*/

    $user = new User();
    $user->username = 'amir';
    $user->email = 'john@example.com';

    $profile = new Profile();
    $profile->first_name = 'qaz';
    $profile->last_name = 'male';
    $user->save();
    $user->profile()->save($profile);
    dd($user);
});

Route::get('/t', function () {
    //$ActionClasses =User::where('username','amir')->first();
    //$ActionClasses = User::first();

    $user = User::all('_id')->find('642850a44b038ba5ec0cb9c6');
    $post = \App\Models\Post::all();
    dd($user->posts());
    // return view('welcome');
});
