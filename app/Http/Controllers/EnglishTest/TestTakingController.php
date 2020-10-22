<?php

namespace App\Http\Controllers\EnglishTest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestTakingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        
    }

    public function submit()
    {

    }

}
