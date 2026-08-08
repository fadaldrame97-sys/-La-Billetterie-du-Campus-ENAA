<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationService
{
    public function getUserReservations()
    {
        return Reservation::where('user_id', Auth::id())->get();
    }

    public function createReservation(Event $event)
    {
       
        $dejaReserve = Reservation::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();

        if ($dejaReserve) {
            return null;
        }

    
        $nombreReservations = Reservation::where('event_id', $event->id)->count();

        if ($nombreReservations >= $event->capacity) {
            return null;
        }

        
        return Reservation::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'ticket_code' => 'BDE-' . uniqid(),
        ]);
    }
}