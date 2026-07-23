<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
      $events=Event::all();

        return view('admin.dashboard',compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }


    public function liste(){

        $events=Event::all();

        return view('events.index',compact('events'));
       
    }

    public function store(Request $request){

        $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => 'required',
        'time' => 'required',
        'location' => 'required',
        'price' => 'required|integer',
        'capacity' => 'required|integer|min:1',
    ]);

    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->date,
        'time' => $request->time,
        'location' => $request->location,
        'price' => $request->price,
        'capacity' => $request->capacity,
    ]);
     return redirect()->route('admin.dashboard');


    }
}