<?php

namespace App\Http\Controllers\EnglishTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LanguageLevel;
use App\TestQuestion;

class TestQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $language_levels = LanguageLevel::all();
        return view('pages.english_tests.create')->with([
            'language_levels' => $language_levels,
            'form_type' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $item = new TestQuestion;
        $item->question = $request->question;
        $item->answer = $request->answer;
        $item->a = $request->a;
        $item->b = $request->b;
        $item->c = $request->c;
        $item->points = $request->points;
        $item->language_level_id = $request->language_level_id;
        $item->save();
        return redirect('dashboard');
    }

    public function edit($id)	
    {	
        $language_levels = LanguageLevel::all();
        $test_question = TestQuestion::find($id);
        return view('pages.english_tests.create')->with([
            'language_levels' => $language_levels,
            'test_question' => $test_question,
            'form_type' => 'edit',
        ]);
    }

    public function update(Request $request, $id)	
    {	
        $item = TestQuestion::find($id);
        $item->question = $request->question;
        $item->answer = $request->answer;
        $item->a = $request->a;
        $item->b = $request->b;
        $item->c = $request->c;
        $item->points = $request->points;
        $item->language_level_id = $request->language_level_id;
        $item->save();
        return redirect('dashboard');
    }

    public function destroy($id)	
    {	
        $test_question = TestQuestion::find($id);
        $test_question->delete();
        return redirect('dashboard');
    }
}
