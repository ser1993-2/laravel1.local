<?php

Route::get('/',['uses'=>'HomeController@index','as'=>'home']);

Route::get('message/{id}/edit',['uses'=>'EditController@edit','as'=>'message.edit'])->where(['id'=>'[0-9]+']);

Route::get('message/{id}/delete',['uses'=>'DeleteController@delete','as'=>'message.delete'])->where(['id'=>'[0-9]+']);

Route::get('add',['uses'=>'HomeController@addIndex','as'=>'addIndex']);

Route::post('addClient',['uses'=>'AddController@add','as'=>'addClient']);

