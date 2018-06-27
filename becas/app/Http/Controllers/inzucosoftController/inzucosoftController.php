<?php

namespace App\Http\Controllers\inzucosoft;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class inzucosoftController extends Controller
{
    public function panelcontroller(){
    	//retorna la vista
    	return view::make('inzucosoft.PanelVista');
    }
}
