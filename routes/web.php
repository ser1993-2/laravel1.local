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

//Route::get('/', function () {
//    return view('pages.messages.index');
//});


Route::get('/',['uses'=>'HomeController@index','as'=>'home']);

Route::get('message/{id}/edit',['uses'=>'EditController@edit','as'=>'message.edit'])->where(['id'=>'[0-9]+']);

Route::get('message/{id}/delete',['uses'=>'DeleteController@delete','as'=>'message.delete'])->where(['id'=>'[0-9]+']);

Route::post('add',['uses'=>'AddController@add','as'=>'message.add']);

