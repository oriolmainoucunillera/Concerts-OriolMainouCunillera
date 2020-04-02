@extends('layouts.app')

@section('content')

    <div class="container py-3">

        @if(session('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align: center">
                {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div id="explicacio" class="py-4" style="text-align:center;">
            <h1>JBalmes TicketConcerts</h1>
            <h5 style="margin: 30px">
                Som l'empresa més valorada de venda d'entrades de concerts a Catalunya amb més de 53 mil usuaris registrats.
                Entra per comprar les entrades dels teus artistes favortits.
            </h5>
        </div>

        <div class="row justify-content-center" style="text-align: center">
            @foreach($events as $event)
                @if (($event->entrades_disponibles > 0) AND (strtotime(date("d-m-Y H:i:00",time())) < strtotime($event->dia_hora)))
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
                                <a href="{{ route('veure_event', $event->id) }}" class="btn btn-primary">Veure més</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
