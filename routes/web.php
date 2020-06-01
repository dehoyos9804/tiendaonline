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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){
    /**@TODO:
     * Aquí se colocan todas las rutas
     * esto hára que no se puedan acceder sin logearse
     */
    Route::get('auth/profile', ['as'=>'user.profile', 'uses'=>'UserController@profile']);
});
