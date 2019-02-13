<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon as Carbon;
use App\Encuesta as Encuesta;
use App\Pregunta as Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($id) //Muestra preguntas de todas las encuestas
    {
        $preguntas_encuesta = Pregunta::where('id_encuesta_foranea','=',$id)->get(); //Todo OK
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); // Todo OK
        return view('pregunta.index',compact('preguntas_encuesta','encuestaa')); //OK
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); //agregado
        return view('pregunta.create',compact('encuestaa')); // enviar al index de preguntas
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
            "id_encuesta_foranea" => $id,
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
    public function edit($id)
    {
        //$encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first();
        $pregunta = DB::table('preguntas')->where('id_pregunta',$id)->first();
        return view('pregunta.edit',compact('pregunta')); //enviar al index de preguntas
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
            "updated_at" => Carbon::now()
        ]);
        $pregunta = DB::table('preguntas')->where('id_pregunta',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pregunta->id_encuesta_foranea)->first();
        $id2 = $encuestaa->id_encuesta;
        return redirect()->route('pregunta.index',compact('id2')); //el id lo tengo que enviar al index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $pregunta = DB::table('preguntas')->where('id_pregunta',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$pregunta->id_encuesta_foranea)->first();
        $id2 = $encuestaa->id_encuesta;

        DB::table('preguntas')->where('id_pregunta',$id)->delete();
        return redirect()->route('pregunta.index',compact('id2'));
    }
}
