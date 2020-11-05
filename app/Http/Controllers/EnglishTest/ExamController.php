<?php

namespace App\Http\Controllers\EnglishTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    public function create()
    {
        $language_levels = \App\LanguageLevel::all();
        return view('pages.exams.create')->with([
            'language_levels' => $language_levels,
        ]);
    }

    public function store(Request $request)
    {
        $exam = new \App\Exam;
        $exam->date = $request->date;
        $exam->score = $request->score;
        $exam->language_level_id = $request->language_level_id;
        $exam->save();
        return redirect('dashboard');
    }

    public function register($id)
    {
        auth()->user()->exams()->attach($id);
        return redirect('dashboard');
    }

}
