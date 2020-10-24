
@extends('layouts.app')

@section('content')



<div class='container'>
    <div class='row py-5'>
        <div class='col'>
            <h1 class='text-uppercase'>Edit module list</h1>
        </div>
    </div>
    <div class='row py-3'>
        <div class='col'>
            <form method="POST" action="{{ action('Modules\ModuleController@updateList', $user->id) }}">
                @csrf
                <input type='hidden' name='_method' value='PUT' />
            
                <div class="form-group row py-1">
                    <div class='col-md-6 offset-md-3 p-4 container_main shadow text-left'>
                        <h5>Assign modules</h5>
                    @foreach ($allModules as $module)
                        <div>
                            <input
                            @if($user_module->contains($module)) checked @endif
                            
                             type="checkbox" id="module_{{$module->id}}" name="modules[]" value="{{$module->id}}">
                            <label for="location_{{$module->id}}">{{$module->name}}</label>
                        </div>
                    @endforeach
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
    </div>
</div>



                    
@endsection
