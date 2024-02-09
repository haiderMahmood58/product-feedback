<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function view()
    {
        return view('feedback');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:' . implode(',', Feedback::$categories),
        ]);

        $validatedData['user_id'] = Auth::id();

        Feedback::create($validatedData);

        return redirect()->back()->with('success', 'Thank you for your feedback!');
    }
}
