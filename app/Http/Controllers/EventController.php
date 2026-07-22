<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.events.create');
    }


    public function liste(){
        return view('events.index');
    }

    public function store(Request $request){

        $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => 'required',
        'time' => 'required',
        'location' => 'required',
        'price' => 'required|integer',
        'capacity' => 'required|integer',
    ]);


    }
}