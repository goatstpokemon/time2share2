<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request, $userId)
    {
        $validatedData = $request->validate([
            'review' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,10',
        ]);

        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'Gebruiker niet gevonden'], 404);
        }

        $review = new Review();
        $review->review = $validatedData['review'];
        $review->rating = $validatedData['rating'];
        $review->user_id = $user->id;
        $review->save();

        return response()->json(['message' => 'Review toegevoegd'], 200);
    }
}
