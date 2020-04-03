<?php

namespace App\Http\Controllers;
use App\Compra;
use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // orderBy i desc a created_at es posa a l'inici l'ultim creat
        $events = Event::orderBy('dia_hora', 'asc')->get();
        return view('home', compact('events'));
    }

    public function veure_event($id)
    {
        $event = Event::findOrFail($id);
        return view('events', compact('event'));
    }

    public function comprar(Request $request)
    {
        $hora = Carbon::now();
        $compra = new Compra();
        $compra->id_usuari = Auth::id();
        $compra->id_event = $request->input('id_event');
        $compra->entrades = $request->input('entrades_comprar');
        $compra->data_hora_compra = $hora ;
        $compra->save();

        $num = DB::table("events")->where('id', $compra->id_event)->value("entrades_disponibles");
        $result = $num - $compra->entrades;

        DB::table('events')->where('id', $compra->id_event)->update(['entrades_disponibles' => $result ]);

        return redirect()->route('home')->with('info', 'Compra feta correctament.');
    }
}
