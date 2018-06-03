@extends('layout') 
@section('title',$title) 
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
        <button class="btn btn-primary" id="add-product-prop">Add new property</button>
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
                <label>Name</label>
                <input class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price">
            </div>
            <div id="properties"></div>
            <div id="new-property"></div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="5" type="number" name="price" class="form-control" placeholder="Enter price"></textarea>
            </div>
            {{--
            <div class="new-property-form" style="display:none">
                <div class="form-group">
                    <label>Name of new Property </label>
                    <input class="form-control" type="text" name="propertyName" placeholder="Enter name of new property">
                </div>
                <div class="form-group">
                    <label>Title of new Property</label>
                    <input class="form-control" type="text" name="propertyTitle" placeholder="Enter title of new property">
                </div>
                <div class="form-group">
                    <label>Value of new Property</label>
                    <input class="form-control" type="text" name="propertyValue" placeholder="Enter value of new property">
                </div>
            </div> --}} {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection