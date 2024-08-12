<?php

namespace App\Http\Controllers;

use App\Models\Event;

class SiteController extends Controller
{
    public function index()
    {
        $events = new Event();
        $events = $events->getEventsPublishActive();

        if ($events->isEmpty()) {
            // Se não houver eventos, pode redirecionar ou mostrar uma mensagem de erro
            return view('welcome', ['events' => [], 'message' => 'Nenhum evento encontrado.']);
        }

        $eventTicket = Event::findOrFail($events[0]->id);

        return view('welcome', compact("events"));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $tickets = $event->ticket()->get();

        return view('site_events_show', compact("event", "tickets"));
    }
}
