
@extends('layouts.app')

@section('content')



<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>Recommended modules</h1>
        </div>
    </div>
    <div class='row py-3 container_main shadow'>
        <div class='col'>
            <table class='table text-left'>
                <tr><th>Name</th><th>Faculty</th><th>University</th><th>ECTS</th><th>Match</th></tr>
                @foreach ($recommended_modules as $recommended_module)
                    <tr>
                        <td>{{$recommended_module['module']->name}}</td>
                        <td>{{$recommended_module['module']->faculty->name}}</td>
                        <td>{{$recommended_module['module']->faculty->university->name}}</td>
                        <td>{{$recommended_module['module']->credits}}</td>
                        <td class='font-weight-bold' style='color: #00aa00'>{{round($recommended_module['points']/$max_points * 100)}}%</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>



                    
@endsection
