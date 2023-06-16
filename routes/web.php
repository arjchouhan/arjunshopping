<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\Dashboard;
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
    return view('login');
});
Route::post('/userlog', [Users::class, 'user_login']);

Route::get('users', [Users::class, 'index']);

Route::get('/registration', [Users::class, 'registration']);
Route::post('/users', [Users::class, 'user_register']);
