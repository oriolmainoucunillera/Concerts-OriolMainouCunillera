@extends('layouts.app')

@section('content')

    <div class="container py-3">

        @if(session('eliminar'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('eliminar') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div id="botons" class="float-right">
            <a href="{{ route('home') }}" class="btn btn-outline-primary">Pagina Inicial</a>
            <a href="{{ route('crear_events') }}" class="btn btn-primary">Crear concert</a>
        </div> <br>

        <div id="explicacio" class="py-4" style="text-align:center;">
            <h1>Els meus concerts</h1>
            <h5>Concerts que han estat creats per {{ Auth::user()->name }}:</h5>
        </div>

        <div class="row justify-content-center" style="text-align: center">
            @foreach($events as $event)
                @if (($event->id_usuari) == \Illuminate\Support\Facades\Auth::id())
                    <div class="p-4">
                        <div class="card" style="width: 19rem">
                            <img class="card-img-top" src="../storage/app/{{$event->imatge}}" alt="img" height="220" width="200">
                            <div class="card-body">
                                <h3 class="card-title">{{$event->titol}}</h3>
                                <p class="card-text">{{$event->artista}}</p>
                                <hr>
                                <p>{{$event->dia_hora}}</p>
                                <p>Entrades disponibles: {{$event->entrades_disponibles}}</p>
                                <hr>
                                @if($event->entrades_disponibles == $event->aforament)
                                    <!-- EDITAR -->
                                    <a href="{{ route('editar_events', $event->id) }}" class="btn btn-warning">Editar</a>
                                    <!-- ELIMINAR -->
                                    <a href="javascript: document.getElementById('delete-{{$event->id}}').submit()" class="btn btn-danger">Eliminar</a>
                                    <form method="post" action="{{ route('eliminar_events', $event->id) }}" id="delete-{{$event->id}}">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    @else
                                        <h5 class="card-subtitle text-muted">S'ha venut entrades. Actualment, ja no es pot editar ni eliminar.</h5>
                                    @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
