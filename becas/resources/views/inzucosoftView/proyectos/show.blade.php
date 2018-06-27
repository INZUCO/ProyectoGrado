<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
     <div class="container">
        @foreach ($proyectoShow as $inzucoSoft)
            <div class="row">
                <div class="span9">
                    <p class="lead text-center">PROYECTO USUARIO</p>
                    <div class="row">
                        <div class="span4">
                            <strong>FECHA DE INICIO. &nbsp; </strong> {{ $inzucoSoft->start_date }}  
                        </div>
                        <div class="span4">
                           <strong>FECHA DE FINALIZACIÓN. &nbsp; </strong> {{ $inzucoSoft->end_date }} 
                        </div>
                    </div>
                    <br>
                    <div class="row text-justify">
                        <div class="span9">
                            <strong>ESTADO. &nbsp; </strong> {{ $inzucoSoft->status }}  
                        </div>
                    </div>
                    <br>
                    <hr color="blue" size=3>
                </div>

                <div class="span9">
                    <p class="lead text-center">USUARIO</p>
                    <div class="row">
                        <div class="span9">
                            <strong>NOMBRE USUARIO. &nbsp; </strong> {{ $inzucoSoft->name.' '.$inzucoSoft->first_surname.' '.$inzucoSoft->last_surname }}  
                        </div> 
                    </div>
                    <div class="row">
                        <div class="span9">
                            <strong>CARRERA USUARIO. &nbsp; </strong> {{ $inzucoSoft->carrera }}  
                        </div>                       
                    </div>
                    <br>
                    <hr color="blue" size=3>
                </div>   
                <div class="span9">
                    <p class="lead text-center">PROYECTO</p>
                    <div class="row">
                        <div class="span9">
                            <strong>NOMBRE PROYECTO. &nbsp; </strong> <br> {{ $inzucoSoft->proy_nombre }}  
                        </div>

                    </div>
                    <br>                    
                    <div class="row text-justify">
                        <div class="span9">
                            <strong>INTRODUCCIÓN. &nbsp; </strong> <br> {{ $inzucoSoft->introduccion }}  
                        </div>
                    </div>
                    <br> 
                    <div class="row text-justify">
                        <div class="span9">
                            <strong>PLANTEAMIENTO. &nbsp; </strong> <br> {{ $inzucoSoft->planteamiento }}  
                        </div>
                    </div>
                    <br> 
                    <div class="row text-justify">
                        <div class="span9">
                            <strong>JUSTIFICACIÓN . &nbsp; </strong> <br> {{ $inzucoSoft->justificacion }}  
                        </div>
                    </div>
                    <br> 
                    <div class="row text-justify">
                        <div class="span9">
                            <strong>RESUMEN. &nbsp; </strong> <br> {{ $inzucoSoft->Resumen }}  
                        </div>
                    </div>
                    <br> 
                    <div class="row text-justify">
                        <div class="span9">
                            <strong>ABSTRACT. &nbsp; </strong> <br> {{ $inzucoSoft->Abstract }}  
                        </div>
                    </div>
                    <br>  
                    <div class="row text-justify">
                        <div class="span9">
                            <strong>OBJETIVO GENERAL. &nbsp; </strong> <br> {{ $inzucoSoft->objetivos_general }}  
                        </div>
                    </div>
                    <br> 

                </div>
         
          </div>
       @endforeach
    </div>
@endsection