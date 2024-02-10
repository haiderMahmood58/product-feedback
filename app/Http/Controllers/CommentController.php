<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
public function create(Request $request)
    {
        $validatedData = $request->validate([
            'feedback_id' => 'required|exists:feedback,id',
            'content' => 'required|string|max:255',
        ]);

        $validatedData['user_id'] = Auth::id();

        if (Comment::create($validatedData)) {
            return redirect()->back()->with('success', 'Comment added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add Comment. Please try again.');
        }
    }
}
