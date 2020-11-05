
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>Add new Exam</h1>
        </div>
    </div>

    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ action('EnglishTest\ExamController@store') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Exam date</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" name="date" value="" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">Score to pass</label>
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="score" value="" placeholder="" required>
                    </div>
                </div>
                <div class="form-group row py-1">
                    <label class="col-md-4 col-form-label text-md-right">Language level</label>
                    <div class="col-md-5">
                        <select class="form-control" name="language_level_id">
                            @foreach($language_levels as $language_level)
                                <option value='{{ $language_level->id }}'>{{ $language_level->code }}</option>
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
        </div>
    </div>
</div>

                    
@endsection
