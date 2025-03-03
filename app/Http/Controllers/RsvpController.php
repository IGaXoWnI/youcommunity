<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::find($eventId);

        Rsvp::create([
            'event_id' => $event->id,
            'user_id' => $request->user()->id,
        ]);

        return back()->with('success', 'RSVP added successfully!');
    }
}
