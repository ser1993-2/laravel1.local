<?php


Route::post('{u_id}/{a_id}/editAuto',['uses'=>'ClientController@editAuto','as'=>'editAuto']);

//---------------------------------------------------
Route::get('/',['uses'=>'HomeController@index','as'=>'home']);
Route::get('add',['uses'=>'HomeController@addIndex','as'=>'addIndex']);
Route::get('{id}/edit',['uses'=>'HomeController@edit','as'=>'edit'])->where(['id'=>'[0-9]+']);
Route::get('{id}/{number}/deleteAuto',['uses'=>'ClientController@deleteAuto','as'=>'deleteAuto']);

Route::post('{id}/addAuto',['uses'=>'ClientController@addAuto','as'=>'addAuto'])->where(['id'=>'[0-9]+']);
Route::post('{id}/editClient',['uses'=>'ClientController@editClient','as'=>'editClient'])->where(['id'=>'[0-9]+']);
Route::post('addClient',['uses'=>'ClientController@addClient','as'=>'addClient']);

Route::get('brandSearch',['uses'=>'HomeController@brandSearch','as'=>'brandSearch']);
Route::get('background',['uses'=>'HomeController@background','as'=>'background']);
Route::post('authLogin',['uses'=>'ClientController@authLogin','as'=>'authLogin']);
Route::get('LogOut',['uses'=>'ClientController@LogOut','as'=>'LogOut']);
Auth::routes();

Route::get('/home', 'HomeController@index');
