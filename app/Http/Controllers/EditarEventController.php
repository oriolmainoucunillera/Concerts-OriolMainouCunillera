<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EditarEventController extends Controller
{
    // CONTROLADOR PER EDITAR I ELIMINAR CONCERTS/EVENTS

    public function index()
    {
        //$events = Event::all();
        return view('editar_event');
    }

    public function eliminar($id)
    {
        $event = Event::findOrFail($id);
        // return $event; --> aqui ens donaria un JSON amb dades de event seleccionat
        $event->delete();
        return redirect()->route('pagina_manager')->with('eliminar', 'Eliminat correctament');
    }

    public function editar($id)
    {
        $event = Event::findOrFail($id);
        return view('editar_events', compact('event'));
    }

    public function editant_event(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->titol = $request->input('titol');
        $event->artista = $request->input('artista');
        $event->descripcio = $request->input('descripcio');
        $event->dia_hora = $request->input('dia_hora');
        $event->lloc = $request->input('lloc');
        $event->aforament = $request->input('aforament');
        $event->entrades_disponibles = $request->input('entrades_disponibles');
        $event->save();

        return redirect()->route('pagina_manager');
    }
}
