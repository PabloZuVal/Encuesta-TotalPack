<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/adm', 'HomeController@admininstall')->name('admInstall'); //por hacer (NO ELIMINAR)

//-------------------------------------------- CRUD ENCUESTAS -------------------------------------------------------------
Route::get('/encuestas/gestor',['as' => 'encuesta.gestor','uses' => 'EncuestaController@gestor']); //VISTA CRUD PRINCIPAL DE ENCUESTAS

Route::get('/encuestas/mostrar',['as' => 'encuesta.index','uses' => 'EncuestaController@index']); //MOSTRAR
Route::get('/encuesta/crear', ['as' => 'encuesta.create', 'uses' => 'EncuestaController@create']); // CREAR ENCUESTA (FORMULARIO DE CREACION)
Route::post('/encuesta', ['as' => 'encuesta.store', 'uses' => 'EncuestaController@store']); //GUARDAR Y REDIRECCIONAR
Route::get('/encuesta/{id}', ['as' => 'encuesta.show', 'uses' => 'EncuestaController@show']); //MOSTRAR DATOS DE ENCUESTA POR ID
Route::get('/encuesta/{id}/editar', ['as' => 'encuesta.edit', 'uses' => 'EncuestaController@edit']); //EDITAR ENCUESTA
Route::put('/encuesta/{id}', ['as' => 'encuesta.update', 'uses' => 'EncuestaController@update']); //ACTUALIZAR Y REDIRECCIONAR ENCUESTA
Route::delete('/encuesta/{id}', ['as' => 'encuesta.destroy', 'uses' => 'EncuestaController@destroy']); //ELIMINAR ENCUESTA


//-------------------------------------------- CRUD PREGUNTAS -------------------------------------------------------------

Route::get('/preguntas/gestor/{id}',['as' => 'pregunta.gestor','uses' => 'PreguntaController@gestor']); //VISTA CRUD PRINCIPAL DE PREGUNTAS (SE ENVIA EL ID DE LA ENCUESTA)

Route::get('/pregunta/crear/{id}', ['as' => 'pregunta.create', 'uses' => 'PreguntaController@create']); //CREAR PREGUNTA (FORMULARIO DE CREACION)
Route::post('/pregunta/{id}', ['as' => 'pregunta.store', 'uses' => 'PreguntaController@store']); //GUARDAR Y REDIRECCIONAR
Route::get('/pregunta/{id}/editar', ['as' => 'pregunta.edit', 'uses' => 'PreguntaController@edit']); //alpha
Route::put('/pregunta/{id}', ['as' => 'pregunta.update', 'uses' => 'PreguntaController@update']); //alpha

