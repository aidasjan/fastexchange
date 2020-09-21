
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>New role</h1>
        </div>
    </div>
        
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ action('Users\RoleController@store') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Code</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="code" value="" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="name" value="" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row py-1">
                    <div class='col-md-6 offset-md-3 p-4 container_main shadow text-left'>
                        <h5>Assign persmissions</h5>
                    @foreach ($permissions as $permission)
                        <div>
                            <input type="checkbox" id="permission_{{$permission->id}}" name="permissions[]" value="{{$permission->id}}">
                            <label for="location_{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="row mb-0 pt-3 text-center">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary text-uppercase">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

                    
@endsection
