<div class="form-group">
	{{ Form::label('name', 'Nombre de la Categoria') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
	{{ Form::label('body', 'Descripcion') }}
	{{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

<!--=====================================
=   Se manipulara .js desde este punto  =
======================================-->
@section('scriptInzucoSoft')

	<!--  asset(' busca dentro de la carpeta PUBLIC -->
	<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready( function() {
			$("#name").stringToSlug({
				callback: function(text){
					$("#slug").val(text); 
				}
			});
		});
	</script>
@endsection