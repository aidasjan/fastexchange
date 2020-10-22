
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>Manage Question</h1>
        </div>
    </div>
        
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ $form_type === 'create' ? action('EnglishTest\TestQuestionController@store') : action('EnglishTest\TestQuestionController@update', $test_question->id) }}">
                @csrf
                @if($form_type === 'edit') <input type='hidden' name='_method' value='PUT' /> @endif
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Question</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="question" value="{{ $form_type === 'edit' ? $test_question->question : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Answer</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="answer" value="{{ $form_type === 'edit' ? $test_question->answer : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Option A</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="a" value="{{ $form_type === 'edit' ? $test_question->a : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Option B</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="b" value="{{ $form_type === 'edit' ? $test_question->b : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Option C</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="c" value="{{ $form_type === 'edit' ? $test_question->c : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Points</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="points" value="{{ $form_type === 'edit' ? $test_question->points : '' }}" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row py-1">
                    <label class="col-md-4 col-form-label text-md-right">Language level</label>
                    <div class="col-md-5">
                        <select class="form-control" name="language_level_id">
                            @foreach($language_levels as $language_level)
                                <option value='{{ $language_level->id }}' {{ $form_type === 'edit' && $test_question->language_level_id == $language_level->id ? 'selected' : '' }}>{{ $language_level->code }}</option>
                            @endforeach
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
                    <form action="{{ action('EnglishTest\TestQuestionController@destroy', $test_question->id) }}" method='POST'>
                        {{ csrf_field() }}
                        <input type='hidden' name='_method' value='DELETE'>
                        <input type='submit' class='btn btn-danger text-uppercase' value="Delete question">
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>

                    
@endsection
