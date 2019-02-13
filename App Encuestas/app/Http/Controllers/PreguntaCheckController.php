<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon as Carbon;
use App\Encuesta as Encuesta;
use App\PreguntaCheck as PreguntaCheck;
use Illuminate\Http\Request;

class PreguntaCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) //id de encuesta
    {
        $preguntas_check_encuesta = PreguntaCheck::where('id_encuesta','=',$id)->get(); //Todo OK
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); // Todo OK
        return view('pregunta.checkbox.index',compact('preguntas_check_encuesta','encuestaa')); //OK
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) // Codigo de pregunta controller
    {
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); //agregado
        return view('pregunta.checkbox.create',compact('preguntas_check_encuesta','encuestaa')); //OK
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id) //Codigo de pregunta controller
    {
        DB::table('pregunta_checks')->insert([
            "pregunta_check" => $request->input('pregunta_check_new'),
            "id_encuesta" => $id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        
        return redirect()->route('preguntaCheck.index',compact('id')); //enviar al index de preguntas(es el nombre de la ruta, no la ruta exacta)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PreguntaCheck  $preguntaCheck
     * @return \Illuminate\Http\Response
     */
    public function show(PreguntaCheck $preguntaCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PreguntaCheck  $preguntaCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(PreguntaCheck $preguntaCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreguntaCheck  $preguntaCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreguntaCheck $preguntaCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PreguntaCheck  $preguntaCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreguntaCheck $preguntaCheck)
    {
        //
    }
}
