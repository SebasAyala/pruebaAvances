<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('productos', 'ProductController@index')->name('product.index');
Route::post('productos/crear', 'ProductController@store')->name('product.store');
Route::get('productos/{id}', 'ProductController@show')->name('product.show');
Route::post('productos/{id}/editar', 'ProductController@update')->name('product.update');

Route::get('bodegas', 'WarehouseController@index')->name('warehouse.index');