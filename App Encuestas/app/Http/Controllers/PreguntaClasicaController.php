<?php

namespace App\Http\Controllers;

use App\PreguntaClasica as PreguntaClasica;
use Illuminate\Http\Request;
use DB;

class PreguntaClasicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $preguntasC_encuesta = PreguntaClasica::where('id_encuesta','=',$id)->get(); //Todo OK
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); // Todo OK
        return view('PreguntaComun.index',compact('preguntasC_encuesta','encuestaa'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PreguntaComun.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PreguntaClasica  $preguntaClasica
     * @return \Illuminate\Http\Response
     */
    public function show(PreguntaClasica $preguntaClasica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PreguntaClasica  $preguntaClasica
     * @return \Illuminate\Http\Response
     */
    public function edit(PreguntaClasica $preguntaClasica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreguntaClasica  $preguntaClasica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreguntaClasica $preguntaClasica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PreguntaClasica  $preguntaClasica
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreguntaClasica $preguntaClasica)
    {
        //
    }
}
