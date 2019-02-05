<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon as Carbon;
use App\Pregunta as Pregunta;
use App\Encuesta as Encuesta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function gestor($id) //Id de la encuesta seleccionada
    {
        $preguntas_encuesta = Pregunta::where('id_encuesta_foranea','=',$id)->get(); //Todo OK
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); // Todo OK
        return view('pregunta.gestor',compact('encuestaa','preguntas_encuesta')); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); //agregado
        return view('pregunta.create',compact('encuestaa'));
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
        
        return redirect()->route('pregunta.gestor',compact('id'));
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
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first();
        return view('pregunta.edit',compact('encuestaa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('preguntas')->where('id_encuesta_foranea',$id)->update([
            "pregunta" => $request->input('pregunta_edit'),
            "updated_at" => Carbon::now()
            
        ]);
        return redirect()->route('pregunta.gestor',compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
