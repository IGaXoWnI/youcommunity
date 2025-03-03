<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request, $eventId)
    {
        // Debugging line to check incoming request data
        // dd($request->all());

        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::find($eventId);

        // Check if the event is full
        if ($event->max_participants && $event->rsvps()->count() >= $event->max_participants) {
            return back()->with('error', 'This event is fully booked.');
        }

        // Check if the user has already RSVPed
        if ($event->rsvps()->where('user_id', $request->user()->id)->exists()) {
            return back()->with('info', 'You have already RSVPed for this event.');
        }

        // Create the RSVP
        $rsvp = Rsvp::create([
            'event_id' => $event->id,
            'user_id' => $request->user()->id,
        ]);

        // Debugging line to confirm RSVP creation
        // dd('RSVP created successfully!', $rsvp);

        return back()->with('success', 'RSVP added successfully!');
    }
}
