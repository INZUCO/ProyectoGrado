<?php

namespace App\Http\Controllers\inzucosoft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\corregimiento;
use App\municipality;
//use DB;
use Illuminate\Support\Facades\DB;

class CorregimientoController extends Controller
{

    public function __construct(){
        //Sino esta logeado No puede continuar
        $this->middleware('auth'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            1. DB::table('corregimientos') <=> Tabla que se hace la busqueda.
            2. ->join('municipalities'     <=> La tabla para hacer la conexion.
            3. El campo foraneo de la primera tabla.
            4. La llave primaria de la segunda tabla
            5. Select de los campos a mostrar.
            6. Campo por el que quiero ordenar.
        */
        $corregimientos = DB::table('corregimientos')
            ->join('municipalities', 'corregimientos.municipality_codigo', '=', 'municipalities.muni_codigo')
            ->select('corregimientos.*', 'municipalities.muni_nombre')
            /*->get();*/
            ->orderBy('corr_nombre', 'ASC')
            ->paginate(5);

        //dd($corregimientos);

        if(count($corregimientos)>0){ // Si encuentra algun registro.
            return view('inzucosoftView.corregimientos.index', compact('corregimientos'));
        }else{
            return view('inzucosoftView.corregimientos.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $corregimientos = DB::table('corregimientos')
            ->join('municipalities', 'corregimientos.municipality_codigo', '=', 'municipalities.muni_codigo')
            ->select('corregimientos.*', 'municipalities.muni_nombre')
            ->where()
            ->get();*/
            


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
