<div class="form-group">
	{{ Form::label('Municipio', 'Nombre del Municipio') }}
	<!-- Recibe el areglo -->
	{{ Form::Select('Municipio', $municipios, null, ['id'=>'Municipio']) }}


	{{ Form::label('corregimiento', 'Nombre del Corregimieto') }}
	<!-- Recibe el areglo -->
	{{ Form::Select('corregimiento', ['placeholder'=>'Seleciona...'],null,['id'=>'corregimiento']) }}

</div>

<div class="form-group">
	{{ Form::label('name', 'Nombre del Barrio o la Vereda') }}
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







