<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neigborhood extends Model
{
	
	/*Para salvar datos de forma masiva se usa $fillable*/
	protected $fillable = [
		'neig_nombre', 'neig_type', 'neig_descripcion', 'corregimiento_codigo',
	];


	/*
		RELACIONES.
		Cuando se crea los metodos el nombre dice que es
		Si es MUCHOS el nombre depues de fuction es PLURAL
		Si es UNO el nombre despues de function es SINGULAR

		En el return antes del ::clas va en SINGULAR ej User::class
	*/
    // Relacionarlo con las etiquetas


	public function corregimientos(){
		/*Una MUNICIPIO tiene muchas CORREGIMIENTO*/
		return $this->hasMany(corregimiento::class);
	}
	public function users(){
		//Un Barrio tiene Muchos Usuario
		return $this->hasMany(User::class);
	}
}
