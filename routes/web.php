<?php

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

Route::get('/userinfo/get/{firstname}/{lastname}/', 'MainController@get');
Route::post('/userinfo/add', 'MainController@add');


Route::get('/', function(){
	return new \Illuminate\Http\JsonResponse('page does`nt exists.', 404);
});

Route::get('/{any}', function(){
	return new \Illuminate\Http\JsonResponse('page does`nt exists.', 404);
})->where('any', '(.*)');