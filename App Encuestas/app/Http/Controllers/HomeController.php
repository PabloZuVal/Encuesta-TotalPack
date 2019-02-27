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
        
        //Log::info($request->toArray()->count());

        $requestArray = $request->toArray();
        //Log::info($requestArray);
        for ($i=0 ; $i < (count($requestArray)/2) ; $i++) {

            //Log::info($requestArray);
            //Log::info(count($requestArray));
            $stringI = (string)$i;
            //$requestArray[$i]->respuesta+$stringI;
            Log::info( $requestArray[$i]->respuesta+$stringI);
            /*
            $newRespuestaC = new RespuestaClasica();
            //$newRespuestaC->respuesta = $requestArray['respuesta'+$i];
            $newRespuestaC->respuesta = $requestArray[$i]->respuesta.$i;// "respuesta{$i}";
            $newRespuestaC->id_pregunta_clasica = $requestArray[$i]->id_pregunta_clasica.$i; //clave foranea
            $newRespuestaC->save();
            */
        }
        //return response()->json($newRespuestaC);
        
        //return response()->json($newRespuestaC); // el return se envia a "result" de la vista
        return "OKOKO";
        /*
        foreach ($request as $arregloRespuesta) {
            $i =0;
            //$arreglo = (object) array();
            //array_push($arreglo,$arregloRespuesta);
            //$arreglo = $arregloRespuesta;
            //Log::info($arregloRespuesta);
            //Log::info($arreglo['respuesta']);
            $newRespuestaC = new RespuestaClasica();
            $newRespuestaC->respuesta = $arregloRespuesta['respuesta'+$i];
            $newRespuestaC->id_pregunta_clasica = $arregloRespuesta['id_pregunta_clasica'+$i]; //clave foranea
            $newRespuestaC->save();
            $i++;
        }
        return response()->json($newRespuestaC);
        */
    }
}
