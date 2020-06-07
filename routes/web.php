<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin/index', 'HomeController@index')->name('index');

Route::group(['middleware' => ['auth']], function(){
    /**@TODO:
     * Aquí se colocan todas las rutas
     * esto hára que no se puedan acceder sin logearse
     */
    Route::get('home', ['as'=>'admin.index', 'uses'=>'HomeController@index']);

    
    Route::get('auth/profile', ['as'=>'user.profile', 'uses'=>'UserController@profile']);
    //Proveedores
    Route::get('admin/proveedor/listaproveedores',['as' =>'admin.proveedor.listaproveedores','uses'=>'AdminController@listaproveedores',]);
    Route::get('admin/proveedor/createproveedor',['as'=>'admin.proveedor.createproveedor','uses'=>'AdminController@createproveedor',]);
    Route::post('admin/proveedor/storeproveedor',['as'=>'admin.proveedor.storeproveedor', 'uses'=>'AdminController@storeproveedor',]);
    Route::get('admin/proveedor/{id}/editproveedor',['as' =>'admin.proveedor.editproveedor','uses'=>'AdminController@editproveedor',]);
    Route::patch('admin/proveedor/{id}', ['as' =>'admin.proveedor.updateproveedor','uses'=>'AdminController@updateproveedor',]);
    Route::get('admin/proveedor/{id}/deleteproveedor', ['as' =>'admin.proveedor.deleteproveedor','uses'=> 'AdminController@deleteproveedor',]);

    //Secciones
    Route::get('admin/seccion/listasecciones',['as' =>'admin.seccion.listasecciones','uses'=>'AdminController@listasecciones',]);
    Route::get('admin/seccion/createseccion',['as'=>'admin.seccion.createseccion','uses'=>'AdminController@createseccion',]);
    Route::post('admin/seccion/storeseccion',['as'=>'admin.seccion.storeseccion', 'uses'=>'AdminController@storeseccion',]);

    Route::get('admin/seccion/{id}/editseccion',['as' =>'admin.seccion.editseccion','uses'=>'AdminController@editseccion',]);
    Route::patch('admin/seccion/{id}', ['as' =>'admin.seccion.updateseccion','uses'=>'AdminController@updateseccion',]);
    Route::get('admin/seccion/{id}/deleteseccion', ['as' =>'admin.seccion.deleteseccion','uses'=> 'AdminController@deleteseccion',]);

    //Clientes
    Route::get('admin/cliente/listaclientes',['as' =>'admin.cliente.listaclientes','uses'=>'AdminController@listaclientes',]);
    Route::get('admin/cliente/createcliente',['as'=>'admin.cliente.createcliente','uses'=>'AdminController@createcliente',]);
    Route::post('admin/cliente/storecliente',['as'=>'admin.cliente.storecliente', 'uses'=>'AdminController@storecliente',]);
    Route::get('admin/cliente/{id}/editcliente',['as' =>'admin.cliente.editcliente','uses'=>'AdminController@editcliente',]);
    Route::patch('admin/cliente/{id}', ['as' =>'admin.cliente.updatecliente','uses'=>'AdminController@updatecliente',]);
    Route::get('admin/cliente/{id}/deletecliente', ['as' =>'admin.cliente.deletecliente','uses'=> 'AdminController@deletecliente',]);

    //Persona
    Route::get('admin/persona/listapersonas',['as' =>'admin.persona.listapersonas','uses'=>'AdminController@listapersonas',]);
    Route::get('admin/persona/createpersona',['as'=>'admin.persona.createpersona','uses'=>'AdminController@createpersona',]);
    Route::post('admin/persona/storepersona',['as'=>'admin.persona.storepersona', 'uses'=>'AdminController@storepersona',]);
    Route::get('admin/persona/{id}/editpersona',['as' =>'admin.persona.editpersona','uses'=>'AdminController@editpersona',]);
    Route::patch('admin/persona/{id}', ['as' =>'admin.persona.updatepersona','uses'=>'AdminController@updatepersona',]);
    Route::get('admin/persona/{id}/deletepersona', ['as' =>'admin.persona.deletepersona','uses'=> 'AdminController@deletepersona',]);

    //Producto
    Route::get('admin/producto/listaproductos',['as' =>'admin.producto.listaproductos','uses'=>'AdminController@listaproductos',]);
    Route::get('admin/producto/createproducto',['as'=>'admin.producto.createproducto','uses'=>'AdminController@createproducto',]);
    Route::post('admin/producto/storeproducto',['as'=>'admin.producto.storeproducto', 'uses'=>'AdminController@storeproducto',]);
    Route::get('admin/producto/{id}/editproducto',['as' =>'admin.producto.editproducto','uses'=>'AdminController@editproducto',]);
    Route::patch('admin/producto/{id}', ['as' =>'admin.producto.updateproducto','uses'=>'AdminController@updateproducto',]);
    Route::get('admin/producto/{id}/deleteproducto', ['as' =>'admin.producto.deleteproducto','uses'=> 'AdminController@deleteproducto',]);

    //Compras
    Route::get('admin/compras/registrar/{isGuardado}',['as' =>'admin.compra.index','uses'=>'CompraController@index',]);
    Route::post('admin/compras/store', ['as'=>'admin.compra.store', 'uses'=>'CompraController@store',]);

    //Ventas
    Route::get('admin/ventas/registrar/{isGuardado}',['as' =>'venta.index','uses'=>'VentaController@index',]);
    Route::post('admin/ventas/store', ['as'=>'venta.store', 'uses'=>'VentaController@store',]);

    //Reportes
    Route::get('report',['as' =>'report','uses'=>'AdminController@report',]);

});
