<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">

	    				<div class="panel-heading">
	    					<!-- Cabecera -->
	    					<div><h3>Lista de Corregimientos</h3></div>
	    					<a href="{{ route('corregimientos.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>  				
		    			</div>
		    			<div class="panel-body">
		    			@if(empty($corregimientos))
							<table class="table table-striped table-hover">
								<tbody>
	    							<tr>
	    								<th> 
	    									<h4>Lamentamos informarle que no existen Corregimientos.</h4>
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
	    								<th>CORREGIMIENTOS</th>
	    								<th>TIPO</th>
	    								<th>MUNICIPIO</th>
	    								<th colspan="3">&nbsp;</th>
	    							</tr>
	    						</thead>
	    						<tbody>
									@foreach ($corregimientos as $queryInzuco)
										<tr>
											<!-- ID de la etiqueta -->	
									    	<td>{{ $queryInzuco->corr_codigo }}</td>
									    	<!-- Nombre de la etiqueta -->	
									    	<td>{{ $queryInzuco->corr_nombre }}</td>
									    	<td>{{ $queryInzuco->corr_type }}</td>
									    	<td>{{ $queryInzuco->muni_nombre }}</td>
									    	<!-- Boton VER -->	
									    	<td width="10px">
									    		<a href="{{ route('corregimientos.show', $queryInzuco->id) }}" class="btn btn-sm btn-default">
									    			Ver
									    		</a>
									    	</td>		
									    	<!-- Boton Editar -->						    	
									    	<td width="10px">
									    		<a href="{{ route('corregimientos.edit', $queryInzuco->id) }}" class="btn btn-sm btn-default">
									    			Editar
									    		</a>
									    	</td>
									    	<!-- Eliminar es un formulario por seguridad -->
									    	<td width="10px">
									    		{!! Form::open(['route' => ['corregimientos.destroy', $queryInzuco->id], 'method' => 'DELETE']) !!}
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
	    					{{ $corregimientos->render() }}
	    				@endif
		    		</div>
		    		
    			</div>
    		</div>
    	</div>
    </div>
@endsection