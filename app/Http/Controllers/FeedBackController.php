<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Fungsi untuk menyimpan feedback dari pengguna
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'feedback' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $feedback = Feedback::create([
            'user_id' => $request->user_id,
            'feedback' => $request->feedback,
        ]);

        return response()->json(['message' => 'Feedback submitted successfully'], 201);
    }
}
