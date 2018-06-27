<?php

namespace App\Http\Controllers\Web;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function blog(){

    	$posts = Post::orderBy('id','DESC')->where('status', 'PUBLISHED')->paginate(3);
    	return view('web.posts', compact('posts')); //Pasa los datos
    }

    public function post($slug){

        //$this->middleware('auth'); //Verifica que los usuarios esten autentificado...
   
    										//first() devuelve el registro completo
    	$post = Post::where('slug', $slug)->first();
    	return view('web.post', compact('post'));
    }

	public function category($slug){
													//pluck('id') devuelve el ID
		// 1. Consigo la categoria 
		$category = Category::where('slug', $slug)->pluck('id')->first(); 
		// 2. Luego buscar los post asociados a esa categoria
		$posts    = Post::where('category_id', $category)
			->orderBy('id','DESC')->where('status', 'PUBLISHED')->paginate(3);
		return view('web.posts', compact('posts')); //Pasa los datos
	}    

	public function tag($slug){
		// 1. Busca los pot que tenga etiquetas
		$posts  = Post::whereHas('tags', function($query) use($slug){
		// 2. Siemore y cuando estas etiquetas tengan el slug ue estoy usando
			$query->where('slug', $slug);
		})->orderBy('id','DESC')->where('status', 'PUBLISHED')->paginate(3);
		return view('web.posts', compact('posts')); //Pasa los datos
	} 


}
