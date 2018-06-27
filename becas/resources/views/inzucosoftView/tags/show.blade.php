<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<!-- Cabecera -->
    					<h3>Ver Etiqueta</h3>
	    			</div>
	    			<div class="panel-body">
						<p><strong>Nombre:</strong>{{ $tag->name }}</p>
						<p><strong>Slug:</strong>{{ $tag->slug }}</p>
	    			</div>
    			</div>
                <div width="10px">
                    <a href="{{ route('tags.index', $category->id) }}" class="btn btn-sm btn-default">
                        .: Regresar :.
                    </a>
                </div>
    		</div>
    	</div>
    </div>
@endsection