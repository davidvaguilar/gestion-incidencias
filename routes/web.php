<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/seleccionar/proyecto/{id}', 'HomeController@selectProject');


Route::get('/reportar', 'IncidentController@create');
Route::post('/reportar', 'IncidentController@store');

Route::get('/incidencia/{id}/editar', 'IncidentController@edit');
Route::post('/incidencia/{id}/editar', 'IncidentController@update');

Route::get('/ver/{id}', 'IncidentController@show');

Route::get('/incidencia/{id}/atender', 'IncidentController@take');
Route::get('/incidencia/{id}/resolver', 'IncidentController@solve');
Route::get('/incidencia/{id}/abrir', 'IncidentController@open');
Route::get('/incidencia/{id}/derivar', 'IncidentController@nextLevel');
//Route::post('/reportar', 'IncidentController@store');


Route::post('/mensajes', 'MessageController@store');



Route::group( ['middleware' => 'admin', 'namespace' => 'Admin'], function(){
  Route::get('/usuarios', 'UserController@index');
  Route::post('/usuarios', 'UserController@store');
  Route::get('/usuario/{id}', 'UserController@edit');
  Route::post('/usuario/{id}', 'UserController@update');
  Route::get('/usuario/{id}/eliminar', 'UserController@delete');

  Route::get('/proyectos', 'ProjectController@index');
  Route::post('/proyectos', 'ProjectController@store');
  Route::get('/proyecto/{id}', 'ProjectController@edit');
  Route::post('/proyecto/{id}', 'ProjectController@update');
  Route::get('/proyecto/{id}/eliminar', 'ProjectController@delete');
  Route::get('/proyecto/{id}/restaurar', 'ProjectController@restore');

  Route::post('/categorias', 'CategoryController@store');
  Route::post('/categoria/editar', 'CategoryController@update');
  Route::get('/categoria/{id}/eliminar', 'CategoryController@delete');

  Route::post('/niveles', 'LevelController@store');
  Route::post('/nivel/editar', 'LevelController@update');
  Route::get('/nivel/{id}/eliminar', 'LevelController@delete');

  Route::post('/proyecto-usuario', 'ProjectUserController@store');
  Route::get('/proyecto-usuario/{id}/eliminar', 'ProjectUserController@delete');

  Route::get('/config', 'ConfigController@index');
});

?>
