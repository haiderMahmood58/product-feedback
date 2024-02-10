<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index() {
        $feedback = Feedback::with('user')->paginate(5);
        return view('feedback.index', compact('feedback'));
    }

    public function new() {
        return view('feedback.new');
    }

    public function create(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:' . implode(',', Feedback::$categories),
        ]);

        $userId = Auth::id();
        if (!$userId) {
            return redirect()->back()->withErrors(['User authentication failed.'])->withInput();
        }

        $validatedData['user_id'] = $userId;
        
        if (Feedback::create($validatedData)) {
            return redirect()->route('feedback.index')->with('success', 'Thank you for your feedback!');
        } else {
            return redirect()->back()->with('error', 'Failed to submit feedback. Please try again.');
        }
    }
}
