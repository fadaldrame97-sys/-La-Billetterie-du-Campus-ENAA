<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Event;
class ReservationController extends Controller
{
    public function store(Event $event){

        $resrvation=Reservation::where('event_id',$event->id)->count();
    }
}
