<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
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
        $test_questions = \App\TestQuestion::take(3)->get();
        $exams = \App\Exam::all();
        $universities = \App\University::all();
        return view('pages.users.dashboard')->with([
            'roles' => $roles,
            'users' => $users,
            'test_questions' => $test_questions,
            'universities' => $universities,
            'exams' => $exams,
        ]);
    }
}
