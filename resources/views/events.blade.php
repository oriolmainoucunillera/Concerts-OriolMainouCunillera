@extends('layouts.app')

@section('content')

    <div class="container py-3">
        <div class="row justify-content-center" style="text-align: center">
            <div class="card" style="width: 25rem;">
                <img class="card-img-top" src="../storage/app/{{$event->imatge}}" alt="img" height="250" width="200">
                <div class="card-body">
                    <h2 class="card-title">{{ $event->titol }}</h2>
                    <h5 class="card-subtitle mb-2 text-muted">{{ $event->artista }}</h5>
                    <p class="card-text">{{ $event->descripcio }}</p>
                    <hr>
                    <p class="card-text">Dia i hora: {{ $event->dia_hora }}</p>
                    <p class="card-text">Lloc: {{ $event->lloc }}</p>
                    <p class="card-text">Entrades disponibles: {{ $event->entrades_disponibles }}</p>
                    <hr>
                    @if($event->entrades_disponibles > 0)
                        <p class="card-text">Entrades a comprar:</p>
                        <form action="{{ route('comprar_entrades') }}" class="form-inline justify-content-center" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="number" min="1" max="{{$event->entrades_disponibles}}" name="entrades_comprar" class="form-control mx-sm-3">
                                <input type="hidden" name="id_event" value="{{ $event->id }}"> <!-- Està hidden, no es veu -->
                                <input type="submit" class="btn btn-info" value="Comprar" name="submit">
                            </div>
                        </form>
                    @else
                        <h5 class="card-subtitle text-muted">Entrades esgotades.</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
