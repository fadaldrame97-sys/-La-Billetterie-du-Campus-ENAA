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

    public function edi(Event $event){

        return view('admin.events.edit',compact('event'));

    }


    public function update(Request $request, Event $event){

    $request->validate([

        'title' => 'required',
        'description' => 'required',
        'date' => 'required',
        'time' => 'required',
        'location' => 'required',
        'price' => 'required|integer',
        'capacity' => 'required|integer|min:1',
    ]);

    $event->update($request->all());

    return redirect()->route('admin.dashboard')->with('success', 'Événement modifié avec succès.');
}


public function destroy(Event $event){

    $event->delete();

    return redirect()->route('admin.dashboard')->with('sucess','Evenemnet est supprimé');

}
}