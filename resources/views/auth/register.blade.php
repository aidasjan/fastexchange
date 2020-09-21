@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>{{ $form_type == 'register' ? 'Register' : ($form_type === 'create' ? 'New user' : 'Edit user') }}</h1>
        </div>
    </div>
        
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ $form_type == 'register' ? action('Auth\RegisterController@register') : ($form_type === 'create' ? action('Users\UsersController@store') : action('Users\UsersController@update', $user->id)) }}">
                @csrf
                @if($form_type === 'edit') <input type='hidden' name='_method' value='PUT' /> @endif
                @if($form_type !== 'register')
                    <div class="form-group row py-4 container_main shadow mb-5">
                        <div class='col'>
                            <div class='row'>
                                <div class='col mb-4'>
                                    <h4>Role for this user</h4>
                                </div>
                            </div>
                            <div class='row'>
                                <div class="col-md-6 offset-md-3">
                                    <select class="form-control" name="role_id">
                                        @foreach($roles as $role)
                                            <option value='{{ $role->id }}' {{ $form_type === 'edit' && $user->role->id === $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $form_type === 'edit' ? $user->name : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Surname</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $form_type === 'edit' ? $user->surname : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Phone</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $form_type === 'edit' ? $user->phone : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Personal code</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('personal_code') ? ' is-invalid' : '' }}" name="personal_code" value="{{ $form_type === 'edit' ? $user->personal_code : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Country</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $form_type === 'edit' ? $user->country : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">City</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $form_type === 'edit' ? $user->city : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Address</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $form_type === 'edit' ? $user->address : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Postal code</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ $form_type === 'edit' ? $user->postal_code : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-5">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $form_type === 'edit' ? $user->email : '' }}" placeholder="" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row py-1">
                    <label class="col-md-4 col-form-label text-md-right">University</label>
                    <div class="col-md-5">
                        <select class="form-control" name="university_id">
                            @foreach($universities as $university)
                                <option value='{{ $university->id }}'>{{ $university->name }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                @if($form_type === 'register')
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-5">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="" name="password" placeholder="" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                        <div class="col-md-5">
                            <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="" name="password_confirmation" placeholder="" required>
                        </div>
                    </div>
                @endif
                <div class="row mb-0 pt-3 text-center">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary text-uppercase">
                            {{ $form_type == 'register' ? 'Register' : 'Submit' }}
                        </button>
                    </div>
                </div>
            </form>
            @if($form_type === 'edit')
                <div class='mt-5'>
                    <hr />
                    <form action="{{ action('Users\UsersController@destroy', $user->id) }}" method='POST'>
                        {{ csrf_field() }}
                        <input type='hidden' name='_method' value='DELETE'>
                        <input type='submit' class='btn btn-danger text-uppercase' value="Delete user">
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

                    
@endsection
