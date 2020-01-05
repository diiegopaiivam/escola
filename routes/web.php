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
//ROTAS PARA PROFESSORES
Route::get('/admin/professores', 'HomeController@professores')->name('admin/professores');
Route::get('/admin/professores/cadastro', 'HomeController@cadastroProfessores')->name('admin/professores/cadastro');
Route::post('/admin/professores/cadastro', 'HomeController@storeProfessores');
Route::get('/admin/professores/editprofessor/{id}','HomeController@editProfessor');
Route::post('/admin/professores/updateProfessores/{id}','HomeController@updateProfessor');
Route::get('/admin/professores/{id}', 'HomeController@deleteProfessor');
//ROTAS PARA EVENTOS 
route::get('/admin/eventos', 'HomeController@getEventos')->name('admin/eventos'); 
route::get('/admin/eventos/cadastro','HomeController@cadastroEventos');
route::post('/admin/eventos/cadastro','HomeController@storeEventos');
