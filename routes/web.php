<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\Products;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Carts;
use App\Http\Controllers\Orders;
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

Route::get('/', function(){
    return view('login');
});
Route::get('users', [Users::class, 'index']);
Route::get('/login_page', [Users::class, 'login_page'])->name('user.login_page');
Route::post('/userlog', [Users::class, 'user_login']);
Route::get('/registration', [Users::class, 'registration'])->name('user.registration');
Route::post('/users', [Users::class, 'user_register']);

Route::get('/dashboard', [Dashboard::class, 'index'])->name('user.dashboard');

Route::get('/userProfile', [Dashboard::class, 'userProfile'])->name('user.profile');

Route::get('/logout', [Users::class, 'logout_page'])->name('user.logout_page');


Route::get('/adduser', [Users::class, 'adduser'])->name('user.adduser');
Route::post('/insert_newuser', [Users::class, 'insert_newuser'])->name('user.insert_newuser');
Route::get('/userlist', [Users::class, 'userlist'])->name('user.userlist');

Route::get('/edituser/{id}', [Users::class, 'edituser'])->name('user.edituser');
Route::post('/update_user/{id}', [Users::class, 'update_user'])->name('user.update_user');

Route::get('/deleteuser/{id}', [Users::class, 'deleteuser'])->name('user.deleteuser');


Route::get('/addproduct', [Products::class, 'addproduct'])->name('product.addproduct');
Route::post('/insertproduct', [Products::class, 'insertproduct'])->name('product.insertproduct');

Route::get('/editproduct/{id}', [Products::class, 'editproduct'])->name('product.editproduct');
Route::post('/update_product/{id}', [Products::class, 'update_product'])->name('product.update_product');

Route::get('/deleteproduct/{id}', [Products::class, 'deleteproduct'])->name('product.deleteproduct');
Route::get('/productlist', [Products::class, 'productlist'])->name('product.productlist');

Route::get('/productDetail/{id}', [Products::class, 'productDetail'])->name('product.productDetail');

Route::get('/addcart/{id}', [Carts::class, 'addcart'])->name('cart.addcart');

Route::get('/cartlist', [Carts::class, 'cartlist'])->name('cart.cartlist');

Route::get('/qtyIncr/{id}', [Carts::class, 'qtyIncr'])->name('cart.qtyIncr');
Route::get('/qtyDecr/{id}', [Carts::class, 'qtyDecr'])->name('cart.qtyDecr');

Route::get('/removeItem/{id}', [Carts::class, 'removeItem'])->name('cart.removeItem');

Route::get('/order', [Orders::class, 'order'])->name('cart.order');
Route::post('/orderplace', [Orders::class, 'orderplace'])->name('cart.orderplace');
Route::get('/orderlist', [Orders::class, 'orderlist'])->name('order.orderlist');


Route::get('generatePDF/{order_id}', [Orders::class, 'generatePDF'])->name('order.generatePDF');
