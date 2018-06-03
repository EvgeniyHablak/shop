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
                <button class="btn btn-default pull-right">User favorites</button>
                <button class="btn btn-default pull-right">Edit</button>
                <button class="btn btn-default pull-right">View</button>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection