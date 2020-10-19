<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pages.tags.create')->with([
            'form_type' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $tag = new \App\Tag;
        $tag->name = $request->name;
        $tag->code = $request->code;
        $tag->save();
        return redirect('dashboard');
    }

    public function edit($id)	
    {
        $tag=\App\Tag::find($id);
        return view('pages.tags.create')->with([
            'tag' => $tag,
            'form_type' => 'edit',
        ]);
    }

    public function update(Request $request, $id)	
    {	
        $tag=\App\Tag::find($id);
        $tag->name = $request->name;
        $tag->code = $request->code;
        $tag->save();
        return redirect('dashboard');
    }

    public function destroy($id)	
    {	
        $tag = \App\Tag::find($id);
        $tag->delete();
        return redirect('dashboard');
    }
}