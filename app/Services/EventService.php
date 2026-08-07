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