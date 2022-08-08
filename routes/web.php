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
    return view('index');
});

Route::get('home', function () {
    return view('home');
});

// memanggil function dari controller tertentu
Route::get('product', 'App\Http\Controllers\ProductController@data');
Route::get('product/add', 'App\Http\Controllers\ProductController@add');
Route::post('product', 'App\Http\Controllers\ProductController@addProcess');
Route::get('product/edit/{id}', 'App\Http\Controllers\ProductController@edit');
Route::patch('product/{id}', 'App\Http\Controllers\ProductController@editProcess');
Route::delete('product/{id}', 'App\Http\Controllers\ProductController@delete');

Route::resource('categories', 'App\Http\Controllers\CategoryController');
Route::resource('token', 'App\Http\Controllers\TokenController');
