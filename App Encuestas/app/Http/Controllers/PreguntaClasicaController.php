<?php

namespace App\Http\Controllers;

use App\PreguntaClasica as PreguntaClasica;
use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use DB;
use Illuminate\Support\Facades\Log;

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
    public function create($id) //Tiene que recivir el id de la encuesta y retorna el formulario de creacion
    {
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first(); // Todo OK
        return view('PreguntaComun.create',compact('encuestaa'));
    }
    public function create2(Request $request){ //------------------------------------------------------CREATE 2--------------------------------------------------------------
        
        $newQuestion = new PreguntaClasica();
        $newQuestion->pregunta = $request->pregunta;
        $newQuestion->Activado = true;
        $newQuestion->id_encuesta = $request->id_encuesta;
        $newQuestion->save();
        
        //Log::info($request->pregunta);
        return response()->json($newQuestion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        DB::table('pregunta_clasicas')->insert([
            "pregunta" => $request->input('pregunta_new'),
            "id_encuesta" => $id,
            "Activado" => true,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        
        return redirect()->route('preguntaclasica.index',compact('id')); //enviar al index de preguntas
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
    public function edit($id) // Es el id de la pregunta que se quiere editar
    {
        $preguntaC_encuesta = DB::table('pregunta_clasicas')->where('id_pregunta_clasica',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$preguntaC_encuesta->id_encuesta)->first(); // Todo OK
        return view('PreguntaComun.edit',compact('preguntaC_encuesta','encuestaa'));
    }
    public function edit2(Request $request) //------------------------------------------------------EDIT 2 -------------------------------------------------------
    {
        $editQuertion = PreguntaClasica::find($request->id_pregunta_clasica);
        $editQuertion->id_pregunta_clasica = $request->id_pregunta_clasica;
        $editQuertion->pregunta = $request->pregunta;
        $editQuertion->save();
        return response()->json($editQuertion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PreguntaClasica  $preguntaClasica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('pregunta_clasicas')->where('id_pregunta_clasica',$id)->update([
            "pregunta" => $request->input('pregunta_edit'),
            "updated_at" => Carbon::now()
        ]);
        $preguntaC_encuesta = DB::table('pregunta_clasicas')->where('id_pregunta_clasica',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$preguntaC_encuesta->id_encuesta)->first();
        $id2 = $encuestaa->id_encuesta;
        return redirect()->route('preguntaclasica.index',compact('id2'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PreguntaClasica  $preguntaClasica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pregunta_clasicas')->where('id_pregunta_clasica',$id)->update([
            "Activado" => false,
            "updated_at" => Carbon::now()
        ]);
        $preguntaC_encuesta = DB::table('pregunta_clasicas')->where('id_pregunta_clasica',$id)->first();
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$preguntaC_encuesta->id_encuesta)->first();
        $id2 = $encuestaa->id_encuesta;
        return redirect()->route('preguntaclasica.index',compact('id2'));
    }
}
