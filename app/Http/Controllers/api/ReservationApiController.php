<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Services\ReservationService;

class ReservationApiController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function store(Event $event)
    {
        $reservation = $this->reservationService
            ->createReservation($event);

        if (!$reservation) {
            return response()->json([
                'message' => 'Vous avez déjà réservé ou l’événement est complet.'
            ], 400);
        }

        return response()->json([
            'message' => 'Réservation effectuée avec succès.',
            'reservation' => $reservation
        ], 201);
    }

    public function index()
    {
        $reservations = $this->reservationService
            ->getUserReservations();

        return response()->json($reservations);
    }
}