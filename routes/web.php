<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\MainsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductdetailController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Backend\CartsController;
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
    return view('Admin.user.Login');
});
Route::get('/Admin.user.Login', function () {
    return 'test';
})->name('user');
Route::get('product', function () {
    return 'test det';
});
Route::get('newss', function () {
    return 'test det';
});
//Dieu kien
Route::get('newss/{id}', function ($id) {
    return "bài viết số ${id}";
});
Route::get('User/produc', function () {
    return view('User/produc');
})->name('products.index');
Route::prefix('backend')->namespace('App\Http\Controllers\Backend')->group(function () {
    Route::get('User-management', 'UsersController@index')->name('user.index');
    Route::get('Product-management', 'ProductController@index');
    Route::get('Category-management', 'CategoryController@index');
    Route::get('news-management', 'NewController@index');
    Route::get('Login-management', 'LoginController@index');
    Route::post('store', 'LoginController@store')->name('login.store');
});
Route::get('main', [MainController::class, 'index'])->name('admin');
Route::get('detail/{id}', [UsersController::class, 'detail'])->name('user.detail');
Route::get('delete/{id}', [UsersController::class, 'delete'])->name('user.delete');
Route::get('edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::post('update/{id}', [UsersController::class, 'update'])->name('user.update');
Route::get('create', [UsersController::class, 'create'])->name('user.create');
Route::post('store', [UsersController::class, 'store'])->name('user.store');
// Route::post('store', [LoginController::class, 'store'])->name('login.store');
//    Route::post('store', [LoginController::class , 'store'])->name('login.store');
// Route::post('store', 'App\Http\Controllers\Backend\LoginController@store')->name('login.store');
// Route::get('add', [MenuController::class, 'create'])->name('menu.create');
Route::get  ('add-menu', 'App\Http\Controllers\Backend\MenuController@create')->name('menu.create');
Route::post('store-menu', [MenuController::class,'store'])->name('menu.store');
// Route::post('store', [MenuController::class, 'store'])->name('menu.store');
Route::get('index', [MenuController::class, 'index'])->name('menu.index');
Route::get('delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');
Route::get('edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');

Route::get('update/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::post('update/{id}','App\Http\Controllers\Backend\MenuController@update')->name('menu');


Route::get('add-product', [ProductController::class, 'create'])->name('product.create');
Route::post('store-product', [ProductController::class, 'store'])->name('product.store');
Route::get('index-product', [ProductController::class, 'index'])->name('product.index');
Route::get('deletes/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('edits/{id}',   [ProductController::class, 'edit'])->name('product.edit');
Route::post('updates/{id}', [ProductController::class, 'update'])->name('product.update');
//    Route::get('main','App\Http\Controllers\Backend\MainController@index')->name('admin');
    //  Route::get('main', [MainController::class , 'index'])->name('admin');
   //Login

Route::post('store-slider', [SliderController::class, 'store'])->name('Slider.store');
Route::get('add-Slider',    [SliderController ::class ,'create'] )->name('Slider.create');
Route::get('index-Slider', [SliderController::class, 'index'])->name('Slider.index');
Route::get('deletet/{id}', [SliderController::class, 'delete'])->name('Slider.delete');
Route::get('editt/{id}',   [SliderController::class, 'edit'])->name('Slider.edit');
Route::post('updatet/{id}', [SliderController::class, 'update'])->name('Slider.update');

Route::post('store-productdetailider', [ProductdetailController::class, 'store'])->name('productdetailider.store');
Route::get('add-productdetailider',    [ProductdetailController ::class ,'create'] )->name('productdetailider.create');
Route::get('customers-index', [ProductdetailController::class, 'index'])->name('productdetailider.index');
Route::get('deleteq/{id}', [ProductdetailController::class, 'delete'])->name('productdetailider.delete');
Route::get('editq/{id}',   [ProductdetailController::class, 'edit'])->name('productdetailider.edit');
Route::post('updatetq/{id}', [ProductdetailController::class, 'update'])->name('productdetailider.update');

Route::post('admin/upload/services',[\App\Http\Controllers\Backend\UploadController ::class , 'store'] );

// Client $_COOKIE

Route::get('client-main', [MainsController::class, 'index'])->name('client');

Route::get('Category/{id}{slug}.html',[CategoryController::class,'index']);
Route::get('san-pham/{id}{slug}.html',[ProductsController::class,'index']);


Route::post('add-cart','App\Http\Controllers\CartsController@index');
Route::get('carts', 'App\Http\Controllers\CartsController@show');
Route::post('update-cart', 'App\Http\Controllers\CartsController@update');
Route::get('carts/delete/{id}', 'App\Http\Controllers\CartsController@remove');
Route::post('cartss',  'App\Http\Controllers\CartsController@addCart')->name('vs');



Route::get('customers/view/{customer}','App\Http\Controllers\Backend\CartsController@show')->name('f');
Route::get('customers-index', 'App\Http\Controllers\Backend\CartsController@index')->name('s');
Route::post('update-status/{id}', 'App\Http\Controllers\Backend\CartsController@updateStatus')->name('admin.orders.update_status')->middleware('list-order');


Route::get('order/{id}','App\Http\Controllers\CheckoutController@show')->name('m');
Route::get('order-index', 'App\Http\Controllers\CheckoutController@index')->name('q');
Route::get('delet/{id}',  'App\Http\Controllers\CheckoutController@delete')->name('d');
Route::post('update/{id}',  'App\Http\Controllers\CheckoutController@update')->name('u');
Route::post('search',  'App\Http\Controllers\CheckoutController@search')->name('z');
Route::get('about',  'App\Http\Controllers\CheckoutController@abouts')->name('a');
Route::get('contact',  'App\Http\Controllers\CheckoutController@contact')->name('c');



Route::post('store-coments','App\Http\Controllers\CheckoutController@store')->name('c.store');
Route::get('add-coment',    'App\Http\Controllers\CheckoutController@create' )->name('m.create');