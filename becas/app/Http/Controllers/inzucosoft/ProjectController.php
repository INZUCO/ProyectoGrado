<?php

namespace App\Http\Controllers\inzucosoft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Category;

class ProjectController extends Controller
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
            project_user.id as projectuserid <=> le da un alias al campo
        */
        $proyectos = DB::table('project_user')
            ->join('users', 'project_user.user_id', '=', 'users.id')
            ->join('projects', 'project_user.project_id', '=', 'projects.id')
            ->select('project_user.id as projectuserid', 'users.*', 'projects.*')
            ->orderBy('projects.proy_nombre', 'ASC')
            ->paginate(5);
       // dd($proyectos);
        if(count($proyectos)>0){ // Si encuentra algun registro.
            return view('inzucosoftView.proyectos.index', compact('proyectos'));
        }else{
            return view('inzucosoftView.proyectos.index');
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
        $proyectoShow = DB::table('project_user')
            ->join('users', 'project_user.user_id', '=', 'users.id')
            ->join('projects', 'project_user.project_id', '=', 'projects.id')
            ->select('project_user.id as projectuserid', 
                     'project_user.start_date',
                     'project_user.end_date',
                     'project_user.created_at',
                     'project_user.updated_at',
                     'users.*', 
                     'projects.id as projectsid',
                     'proy_codigo',
                     'proy_nombre',
                     'introduccion',
                     'planteamiento',
                     'justificacion',
                     'objetivos_general',
                     'Resumen',
                     'Abstract',
                     'carrera',
                     'status')
            ->where('project_user.id', '=', $id)
            ->get();
        //dd($proyectoShow->projects.id);
        //$proyectoShow    
        return view('inzucosoftView.proyectos.show', compact('proyectoShow'));
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
