<!-- Stored in resources/views/child.blade.php -->

@extends('inzucosoftView.PanelVista')

@section('contentenido')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- Cabecera -->
                        <h3>Crear Etiqueta</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'tags.store']) !!}
                            @include('inzucosoftView.tags.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection