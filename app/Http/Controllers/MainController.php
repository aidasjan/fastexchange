<?php

namespace App\Http\Controllers;

use App\category;
use App\Subcategory;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**	
     * Create a new controller instance.	
     *	
     * @return void	
     */	
    public function __construct()	
    {	
        $this->middleware('auth', ['except'=>['index', 'show']]);	
    }


    public function index()
    {
        return view('pages.welcome');
    }
}

