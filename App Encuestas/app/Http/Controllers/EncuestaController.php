<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon as Carbon;
use App\Encuesta as Encuesta;
use Illuminate\Http\Request;
use App\User as User;
use Illuminate\Support\Facades\Auth;
 
class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index() //ver aca el metodo post
    {
        //$encuestas = Encuesta::all();
        //return view('Encuesta.index',compact('encuestas'));
        return view('Encuesta.index'); //solo interesa que imprima una vista
    }
    public function gestor()
    {
        $encuestas = Encuesta::all();
        //dd($encuestas);
        return view('encuesta.gestor',compact('encuestas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Agregar nueva encuesta
        return view('Encuesta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DB::table('encuestas')->insert([

            "nombre_cli" => $request->input('cliente'),
            "sucursal" => $request->input('sucursal'),
            "fecha_emision" => Carbon::now(),
            "encargado_cli" => $request->input('encargado'),
            "tecnico" => $request->input('tecnico_en_terreno'),
            "observaciones" => $request->input('observaciones'),
            "contacto" => $request->input('contacto'),
            "id_user" => Auth::id(),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()

        ]);
         
        return redirect()->route('encuesta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first();
        return view('encuesta.show',compact('encuestaa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encuestaa = DB::table('encuestas')->where('id_encuesta',$id)->first();
        return view('encuesta.edit',compact('encuestaa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('encuestas')->where('id_encuesta',$id)->update([

            "nombre_cli" => $request->input('cliente'),
            "sucursal" => $request->input('sucursal'),
            "fecha_emision" => Carbon::now(),
            "encargado_cli" => $request->input('encargado'),
            "tecnico" => $request->input('tecnico_en_terreno'),
            "observaciones" => $request->input('observaciones'),
            "contacto" => $request->input('contacto'),
            "updated_at" => Carbon::now()
            
        ]);
         
        return redirect()->route('encuesta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('encuestas')->where('id_encuesta',$id)->delete();
        return redirect()->route('encuesta.gestor');
    }
   
}
