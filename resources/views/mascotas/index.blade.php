@extends('layouts.app')

@section('content')
<h1> Galeria de Mascotas </h1>

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
    {{$mascotas->links()}}
    @else
     <p>Lo sentimos, no se han encontrado mascotas</p>
    @endif
@endsection