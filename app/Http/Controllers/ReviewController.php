<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\RentalAgreement;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['agreement','user'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $agreements = RentalAgreement::pluck('id','id');
        $users      = User::pluck('username','id');
        return view('reviews.create', compact('agreements','users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'user_id'             => 'required|exists:users,id',
            'rating'              => 'required|integer|min:1|max:5',
            'comment'             => 'nullable|string',
        ]);

        Review::create($data);

        return redirect()->route('reviews.index')
            ->with('success', 'Recenzja dodana');
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $agreements = RentalAgreement::pluck('id','id');
        $users      = User::pluck('username','id');
        return view('reviews.edit', compact('review','agreements','users'));
    }

    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'rental_agreement_id' => 'required|exists:rental_agreements,id',
            'user_id'             => 'required|exists:users,id',
            'rating'              => 'required|integer|min:1|max:5',
            'comment'             => 'nullable|string',
        ]);

        $review->update($data);

        return redirect()->route('reviews.index')
            ->with('success', 'Recenzja zaktualizowana');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')
            ->with('success', 'Recenzja usunięta');
    }
}
