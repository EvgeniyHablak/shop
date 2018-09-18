@extends('layout') 
@section('title', $title) 
@section('content') {{-- @if(auth()->user()->hasPermission('admin') || auth()->user()->hasPermission('manager'))
<a class="btn btn-primary" href="{{ route('categories.create') }}">Create category</a> @endif --}}

<div class="list-group">
    <a href="{{ route('categories.index') }}" class="list-group-item active">
        Categories
    </a> @foreach ($categories as $category)
    <span class="list-group-item">
        <a href="{{ route('categories.show', ['category' => $category->name]) }}">
            {{ $category->title }}
        </a>
    </span> @endforeach
</div>
@endsection