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

Route::get('/', 'collectionController@collectionAction');

Route::get('/product/{id}','productController@productAction');

Route::post('/cart','cartController@adtocartAction');
Route::get('/cart','cartController@adtocartAction');
Route::post('/cart/minusform','cartController@minusformAction');
Route::post('/cart/plusform','cartController@plusformAction');
Route::post('/cart/delete','cartController@deleteformAction');

Route::get('/cartajax','cartController@cartajaxAction');
Route::post('/cartajax/minus','cartController@updateMinusajaxAction');
Route::get('/cartajax/minus','cartController@updateMinusajaxAction');
Route::post('/cartajax/plus','cartController@updatePlusajaxAction');
Route::get('/cartajax/plus','cartController@updatePlusajaxAction');
Route::post('/cartajax/deleteajax','cartController@deleteajaxAction');
Route::get('/cartajax/deleteajax','cartController@deleteajaxAction');
