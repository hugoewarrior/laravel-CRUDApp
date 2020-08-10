@extends('layouts.app')

@section('content')
<h1> Mis Mascotas </h1>

    @if(count($mascotas) >= 1 )
    @foreach ($mascotas as $mascota)
        <div class="well">
            <a href="mascotas/{{$mascota->id}}">
            <h3>{{$mascota->name}}</h3>
            </a>
            <p>{{$mascota->description}}</p>
            <p>Última vez: {{$mascota->updated_at}}</p>
        </div>   
    @endforeach
    @else
     <p>Lo sentimos, no se han encontrado mascotas para </p>
    @endif
@endsection