@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->name }}</h1>
			<div class="panel panel-default">
				<div class="panel-heading">
					Categoria
					<!--<a href="{ { route('category', $post->category->slug) }}">
						{ { $post->category->name }}
					</a> -->
					<a href="#">Nombre de la categoria... FALTA
					</a>
				</div>
				<div class="panel-body">
					@if($post->file)
						<img src="{{ $post->file }}" class="img-responsive">
					@else
						<img src="http://localhost/inzucosoft/becas013/public/image/Post/aaaNoInzucoSoft.png" class="img-responsive">
					@endif
					<!--{ { $post->excerpt }}-->
					<hr>
					{!! $post->body !!}
					<hr>
					Etiquetas
					@foreach($post->tags as $tag)
						<a href="{{ route('tag', $tag->slug) }}">
							{{ $tag->name }}
						</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection