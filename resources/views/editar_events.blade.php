@extends('layouts.app')

@section('content')

    <div class="container py-3">
        <div class="card">
            <div class="card-header">
                <h3>
                    Editar concert
                    <a href="{{route('home')}}" class="btn btn-warning float-right">Pàgina inicial</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('editant_events', $event->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Títol:</label>
                            <input type="text" value="{{ $event->titol }}" name="titol" class="form-control" maxlength="255" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Artista:</label>
                            <input type="text" value="{{ $event->artista }}" class="form-control" name="artista" maxlength="255" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripció:</label>
                        <textarea class="form-control" name="descripcio" rows="4" maxlength="4000" required>{{ $event->descripcio }}</textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Dia i hora (assignar l'hora de l'event):</label>
                            <input type="datetime-local" name="dia_hora" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Localització:</label>
                            <input type="text" value="{{ $event->lloc }}" class="form-control" name="lloc" maxlength="255" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Aforament:</label>
                            <input type="number" value="{{ $event->aforament }}" name="aforament" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Entrades disponibles:</label>
                            <input type="number" value="{{ $event->entrades_disponibles }}" name="entrades_disponibles" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="float-right">
                        <a href="{{ route('pagina_manager') }}" class="btn btn-danger">No guardar</a>
                        <input type="submit" value="Actualitzar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
