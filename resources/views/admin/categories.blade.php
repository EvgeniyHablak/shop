@extends('layout') 
@section('title', $title) 
@section('content') @if(auth()->user()->hasPermission('admin') || auth()->user()->hasPermission('manager'))
@if(auth()->user()->hasPermission('admin'))
<a class="btn btn-primary" href="{{ route('categories.create') }}">Create category</a> @endif @endif

<div class="list-group">
    <a href="{{ route('categories.index') }}" class="list-group-item active">
        Categories 
    </a> @foreach ($categories as $category)
    <span class="list-group-item">
    <span>{{ $category->title }}</span>
    <div class="pull-right">
        @if(auth()->user()->hasPermission('admin'))
        <a class="btn btn-primary" href="{{ route('categories.edit', ['categoryId' => $category->id]) }}">
            Edit
        </a>
        <form method="POST" style="display:inline-block" action="{{ route('categories.destroy', ['categoryId' => $category->id]) }}">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" class="btn btn-default" value="Delete"> {{ csrf_field() }}
        </form>
        @elseif(auth()->user()->hasPermission('manager'))
        <a class="btn btn-default" href="{{ route('admin.categories.show', ['category' => $category->id]) }}">
            Show
        </a> @endif
    </div>
    </span> @endforeach
</div>
@endsection