<?php

/**
 * Contact form package routes.
 */
Route::get('contact', function () {
    return view('contact::contact');
});

Route::group(['namespace' => 'Robertgarrigos\Contact\Http\Controllers', 'middleware' => ['web']], function () {
    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@store')->name('contact');
});
