@extends('layout') 
@section('title', $title) 
@section('content')
<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
    <div class="form-group">
        <label>Name</label>
        <input class="form-control" name="name" placeholder="Enter name" value="{{ $category->name }}">
    </div>
    <div class="form-group">
        <label>Title</label>
        <input class="form-control" name="title" placeholder="Enter title" value="{{ $category->title }}">
    </div>
    <input name="_method" value="PUT" type="hidden">
    <div id="properties">
        @foreach($properties as $property)
        <div class="form-group">
            <label>Name of new prop</label>
            <input type="text" name="propertyName[]" class="form-control" placeholder="Enter Name of new prop" value="{{ $property->name }}">
        </div>
        <div class="form-group">
            <label>Title of new prop</label>
            <input type="text" name="propertyTitle[]" class="form-control" placeholder="Enter Title of new prop" value="{{ $property->title }}">
        </div>
        @endforeach
    </div>
    <input class="btn btn-success pull-right" type="submit" value="Save"> {{ csrf_field() }}
</form>
<button class="btn btn-primary" id="add-category-property">Add property</button>
@endsection