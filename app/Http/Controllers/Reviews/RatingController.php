<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    }
    public function store(Request $request)
    {
        $item = new Rating;
        $item->value = $request->value;
        $item->university_id = $request->university_id;
        $item->user_id = auth()->user()->id;
        $item->save();
        return redirect('dashboard');
    }

    public function show(){
        $universities = \App\University::all();
        foreach ($universities as $university) {
            $rating = Rating::where('university_id', $university->id)->avg('value');
            $university->total_rating = $rating;
        }
        $universities = $universities->sortByDesc('total_rating');
        return view('pages.reviews.ratings')->with([
            'universities' => $universities
        ]);
    }

}
