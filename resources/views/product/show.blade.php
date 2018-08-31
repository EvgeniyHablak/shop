@extends('layout') 
@section('title',$product->title) 
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4">
        @if ($product->hasMainImage())
        <img class="product-main-image" src="{{ $product->mainImage()->path }}" alt=""> @else
        <img src="/img/test.svg" alt=""> @endif
    </div>
    <div class="col-lg-4 col-md-4">
        <h1 class="product-name">Name: {{ $product->title }}</h1>
        <h2 class="product-price">Price: ${{ $product->price }}</h2>
        <h2 class="">Added to favorite {{ $product->favoriteCount() }} times</h2>
    </div>
    <div class="col-lg-4 col-md-4">
        <ul>
            @if($product->isFavorite())
            <li><a class="btn btn-success" href="{{ route('favorite.delete',['productId' => $product->id]) }}">Delete from favorite</a></li>
            @else
            <li><a class="btn btn-success" href="{{ route('favorite.create',['productId' => $product->id]) }}">Add to favorite</a></li>
            @endif @if($product->isCompared())
            <li><a class="btn btn-success" href="{{ route('comparison.delete',['productId' => $product->id]) }}">Delete from compare</a></li>
            @else
            <li><a class="btn btn-success" href="{{ route('comparison.create',['productId' => $product->id]) }}">Add to compare</a></li>
            @endif
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