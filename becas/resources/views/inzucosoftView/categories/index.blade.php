<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">

	    				<div class="panel-heading">
	    					<!-- Cabecera -->
	    					<div><h3>Lista de Categorias</h3></div>
	    					<a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>  				
		    			</div>
		    			<div class="panel-body">
		    			@if(empty($categories))
							<table class="table table-striped table-hover">
								<tbody>
	    							<tr>
	    								<th> 
	    									<h4>Lamentamos informarle que no existen categorias.</h4>
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
	    								<th colspan="3">&nbsp;</th>
	    							</tr>
	    						</thead>
	    						<tbody>
									@foreach ($categories as $category)
										<tr>
											<!-- ID de la etiqueta -->	
									    	<td>{{ $category->id }}</td>
									    	<!-- Nombre de la etiqueta -->	
									    	<td>{{ $category->name }}</td>
									    	<!-- Boton VER -->	
									    	<td width="10px">
									    		<a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-default">
									    			Ver
									    		</a>
									    	</td>		
									    	<!-- Boton Editar -->						    	
									    	<td width="10px">
									    		<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-default">
									    			Editar
									    		</a>
									    	</td>
									    	<!-- Eliminar es un formulario por seguridad -->
									    	<td width="10px">
									    		{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
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
	    					{{ $categories->render() }}
	    				@endif
		    		</div>
		    		
    			</div>
    		</div>
    	</div>
    </div>
@endsection