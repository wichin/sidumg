<?php

Route::get('/', function () {
    return redirect('/login');
});



Route::get ('/login','LoginController@Index');
Route::post('/login','LoginController@Index');


Route::group(['middleware' => ['sesion']], function () {
    Route::get ('/inicio','LoginController@Init');
});

Route::get('/logout','LoginController@Logout');


/*
Route::get('/', function () {
    return view('layout.master');
});
*/