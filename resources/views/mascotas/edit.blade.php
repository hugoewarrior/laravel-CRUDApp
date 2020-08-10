@extends('layouts.app')

@section('content')
<h1>Editar información de: <span style="font-weight: bold;">{{$m->name}} </span></h1>
{!! Form::open(['action' => ['MascotasController@update', $m->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Nombre')}}
        {{Form::text('name', $m->name, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Descripción')}}
        {{Form::textarea('description', $m->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Descripción' ])}}
    </div>
{{--     <div class="form-group">
        {{Form::file('cover_image')}}
    </div> --}}
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Guardar', ['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}


{!! Form::close() !!}
@endsection