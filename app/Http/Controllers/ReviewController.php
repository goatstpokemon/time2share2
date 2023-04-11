<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $productId = $request->route('id');
        $product = Product::find($productId);
        $review->review = $validatedData['review'];
        $review->rating = $validatedData['rating'];
        $review->user_id = $user->id;
        $product->rented_by = null;
        $product->rental_started = null;
        $product->return_date = null;
        $product->rentable = 1;
        $product->save();
        $review->save();


        return response()->json(['message' => 'Review toegevoegd'], 200);
    }
}
