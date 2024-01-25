@extends('layout')

@section('headTitle',"Edit Role -")
@section('pageTitle',"Edit Role")

@section('content')
<form id="edit-role-form" method="post" action="{{URL::to('role/saveChanges/'.$role->id)}}">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li class="text-white">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <div class="form-group">
                <input type='text' value="{{$role->name}}" pattern="[a-zA-Z]{2-10}$" title="2-10 letters " required name="role_name" class="form-control" placeholder="Please enter role name">
            </div>
            <input value="Save changes" type='submit' name="submit" class="form-control btn btn-success">
            
                </div>

            </div>
            
        </div>
    </div>
    
</form>

@endsection()