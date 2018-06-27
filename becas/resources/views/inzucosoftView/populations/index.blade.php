<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">

	    				<div class="panel-heading">
	    					<!-- Cabecera -->
	    					<div><h3>Lista de Población</h3></div>
	    					<a href="{{ route('poblaciones.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>  				
		    			</div>
		    			<div class="panel-body">		    			
		    			@if(empty($populations))
							<table class="table table-striped table-hover">
								<tbody>
	    							<tr>
	    								<th> 
	    									<h4>Lamentamos informarle que no existen Población.</h4>
	    								</th>
	    							</tr>
	    						</tbody>
		    				</table>
    					@else
	    					<!-- Cuerpo -->
	    					<table class="table table-striped table-hover">
	    						<thead>
	    							<tr>
	    								<th width="10px">ID</th>
	    								<th>NOMBRE</th>
	    								<th>DESCRIPCIÓN</th>
	    								<th colspan="3">&nbsp;</th>
	    							</tr>
	    						</thead>
	    						<tbody>
									@foreach ($populations as $population)
										<tr>
											<!-- ID de la etiqueta -->	
									    	<td>{{ $population->id }}</td>
									    	<!-- Nombre de la etiqueta -->	
									    	<td>{{ $population->popu_nombre }}</td>
									    	<td>{{ $population->popu_description }}</td>
									    	<!-- Boton VER -->	
									    	<td width="10px">
									    		<a href="{{ route('poblaciones.show', $population->id) }}" class="btn btn-sm btn-default">
									    			Ver
									    		</a>
									    	</td>		
									    	<!-- Boton Editar -->						    	
									    	<td width="10px">
									    		<a href="{{ route('poblaciones.edit', $population->id) }}" class="btn btn-sm btn-default">
									    			Editar
									    		</a>
									    	</td>
									    	<!-- Eliminar es un formulario por seguridad -->
									    	<td width="10px">
									    		{!! Form::open(['route' => ['poblaciones.destroy', $population->id], 'method' => 'DELETE']) !!}
									    			<button class="btn btn-sm btn-danger">
									    				Eliminar
									    			</button>
									    		{!! form::close() !!}
									    	</td>
									    </tr>
									@endforeach
	    						</tbody>
	    					</table>
	    					<!--================================
	    					=            Paginacion            =
	    					=================================-->
	    					{{ $populations->render() }}
	    				@endif
		    		</div>
		    		
    			</div>
    		</div>
    	</div>
    </div>
@endsection