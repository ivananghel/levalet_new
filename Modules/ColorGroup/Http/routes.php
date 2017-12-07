<?php

Route::group(['middleware' => 'web', 'prefix' => 'parameters/colorgroup', 'namespace' => 'Modules\ColorGroup\Http\Controllers'], function()
{
    Route::get('/', 'ColorGroupController@index')->name('colorgroup.index')->middleware('auth');
    Route::post('/table', 'ColorGroupController@table')->name('colorgroup.table')->middleware('auth');
    Route::get('/create', 'ColorGroupController@create')->name('colorgroup.create')->middleware('auth');
    Route::post('/store', 'ColorGroupController@store')->name('colorgroup.store')->middleware('auth');
    Route::get('/{id}/edit/', 'ColorGroupController@edit')->name('colorgroup.edit')->middleware('auth');
    Route::post('/update/{id}', 'ColorGroupController@update')->name('colorgroup.update')->middleware('auth');
    Route::delete('/destroy/{id}', 'ColorGroupController@destroy')->name('colorgroup.c')->middleware('auth');
});
