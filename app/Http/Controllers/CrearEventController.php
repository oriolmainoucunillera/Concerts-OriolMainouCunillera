<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrearEventController extends Controller
{
    public function index()
    {
        return view('crear_event');
    }

    public function crear_event(Request $request)
    {
        $event = new Event();
        $event->titol = $request->input('titol');
        $event->id_usuari = Auth::id();
        $event->artista = $request->input('artista');
        $fileIMG_portada = $request->file('imatge_portada');
        $nomOriginalIMG = $fileIMG_portada->getClientOriginalName();
        $event->imatge = $nomOriginalIMG;
        \Storage::disk('local')->put($nomOriginalIMG, \File::get($fileIMG_portada));
        $event->descripcio = $request->input('descripcio');
        $event->dia_hora = $request->input('dia_hora');
        $event->lloc = $request->input('lloc');
        $event->aforament = $request->input('aforament');
        $event->entrades_disponibles = $request->input('aforament');

        $event->save();
        $events = Event::all();

        return view("home", compact('events'));
    }
}
