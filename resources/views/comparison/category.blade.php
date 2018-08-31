@extends('layout') 
@section('title', $title) 
@section('content')
<div class="list-group">
    <a href="{{ route('categories.index') }}" class="list-group-item active">
        Products categories in comparison
    </a> @foreach ($comparisonCategories as $category)
    <div class="list-group-item">
        <a href="{{ route('comparison.category', ['category' => $category->name]) }}">
            {{ $category->title }}
        </a>
        <span>Products in comparison: {{ $category->productsInComparison }}</span>
    </div>

    @endforeach
</div>
@endsection