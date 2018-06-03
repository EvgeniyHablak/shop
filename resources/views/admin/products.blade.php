@extends('layout') 
@section('title',$title) 
@section('content')
<a href="{{ route('products.create') }}" type="button" class="btn btn-primary">Add new product</a>
<table class="table">
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Price</td>
        <td>Category</td>
        <td>EDIT</td>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td>{{ $product->category()->title }}</td>
        <td>
            <a href="{{ route('admin.products.edit', ['productId'=> $product->id]) }}" class="btn">
                edit
            </a>
            <a href="{{ route('admin.products.delete', ['productId'=> $product->id]) }}" class="btn">
                delete
            </a>
        </td>

    </tr>
    @endforeach

</table>
@endsection