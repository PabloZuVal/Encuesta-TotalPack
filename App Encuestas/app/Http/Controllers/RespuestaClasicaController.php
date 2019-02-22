<?php

namespace App\Http\Controllers;

use App\RespuestaClasica;
use Illuminate\Http\Request;
use App\PreguntaClasica as PreguntaClasica;
use DB;
use Carbon\Carbon as Carbon;

class RespuestaClasicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) //id de la pregunta
    {
        $pregunta = PreguntaClasica::where('id_pregunta_clasica','=',$id)->first(); //Todo OK
        $respuesta = DB::table('respuesta_clasicas')->where('id_pregunta_clasica','=',$pregunta->id_pregunta_clasica)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta','=',$pregunta->id_encuesta)->first();
        //dd($encuestaa);
        return view('RespuestaComun.index',compact('pregunta','respuesta','encuestaa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) //id de la pregunta
    {
        
        $pregunta = PreguntaClasica::where('id_pregunta_clasica','=',$id)->first(); //Todo OK
        $encuestaa = DB::table('encuestas')->where('id_encuesta','=',$pregunta->id_encuesta)->first();
        return view('RespuestaComun.create',compact('pregunta','encuestaa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id) //id de la pregunta
    {
        DB::table('respuesta_clasicas')->insert([

            "respuesta" => $request->input('respuesta_new'),
            "id_pregunta_clasica" => $id,
            //"Activado" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        //necesito la encuesta en la vista
        $pregunta = PreguntaClasica::where('id_pregunta_clasica','=',$id)->first(); //Todo OK
        $encuestaa = DB::table('encuestas')->where('id_encuesta','=',$pregunta->id_encuesta)->first();
        $id2=$encuestaa->id_encuesta;
        return redirect()->route('preguntaclasica.index',compact('id2')); //enviar al index de preguntas
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RespuestaClasica  $respuestaClasica
     * @return \Illuminate\Http\Response
     */
    public function show(RespuestaClasica $respuestaClasica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RespuestaClasica  $respuestaClasica
     * @return \Illuminate\Http\Response
     */
    public function edit(RespuestaClasica $respuestaClasica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RespuestaClasica  $respuestaClasica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RespuestaClasica $respuestaClasica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RespuestaClasica  $respuestaClasica
     * @return \Illuminate\Http\Response
     */
    public function destroy(RespuestaClasica $respuestaClasica)
    {
        //
    }
}
