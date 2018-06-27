<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">
	    				<div class="panel-heading">
	    					<!-- Cabecera -->
	    					<div><h3>Lista de Institución</h3></div>
	    					<a href="{{ route('poblaciones.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>	
		    			</div>    
		    			<div class="panel-body">
		    			@if(empty($institutions))	
							<table class="table table-striped table-hover">
								<tbody>
	    							<tr>
	    								<th> 
	    									<h4>Lamentamos informarle que no existen Institución Creada.</h4>
	    								</th>
	    							</tr>
	    						</tbody>
		    				</table>							
    					@else
	    					<!-- Cuerpo -->
	    					<table class="table table-striped table-hover">
	    						<thead>
	    							<tr>
	    								<!--<th width="10px">ID</th>-->
	    								<th>NOMBRE</th>
	    								<th>TELEFONO</th>
	    								<th>CONTACTO</th>
	    								<th colspan="3">&nbsp;</th>
	    							</tr>
	    						</thead>	
	    						<tbody>
									@foreach ($institutions as $queryInzuco)
		    							<tr>
		    								<td>{{ $queryInzuco->nombre }}</td>
		    								<td>{{ $queryInzuco->telefono }}</td>
		    								<td>{{ $queryInzuco->contacto }}</td>
									    	<!-- Boton VER -->	
									    	<td width="10px">
									    		<a href="{{ route('instituciones.show', $queryInzuco->id) }}" class="btn btn-sm btn-default">
									    			Ver
									    		</a>
									    	</td>		
									    	<!-- Boton Editar -->						    	
									    	<td width="10px">
									    		<a href="{{ route('instituciones.edit', $queryInzuco->id) }}" class="btn btn-sm btn-default">
									    			Editar
									    		</a>
									    	</td>
									    	<!-- Eliminar es un formulario por seguridad -->
									    	<td width="10px">
									    		{!! Form::open(['route' => ['instituciones.destroy', $queryInzuco->id], 'method' => 'DELETE']) !!}
									    			<button class="btn btn-sm btn-danger">
									    				Eliminar
									    			</button>
									    		{!! form::close() !!}
									    	</td>			    								
		    							</tr>
									@endforeach		    							
	    						</tbody>    

		    					<!--================================
		    					=            Paginacion            =
		    					=================================-->
		    					{{ $institutions->render() }}	    													    						
	    					</table>
	    				@endif    							    				    				
		    		</div>		    							
    			</div>
    		</div>
    	</div>
    </div>
@endsection