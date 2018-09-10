@extends('layout') 
@section('title', $product->title) 
@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3 preview-actions">
        <form style="display:inline-block" action="{{ route('preview.destroy', ['preview' => $product->id]) }}" method="POST">
            <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
            <input class="btn btn-success" type="submit" value="Save">
        </form>
        <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="btn btn-primary">
            Back to editing
        </a>
        <form class="pull-right" style="display:inline-block" action="{{ route('products.destroy', ['product' => $product->id]) }}"
            method="POST">
            <input type="hidden" name="_method" value="delete"> {{ csrf_field() }}
            <input class="btn btn-danger " type="submit" value="Remove">
        </form>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-4 col-md-4">
        @if ($product->hasMainImage())
        <img class="product-main-image" src="{{ $product->mainImage()->path }}" alt=""> @else
        <img src="/img/test.svg" alt=""> @endif
    </div>
    <div class="col-lg-4 col-md-4">
        <h1 class="product-name">Name: {{ $product->title }}</h1>
        <h2 class="product-price">Price: ${{ $product->price }}</h2>
        <h2 class="">Added to favorite 102 times</h2>
    </div>
    <div class="col-lg-4 col-md-4">
        <ul>
            <li><a class="btn btn-success" href="#">Add to favorite</a></li>
            <li><a class="btn btn-success" href="#">Add to compare</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <ul>
            @foreach($product->properties() as $property)
            <li>{{ $property->title }}: {{ $property->value }}</li>
            @endforeach
        </ul>
    </div>
</div>
<div class="row">
    @foreach($product->media() as $media)
    <div class="col-lg-4 col-md-4">
        <img class="product-media" src="{{ $media->path }}" alt=""> @guest @elseif (auth()->user()->hasPermission('admin'))
        <a class="btn btn-success" href="{{ route('media.setMain', ['mediaId' => $media->id]) }}" class="">Main</a>
        <a class="btn btn-danger" href="{{ route('media.delete', ['mediaId' => $media->id]) }}">Delete</a> @endGuest
    </div>
    @endforeach
</div>
@endsection