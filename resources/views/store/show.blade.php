@extends('app')

@section('content')
    {{--<div id="product-image">--}}
        {{--{!! HTML::image($product->image, $product->title)!!}--}}
    {{--</div><!-- end product-image -->--}}
    {{--<div id="product-details">--}}
        {{--<h1>{!! $product->title !!}</h1>--}}

        {{--<p>{!! $product->description!!}</p>--}}

        {{--<hr/>--}}

        {{--<form action="#" method="post">--}}
            {{--<label for="qty">Qty:</label>--}}
            {{--<input type="text" id="qty" name="qty" value="1" maxlength="2">--}}

            {{--<button type="submit" class="secondary-cart-btn">--}}
                {{--<img src="" alt="Add to Cart"/>--}}
                {{--ADD TO CART--}}
            {{--</button>--}}
        {{--</form>--}}
    {{--</div><!-- end product-details -->--}}
    {{--<div id="product-info">--}}
        {{--<p class="price">${!! $product->price!!}</p>--}}

        {{--<p>Availability: <span>{!! $product->availability!!}</span></p>--}}

    {{--<p>Product Code: <span>32321</span></p>--}}
    {{--</div><!-- end product-info -->--}}
    <div class="container">
        <div class="page-header">
            <h1>Product Details<small></small></h1>
        </div>
        <div class="row featurette">
            <div class="col-md-5">
                {!! HTML::image($product->image, $product->title, ['class'=>'featurette-image img-responsive'])!!}
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading">{{ $product->title }}</h2>

                <p class="lead">{{ $product->description }}</p>
                <div class="caption">
                    @if($product->availability)
                        <h4>Availability: <small>In Stock</small></h4>
                    @else
                        <h4>Out of Stock</h4>
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