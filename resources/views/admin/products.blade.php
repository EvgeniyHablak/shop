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
        <td>Actions</td>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td>{{ $product->category()->title }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('admin.products.edit', ['productId'=> $product->id]) }}">
                edit
            </a>
            <form class="remove-product" action="{{ route('products.destroy', ['productId'=> $product->id]) }}" method="POST">
                <input type="hidden" name="_method" value="delete">
                <input type="submit" class="btn btn-default" value="delete"> {{ csrf_field() }}
            </form>

        </td>

    </tr>
    @endforeach

</table>
@endsection