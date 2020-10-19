<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pages.modules.create')->with([
            'form_type' => 'create',
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
        $module->save();
        return redirect('dashboard');
    }

    public function edit($id)	
    {
        $module=\App\Module::find($id);
        return view('pages.modules.create')->with([
            'module' => $module,
            'form_type' => 'edit',
        ]);
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
        return redirect('dashboard');
    }

    public function destroy($id)	
    {	
        $module = \App\Module::find($id);
        $module->delete();
        return redirect('dashboard');
    }
}