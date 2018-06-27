<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-md-offset-0">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<!-- Cabecera -->
    					<h3>Ver Municipio</h3>
	    			</div>
	    			<div class="panel-body">
						<p><strong>NOMBRE:</strong> <br>  {{ $municipality->muni_nombre }}</p>
						<p><strong>DESCRIPCIÓN:</strong>  <br>   {{ $municipality->muni_descripcion }}</p>
                        <p><strong>FECHA DE CREACIÓN:</strong> <br>  {{ $municipality->created_at }}</p>
                        <p><strong>FECHA DE MODIFICACIÓN:</strong>  <br>   {{ $municipality->updated_at }}</p>

	    			</div>
    			</div>
                <div width="10px">
                    <a href="{{ route('municipalities.index') }}" class="btn btn-sm btn-inverse">
                        .: Regresar :.
                    </a>
                </div>
    		</div>
    	</div>
    </div>
@endsection