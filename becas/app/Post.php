<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	/*Para salvar datos de forma masiva se usa $fillable*/
	protected $fillable = [
		'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'  
	];


	/*
		RELACIONES.
		Cuando se crea los metodos el nombre dice que es
		Si es MUCHOS el nombre depues de fuction es PLURAL
		Si es UNO el nombre despues de function es SINGULAR

		En el return antes del ::clas va en SINGULAR ej User::class
	*/
    // Relacionarlo con las etiquetas

    /*UNO a UNO*/
	public function user(){
		/*Un POST tiene un TAG*/
		return $this->belongsTo(User::class);
	}

	public function category(){
		/*Muchos POST tiene una Categoria*/
		return $this->belongsTo(User::class);
	}

    /*MUCHOS a MUCHOS*/
	public function tags(){
		/*Un POST tiene muchas TAG*/
		return $this->belongsToMany(Tag::class);
	}
}
