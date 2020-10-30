@extends('layouts.app')

@section('content')

<div class='container'>
    <div class="row py-3 my-3 mx-1 shadow container_main">
        <div class='col text-center'>
            <h3>{{ count($notConfirmedReviews) !== 0 ? 'Reviews waiting for confirmation' :'No reviews to confirm' }}</h3>
                <div class='py-3'>
                    <table class='table text-left'>
                        @if(count($notConfirmedReviews) !== 0)
                        <tr><th>User name</th><th>Image</th><th>Review</th><th>Id of university</th><th>Action</th></tr>
                        @foreach($notConfirmedReviews as $review)
                            <tr>
                                <td>{{ \App\User::find($review->user_id)->name }}</td>
                                <td>{{ $review->text }}</td>
                                <td>{{ $review->university_id }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                    <div class="col-md-6"><button type="button" class="btn btn-success"> Accept</button></div>
                                    <div class="col-md-6"><button type="button" class="btn btn-danger"> Deny</button></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection