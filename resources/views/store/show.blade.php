@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Product Details<small></small></h1>
        </div>
        <div class="row featurette">
            <div class="col-md-5">
                {!! HTML::image($product->image, $product->title)!!}
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">{{ $product->title }}</h2>

                <p class="lead">{{ $product->description }}</p>
                <div class="caption">
                    @if($product->availability)
                        <h4>Availability: <small>In Stock</small></h4>
                    @else
                        <h4>Availability: <small>Out of Stock</small></h4>
                    @endif
                    <p>
                        <a href="#" class="btn btn-primary" role="button">Add to Cart</a>
                        <a href="#" class="btn btn-default " role="button">${!! $product->price!!}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop