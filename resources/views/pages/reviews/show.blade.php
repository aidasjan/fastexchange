@extends('layouts.app')

@section('content')

<div class='container'>
    <div class="row py-3 my-3 mx-1 shadow container_main">
        @if (auth()->user()->hasPermission('confirm_reviews'))
        <div class='col text-center'>
                <div class='py-3'>
                    <table class='table text-left'>
                        @if(count($notConfirmedReviews) !== 0)
                        <tr><th>User name</th><th>Image</th><th>Review</th><th>University</th><th>Action</th></tr>
                        @foreach($notConfirmedReviews as $review)
                            <tr>
                                <td>{{ \App\User::find($review->user_id)->name }}</td>
                                <td><img src="store_image/fetch_image/{{$review->id}}" class="img-thumbnail"/></td>
                                <td>{{ $review->text }}</td>
                                <td>{{ \App\University::find($review->university_id)->name }}</td>
                                <td>
                                    <form action="{{ action('Reviews\ReviewController@update', $review->id) }}" method='PUT'>
                                        {{ csrf_field() }}
                                        <input type='hidden' name='_method' value='PUT'>
                                        <input type='submit' class='btn btn-success text-uppercase' value="Accept ">
                                    </form>
                                    <form action="{{ action('Reviews\ReviewController@destroy', $review->id) }}" method='POST'>
                                        {{ csrf_field() }}
                                        <input type='hidden' name='_method' value='DELETE'>
                                        <input type='submit' class='btn btn-danger text-uppercase' value="Delete ">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        
                        @if(count($confirmedReviews) !== 0)
                        <tr><th>User name</th><th>Image</th><th>Review</th><th>University</th><th>Action</th></tr>
                        @foreach($confirmedReviews as $review)
                            <tr>
                                <td>{{ \App\User::find($review->user_id)->name }}</td>
                                <td><img src="store_image/fetch_image/{{$review->id}}" class="img-thumbnail"/></td>
                                <td>{{ $review->text }}</td>
                                <td>{{ \App\University::find($review->university_id)->name }}</td>
                                <td>Confirmed
                                    <form action="{{ action('Reviews\ReviewController@destroy', $review->id) }}" method='POST'>
                                        {{ csrf_field() }}
                                        <input type='hidden' name='_method' value='DELETE'>
                                        <input type='submit' class='btn btn-danger text-uppercase' value="Delete ">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </table>
                </div>
        </div>
    </div>
        @endif
        <div class='col text-center'>
                <div class='py-3'>
                    @if (auth()->user()->hasPermission('participate_in_exchange'))
                    <table class='table text-left'>
                        @if(count($confirmedReviews) !== 0)
                        <tr><th>User name</th><th>Image</th><th>Review</th><th>University</th><th>Action</th></tr>
                        @foreach($confirmedReviews as $review)
                            <tr>
                                <td>{{ \App\User::find($review->user_id)->name }}</td>
                                <td><img src="store_image/fetch_image/{{$review->id}}" class="img-thumbnail"/></td>
                                <td>{{ $review->text }}</td>
                                <td>{{ \App\University::find($review->university_id)->name }}</td>
                                <td>Confirmed</td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                    @endif
                </div>
        </div>
        
    </div>
</div>
@endsection