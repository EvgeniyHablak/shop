@extends('layout') 
@section('title','Users') 
@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6 col-md-offset-3">
        <h2>Favorite products</h2>
        @foreach($favorites as $favorite)
        <ul class="list-group">
            <li class="list-group-item">Id: {{ $favorite->id }}</li>
            <li class="list-group-item">Name: {{ $favorite->title }}</li>
            <li class="list-group-item">Price: ${{ $favorite->price }}</li>
            <form action="{{ route('admin.favorites.remove', ['userId' => $user->id, 'productId' => $favorite->id]) }}" method="POST">
                <input type="hidden" name="_method" value="delete">
                <input type="submit" value="Delete from favorite" class="btn btn-default"> {{ csrf_field() }}
            </form>
        </ul>
        @endforeach
    </div>
</div>
@endsection