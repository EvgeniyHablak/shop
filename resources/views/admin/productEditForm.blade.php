@extends('layout') 
@section('title',$title) 
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" id="add-product-prop" data-toggle="modal" data-target="#newProp">
            Add new property
        </button>

        <!-- Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="newProp">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="property-name">Property name</label>
                            <input id="property-name" class="form-control" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="property-title">Property title</label>
                            <input id="property-title" class="form-control" name="title" placeholder="Enter title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="close-product-prop" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="create-product-prop">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <br>
        <div class="products-images">
            <form action="{{ route('product.upload', ['product' => $product->id]) }}" method="POST" id="upload-product-image-form">
                <input type="file" name="productImage">
            </form>
            <div class="row">
                @foreach($product->media() as $media)
                <div class="col-lg-4 col-md-4">
                    <img class="product-media" src="{{ $media->path }}" alt=""> @if(!$media->isMain())
                    <a class="btn btn-success" href="{{ route('media.setMain', ['mediaId' => $media->id]) }}" class="">Set main</a>                    @else
                    <div class="btn btn-default">Is main</div>
                    @endIf
                    <a class="btn btn-danger" href="{{ route('media.delete', ['mediaId' => $media->id]) }}">Delete</a>
                </div>
                @endforeach
            </div>
        </div>

        <form method="POST" action="{{ route('products.update', ['product' => $product->id])  }}" id="edit-product-form">
            <input type="hidden" name="_method" value="PUT.edit-product-btn">
            <div class="form-group">
                <label>Category</label>
                <select disabled name="category" id="select-category" class="form-control" data-categories="{{ route('categories.properties') }}">
                    <option selected>{{ $product->category()->title }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product-name">Name</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="name" id="name-participating" @if($product->isInSearch('name')) checked
                    @endif>
                    <label for="name-participating">Participates in the search?</label>
                </div>
                <input autocomplete="off" id="product-name" class="form-control" name="name" placeholder="Enter name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="product-title">Title</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="title" id="title-participating" @if($product->isInSearch('title')) checked
                    @endif>
                    <label for="title-participating">Participates in the search?</label>
                </div>
                <input autocomplete="off" id="product-title" class="form-control" name="title" placeholder="Enter title" value="{{ $product->title}}">
            </div>
            <div class="form-group">
                <label for="product-price">Price</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="price" id="price-participating" @if($product->isInSearch('price')) checked
                    @endif>
                    <label for="price-participating">Participates in the search?</label>
                </div>
                <input autocomplete="off" id="product-price" type="number" name="price" class="form-control" placeholder="Enter price" value="{{ $product->price}}">
            </div>
            <div id="properties">
                @foreach($product->properties() as $property)
                <div class="form-group">
                    <label for="product-{{ $property->name }}">{{ $property->title }}</label>
                    <div class="pull-right search-participating-block">
                        <input type="checkbox" name="{{ $property->name }}" id="{{ $property->name }}-participating" @if($product->isInSearch($property->name))
                        checked @else value="off" @endif>
                        <label for="{{ $property->name }}-participating">Participates in the search?</label>
                    </div>
                    <input data-title="{{ $product->title }}" id="product-{{ $property->name }}" type="text" name="{{ $property->name }}" class="form-control property"
                        placeholder="Enter {{ $property->name }}" value="{{ $property->value}}">
                </div>
                @endforeach
            </div>
            <div id="new-properties"></div>
            <div class="form-group">
                <label for="product-description">Description</label>
                <div class="pull-right search-participating-block">
                    <input @if($product->isInSearch('description')) checked @else value="off" @endif type="checkbox" name="description"
                    id="description-participating">
                    <label for="description-participating">Participates in the search?</label>
                </div>
                <textarea autocomplete="off" id="product-description" name="description" rows="5" type="number" name="price" class="form-control"
                    placeholder="Enter price">{{ $product->description }}</textarea>
            </div>
            <input type="submit" name="submitButton" value="Save" class="btn btn-primary edit-product-btn">
        </form>

    </div>
</div>
@endsection