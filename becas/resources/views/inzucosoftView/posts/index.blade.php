<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<!-- Cabecera -->
    					<h3>Lista de Publicaciones</h3>
    					<a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>  				
	    			</div>
						@if(empty($posts))<!-- Si no llega una variable $posts del controlador PostController.php-->
							<table class="table table-striped table-hover">
								<tbody>
	    							<tr>
	    								<th>
	    									<h4>Lamentamos informarle que usted no tiene ninguna publicación.</h4>
	    								</th>
	    							</tr>
	    						</tbody>
		    				</table>
						@else
							<div class="panel-body">
	    					<!-- Cuerpo -->
		    					<table class="table table-striped table-hover">
		    						<thead>
		    							<tr>
		    								<th width="10px">ID		</th>   
		    								<th>             Nombre	</th>
		    								<th colspan="3">&nbsp;</th>
		    							</tr>
		    						</thead>
		    						<tbody>
										@foreach ($posts as $post)
											<tr>
												<!-- ID de la etiqueta -->	
										    	<td>{{ $post->id }}</td>
										    	<!-- Nombre de la etiqueta -->	
										    	<td>{{ $post->name }}</td>
										    	<!-- Boton VER -->	
										    	<td width="10px">
										    		<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default">
										    			Ver
										    		</a>
										    	</td>		
										    	<!-- Boton Editar -->						    	
										    	<td width="10px">
										    		<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-default">
										    			Editar
										    		</a>
										    	</td>
										    	<!-- Eliminar es un formulario por seguridad -->
										    	<td width="10px">
										    		{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
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
		    					{{ $posts->render() }}
		    				</div>		    			
						@endif
    			</div>
    		</div>
    	</div>
    </div>
@endsection