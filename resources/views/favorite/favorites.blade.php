@extends('layout') 
@section('title', $title) 
@section('content')
<div class="col-lg-9 col-md-9">
    <div class="row">
        <h2>Favirotes</h2>
        @foreach ($favorites as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail" style="height:500px">
                <a href="{{ route('products.show', ['product' => $product->id]) }}">
                        @if ($product->hasMainImage())
                            <img src="{{ $product->mainImage()->path }}" alt="...">
                        @else
                        <img src="/img/test.svg" alt="...">
                        
                        @endif
                        </a>
                <div class="caption">
                    <h3>
                        <a href="{{ route('products.show', ['product' => $product->id]) }}">
                                    {{ $product->title }}
                                </a>
                    </h3>
                    <p>Added: {{ $product->created_at->toFormattedDateString() }}</p>

                    <p>Price: ${{ $product->price }}</p>
                    <p>{{ $product->description }}</p>
                    <p>
                        @if ($product->isFavorite())
                        <a href="{{ route('favorite.delete', ['product' => $product->id]) }}" class="btn btn-primary" role="button">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    Delete from favorite
                                </a> @else
                        <a href="{{ route('favorite.create', ['product' => $product->id]) }}" class="btn btn-primary" role="button">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Favorite
                                </a> @endif @if ($product->isCompared())
                        <a href="{{ route('comparison.delete', ['product' => $product->id]) }}" class="btn btn-default" role="button">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        Delete from compared
                                    </a> @else
                        <a href="{{ route('comparison.create', ['product' => $product->id]) }}" class="btn btn-default" role="button">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Compare
                            </a> @endif
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection