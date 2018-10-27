<?php

Route::post('fatoni/generate/api', array('as' => 'fatoni.generate.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@generateApi'));
Route::post('fatoni/update/api/{id}', array('as' => 'fatoni.update.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@updateApi'));
Route::get('fatoni/delete/api/{id}', array('as' => 'fatoni.delete.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@deleteApi'));


Route::resource('api/v1/getReceipt', 'AhmadFatoni\ApiGenerator\Controllers\API\getReceiptsController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/getReceipt/{id}/delete', ['as' => 'api/v1/getReceipt.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\getReceiptsController@destroy']);

Route::resource('api/v1/getItems', 'AhmadFatoni\ApiGenerator\Controllers\API\getItemsController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/getItems/{id}/delete', ['as' => 'api/v1/getItems.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\getItemsController@destroy']);

