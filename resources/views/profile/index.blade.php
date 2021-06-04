@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <h2>Profile </h2></div>
    <div class="row">
    
        <div class="col-md-10 col-md-offset-1">
            <img src="/users/images/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}</h2>
            <form enctype="multipart/form-data" action="{{route('profile.store')}}" method="POST">
            @csrf
                <label>Subir Avatar</label>
                <input type="file" name="avatar">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection