<?php

namespace App\Services;

use App\Models\Event;

class EventService
{
    public function getAllEvents()
    {
        return Event::all();
    }

    public function getEvent(Event $event)
    {
        return $event;
    }


    public function getEventsStats(){
    $events = Event::withCount('reservations')->get();

    foreach ($events as $event) {
        $event->nombre_reservations = $event->reservations_count;
        $event->places_restantes = $event->capacity - $event->reservations_count;
    }

    return $events;
    }
    

    public function createEvent(array $data)
    {
        return Event::create($data);
    }

    public function updateEvent(Event $event, array $data)
    {
        $event->update($data);

        return $event;
    }

    public function deleteEvent(Event $event)
    {
        $event->delete();
    }
}