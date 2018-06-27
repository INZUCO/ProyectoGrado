<?php

namespace App\Http\Controllers\inzucosoft;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

use Illuminate\Support\Facades\Storage; //Clase de almacenamiento hay que llamarla para subir archivos
//use Illuminate\Http\UploadedFile;

class PostController extends Controller
{

    public function __construct(){
        //Sino esta logeado No puede continuar
        $this->middleware('auth'); 
    }

    public function index()
    {
        /*== Busca todas las publicaciones que pertenezcan al usuario
             que este logueado en ese momento ==*/
       $posts = Post::orderBy('id', 'DESC')
                ->where('user_id', auth()->user()->id)
                ->paginate(10);
       // dd(count($posts));
        if(count($posts)>0){ // Si encuentra algun registro.
            return view('inzucosoftView.posts.index', compact('posts'));
        }else{
            return view('inzucosoftView.posts.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*=============================================
        =            Busca Categorias                 =
        =============================================*/
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id'); //->pluck => Solo traiga el NOMBRE y el ID
        //dd($categories);
        /*=============================================
        =            Busca Etiquetas                  =
        =============================================*/
        $tags = Tag::orderBy('name', 'ASC')->get(); 
        //dd($tags);

        //Retorna el formulario
        return view('inzucosoftView.posts.create', compact('categories', 'tags'));
    }

    public function store(PostStoreRequest $request)
    {

        #hay que VALIDAR InzucoSoft

        //Salva los datos
        $post = Post::create($request->all());
        /*== Permite guardar datos de forma masiva porwue en Post.php 
             Esta configurado para que lo permita el nombre y el slug
             protected $fillable = [
                'name', 'slug'
            ];
            Si no se hace eso toca colocarlo campo a campo. 
        ==*/
        //dd($post);
        /*=====================================
        =            Guarda Imagen            =
        =====================================*/
        /*Si tenemos un archivo en el campo (image). Es el del formulario*/
        if($request->file('file')){
            //Crae la ruta donde se guarde la imagen.
            /* Almacena en el disco en la ruta public*/
            $path = Storage::disk('public')->put('image/Post', $request->file('file'));
                                                /* Carpeta       ,     La imagen */
            /*Actulizo el la varisble pos cargando la ruta de la imagen.*/
            /*Y auarda co ->save()*/
            /* asset() Crea la ruta completa*/
            $post->fill(['file' => asset($path)])->save();
            //dd($post);
        }
        /*=====   End oGuarda Imagen   ======*/
        
        //TAGS
        $post->tags()->sync($request->get('tags'));
        //attach() <=> Crear la relacion las Publicaciones y las Etiquetas.. 


        //return redirect()->route('posts.edit', $post->id)
        return redirect()->route('posts.index', $post->id)
                         ->with('info', 'Publicacion creada con éxito.');
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
        /*=============================================
        =            Busca Post                  =
        =============================================*/
        $post = Post::find($id);

        //find => Usado para buscar.
        return view('inzucosoftView.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                /*=============================================
        =            Busca Categorias                 =
        =============================================*/
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id'); //->pluck => Solo traiga el NOMBRE y el ID

        /*=============================================
        =            Busca Etiquetas                  =
        =============================================*/
        $tags = Tag::orderBy('name', 'ASC')->get();
        
        //Muestra la vista
        $post = Post::find($id);
        //find => Usado para buscar.
        return view('inzucosoftView.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(PostUpdateRequest $request, $id)
    {
        //Actualiza los datos
        //Busac la etiqueta
        $post = Post::find($id);

        #hay que VALIDAR InzucoSoft

        //Actualiza
        $post->fill($request->all())->save();
        // Cuando ya actualize redireccionamos.


        /*=====================================
        =            Guarda Imagen            =
        =====================================*/
        /*Si tenemos un archivo en el campo (image). Es el del formulario*/
        if($request->file('file')){
            //Crae la ruta donde se guarde la imagen.
            /* Almacena en el disco en la ruta public*/
            $path = Storage::disk('public')->put('image/Post', $request->file('file'));
                                                /* Carpeta       ,     La imagen */
            /*Actulizo el la varisble pos cargando la ruta de la imagen.*/
            /*Y auarda co ->save()*/
            /* asset() Crea la ruta completa*/
            $post->fill(['file' => asset($path)])->save();
        }
        /*=====   End oGuarda Imagen   ======*/
        
        //TAGS
        $post->tags()->sync($request->get('tags'));
        //attach() <=> Crear la relacion las Publicaciones y las Etiquetas.. 


        return redirect()->route('posts.index', $post->id)
                         ->with('info', 'Publicacion actualizada con éxito.');

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
        $post = Post::find($id)->delete();
        return back()->with('info', 'Publicacion eliminada correctamente');
    }
}
