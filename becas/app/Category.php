<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	/*Para salvar datos de forma masiva se usa $fillable*/
	protected $fillable = [
		'name', 'slug', 'body'
	];


	/*
		RELACIONES.
		Cuando se crea los metodos el nombre dice que es
		Si es MUCHOS el nombre depues de fuction es PLURAL
		Si es UNO el nombre despues de function es SINGULAR

		En el return antes del ::clas va en SINGULAR ej User::class
	*/
    // Relacionarlo con las etiquetas


    /*Una CATEGORIA tiene Muchos POST*/
	public function posts(){
		/*Una CATEGORIA tiene muchas POST*/
		return $this->hasMany(post::class);
	}
}
