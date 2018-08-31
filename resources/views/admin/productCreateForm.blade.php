@extends('layout') 
@section('title',$title) 
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
        <button class="btn btn-primary" id="add-product-prop">Add new property</button>
        <button href="#" class="btn btn-primary pull-right">Show preview</button>
        <form method="POST" action="{{ route('products.store') }}">
            <div class="form-group">
                <label>Category</label>
                <select name="category" id="select-category" class="form-control" data-categories="{{ route('categories.properties') }}">
                    <option  selected disabled>Choose category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product-name">Name</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[name]" id="name-participating">
                    <label for="name-participating">Participates in the search?</label>
                </div>
                <input id="product-name" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="product-title">Title</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[title]" id="title-participating" checked>
                    <label for="title-participating">Participates in the search?</label>
                </div>
                <input id="product-title" class="form-control" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="product-price">Price</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[price]" id="price-participating">
                    <label for="price-participating">Participates in the search?</label>
                </div>
                <input id="product-price" type="number" name="price" class="form-control" placeholder="Enter price">
            </div>
            <div id="properties"></div>
            <div id="new-property"></div>
            <div class="form-group">
                <label for="product-description">Description</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="inSearch[description]" id="description-participating">
                    <label for="description-participating">Participates in the search?</label>
                </div>
                <textarea id="product-description" name="description" rows="5" type="number" name="price" class="form-control" placeholder="Enter price"></textarea>
            </div>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</div>
@endsection