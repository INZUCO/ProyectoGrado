<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">

	    				<div class="panel-heading">
	    					<!-- Cabecera -->
	    					<div><h3>Lista de proyectos</h3></div>
	    					<a href="{{ route('proyectos.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>  				
		    			</div>
		    			<div class="panel-body">		    			
		    			@if(empty($proyectos))
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
	    								<!--<th width="10px">ID</th>-->
	    								<th>CODIGO</th>
	    								<th>NOMBRE</th>
	    								<th>ESTUDIANTE</th>
	    								<th colspan="3">&nbsp;</th>
	    							</tr>
	    						</thead>
	    						<tbody>
									@foreach ($proyectos as $queryInzuco)
										<tr>
											<!-- ID de la etiqueta -->	
									    	<td>{{ $queryInzuco->proy_codigo }}</td>
									    	<!-- Nombre de la etiqueta -->	
									    	<td>{{ $queryInzuco->proy_nombre }}</td>
									    	<td>{{ $queryInzuco->name.' '.$queryInzuco->first_surname }}</td>
									    	<!-- Boton VER -->	
									    	<td width="10px">
									    		<a href="{{ route('proyectos.show', $queryInzuco->projectuserid) }}" class="btn btn-sm btn-default">
									    			Ver
									    		</a>
									    	</td>		
									    	<!-- Boton Editar -->						    	
									    	<td width="10px">
									    		<a href="{{ route('proyectos.edit', $queryInzuco->projectuserid) }}" class="btn btn-sm btn-default">
									    			Editar
									    		</a>
									    	</td>
									    	<!-- Eliminar es un formulario por seguridad -->
									    	<td width="10px">
									    		{!! Form::open(['route' => ['proyectos.destroy', $queryInzuco->projectuserid], 'method' => 'DELETE']) !!}
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
	    					{{ $proyectos->render() }}
	    				@endif
		    		</div>
		    		
    			</div>
    		</div>
    	</div>
    </div>
@endsection