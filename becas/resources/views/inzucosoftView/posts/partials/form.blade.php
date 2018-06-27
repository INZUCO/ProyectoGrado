<!--==========================================================================
	Un campo oculto (user_id). Se le pasa el usuario registrado en ese mometo. 
===========================================================================-->
{{ form::hidden('user_id', auth()->user()->id) }}


<!--=============================================
=            SELECT de Categorias             =
=============================================-->
<div class="form-group">
	{{ Form::label('category_id', 'Categorias') }}
	{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>


<div class="form-group">
	{{ Form::label('name', 'Nombre de la etiqueta') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<!--=============================================
=            SELECT de Imagen                   =
=============================================-->
<div class="form-group">
	{{ Form::label('file', 'file') }}
	{{ Form::file('file') }}
</div>

<!--=============================================
=            SELECT de Radio Button             =
=============================================-->
<div class="form-group">
	{{ Form::label('status', 'Estado') }}
	  <!-- Solo los administradores le sale publicado-->
      @if(Auth::user()->user != 'USER12')
		<label>
			{{ Form::radio('status', 'PUBLISHED') }} Publicado
		</label>
      @endif	
	<label>
		{{ Form::radio('status', 'DRAFT', 'true') }} Borrador
	</label>
</div>

<!--=============================================
=            SELECT de CheckBox                 =
=============================================-->
<div class="form-group">
	{{ Form::label('tags', 'Etiquetas') }}
	<div>
		@foreach($tags as $tag)
			<label>
				<!-- Se envia un array al controlador para salvar tags[]-->
				{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}   <!--Imprime el nombre-->
			</label>
		@endforeach
	</div>
</div>

<div class="form-group">
	{{ Form::label('excerpt', 'Extracto') }}
	{{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
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

	<!--  asset(' busca dentro de la carpeta public/stringToSlug -->
	<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>

	<!--  asset(' busca dentro de la carpeta public/ckeditor -->
	<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

	<script type="text/javascript">
		//stringToSlug
		$(document).ready( function() {
			$("#name").stringToSlug({
				callback: function(text){
					$("#slug").val(text); 
				}
			});
		});

		//ckeditor
		CKEDITOR.config.heigth = 400; //Alto		
		CKEDITOR.config.width = 'auto'; //Ancho
		CKEDITOR.replace('body');
	</script>
@endsection