@extends('layout') 
@section('title',$title) 
@section('content')

<div class="row">
    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
        {{-- <button class="btn btn-primary" id="add-product-prop">Add new property</button> --}}




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




        <form method="POST" action="{{ route('products.store') }}" id="new-product-form">
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
                    <input type="checkbox" name="name" id="name-participating">
                    <label for="name-participating">Participates in the search?</label>
                </div>
                <input autocomplete="off" id="product-name" class="form-control" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="product-title">Title</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="title" id="title-participating" checked>
                    <label for="title-participating">Participates in the search?</label>
                </div>
                <input autocomplete="off" id="product-title" class="form-control" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="product-price">Price</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="price" id="price-participating">
                    <label for="price-participating">Participates in the search?</label>
                </div>
                <input autocomplete="off" id="product-price" type="number" name="price" class="form-control" placeholder="Enter price">
            </div>
            <div id="properties"></div>
            <div id="new-properties"></div>
            <div class="form-group">
                <label for="product-description">Description</label>
                <div class="pull-right search-participating-block">
                    <input type="checkbox" name="description" id="description-participating">
                    <label for="description-participating">Participates in the search?</label>
                </div>
                <textarea autocomplete="off" id="product-description" name="description" rows="5" type="number" name="price" class="form-control"
                    placeholder="Enter price"></textarea>
            </div>
            {{ csrf_field() }}
            <input type="submit" name="submitButton" value="Save" class="btn btn-primary create-product-btn">
        </form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary pull-right" id="preview-button" data-toggle="modal" data-target="#myModal">
            Preview
        </button>
        <div class="preview-wrapper"></div>
    </div>
</div>
@endsection