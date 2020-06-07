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
Route::get('home', ['as'=>'admin.index', 'uses'=>'HomeController@index']);

Route::name('imprimir')->get('/imprimir', 'AdminController@imprimir');

$router->get('report',['as' =>'report','uses'=>'AdminController@report',]);


//Proveedores
$router->get('admin/proveedor/listaproveedores',['as' =>'admin.proveedor.listaproveedores','uses'=>'AdminController@listaproveedores',]);

$router->get('admin/proveedor/createproveedor',['as'=>'admin.proveedor.createproveedor','uses'=>'AdminController@createproveedor',]);

$router->post('admin/proveedor/storeproveedor',['as'=>'admin.proveedor.storeproveedor', 'uses'=>'AdminController@storeproveedor',]);

$router->get('admin/proveedor/{id}/editproveedor',['as' =>'admin.proveedor.editproveedor','uses'=>'AdminController@editproveedor',]);

$router->patch('admin/proveedor/{id}', ['as' =>'admin.proveedor.updateproveedor','uses'=>'AdminController@updateproveedor',]);

$router->get('admin/proveedor/{id}/deleteproveedor', ['as' =>'admin.proveedor.deleteproveedor','uses'=> 'AdminController@deleteproveedor',]);

//Secciones
$router->get('admin/seccion/listasecciones',['as' =>'admin.seccion.listasecciones','uses'=>'AdminController@listasecciones',]);

$router->get('admin/seccion/createseccion',['as'=>'admin.seccion.createseccion','uses'=>'AdminController@createseccion',]);

$router->post('admin/seccion/storeseccion',['as'=>'admin.seccion.storeseccion', 'uses'=>'AdminController@storeseccion',]);

$router->get('admin/seccion/{id}/editseccion',['as' =>'admin.seccion.editseccion','uses'=>'AdminController@editseccion',]);

$router->patch('admin/seccion/{id}', ['as' =>'admin.seccion.updateseccion','uses'=>'AdminController@updateseccion',]);

$router->get('admin/seccion/{id}/deleteseccion', ['as' =>'admin.seccion.deleteseccion','uses'=> 'AdminController@deleteseccion',]);

//Clientes
$router->get('admin/cliente/listaclientes',['as' =>'admin.cliente.listaclientes','uses'=>'AdminController@listaclientes',]);

$router->get('admin/cliente/createcliente',['as'=>'admin.cliente.createcliente','uses'=>'AdminController@createcliente',]);

$router->post('admin/cliente/storecliente',['as'=>'admin.cliente.storecliente', 'uses'=>'AdminController@storecliente',]);

$router->get('admin/cliente/{id}/editcliente',['as' =>'admin.cliente.editcliente','uses'=>'AdminController@editcliente',]);

$router->patch('admin/cliente/{id}', ['as' =>'admin.cliente.updatecliente','uses'=>'AdminController@updatecliente',]);

$router->get('admin/cliente/{id}/deletecliente', ['as' =>'admin.cliente.deletecliente','uses'=> 'AdminController@deletecliente',]);

//Persona
$router->get('admin/persona/listapersonas',['as' =>'admin.persona.listapersonas','uses'=>'AdminController@listapersonas',]);

$router->get('admin/persona/createpersona',['as'=>'admin.persona.createpersona','uses'=>'AdminController@createpersona',]);

$router->post('admin/persona/storepersona',['as'=>'admin.persona.storepersona', 'uses'=>'AdminController@storepersona',]);

$router->get('admin/persona/{id}/editpersona',['as' =>'admin.persona.editpersona','uses'=>'AdminController@editpersona',]);

$router->patch('admin/persona/{id}', ['as' =>'admin.persona.updatepersona','uses'=>'AdminController@updatepersona',]);

$router->get('admin/persona/{id}/deletepersona', ['as' =>'admin.persona.deletepersona','uses'=> 'AdminController@deletepersona',]);

//Producto
$router->get('admin/producto/listaproductos',['as' =>'admin.producto.listaproductos','uses'=>'AdminController@listaproductos',]);

$router->get('admin/producto/createproducto',['as'=>'admin.producto.createproducto','uses'=>'AdminController@createproducto',]);

$router->post('admin/producto/storeproducto',['as'=>'admin.producto.storeproducto', 'uses'=>'AdminController@storeproducto',]);

$router->get('admin/producto/{id}/editproducto',['as' =>'admin.producto.editproducto','uses'=>'AdminController@editproducto',]);

$router->patch('admin/producto/{id}', ['as' =>'admin.producto.updateproducto','uses'=>'AdminController@updateproducto',]);

$router->get('admin/producto/{id}/deleteproducto', ['as' =>'admin.producto.deleteproducto','uses'=> 'AdminController@deleteproducto',]);


Route::group(['middleware' => ['auth']], function(){
    /**@TODO:
     * Aquí se colocan todas las rutas
     * esto hára que no se puedan acceder sin logearse
     */
    Route::get('auth/profile', ['as'=>'user.profile', 'uses'=>'UserController@profile']);



});
