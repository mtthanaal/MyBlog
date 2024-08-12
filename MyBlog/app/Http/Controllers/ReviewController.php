<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function manageReviews()
    {
        $reviews = Review::where('approved', false)->get();
        return view('home.approved_comments', compact('reviews'));
    }

    public function approveReview($id)
    {
        $review = Review::findOrFail($id);
        $review->approved = true;
        $review->save();

        return redirect()->back()->with('message', 'Review approved successfully.');
    }
}
