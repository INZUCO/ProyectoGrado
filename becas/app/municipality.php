<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipality extends Model
{

	/*Para salvar datos de forma masiva se usa $fillable*/
	protected $fillable = [
		'codigo', 'nombre', 'description', 'state_codigo'
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
	public function corregimientos(){
		/*Una MUNICIPIO tiene muchas CORREGIMIENTO*/
		return $this->hasMany(corregimiento::class);
	}
}
