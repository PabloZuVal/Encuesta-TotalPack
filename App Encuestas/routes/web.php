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
Route::get('/encuesta/destroy/{id}', ['as' => 'encuesta.destroy', 'uses' => 'EncuestaController@destroy']); //ELIMINAR ENCUESTA 

//--------------------------------------------CRUD PREGUNTA CLASICA ------------------------------------------------------------------
Route::get('/preguntasclasicas/mostrar/{id}',['as' => 'preguntaclasica.index','uses' => 'PreguntaClasicaController@index']); //VISTA CRUD PRINCIPAL DE PREGUNTAS CLASICAS
Route::get('/preguntasclasicas/crear/{id}', ['as' => 'preguntaclasica.create', 'uses' => 'PreguntaClasicaController@create']); // CREAR ENCUESTA (FORMULARIO DE CREACION)
Route::post('/preguntasclasicas/{id}', ['as' => 'preguntaclasica.store', 'uses' => 'PreguntaClasicaController@store']); //GUARDAR Y REDIRECCIONAR
Route::get('/preguntasclasicas/{id}/editar', ['as' => 'preguntaclasica.edit', 'uses' => 'PreguntaClasicaController@edit']);
Route::put('/preguntasclasicas/{id}', ['as' => 'preguntaclasica.update', 'uses' => 'PreguntaClasicaController@update']);
Route::get('/preguntasclasicas/{id}/delete', ['as' => 'preguntaclasica.destroy', 'uses' => 'PreguntaClasicaController@destroy']); //desactivar pregunta

//-----------------ajax pregunta clasica--------------------

Route::get('/preguntas/ajax/', ['as' => 'preguntaclasica.create2', 'uses' => 'PreguntaClasicaController@create2']);
Route::get('/preguntas/ajax/editar', ['as' => 'preguntaclasica.edit2', 'uses' => 'PreguntaClasicaController@edit2']);



// ------------------------------------------------- RESPUESTAS ------------------------------------------------------------------------
Route::get('/respuestaclasica/mostrar/{id}',['as' => 'respuestaclasica.index','uses' => 'RespuestaClasicaController@index']); //VISTA CRUD PRINCIPAL DE PREGUNTAS CLASICAS
Route::get('/respuestaclasica/crear/{id}', ['as' => 'respuestaclasica.create', 'uses' => 'RespuestaClasicaController@create']); // CREAR ENCUESTA (FORMULARIO DE CREACION)
Route::post('/respuestaclasica/{id}', ['as' => 'respuestaclasica.store', 'uses' => 'RespuestaClasicaController@store']); //GUARDAR Y REDIRECCIONAR

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

//--------------------------------------------- SIMULACION -----------------------------------------------------------------

Route::get('/simulacion/encuestas', ['as' => 'simulacion.index', 'uses' => 'HomeController@simulacionIndex']);
Route::post('/simulacion/encuestas/Mostrar', ['as' => 'simulacion.show', 'uses' => 'HomeController@show']);


Route::post('insertarData','HomeController@insertarData');
//-------------------------------------------------------------------------------------------------------------------------