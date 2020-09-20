@extends('layouts.app')

@section('content')

<div class='container'>
    <h1>My Dashboard</h1>
    <h4>{{ auth()->user()->name }} {{ auth()->user()->surname }}</h4>
    <div class='row'>
        <div class='col'>
            <div class='row py-3 my-3 mx-1 shadow container_main'>
                <div class='col'>
                    <h3>Top rated universities</h3>
                </div>
            </div>
            @if (auth()->user()->hasPermission('participate_in_exchange'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3>Recommended universities</h3>
                    </div>
                </div>
            @endif
        </div>
        <div class='col'>
            @if (auth()->user()->hasPermission('take_tests'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col text-left'>
                        <h3 class='mb-3'>English exam</h3>
                        <h5>Upcoming exams</h5>
                        <hr/>
                        <h5>Practice exam</h5>
                    </div>
                </div>
            @endif
            <div class='row py-3 my-3 mx-1 shadow container_main'>
                <div class='col text-left'>
                    <h3 class='mb-3'>Personal data</h3>
                    <table class='table'>
                        <tr><td>Name</td><td>{{ auth()->user()->name }}</td></tr>
                        <tr><td>Surname</td><td>{{ auth()->user()->surname }}</td></tr>
                        <tr><td>Personal code</td><td>{{ auth()->user()->personal_code }}</td></tr>
                        <tr><td>Phone</td><td>{{ auth()->user()->phone }}</td></tr>
                        <tr><td>Country</td><td>{{ auth()->user()->country }}</td></tr>
                        <tr><td>City</td><td>{{ auth()->user()->city }}</td></tr>
                        <tr><td>Address</td><td>{{ auth()->user()->address }}</td></tr>
                        <tr><td>Postal code</td><td>{{ auth()->user()->postal_code }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

                    
@endsection
