<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request) {
        $validatedData = $request->validate([
            'feedback_id' => 'required|exists:feedback,id',
            'content' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            'feedback_id' => $validatedData['feedback_id'],
            'content' => $validatedData['content'],
            'user_id' => Auth::id()
        ]);
    
        // Parse the comment content to extract mentioned users
        preg_match_all('/@(\w+)/', $validatedData['content'], $matches);
        $mentionedUsernames = $matches[1];
    
        // Associate mentioned users with the comment
        foreach ($mentionedUsernames as $username) {
            $user = User::where('name', $username)->first();
            if ($user) {
                $comment->mentionedUsers()->attach($user->id);
            }
        }
    
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
