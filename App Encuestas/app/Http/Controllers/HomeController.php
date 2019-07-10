<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use App\Encuesta as Encuesta;
use App\RespuestaClasica;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function simulacionIndex(){
        $encuestas = Encuesta::all();
        return view('Formulario.simulacion',compact('encuestas'));
    }
    public function simulacionIndex2(){
        $encuestas = Encuesta::all();
        return view('Formulario.simulacion2',compact('encuestas'));
    }
    
    public function show(Request $request){ //recibir parametros de un formulario
        //$encuestaa = DB::table('encuestas')->where('id_encuesta','=',$request->txtidencuesta)->get();
        $preguntas = DB::table('pregunta_clasicas')->where('id_encuesta','=',$request->txtidencuesta)->get();
        return $preguntas;
        //-------------------------------------------------------------------------------------------------------------------------------
        //return redirect()->route('Formulario.index-encuestaCorriente',compact('preguntas'));
    }
    public function guardarrespuestas(Request $request){
        //Log::info($request);
        $requestArray = $request->toArray();
        Log::info($requestArray);
        
        for ($i=1 ; $i <= (count($requestArray)/2) ; $i++) { //tiene que recorrer 6 veces

            //if( != NULL){
                $stringI = "respuesta".(string)$i;
                $preguntaC = "id_pregunta_clasica".(string)$i;
                //Log::info(count($requestArray));
                //$requestArray[$i]->respuesta+$stringI;
                //Log::info($stringI);
                //Log::info($requestArray[$stringI]);
                $newRespuestaC = new RespuestaClasica();
                //$newRespuestaC->respuesta = $requestArray['respuesta'+$i];
                $newRespuestaC->respuesta = $requestArray[$stringI];// "respuesta{$i}";
                $newRespuestaC->id_pregunta_clasica = $requestArray[$preguntaC]; //clave foranea
                $newRespuestaC->save();
            //}
        }
        //return response()->json($newRespuestaC); // el return se envia a "result" de la vista
        return "OKOKO";
        
    }
}
