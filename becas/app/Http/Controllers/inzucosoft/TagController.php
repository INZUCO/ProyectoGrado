<?php

namespace App\Http\Controllers\inzucosoft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tag; //Use la entidad app/Tag.php
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

class TagController extends Controller
{

    public function __construct(){
        //Sino esta logeado No puede continuar
        $this->middleware('auth'); 
    }

    public function index()
    {
        /*== Busca todas las etiquetas ordenalas por id
             De forma Decendente y paginala       */
        $tags = Tag::orderBy('id', 'DES')->paginate(5);
        //dd($tags);
        //return "Hola desde la etiqueta";

        if(count($tags)>0){ // Si encuentra algun registro.
            return view('inzucosoftView.tags.index', compact('tags'));
        }else{
            return view('inzucosoftView.tags.index');
        }
        /*==
            compact('tags')) -> Crea un areglo.
        ==*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna el formulario
        return view('inzucosoftView.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(TagStoreRequest $request)
    {

        #hay que VALIDAR InzucoSoft

        //Salva los datos
        $tag = Tag::create($request->all());
        /*== Permite guardar datos de forma masiva porwue en Tag.php 
             Esta configurado para que lo permita el nombre y el slug
             protected $fillable = [
                'name', 'slug'
            ];
            Si no se hace eso toca colocarlo campo a campo. 
        ==*/
        //return redirect()->route('tags.edit', $tag->id)
        return redirect()->route('tags.index', $tag->id)
                         ->with('info', 'Etiqueta creada con éxito.');
            // with => retorna un mensaje
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        //find => Usado para buscar.
        return view('inzucosoftView.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Muestra la vista
        $tag = Tag::find($id);
        //find => Usado para buscar.
        return view('inzucosoftView.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(TagUpdateRequest $request, $id)
    {
        //Actualiza los datos
        //Busac la etiqueta
        $tag = Tag::find($id);

        #hay que VALIDAR InzucoSoft

        //Actualiza
        $tag->fill($request->all())->save();
        // Cuando ya actualize redireccionamos.
        return redirect()->route('tags.index', $tag->id)
                         ->with('info', 'Etiqueta actualizada con éxito.');

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
        $tag = Tag::find($id)->delete();
        return back()->with('info', 'La Etiqeta fue eliminada correctamente');
    }
}
