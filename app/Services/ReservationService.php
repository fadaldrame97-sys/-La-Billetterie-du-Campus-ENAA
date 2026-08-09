<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationService
{
    public function getUserReservations()
    {
        return Reservation::where('user_id', Auth::id())
            ->with('event')
            ->get();
    }

    public function createReservation(Event $event)
    {
        // Vérifier si l'étudiant a déjà réservé
        $dejaReserve = Reservation::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($dejaReserve) {
            return [
                'success' => false,
                'message' => 'Vous avez déjà réservé cet événement.'
            ];
        }

        // Compter les réservations
        $nombreReservations = Reservation::where('event_id', $event->id)
            ->count();

        // Vérifier la capacité
        if ($nombreReservations >= $event->capacity) {
            return [
                'success' => false,
                'message' => 'Cet événement est complet.'
            ];
        }

        // Créer la réservation
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'ticket_code' => 'BDE-' . uniqid(),
        ]);

        return [
            'success' => true,
            'reservation' => $reservation
        ];
    }
}