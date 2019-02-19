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
        //dd($encuestas);
        return view('simulacion',compact('encuestas'));
    }
}
