@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1>Lista de articulos</h1>
			@foreach($posts as $post)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{ $post->name }}</h3>
				</div>
				<div class="panel-body">
					<!--==============================================
					=            Imagen           					 =
					= pregunta si trae una ruta para la imagen y sino=
					= Coloca la que se asigno por defecto.
					===============================================-->
					@if($post->file)
						<img src="{{ $post->file }}" class="img-responsive">
					@else
						<img src="http://localhost/inzucosoft/becas013/public/image/Post/aaaNoInzucoSoft.png" class="img-responsive">
					@endif
					{{ $post->excerpt }}
					<a href="{{ route('post', $post->slug) }}" class="pull-right">Leer mas ...</a>
					<!--====  End of Imagen  ====-->
				</div>
			</div>
			<br>
			@endforeach
			
			{{ $posts->render() }}
		</div>
	</div>
@endsection