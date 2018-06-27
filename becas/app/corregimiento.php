 <?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class corregimiento extends Model
{
    /*Para salvar datos de forma masiva se usa $fillable*/
    /*Para salvar datos de forma masiva se usa $fillable*/
	protected $fillable = [
		'corr_codigo',
		'corr_nombre',
		'corr_type',
		'corr_descripcion',
		'municipality_codigo', 
	];

	/*
		RELACIONES.
		Cuando se crea los metodos el nombre dice que es
		Si es MUCHOS el nombre depues de fuction es PLURAL
		Si es UNO el nombre despues de function es SINGULAR

		En el return antes del ::clas va en SINGULAR ej User::class
	*/

	public function municipalities(){
		/*Muchos CORREGIMIENTO tiene un MUNICIPIOS*/
		return $this->belongsTo(municipality::class);
	}

	/*Metodo para mostrar el el municipio de los corregimiento.. */
	public static function municipiosbusqueda($id) {
		 return corregimiento::where('municipality_codigo','=',$id)->get();
	}
}
