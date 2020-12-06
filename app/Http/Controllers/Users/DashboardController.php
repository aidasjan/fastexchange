<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Discount;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = \App\Role::all();
        $users = \App\User::all();
        $modules = auth()->user()->getModulesInUserUniversity();
        $faculties = \App\University::all()->where('id', Auth::user()->university_id)->first()->faculties()->get();
        $tags = \App\Tag::all();
        $test_questions = \App\TestQuestion::all();
        $exams = \App\Exam::all();
        $universities = \App\University::all();
        $modules_user = Auth::user()->modules()->get();
        return view('pages.users.dashboard')->with([
            'roles' => $roles,
            'users' => $users,
            'modules' => $modules,
            'faculties' => $faculties,
            'test_questions' => $test_questions,
            'universities' => $universities,
            'exams' => $exams,
            'tags' => $tags,
            'modules_user' => $modules_user,
        ]);
    }
}
