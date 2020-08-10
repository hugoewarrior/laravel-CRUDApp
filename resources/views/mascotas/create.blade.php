@extends('layouts.app')

@section('content')
<h1>Registrar nueva mascota</h1>
{!! Form::open(['action' => 'MascotasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Nombre')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nombre'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Descripción')}}
        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Descripción'])}}
    </div>
{{--     <div class="form-group">
        {{Form::file('cover_image')}}
    </div> --}}
    {{Form::submit('Guardar', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection