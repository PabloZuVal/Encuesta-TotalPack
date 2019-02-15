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

//-------------------------------------------- CRUD SECCIONES (HACIENDO AHORA)-------------------------------------------------------------
Route::get('/secciones/mostrar/{id}',['as' => 'secciones.index','uses' => 'PaginaController@index']); //MOSTRAR CRUD Secciones (Se envia el id de encuesta)
Route::get('/secciones/crear/{id}',['as' => 'secciones.create','uses' => 'PaginaController@create']); //MOSTRAR Formulario Secciones (Se envia el id de encuesta)
Route::post('/secciones/{id}', ['as' => 'secciones.store', 'uses' => 'PaginaController@store']); //GUARDAR Y REDIRECCIONAR
Route::get('/secciones/{id}/editar', ['as' => 'secciones.edit', 'uses' => 'PaginaController@edit']); //alpha id_pregunta
Route::put('/secciones/{id}', ['as' => 'secciones.update', 'uses' => 'PaginaController@update']); //alpha id_pregunta
Route::get('/secciones/{id}', ['as' => 'secciones.destroy', 'uses' => 'PaginaController@destroy']); //inactivar respuesta

//-------------------------------------------- CRUD PREGUNTAS -------------------------------------------------------------

Route::get('/pregunta/mostrar/{id}',['as' => 'pregunta.index','uses' => 'PreguntaController@index']); //MOSTRAR CRUD PREGUNTAS (Se envia el id de pagina/seccion)

Route::get('/pregunta/crear/{id}', ['as' => 'pregunta.create', 'uses' => 'PreguntaController@create']); //CREAR PREGUNTA (FORMULARIO DE CREACION)
Route::post('/pregunta/{id}', ['as' => 'pregunta.store', 'uses' => 'PreguntaController@store']); //GUARDAR Y REDIRECCIONAR
Route::get('/pregunta/{id}/editar', ['as' => 'pregunta.edit', 'uses' => 'PreguntaController@edit']); //alpha id_pregunta
Route::put('/pregunta/{id}', ['as' => 'pregunta.update', 'uses' => 'PreguntaController@update']); //alpha id_pregunta
Route::delete('/pregunta/{id}', ['as' => 'pregunta.destroy', 'uses' => 'PreguntaController@destroy']); //ELIMINAR ENCUESTA



//--------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------CRUD PREGUNTAS CHECKBOX --------------------------------------------------------

Route::get('/preguntaCheck/mostrar/{id}', ['as' => 'preguntaCheck.index', 'uses' => 'PreguntaCheckController@index']);
Route::get('/preguntaCheck/crear/{id}', ['as' => 'preguntaCheck.create', 'uses' => 'PreguntaCheckController@create']);
Route::post('/preguntaCheck/{id}', ['as' => 'preguntaCheck.store', 'uses' => 'PreguntaCheckController@store']); //GUARDAR Y REDIRECCIONAR