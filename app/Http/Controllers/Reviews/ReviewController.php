<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
use App\University;
use App\Images;
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $universities = University::all();
        return view('pages.reviews.create')->with([
            'universities' => $universities,
            'form_type' => 'create'
        ]);
    }
    public function store(Request $request)
    {
        $item = new Review;
        $item->text = ($request->review_text != null) ? $request->review_text : "";
        $item->university_id = $request->university_id;
        $item->user_id = auth()->user()->id;
        $item->is_confirmed = false;
        $item->save();
        return redirect('dashboard');
    }

    public function show()
    {   
        $notConfirmedReviews = Review::where('is_confirmed','=',0)->get();
        $confirmedReviews = Review::where('is_confirmed','=',1)->get();
        $images = Images::all();
        return view('pages.reviews.show')->with(['notConfirmedReviews' => $notConfirmedReviews, 'confirmedReviews' => $confirmedReviews, 'Images' => $images]);
    }


    public function update(Request $request)	
    {	
        $item = Review::find($request->id);
        $item->is_confirmed = true;
        $item->save();
        return redirect('reviews');
    }

    public function destroy($id)	
    {	
        $review = Review::find($id);
        $image = Images::where('id_review', $id);
        $review->delete();
        $image->delete();
        return redirect('reviews');
    }
    
}