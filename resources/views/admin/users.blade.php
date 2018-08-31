@extends('layout') 
@section('title','Users') 
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-md-offset-3">
        <ul class="list-group">
            @foreach($users as $user)
            <li class="list-group-item" style="height:150px">
                <p>Name: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Registered at: {{ $user->created_at }}</p>
                <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-default pull-right">User favorites</a>
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-default pull-right">Edit</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection