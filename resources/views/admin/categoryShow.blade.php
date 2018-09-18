@extends('layout') 
@section('title', $title) 
@section('content')


<p>Name : {{ $category->name }}</p>
<p>Title : {{ $category->title }}</p>
<p>Created at : {{ $category->created_at }}</p>
<table>
    <tbody>
        <tr>
            <th> Name </th>
            <th> Title </th>
        </tr>
        @foreach($category->properties() as $property)
        <tr>
            <td> {{ $property->name }} </td>
            <td> {{ $property->title }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection