<?php

namespace App\Http\Controllers;

use DB;
use App\pagina;
use App\Encuesta as Encuesta;
use App\pagina as Paginaa;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) //id de encuesta
    {
        $paginas = Paginaa::all();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); // Todo OK
        return view('Secciones.secciones',compact('encuestaa','paginas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) //recibo el id de la encuesta (la seccion recien la estoy creando)
    {
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); //agregado
        return view('Secciones.create',compact('encuestaa')); // enviar al index de preguntas
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id) 
    {
        DB::table('paginas')->insert([
            "nombre_seccion" => $request->input('seccion_new'),
            "secuencia" => 10,
            "Activado" => true,
            "id_encuesta" => $id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        
        return redirect()->route('secciones.index',compact('id')); //enviar al index de preguntas(es el nombre de la ruta, no la ruta exacta)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function show(pagina $pagina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //id de la seccion o pagina
    {
        $pagina = DB::table('paginas')->where('id_pagina',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pagina->id_encuesta)->first(); //agregado
        return view('secciones.edit',compact('pagina','encuestaa')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id) //id de la pagina/seccion
    {
        DB::table('paginas')->where('id_pagina',$id)->update([ //aca 
            "nombre_seccion" => $request->input('seccion_edit'),
            "updated_at" => Carbon::now()
        ]);
        $pagina = DB::table('paginas')->where('id_pagina',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pagina->id_encuesta)->first(); //agregado
        $id2 = $encuestaa->id_encuesta;
        return redirect()->route('secciones.index',compact('id2')); //el id lo tengo que enviar al index (id_encuesta)
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        DB::table('paginas')->where('id_pagina',$id)->update([ 
            "Activado" => false,
        ]);
        $pagina = DB::table('paginas')->where('id_pagina',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pagina->id_encuesta)->first(); //agregado
        $id2 = $encuestaa->id_encuesta;
        return redirect()->route('secciones.index',compact('id2')); //el id lo tengo que enviar al index (id_encuesta)
    }
}
