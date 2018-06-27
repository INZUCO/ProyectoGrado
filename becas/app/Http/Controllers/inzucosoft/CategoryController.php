<?php

namespace App\Http\Controllers\inzucosoft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category; //Use la entidad app/Category.php HAY QUE LLAMARLO
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{

    public function __construct(){
        //Sino esta logeado No puede continuar
        $this->middleware('auth'); 
    }

    public function index()
    {
        /*== Busca todas las etiquetas ordenalas por id
             De forma Decendente y paginala       */
        $categories = Category::orderBy('id', 'DESC')->paginate(5);
        //dd($categories);
        //return "Hola desde la etiqueta";
        if(count($categories)>0){ // Si encuentra algun registro.
            return view('inzucosoftView.categories.index', compact('categories'));
        }else{
            return view('inzucosoftView.categories.index');
        }
        /*==
            compact('categories')) -> Crea un areglo.
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
        return view('inzucosoftView.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(CategoryStoreRequest $request)
    {

        #hay que VALIDAR InzucoSoft

        //Salva los datos
        $category = Category::create($request->all());
        /*== Permite guardar datos de forma masiva porwue en Category.php 
             Esta configurado para que lo permita el nombre y el slug
             protected $fillable = [
                'name', 'slug'
            ];
            Si no se hace eso toca colocarlo campo a campo. 
        ==*/
        //return redirect()->route('categories.edit', $category->id)
        return redirect()->route('categories.index', $category->id)
                         ->with('info', 'Categoria creada con éxito.');
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
        $category = Category::find($id);
        //find => Usado para buscar.
        //dd($category);
        return view('inzucosoftView.categories.show', compact('category'));
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
        $category = Category::find($id);
        //find => Usado para buscar.
        return view('inzucosoftView.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(CategoryUpdateRequest $request, $id)
    {
        //Actualiza los datos
        //Busac la etiqueta
        $category = Category::find($id);

        #hay que VALIDAR InzucoSoft

        //Actualiza
        $category->fill($request->all())->save();
        // Cuando ya actualize redireccionamos.
        return redirect()->route('categories.index', $category->id)
                         ->with('info', 'Categoria actualizada con éxito.');

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
        $category = Category::find($id)->delete();
        return back()->with('info', 'Categoria eliminada correctamente');
    }
}
