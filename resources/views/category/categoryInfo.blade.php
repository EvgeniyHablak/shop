@extends('layout') 
@section('title', $title) 
@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Category</div>
    <div class="panel-body">
        <p>Title: {{ $category->title }}</p>
        <p>Name: {{ $category->name }}</p>
        <p>Created at: {{ $category->created_at }}</p>
        <p>Category properties: </p>
    </div>
    <!-- Table -->
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Title</th>
        </tr>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property->name }}</td>
            <td>{{ $property->title }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endSection
