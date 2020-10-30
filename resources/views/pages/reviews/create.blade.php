
@extends('layouts.app')

@section('content')
@if (auth()->user()->hasPermission('participate_in_exchange'))

<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>Create review</h1>
        </div>
    </div>
        
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ $form_type === 'create' ? action('Reviews\ReviewController@store') : action('') }}">
                @csrf
                <div class="form-group container_main shadow">
                    <h5 class="pt-3"></h5>
                    <p class="py-1">Select university: </p>
                    <div class="py-2 px-5 text-left pb-5">
                        <select class="form-control" name="university_id">
                            @foreach($universities as $university)
                                <option value='{{ $university->id }}' >{{ $university->name }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                    <div class="form-group container_main shadow">
                        <h5 class="pt-3"></h5>
                        <p class="py-1">Your Review: </p>
                        <div class="py-2 px-5 text-left pb-5">
                            <textarea name="review_text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
        <div class="col">
            <div class="row py-3 my-3 mx-1 shadow container_main">
                <div class="col text-center">
                <form method="POST" action="{{ action('Reviews\RatingController@store') }}">
                    @csrf
                        <h5 class="pt-3">Rate universities!</h5>
                        <div class="py-2 px-5 text-left pb-5">
                            <select class="form-control" name="university_id">
                                @foreach($universities as $university)
                                    <option value='{{ $university->id }}' >{{ $university->name }}</option>
                                @endforeach
                            </select> 
                        </div>
                            <div class="py-2 px-5 text-center pb-5">
                                <div class="stars">
                                      <input class="star star-5" id="star-5" type="radio" value="5" name="value"/>
                                      <label class="star star-5" for="star-5"></label>
                                      <input class="star star-4" id="star-4" type="radio" value="4"name="value"/>
                                      <label class="star star-4" for="star-4"></label>
                                      <input class="star star-3" id="star-3" type="radio" value="3"name="value"/>
                                      <label class="star star-3" for="star-3"></label>
                                      <input class="star star-2" id="star-2" type="radio" value="2"name="value"/>
                                      <label class="star star-2" for="star-2"></label>
                                      <input class="star star-1" id="star-1" type="radio" value="1"name="value"/>
                                      <label class="star star-1" for="star-1"></label>
                                  </div>
                            </div>
                            <button type="submit" class="btn btn-primary text-uppercase">
                                Submit
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

                    
@endsection
