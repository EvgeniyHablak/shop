@extends('layout') 
@section('title',$title) 
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
        <button class="btn btn-primary" id="add-product-prop">Add new property</button>
        <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
            <div class="form-group">
                <label>Category</label>
                <select disabled name="category" id="select-category" class="form-control" data-categories="{{ route('categories.properties') }}">
                    <option selected>{{ $product->category()->title }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-name">Name</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[name]" id="name-participating" @if($product->isInSearch('name'))
                    checked @endif>
                    <label for="name-participating">Participates in the search?</label>
                </div>
                <input id="product-name" class="form-control" name="name" placeholder="Enter name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="product-title">Title</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[title]" id="title-participating" @if($product->isInSearch('title'))
                    checked @endif>
                    <label for="title-participating">Participates in the search?</label>
                </div>
                <input id="product-title" class="form-control" name="title" placeholder="Enter title" value="{{ $product->title}}">
            </div>
            <div class="form-group">
                <label for="product-price">Price</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[price]" id="price-participating" @if($product->isInSearch('price'))
                    checked @endif>
                    <label for="price-participating">Participates in the search?</label>
                </div>
                <input id="product-price" type="number" name="price" class="form-control" placeholder="Enter price" value="{{ $product->price}}">
            </div>
            <div id="new-property">
                @foreach($product->properties() as $property)
                <div class="form-group">
                    <label for="product-{{ $property->name }}">{{ $property->title }}</label>
                    <div class="pull-right search-participating-block">
                        <input type="checkbox" name="inSearch[{{ $property->name }}]" id="{{ $property->name }}-participating" @if($product->isInSearch($property->name))
                        checked @else value="off" @endif>
                        <label for="{{ $property->name }}-participating">Participates in the search?</label>
                    </div>
                    <input id="product-{{ $property->name }}" type="text" name="existedProperties[{{ $property->name }}]" class="form-control"
                        placeholder="Enter {{ $property->name }}" value="{{ $property->value}}">
                </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="product-description">Description</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[description]" id="description-participating" @if($product->isInSearch('description'))
                    checked @endif>
                    <label for="description-participating">Participates in the search?</label>
                </div>
                <textarea id="product-description" name="description" rows="5" type="number" name="price" class="form-control" placeholder="Enter price">{{ $product->description }}</textarea>
            </div>
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection