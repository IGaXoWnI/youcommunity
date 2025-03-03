<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(3); // Fetch 3 events per page
        return view('dashboard', compact('events')); // Pass events to the view
    }

   
    public function show($id)
    {
        $event = Event::with(['rsvps', 'comments'])->find($id); 
        if (!$event) {
            abort(404); 
        }
        // dd($event);

        return view('events.show', compact('event')); 
    }

   
    public function create()
    {
        return view('events.create'); // Return the view for creating an event
    }

   
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Event::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Event created successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event')); // Return the view for editing an event
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return redirect()->route('events.show', $event)->with('success', 'Event updated successfully!');
    }
}
