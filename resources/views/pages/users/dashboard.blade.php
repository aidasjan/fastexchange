@extends('layouts.app')

@section('content')

<div class='container'>
    <h1>My Dashboard</h1>
    <h4>{{ auth()->user()->name }} {{ auth()->user()->surname }} | {{ auth()->user()->university->name }}</h4>
    <div class='row mt-4'>
        <div class='col'>
            @if (auth()->user()->hasPermission('participate_in_exchange'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3>Recommended modules</h3>
                        <p>Get module recommendations from foreign universities</p>
                        <div class='py-3'>
                            <a href="{{url('modules/recommended')}}" class='btn btn-primary'>Get recommentations</a>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermission('participate_in_exchange'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3>My modules</h3>
                        <div class='py-3'>
                            <a href="{{url('modules-list')}}" class='btn btn-primary'>Edit selections</a>
                        </div>
                        <table class='table text-left'>
                            <tr><th>Name</th><th>ECTS</th></tr>
                            @foreach ($modules_user as $module)
                                <tr><td>{{ $module->name }}</td><td>{{ $module->credits }}</td></tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermission('manage_modules'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3>University modules</h3>
                        <div class='py-3'>
                            <a href="{{url('modules')}}" class='btn btn-primary'>Add new</a>
                        </div>
                        <table class='table text-left'>
                            <tr><th>Name</th><th>Edit</th></tr>
                            @foreach ($modules as $module)
                                <tr><td>{{ $module->name }}</td><td><a href="{{ url('modules/'.$module->id.'/edit') }}">Edit</a></td></tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3>Faculties</h3>
                        <table class='table text-left'>
                            <tr><th>Name</th><th># of modules</th></tr>
                            @foreach ($faculties as $faculty)
                                <tr><td>{{ $faculty->name }}</td><td>{{ count($modules->where('faculty_id', $faculty->id)) }}</td></tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3>Tags</h3>
                        <table class='table text-left'>
                            <tr><th>Name</th><th># in modules</th></tr>
                            @foreach ($tags as $tag)
                                <tr><td>{{ $tag->name }}</td><td> {{ count($tag->modules) }}</td></tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                
            @endif

            @if (auth()->user()->hasPermission('participate_in_exchange'))
                <div class="row py-3 my-3 mx-1 shadow container_main">
                    <div class="col-6">
                        <a href="{{url('review/create')}}" class='btn btn-primary'>Leave Review</a>
                    </div>
                    <div class="col-6">
                    <a href="{{url('store_image/') . '/'.auth()->user()->id}}" class='btn btn-primary'>Add Image</a>
                    </div>
                </div>
                <div class="row py-3 my-3 mx-1 shadow container_main">
                    <div class="col-6">
                        <a href="{{url('reviews')}}" class='btn btn-primary'>View Reviews</a>
                    </div>
                    <div class="col-6">
                        <a href="{{url('ratings')}}" class='btn btn-primary'>Best Universities</a>
                    </div>
                </div>
           @endif

            @if (auth()->user()->hasPermission('manage_roles'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3 class='mb-2'>Manage roles</h3>
                        <div class='py-3'>
                            <a href="{{url('users/roles')}}" class='btn btn-primary'>Add new</a>
                        </div>
                        <table class='table text-left'>
                            <tr><th>Name</th><th># of users</th></tr>
                            @foreach ($roles as $role)
                                <tr><td>{{ $role->name }}</td><td>{{ count($role->users) }}</td></tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermission('manage_users'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col'>
                        <h3 class='mb-2'>Manage users</h3>
                        <div class='py-3'>
                            <a href="{{url('users/create')}}" class='btn btn-primary'>Add new</a>
                        </div>
                        <table class='table text-left'>
                            @foreach ($users as $user)
                                <tr><td>{{ $user->name }} {{ $user->surname }}</td><td><a href="{{ url('users/'.$user->id.'/edit') }}">Edit</a></td></tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row py-3 my-3 mx-1 shadow container_main">
                    <div class="col">
                        <a href="{{url('reviews')}}" class='btn btn-primary'>Reviews</a>
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
                        <table class='table text-left'>
                            <tr><th>Date</th><th>Level</th><th></th></tr>
                            @foreach ($exams as $exam)
                                @if(!auth()->user()->exams->find($exam->id))
                                    <tr><td>{{ date("Y-m-d", strtotime($exam->date)) }}</td><td>{{ $exam->language_level->code }}</td><td><a href="{{ url('exams/'.$exam->id.'/register') }}">Register</a></td></tr>
                                @else
                                    <tr><td>{{ date("Y-m-d", strtotime($exam->date)) }}</td><td>{{ $exam->language_level->code }}</td><td style="color: #00aa00">Registered</td></tr>
                                @endif
                            @endforeach
                        </table>
                        <hr/>
                        <h5>Practice test</h5>
                        <div class='py-3'>
                            <a href="{{url('test/take')}}" class='btn btn-primary'>Take test</a>
                        </div>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermission('manage_tests'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col text-left'>
                        <h3 class='mb-3'>Test management</h3>
                        <div class='py-3'>
                            <a href="{{url('questions/create')}}" class='btn btn-primary'>Add new</a>
                        </div>
                        <table class='table text-left'>
                            @foreach ($test_questions as $test_question)
                                <tr><td>{{ $test_question->question }}</td><td><a href="{{ url('questions/'.$test_question->id.'/edit') }}">Edit</a></td></tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
            @if (auth()->user()->hasPermission('manage_exams'))
                <div class='row py-3 my-3 mx-1 shadow container_main'>
                    <div class='col text-left'>
                        <h3 class='mb-3'>Upcoming Exams</h3>
                        <div class='py-3'>
                            <a href="{{url('exams')}}" class='btn btn-primary'>Add new</a>
                        </div>
                        <table class='table text-left'>
                            <tr><th>Date</th><th>Level</th></tr>
                            @foreach ($exams as $exam)
                                <tr><td>{{ date("Y-m-d", strtotime($exam->date)) }}</td><td>{{ $exam->language_level->code }}</td></tr>
                            @endforeach
                        </table>
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
                        <tr><td>Country</td><td>{{ auth()->user()->country->name }}</td></tr>
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
