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
        {{-- @if(auth()->user()->hasPermission('admin') || auth()->user()->hasPermission('manager'))
        <a href="{{ route('categories.edit', ['categoryId' => $category->id]) }}">
            Edit
        </a>
        <a href="{{ route('categories.delete', ['categoryId' => $category->id]) }}">
                Delete
            </a>
        @endif --}}
    </span> @endforeach
</div>
@endsection