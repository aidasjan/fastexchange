@extends('layouts.app')

@section('content')

<div class="container">    

@if (auth()->user()->hasPermission('participate_in_exchange'))
    @if($errors->any())
    <div class="alert alert-danger">
           <ul>
           @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
           @endforeach
           </ul>
        </div>
    @endif

    @if(session()->has('success'))
     <div class="alert alert-success">
     {{ session()->get('success') }}
     </div>
    @endif
    @if(session()->has('error'))
     <div class="alert alert-danger">
     {{ session()->get('error') }}
     </div>
    @endif
    <br />

    <div class="container">
        <div class='row py-5'>
            <div class='col'>
                <h1 class='text-uppercase'>Create review</h1>
            </div>
        </div>
        <div class="row py-3">
            
                <form method="post" action="{{ url('store_image/insert_image') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group container_main shadow">
                        <h5 class="pt-3"></h5>
                        <div class="py-2 px-5 text-left pb-5">
                        <div class="row">
                            <label class="col-md-4" align="right">Choose your review</label>
                            <div class="col-md-8">
                                <select class="form-control w-50" name="id_review" >
                                    @foreach($reviews as $review)
                                        <option value='{{ $review->id }}' >{{ $review->text }}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <label class="col-md-4" align="right">Enter image title</label>
                            <div class="col-md-8">
                                <input type="text" name="Title" class="form-control" />
                            </div>
                            <label class="col-md-4" align="right">Enter image caption</label>
                            <div class="col-md-8">
                                <input type="text" name="Caption" class="form-control" />
                            </div>
                        </div>
                    
                    
                        <div class="row">
                            <label class="col-md-4" align="right">Select Image</label>
                            <div class="col-md-8">
                                <input type="file" name="user_image" />
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <input type="submit" name="store_image" class="btn btn-primary" value="Save" />
                        </div>
                    </div>
                </form>
            
        </div>
     </div>
    </div>
    @endif
    @endsection