
@extends('layouts.app')

@section('content')



<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>{{ $form_type == 'create' ? 'Create new module' : 'Edit module' }}</h1>
        </div>
    </div>
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ $form_type === 'create' ? action('Modules\ModuleController@store') : action('Modules\ModuleController@update', $module->id) }}">
                @csrf
                @if($form_type === 'edit') <input type='hidden' name='_method' value='PUT' /> @endif
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $form_type === 'edit' ? $module->name : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Code</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $form_type === 'edit' ? $module->code : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Degree</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('degree') ? ' is-invalid' : '' }}" name="degree" value="{{ $form_type === 'edit' ? $module->degree : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Language</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('language') ? ' is-invalid' : '' }}" name="language" value="{{ $form_type === 'edit' ? $module->language : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Type</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ $form_type === 'edit' ? $module->type : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row py-1">
                    <label class="col-md-4 col-form-label text-md-right">Semester</label>
                    <div class="col-md-5">
                        <select class="form-control" name="semester">
                            <option value='First'>First</option>
                            <option value='Second'>Second</option>
                        </select> 
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Credits</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control{{ $errors->has('credits') ? ' is-invalid' : '' }}" name="credits" value="{{ $form_type === 'edit' ? $module->credits : '' }}" placeholder="" required required min="1" max="18">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Year</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ $form_type === 'edit' ? $module->year : '' }}" placeholder="" required min="1" max="6">
                    </div>
                </div>
                <div class="form-group row py-1">
                    <label class="col-md-4 col-form-label text-md-right">Mandatory</label>
                    <div class="col-md-5">
                        <select class="form-control" name="isMandatory">
                            <option value='true'>Yes</option>
                            <option value='false'>No</option>
                        </select> 
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
            @if($form_type === 'edit')
                <div class='mt-5'>
                    <hr />
                    <form action="{{ action('Modules\ModuleController@destroy', $module->id) }}" method='POST'>
                        {{ csrf_field() }}
                        <input type='hidden' name='_method' value='DELETE'>
                        <input type='submit' class='btn btn-danger text-uppercase' value="Delete module">
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>



                    
@endsection
