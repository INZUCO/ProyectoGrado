<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">

	    				<div class="panel-heading">
	    					<!-- Cabecera -->
	    					<div><h3>Lista de Municipios</h3></div>
	    					<a href="{{ route('municipalities.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>  				
		    			</div>
		    			<div class="panel-body">
		    			@if(empty($municipalities))
							<table class="table table-striped table-hover">
								<tbody>
	    							<tr>
	    								<th> 
	    									<h4>Lamentamos informarle que no existen Municipios.</h4>
	    								</th>
	    							</tr>
	    						</tbody>
		    				</table>
    					@else
	    					<!-- Cuerpo -->
	    					<table class="table table-striped table-hover">
	    						<thead>
	    							<tr>
	    								<th width="10px">CODIGO</th>
	    								<th>NOMBRE</th>
	    								<th>DESCRIPCIÓN</th>
	    								<th colspan="3">&nbsp;</th>
	    							</tr>
	    						</thead>
	    						<tbody>
									@foreach ($municipalities as $category)
										<tr>
											<!-- ID de la etiqueta -->	
									    	<td>{{ $category->muni_codigo }}</td>
									    	<!-- Nombre de la etiqueta -->	
									    	<td>{{ $category->muni_nombre }}</td>
									    	<td>{{ $category->muni_descripcion }}</td>
									    	
									    	<!-- Boton VER -->	
									    	<td width="10px">
									    		<a href="{{ route('municipalities.show', $category->id) }}" class="btn btn-sm btn-default">
									    			Ver
									    		</a>
									    	</td>		
									    	<!-- Boton Editar -->						    	
									    	<td width="10px">
									    		<a href="{{ route('municipalities.edit', $category->id) }}" class="btn btn-sm btn-default">
									    			Editar
									    		</a>
									    	</td>
									    	<!-- Eliminar es un formulario por seguridad -->
									    	<td width="10px">
									    		{!! Form::open(['route' => ['municipalities.destroy', $category->id], 'method' => 'DELETE']) !!}
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
	    					{{ $municipalities->render() }}
	    				@endif
		    		</div>
		    		
    			</div>
    		</div>
    	</div>
    </div>
@endsection