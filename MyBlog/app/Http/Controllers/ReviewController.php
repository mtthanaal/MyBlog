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
    $review->status = 'approved'; // Set the status to 'approved'
    $review->approved = true; // Keep this line to maintain other functionalities related to the 'approved' field
    $review->save();

    return redirect()->back()->with('message', 'Review approved successfully.');
}

public function rejectReview($id)
{
    $review = Review::findOrFail($id);
    $review->status = 'rejected'; // Set the status to 'rejected'
    $review->approved = false; // Keep this line to maintain other functionalities related to the 'approved' field
    $review->save();

    return redirect()->back()->with('message', 'Review rejected successfully.');
}

}
