<?php

namespace App\Http\Controllers\inzucosoft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\municipality;

class MunicipalityController extends Controller
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
        //
        $municipalities = municipality::orderBy('id', 'DESC')->paginate(5);
        //dd($Municipalities);
        if(count($municipalities)>0){ // Si encuentra algun registro.
            return view('inzucosoftView.municipalities.index', compact('municipalities'));
        }else{
            return view('inzucosoftView.municipalities.index');
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
        $municipality = Municipality::find($id);
        //find => Usado para buscar.
        //dd($municipality);
        return view('inzucosoftView.categories.show', compact('municipality'));
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
