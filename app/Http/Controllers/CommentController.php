<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Event;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Debugging line to check incoming request data


        Comment::create([
            'event_id' => $eventId,
            'user_id' => $request->user()->id,
            'content' => $request->content,
        ]);
        

        return back()->with('success', 'Comment added!');
    }

    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        return back()->with('success', 'Comment deleted!');
    }
}
