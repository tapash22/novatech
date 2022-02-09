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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'RegisterController@register');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout')->middleware('auth:sanctum'); 


Route::get('/partner', 'PartnerController@index');
Route::post('/partner/add', 'PartnerController@add');
Route::get('/partner/edit/{id}', 'PartnerController@edit');
Route::post('/partner/update/{id}', 'PartnerController@update');
Route::delete('/partner/delete/{id}', 'PartnerController@delete');

Route::get('/slider', 'SliderController@index');
Route::post('/slider/add', 'SliderController@add');
Route::delete('/slider/delete/{id}', 'SliderController@delete');

Route::get('/gallery', 'GalleryController@index');
Route::post('/gallery/add', 'GalleryController@add');
Route::delete('/gallery/delete/{id}', 'GalleryController@delete');

Route::get('/product', 'ProductController@index');
Route::post('/product/add', 'ProductController@add');
Route::delete('/product/delete/{id}', 'ProductController@delete');
Route::get('/product/products/{id}', 'ProductController@productsid');
Route::get('/product/antibiotic', 'ProductController@antibiotic');
Route::get('product/nutritional', 'ProductController@nutritional');

Route::get('product/harbal', 'ProductController@harbal');
Route::get('product/probiotics', 'ProductController@probiotics');
Route::get('product/anticoccidial', 'ProductController@anticoccidial');
Route::get('product/penathaone', 'ProductController@penathaone');
Route::get('product/antibiotics', 'ProductController@antibiotics');
Route::get('product/others', 'ProductController@others');

Route::post('/contacts/store','ContactController@store');