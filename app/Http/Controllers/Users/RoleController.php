<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
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
        $permissions = \App\Permission::all();
        return view('pages.users.roles.create')->with('permissions', $permissions);
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->code = $request->code;
        $role->name = $request->name;
        $role->save();
        $role->reattachPermissions($request->permissions);
        return redirect('dashboard');
    }

    public function edit($id)	
    {	

    }

    public function update(Request $request, $id)	
    {	

    }

    public function destroy($id)	
    {	

    }
}
