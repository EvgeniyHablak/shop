@extends('layout') 
@section('title', $title) 
@section('content')
<form action="{{ route('categories.store') }}" method="post">
    <div class="form-group @if($errors->has('name')) has-error @endif">
        <label>Name</label>
        <input class="form-control" name="name" placeholder="Enter name">
    </div>
    <div class="form-group @if($errors->has('title')) has-error @endif">
        <label>Title</label>
        <input class="form-control " name="title" placeholder="Enter title">
    </div>
    {{-- <input name="_method" value="PUT" type="hidden"> --}}
    <div id="properties"></div>
    <input class="btn btn-success pull-right" type="submit" value="Create"> {{ csrf_field() }}
</form>
<button class="btn btn-primary" id="add-category-property">Add property</button>
@endsection