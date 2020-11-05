@extends('layouts.app')

@section('content')

<div class='container'>
    <div class="row py-3 my-3 mx-1 shadow container_main">
        @if (auth()->user()->hasPermission('participate_in_exchange'))
        <div class='col text-center'>
            <h3>Geriausiu universitetu sarasas</h3>
            <table class="table text-left">
                <tr>
                    <th>#</th><th>University</th><th>Rating</th>
                </tr>
                {{ $index = 1 }}
                @foreach ($universities as $university)
                    <tr>
                        <td>{{$index++}}</td>
                        <td>{{$university->name}}</td>
                        <td>{{$university->total_rating}}</td>
                    </tr>
                @endforeach
                
            </table>
        </div>
        @endif
    </div>
</div>
@endsection