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

    public function store(Request $request)
    {

    }
}