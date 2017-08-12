<?php

Route::get('/', function () {
    return redirect('/login');
});

Route::get ('/login','LoginController@Index');
Route::post('/login','LoginController@Index');
Route::get ('/logout','LoginController@Logout');

Route::group(['middleware' => ['sesion']], function () {
    Route::get ('/inicio','LoginController@Init');

    Route::group(['prefix' => 'admin','namespace' => 'Admin'], function()
    {
        Route::get ('crearUsuario', 'AdminController@InitCrearUsuario');
        Route::post('crearUsuario', 'AdminController@InitCrearUsuario');
        Route::get ('verUsuario', 'AdminController@InitVerUsuario');
        Route::post('cambioEstado','AdminController@CambioEstadoUsuario');
    });

    Route::group(['prefix' => 'inventario','namespace' => 'Inv'], function ()
    {
        Route::get ('crearCategoria', 'InventarioController@InitCrearCategoria');
        Route::post('crearCategoria', 'InventarioController@InitCrearCategoria');

        Route::get ('crearArticulo', 'InventarioController@InitCrearArticulo');
        Route::post('crearArticulo', 'InventarioController@InitCrearArticulo');
    });
});