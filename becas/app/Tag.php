<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/*Para salvar datos de forma masiva se usa $fillable*/
	protected $fillable = [
		'name', 'slug'
	];


	/*
		RELACIONES.
		Cuando se crea los metodos el nombre dice que es
		Si es MUCHOS el nombre depues de fuction es PLURAL
		Si es UNO el nombre despues de function es SINGULAR

		En el return antes del ::clas va en SINGULAR ej User::class
	*/
    // Relacionarlo con las etiquetas


    /*MUCHOS a MUCHOS*/
	public function posts(){
		/*muchos TAGS tiene muchas POSTS*/
		return $this->belongsToMany(post::class);
	}
}
