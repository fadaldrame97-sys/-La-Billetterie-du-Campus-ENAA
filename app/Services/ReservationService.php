<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



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
      
        $dejaReserve = Reservation::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($dejaReserve) {
            return [
                'success' => false,
                'message' => 'Vous avez déjà réservé cet événement.'
            ];
        }

       
        $nombreReservations = Reservation::where('event_id', $event->id)
            ->count();

        if ($nombreReservations >= $event->capacity) {
            return [
                'success' => false,
                'message' => 'Cet événement est complet.'
            ];
        }

    
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
           'ticket_code' => 'BDE-2026-' . Str::upper(Str::random(5)),
        ]);

        return [
            'success' => true,
            'reservation' => $reservation
        ];
    }
}