<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Services\EventService;

class EventApiController extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function index()
    {
        return response()->json(
            $this->eventService->getAllEvents()
        );
    }

    public function show(Event $event)
    {
        return response()->json(
            $this->eventService->getEvent($event)
        );
    }

    public function store(StoreEventRequest $request)
    {
        $event = $this->eventService
            ->createEvent($request->validated());

        return response()->json([
            'message' => 'Evénement créé avec succès.',
            'event' => $event
        ], 201);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event = $this->eventService
            ->updateEvent($event, $request->validated());

        return response()->json([
            'message' => 'Evénement modifié avec succès.',
            'event' => $event
        ]);
    }

    public function destroy(Event $event)
    {
        $this->eventService->deleteEvent($event);

        return response()->json([
            'message' => 'Evénement supprimé avec succès.'
        ]);
    }
}