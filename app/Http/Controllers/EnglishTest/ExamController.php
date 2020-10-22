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

    }

    public function store(Request $request)
    {

    }

}
