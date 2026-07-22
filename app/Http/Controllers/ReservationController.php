<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Event $event){



        $ReserveDeja=Reservation::where('user_id',Auth::id())->where('event_id',$event->id)->first();
        if($ReserveDeja)  return back()->with('error', 'Vous avez déja réservé pour cet évènement !');

        $nombreReservations=Reservation::where('event_id',$event->id)->count();
        if($nombreReservations>= $event->capacity){
            return back()->with('error', 'Toutes les place sont occupées');
        }


        

        Reservation::create([
        'user_id' => Auth::id(),
        'event_id' => $event->id,
        'ticket_code' => 'PASS'.uniqid(),
       ]);

      


       return redirect()->route('events.index');

    }
}
