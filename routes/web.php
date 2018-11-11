<?php

Route::get('/',['uses'=>'HomeController@index','as'=>'home']);

Route::get('{id}/edit',['uses'=>'EditController@edit','as'=>'edit'])->where(['id'=>'[0-9]+']);

Route::get('{id}/delete',['uses'=>'DeleteController@delete','as'=>'message.delete'])->where(['id'=>'[0-9]+']);

Route::get('add',['uses'=>'HomeController@addIndex','as'=>'addIndex']);

Route::post('{id}/addClient',['uses'=>'AddController@add','as'=>'addClient'])->where(['id'=>'[0-9]+']);

Route::post('{u_id}/{a_id}/status',['uses'=>'StatController@editStat','as'=>'editAuto']);

