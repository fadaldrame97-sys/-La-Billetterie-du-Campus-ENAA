<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventApiController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function show(Event $event){
    
    return response()->json($event);
    }
}