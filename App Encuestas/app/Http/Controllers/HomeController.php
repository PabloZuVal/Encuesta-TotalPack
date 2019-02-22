<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Encuesta as Encuesta;

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
    
    public function show(Request $request){ //recibir parametros de un formulario
        //$encuestaa = DB::table('encuestas')->where('id_encuesta','=',$request->txtidencuesta)->get();
        $preguntas = DB::table('pregunta_clasicas')->where('id_encuesta','=',$request->txtidencuesta)->get();
        return $preguntas;
        //------------------------------------------------------------------------------------------------------
        //return redirect()->route('Formulario.index-encuestaCorriente',compact('preguntas'));
    }
}
