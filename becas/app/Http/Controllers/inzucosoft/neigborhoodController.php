<?php

namespace App\Http\Controllers\inzucosoft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Necesario para la revision
use Illuminate\Support\Facades\DB;

use App\corregimientos;
use App\municipios;

class neigborhoodController extends Controller
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
        $neigborhoods = DB::table('neigborhoods')
            ->join('corregimientos', 'neigborhoods.corregimiento_codigo', '=', 'corregimientos.corr_codigo')
            ->join('municipalities', 'corregimientos.municipality_codigo', '=', 'municipalities.muni_codigo')
            ->select('neigborhoods.*', 'corregimientos.corr_nombre', 'muni_nombre')
            /*->get();*/
            ->orderBy('neig_nombre', 'ASC')
            ->paginate(5);

        //dd($neigborhoods);

        if(count($neigborhoods)>0){ // Si encuentra algun registro.
            return view('inzucosoftView.neigborhoods.index', compact('neigborhoods'));
        }else{
            return view('inzucosoftView.neigborhoods.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipios = DB::table('municipalities')->pluck('muni_nombre', 'id');

        //dd($municipios);
        return view('inzucosoftView.neigborhoods.create', compact('municipios'));
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
        //
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

    public function getMunici($id){

    }
}
