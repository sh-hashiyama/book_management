<?php
Route::group(['middleware' => ['auth']], function () {
    Route::get('/book', 'Api\BookController@index');
    Route::get('/book/search', 'Api\BookController@search');
    Route::get('book/isRegistered/{isbn}', 'Api\BookController@isRegistered')->where('isbn', '[0-9]+');
    Route::post('/book/register', 'Api\BookController@store');
    Route::patch('/book/update', 'Api\BookController@update');
});
