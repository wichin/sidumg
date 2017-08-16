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
        Route::get ('gestionLocal','AdminController@InitGestionLocal');
        Route::post('gestionLocal','AdminController@InitGestionLocal');
    });

    Route::group(['prefix' => 'inventario','namespace' => 'Inv'], function ()
    {
        Route::get ('crearCategoria', 'InventarioController@InitCrearCategoria');
        Route::post('crearCategoria', 'InventarioController@InitCrearCategoria');

        Route::get ('crearArticulo', 'InventarioController@InitCrearArticulo');
        Route::post('crearArticulo', 'InventarioController@InitCrearArticulo');

        Route::get ('ingresoProveedor','InventarioController@InitIngresoProveedor');
        Route::post('ingresoProveedor','InventarioController@InitIngresoProveedor');
        Route::get ('buscaArticulo','InventarioController@InitBuscaArticulo');

        Route::get ('trasladoArticulo','InventarioController@InitTrasladoArticulo');
        Route::post('trasladoArticulo','InventarioController@InitTrasladoArticulo');
        Route::get ('buscaArticuloLocal','InventarioController@InitBuscaArticuloLocal');
    });

    Route::group(['prefix' => 'factura','namespace' => 'Factura'], function ()
    {
        Route::get ('agregarAutorizacion', 'FacturaController@InitAgregarAutorizacion');
        Route::post('agregarAutorizacion', 'FacturaController@InitAgregarAutorizacion');
        
        Route::get ('crearCliente','FacturaController@InitCrearCliente');
        Route::post('crearCliente','FacturaController@InitCrearCliente');

        Route::get ('crearFactura','FacturaController@InitCrearFactura');
        Route::post('crearFactura','FacturaController@InitCrearFactura');
        Route::get ('buscarClienteNombre','FacturaController@InitBuscarClienteNombre');
        Route::get ('buscarClienteDoc','FacturaController@InitBuscarClienteDoc');
        Route::get ('buscaArticuloLocal','FacturaController@InitBuscaArticuloLocal');
    });
});