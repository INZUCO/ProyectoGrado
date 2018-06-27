<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<!-- Cabecera -->
    					<h3>Lista de Etiquetas</h3>
    					<a href="{{ route('tipodocumento.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>  				
	    			</div>

			    	<div class="panel-body">
			    		@if(empty($documentos))<!-- Si no llega una variable $posts del controlador PostController.php-->
							<table class="table table-striped table-hover">
								<tbody>
	    							<tr>
	    								<th> <h3>Lamentamos informarle que no hay Etiquetas.</th></h3>
	    							</tr>
	    						</tbody>
		    				</table>
						@else
	    					<!-- Cuerpo -->
	    					<table class="table table-striped table-hover">
	    						<thead>
	    							<tr>
	    								<th width="10px">TIPO</th>
	    								<th>NOMBRE</th>
	    								<th colspan="3">&nbsp;</th>
	    							</tr>
	    						</thead>
	    						<tbody>
									@foreach ($documentos as $tag)
										<tr>
											<!-- ID de la etiqueta -->	
									    	<td>{{ $tag->doty_codigo }}</td>
									    	<!-- Nombre de la etiqueta -->	
									    	<td>{{ $tag->doty_nombre }}</td>
									    	<!-- Boton VER -->	
									    	<td width="10px">
									    		<a href="{{ route('tipodocumento.show', $tag->id) }}" class="btn btn-sm btn-default">
									    			Ver
									    		</a>
									    	</td>		
									    	<!-- Boton Editar -->						    	
									    	<td width="10px">
									    		<a href="{{ route('tipodocumento.edit', $tag->id) }}" class="btn btn-sm btn-default">
									    			Editar
									    		</a>
									    	</td>
									    	<!-- Eliminar es un formulario por seguridad -->
									    	<td width="10px">
									    		{!! Form::open(['route' => ['tipodocumento.destroy', $tag->id], 'method' => 'DELETE']) !!}
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
	    					{{ $documentos->render() }} 
	    				@endif
			    	</div>	
    			</div>
    		</div>
    	</div>
    </div>
@endsection