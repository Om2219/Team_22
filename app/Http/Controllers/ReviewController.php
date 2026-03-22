<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
     // Store a new review or update an existing one
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Create a new review OR update existing review for this user and product
        // This prevents a user from submitting multiple reviews for the same product
        Review::updateOrCreate(
            [
                'product_id' => $product->id,
                'user_id' => Auth::id(),
            ],
            [
                'rating' => $validated['rating'],
                'comment' => $validated['comment'] ?? null,
            ]
        );

        // Redirect back to the product page with success message
        return redirect()
            ->route('product.show', $product)
            ->with('success', 'Review has been posted :3');
    }
}
