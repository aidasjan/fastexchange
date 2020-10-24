<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $faculties = \App\University::all()->where('id', Auth::user()->university_id)->first()->faculties()->get();
        $tags = \App\Tag::all();
        return view('pages.modules.create')->with([
            'form_type' => 'create',
            'tags' => $tags,
            'faculties' => $faculties,
        ]);
    }

    public function createList()
    {
        $faculties = \App\University::all()->where('id', Auth::user()->university_id)->first()->faculties()->get();
        $allModules = [];
        foreach ($faculties as $faculty)
        {
            $modules = \App\Module::all()->where('faculty_id', $faculty->id);
            foreach ($modules as $module)
            {
                $allModules[] = $module;
            }
        }
        $user_module=Auth::user()->modules()->get();
        return view('pages.modules.create-list')->with([
            'form_type' => 'create',
            'allModules' => $allModules,
            'user_module' => $user_module,
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {
        $module = new \App\Module;
        $module->name = $request->name;
        $module->code = $request->code;
        $module->degree = $request->degree;
        $module->language = $request->language;
        $module->type = $request->type;
        $module->semester = $request->semester;
        $module->credits = $request->credits;
        $module->year = $request->year;
        $module->isMandatory = $request->isMandatory === 'true' ? true : false;
        $module->faculty_id = $request->faculty_id;
        dd($module->save());
        $module->reattachTags($request->tags);

        return redirect('dashboard');
    }

    public function edit($id)	
    {
        $faculties = \App\University::all()->where('id', Auth::user()->university_id)->first()->faculties()->get();
        $module=\App\Module::find($id);
        $module_tag=$module->tags()->get();
        $tags = \App\Tag::all();
        return view('pages.modules.create')->with([
            'module' => $module,
            'form_type' => 'edit',
            'faculties' => $faculties,
            'tags' => $tags,
            'module_tag' => $module_tag,
        ]);
    }

    public function updateList(Request $request, $id)	
    {	
        if($request->modules !== null)
            Auth::user()->reattachModules($request->modules);
        return redirect('dashboard');
    }

    public function update(Request $request, $id)	
    {	
        $module=\App\Module::find($id);
        $module->name = $request->name;
        $module->code = $request->code;
        $module->degree = $request->degree;
        $module->language = $request->language;
        $module->type = $request->type;
        $module->semester = $request->semester;
        $module->credits = $request->credits;
        $module->year = $request->year;
        $module->isMandatory = $request->isMandatory === 'true' ? true : false;
        $module->save();
        $module->reattachTags($request->tags);
        
        return redirect('dashboard');
    }

    public function destroy($id)	
    {	
        $module = \App\Module::find($id);
        $module->delete();
        return redirect('dashboard');
    }
}