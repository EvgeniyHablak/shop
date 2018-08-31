@extends('layout') 
@section('title', $title) 
@section('content')
<div class="col-md-10 col-md-offset-1">
    <table>
        <tr>
            <th>{{ $category->title }}</th>
            @foreach($products as $product)
            <th>
                <div class="text-center">
                    @if($product->hasMainImage())
                    <img class="centered" style="height:200px;width=100%" src="{{ $product->mainImage()->path }}"> @else
                    <img class="centered" src="/img/test.svg" alt=""> @endif
                </div>
                <div class="comparison-title">
                    <h3 class="text-center">{{ $product->title }}</h3>
                    <p class="text-center">Price: ${{ $product->price }}</p>
                </div>
            </th>
            @endforeach
        </tr>
        @foreach($categoryProperties as $property)
        <tr>
            <td>{{ $property->title }}</td>
            @foreach($products as $product)
            <td>{{ $product->getPropertyValue($property->name) }}</td>
            @endforeach
        </tr>
        @endforeach
    </table>
</div>
@endsection