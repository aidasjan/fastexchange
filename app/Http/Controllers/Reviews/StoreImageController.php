<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Images;
use App\Review;
use Image;


class StoreImageController extends Controller
{
    function index(Request $request)
    {
     
        $reviews = Review::where('user_id',$request->id)->get();
        $data = Images::latest()->paginate(5);
        return view('pages.reviews.store_image')->with(['reviews' => $reviews]);
       }
   
       function insert_image(Request $request)
       {
       # $request->validate([
       #  'Title'  => 'required',
       #  'user_image' => 'required|image|max:2048'
       # ]);
   
        $image_file = $request->user_image;
   
        $image = Image::make($image_file);
   
        Response::make($image->encode('jpeg'));
          if( $image->height() > 1000 || $image->width() > 1000) # quick check for size
          {
            return redirect()->back()->with('error', 'Image is too big');
          }else{
            $form_data = array(
              'Title'  => $request->Title,
              'Caption'  => $request->Caption,
              'Height'  => $image->height(),
              'Width' => $image->width(),
              'id_review' => $request->id_review,
              'user_image' => $image
             );
        
             Images::create($form_data);
        
             return redirect()->back()->with('success', 'Image stored in database successfully');
          }
       }
   
       function fetch_image($image_id)
       {
        $image = Images::findOrFail($image_id);
   
        $image_file = Image::make($image->user_image);
   
        $response = Response::make($image_file->encode('jpeg'));
   
        $response->header('Content-Type', 'image/jpeg');
   
        return $response;
       }
}
