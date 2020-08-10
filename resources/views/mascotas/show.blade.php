@extends('layouts.app')

@section('content')

<a href="/mascotas" class="btn btn-default">Regresar</a>

<h1>{{$m->name}}</h1>
<p>Dueño: {{$m->owner}}</p>
<p>{{$m->description}}</p>
<hr>
<p>Last updated: {{$m->updated_at}}</p>
<p>Created: {{$m->created_at}}</p>

@if(!Auth::guest())
@if(Auth::user()->email == $m->owner)

<br>
<a href="/mascotas/{{$m->id}}/edit" class="btn btn-default">Editar</a>

{!!Form::open(['action' => ['MascotasController@destroy', $m->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Eliminar', ['class' => 'btn btn-danger'])}}

@endif
@endif
{{-- <p>Lo sentimos, no se han encontrado la mascota seleccionada</p>
 --}}
@endsection