
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>Test Taking</h1>
        </div>
    </div>
        
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ action('EnglishTest\TestTakingController@submit') }}">
                @csrf
                @foreach ($test_questions as $test_question)
                    <div class="form-group container_main shadow">
                        <h5 class="pt-3">{{$test_question->question}}</h5>
                        <p class="py-1">Points: {{$test_question->points}}</p>
                        <div class="py-2 px-5 text-left">
                            <input type="radio" name="{{$test_question->id}}" value="a">
                            <label>{{$test_question->a}}</label><br>
                            <input type="radio" name="{{$test_question->id}}" value="b">
                            <label>{{$test_question->b}}</label><br>  
                            <input type="radio" name="{{$test_question->id}}" value="c">
                            <label>{{$test_question->c}}</label><br><br>
                        </div>
                    </div>
                @endforeach

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
