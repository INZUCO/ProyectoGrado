<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<!-- Cabecera -->
    					<h3>Ver Publicación</h3>
	    			</div>
	    			<div class="panel-body">
						<p><strong>Nombre:</strong>   {{ $post->name }}</p>
						<p><strong>Slug:</strong>     {{ $post->slug }}</p>
                        <p><strong>Contenido:</strong></p>
                            {!! $post->body !!}
                        <hr>
	    			</div>
    			</div>
                <div width="10px">
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-default">
                        .: Regresar :.
                    </a>
                </div>
    		</div>
    	</div>
    </div>
@endsection
