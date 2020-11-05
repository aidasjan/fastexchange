
@extends('layouts.app')

@section('content')



<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>{{ $form_type == 'create' ? 'Create new faculty' : 'Edit faculty' }}</h1>
        </div>
    </div>
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ $form_type === 'create' ? action('Faculties\FacultyController@store') : action('Faculties\FacultyController@update', $faculty->id) }}">
                @csrf
                @if($form_type === 'edit') <input type='hidden' name='_method' value='PUT' /> @endif
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $form_type === 'edit' ? $faculty->name : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Code</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $form_type === 'edit' ? $faculty->code : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Type</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ $form_type === 'edit' ? $faculty->type : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Establishment date</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control{{ $errors->has('establishmentdate') ? ' is-invalid' : '' }}" name="establishmentdate" value="{{ $form_type === 'edit' ? $faculty->establishmentdate : '' }}" placeholder="" required>
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
                    <form action="{{ action('Faculties\FacultyController@destroy', $faculty->id) }}" method='POST'>
                        {{ csrf_field() }}
                        <input type='hidden' name='_method' value='DELETE'>
                        <input type='submit' class='btn btn-danger text-uppercase' value="Delete faculty">
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>



                    
@endsection
