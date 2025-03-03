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
            'contenu' => 'required|string|max:1000',
        ]);

        Comment::create([
            'event_id' => $eventId,
            'user_id' => $request->user()->id,
            'contenu' => $request->contenu,
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
