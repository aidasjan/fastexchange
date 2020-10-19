<?php

namespace App\Http\Controllers\Faculties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pages.faculties.create')->with([
            'form_type' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $faculty = new \App\Faculty;
        $faculty->name = $request->name;
        $faculty->code = $request->code;
        $faculty->type = $request->type;
        $faculty->establishmentdate = $request->establishmentdate;
        $faculty->save();
        return redirect('dashboard');
    }

    public function edit($id)	
    {
        $faculty=\App\Faculty::find($id);
        return view('pages.faculties.create')->with([
            'faculty' => $faculty,
            'form_type' => 'edit',
        ]);
    }

    public function update(Request $request, $id)	
    {	
        $faculty=\App\Faculty::find($id);
        $faculty->name = $request->name;
        $faculty->code = $request->code;
        $faculty->type = $request->type;
        $faculty->establishmentdate = $request->establishmentdate;
        $faculty->save();
        return redirect('dashboard');
    }

    public function destroy($id)	
    {	
        $faculty = \App\Faculty::find($id);
        $faculty->delete();
        return redirect('dashboard');
    }
}