<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); 
        return view('events.index', compact('events')); 
    }

   
    public function show($id)
    {
        $event = Event::find($id); 
        return view('events.show', compact('event')); 
    }

   
    public function create()
    {
        return view('events.create');
    }

   
    public function store(Request $request)
    {
    
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        
        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }
}
