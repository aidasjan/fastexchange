<?php

namespace App\Http\Controllers\EnglishTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TestQuestion;

class TestTakingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $all_questions = [];
        for ($i=1; $i<=3; $i++){
            $questions = TestQuestion::where('language_level_id', $i)->get();
            array_push($all_questions, $questions[rand(0, count($questions)-1)]);
        }
        return view('pages.english_tests.test_taking')->with(['test_questions' => $all_questions]);
    }

    public function submit(Request $request)
    {
        $total_points = 0;
        foreach($request->all() as $key => $answer){
            if (!is_numeric($key)) continue;
            $test_question = TestQuestion::find($key);
            if ($test_question->answer == $answer){
                $total_points += $test_question->points;
            }
        }
        $taking = new \App\TestTaking;
        $taking->date = date("Y-m-d");
        $taking->score = $total_points;
        $taking->user_id = auth()->user()->id;
        $taking->save();
        return view('pages.english_tests.results')->with(['points' => $total_points, 'level' => $this->getLevel($total_points)]);
    }

    private function getLevel($points)
    {
        switch($points){
            case $points <= 10 : return "A2";
            case $points <= 30 : return "B1";
            case $points <= 100 : return "B2";
            case $points <= 200 : return "C1";
            default : return "A1";
        }
    }

}
