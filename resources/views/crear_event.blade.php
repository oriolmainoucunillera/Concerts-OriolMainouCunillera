@extends('layouts.app')

@section('content')

    <div class="container py-3">
        <div class="card">
            <div class="card-header">
                <h3>
                    Crear concerts
                    <a href="{{route('home')}}" class="btn btn-warning float-right">Pàgina inicial</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('creacio_event') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Títol:</label>
                            <input type="text" name="titol" class="form-control" maxlength="255" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Artista:</label>
                            <input type="text" class="form-control" name="artista" maxlength="255" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripció:</label>
                        <textarea class="form-control" name="descripcio" rows="4" maxlength="4000" required></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Dia i hora:</label>
                            <input type="datetime-local" name="dia_hora" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Localització:</label>
                            <input type="text" class="form-control" name="lloc" maxlength="255" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Aforament:</label>
                            <input type="number" name="aforament" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Imatge:</label>
                            <input type="file" name="imatge_portada" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="float-right">
                        <input type="reset" value="Cancel·lar" class="btn btn-danger">
                        <input type="submit" value="Crear Projecte" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
