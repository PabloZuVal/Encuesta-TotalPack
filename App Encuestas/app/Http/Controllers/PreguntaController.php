<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon as Carbon;
use App\Encuesta as Encuesta;
use App\Pregunta as Pregunta;
use App\pagina as Pagina;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($id) //Muestra preguntas de todas las paginas/secciones -----------------------NECESITO LA ENCUESTA -------------------------------
    {
        $preguntas_pagina = Pregunta::where('id_pagina','=',$id)->get(); //(el id foraneo de pregunta == id de la pagina) --> Esto esta bien(Objetos de preguntas de la pagina)
        $pagina = Pagina::where('id_pagina','=',$id)->first(); // necesito la pagina para mostrar el nombre de la seccion en la vista index de preguntas ojo first() 
        //dd($pagina); //muestra las preguntas de la pagina (creo que funciona (si funciona))
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pagina->id_encuesta)->first(); // Todo OK
        return view('pregunta.index',compact('preguntas_pagina','pagina','encuestaa')); //OK (enviar la pagina/Seccion)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) //estoy enviando el id de la encuesta (Esto esta OK)
    {
        //$encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); //agregado
        $pagina = Pagina::where('id_pagina','=',$id)->first();
        return view('pregunta.create',compact('pagina')); // enviar al index de preguntas
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        DB::table('preguntas')->insert([
            "pregunta" => $request->input('pregunta_new'),
            "tipo_respuesta" =>$request->input('tipo_pregunta'),
            "Activado" => true,
            "secuencia" =>10,
            "id_pagina" => $id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        
        return redirect()->route('pregunta.index',compact('id')); //enviar al index de preguntas
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // entra el id de la pregunta
    {
        //$encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first();
        $pregunta = DB::table('preguntas')->where('id_pregunta',$id)->first(); //okokok
        $pagina = Pagina::where('id_pagina','=',$pregunta->id_pagina)->first();
        return view('pregunta.edit',compact('pregunta','pagina')); //enviar al index de preguntas
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //id de la pregunta  
    {
        DB::table('preguntas')->where('id_pregunta',$id)->update([
            "pregunta" => $request->input('pregunta_edit'),
            "tipo_respuesta" =>$request->input('tipo_pregunta'),
            "updated_at" => Carbon::now()
        ]);

        $pregunta = DB::table('preguntas')->where('id_pregunta',$id)->first(); //okokok            //ERROR AL REDIRECCIONAR CUANDO TERMINA DE ACTUALIZAR ACÁ
        $pagina = Pagina::where('id_pagina','=',$pregunta->id_pagina)->first();//okokok
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pagina->id_encuesta)->first();
        $preguntas_pagina = Pregunta::where('id_pagina','=',$pagina->id_pagina)->get(); //(el id foraneo de pregunta == id de la pagina) --> Esto esta bien(Objetos de preguntas de la pagina)
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pagina->id_encuesta)->first();
        $id2=$encuestaa->id_encuesta;
        //dd($preguntas_pagina);
        return redirect()->route('pregunta.index',compact('id2')); //el id lo tengo que enviar al index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // ---------------------> falta tambien
    {
        $pregunta = DB::table('preguntas')->where('id_pregunta',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pregunta->id_encuesta_foranea)->first();
        $id2 = $encuestaa->id_encuesta;

        DB::table('preguntas')->where('id_pregunta',$id)->delete();
        return redirect()->route('pregunta.index',compact('id2'));
    }
}
