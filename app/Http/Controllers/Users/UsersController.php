<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsersController extends Controller
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
        $universities=\App\University::all();
        $countries = \App\Country::all();
        $roles=\App\Role::all();
        return view('auth.register')->with([
            'universities' => $universities,
            'countries' => $countries,
            'roles' => $roles,
            'form_type' => 'create',
        ]);
    }

    public function store(Request $request)
    {
        $user = new \App\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->personal_code = $request->personal_code;
        $user->country_id = $request->country_id;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;
        $user->relative_name = $request->relative_name;
        $user->relative_phone = $request->relative_phone;
        $user->bank_account = $request->bank_account;
        $user->native_language = $request->native_language;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->university_id = $request->university_id;
        $user->save();
        return redirect('dashboard');
    }

    public function edit($id)	
    {
        $universities=\App\University::all();
        $countries = \App\Country::all();
        $roles=\App\Role::all();
        $user=\App\User::find($id);
        return view('auth.register')->with([
            'universities' => $universities,
            'countries' => $countries,
            'roles' => $roles,
            'user' => $user,
            'form_type' => 'edit',
        ]);
    }

    public function update(Request $request, $id)	
    {	
        $user = \App\User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->surname = $request->surname;
        $user->phone = $request->phone;
        $user->personal_code = $request->personal_code;
        $user->country_id = $request->country_id;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;
        $user->relative_name = $request->relative_name;
        $user->relative_phone = $request->relative_phone;
        $user->bank_account = $request->bank_account;
        $user->native_language = $request->native_language;
        $user->role_id = $request->role_id;
        $user->university_id = $request->university_id;
        $user->save();
        return redirect('dashboard');
    }

    public function destroy($id)	
    {	
        $user = \App\User::find($id);
        $user->delete();
        return redirect('dashboard');
    }

}