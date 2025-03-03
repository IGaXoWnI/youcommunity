<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); // Fetch all events
        return view('dashboard', compact('events')); // Pass events to the view
    }

   
    public function show($id)
    {
        $event = Event::with(['rsvps', 'comments'])->find($id); 
        if (!$event) {
            abort(404); 
        }

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
