<?php

use Illuminate\Support\Facades\Route;

// Pagina inicial '/'
Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

// Pagina inicial '/home'
Route::get('/home', 'HomeController@index')->name('home');

// Veure producte
Route::get('/event_{id}', 'HomeController@veure_event')->name('veure_event');

// Comprar entrades
Route::post('/comprant_entrades', 'HomeController@comprar')->middleware('auth')->name('comprar_entrades');

// Crear event
Route::get('/crear_events', 'CrearEventController@index')->middleware('auth')->name('crear_events');
Route::post('/home', 'CrearEventController@crear_event')->middleware('auth')->name('creacio_event');

// Pagina dels managers
Route::get('manager', 'ManagerController@index')->middleware('auth')->name('pagina_manager');

// Eliminar i editar events
Route::delete('manager/eliminar_{id}', 'EditarEventController@eliminar')->middleware('auth')->name('eliminar_events');
Route::get('manager/editar_{id}', 'EditarEventController@editar')->middleware('auth')->name('editar_events');
Route::put('manager/editant_event_{id}', 'EditarEventController@editant_event')->middleware('auth')->name('editant_events');
