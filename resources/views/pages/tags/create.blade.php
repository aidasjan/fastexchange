
@extends('layouts.app')

@section('content')



<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>{{ $form_type == 'create' ? 'Create new tag' : 'Edit tag' }}</h1>
        </div>
    </div>
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ $form_type === 'create' ? action('Tags\TagController@store') : action('Tags\TagController@update', $tag->id) }}">
                @csrf
                @if($form_type === 'edit') <input type='hidden' name='_method' value='PUT' /> @endif
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $form_type === 'edit' ? $tag->name : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Code</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $form_type === 'edit' ? $tag->code : '' }}" placeholder="" required>
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
                    <form action="{{ action('Tags\TagController@destroy', $tag->id) }}" method='POST'>
                        {{ csrf_field() }}
                        <input type='hidden' name='_method' value='DELETE'>
                        <input type='submit' class='btn btn-danger text-uppercase' value="Delete tag">
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>



                    
@endsection
