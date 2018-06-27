<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\municipality;
use App\corregimiento;
use App\neigborhood;

class neigborhood2Controller extends Controller
{
    public function getMunici(Request $request, $id){
    	/*Si la peticion es ajax */
    	dd('hola');
    	if($request->ajax()){
    		$resultadocorregi = Corregimiento::municipiosbusqueda($id);
    		return response()->json($resultadocorregi);
    	}
    }
}
