<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        // orderBy i desc a created_at es posa a l'inici l'ultim creat
        $events = Event::orderBy('dia_hora', 'asc')->get();
        return view('pagina_manager', compact('events'));
    }

}
