@extends('layout') 
@section('title','Users') 
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
            <div class="form-group">
                <label for="user-name">Name</label>
                <input id="user-name" class="form-control" name="name" placeholder="Enter name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="user-email">Email</label>
                <input id="user-email" class="form-control" name="email" placeholder="Enter email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="user-password">Password</label>
                <input id="user-password" class="form-control" name="password" placeholder="****">
            </div>
            <input type="hidden" name="_method" value="PUT"> {{ csrf_field() }}
            <input id="user-submit" class="btn btn-primary" name="submit" value="Save" type="submit">
        </form>
    </div>
</div>
@endsection