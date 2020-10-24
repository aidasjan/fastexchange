
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>Test Results</h1>
        </div>
    </div>
        
    <div class='row py-3'>
        <div class='col container_main shadow py-5'>
            <h2 class='py-2'>Points: {{$points}}</h2>
            <h2 class='py-2'>English Level: {{$level}}</h2>
            <div class='mt-5'><a href="{{url('dashboard')}}" class='btn btn-primary'>Go back</a></div>
        </div>
    </div>
</div>

                    
@endsection
