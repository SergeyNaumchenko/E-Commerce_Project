@extends('app')


@section('content')
<div class="container">
    <div class="page-header">
        <h1>Shopping Cart</h1>
    </div>

    @foreach($products as $index => $product)
            <div class="row featurette">
                <div class="col-md-5" style="width: 22.6%;">
                    {!! HTML::image($product->options->image, $product->title, ['width'=>'200'])!!}
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading" style="margin-top: 0px;">{{ $product->name }}</h2>

                    <p class="lead">{{ $product->options->description }}</p>
                    <div class="caption">
                        @if($product->options->availability)
                            <h4>Availability: <small>In Stock</small></h4>
                        @else
                            <h4>Availability: <small>Out of Stock</small></h4>
                        @endif
                        <p>
                            {!! Form::open(['method'=>'PATCH', 'route'=>['store.cart.update', $product->rowid]]) !!}
                            {!! Form::input('number', 'qty', $product->qty, ['class'=>'form-control', 'min'=>'1', 'style'=>'width: 10%;']) !!}
                            {!! Form::close() !!}

                            {!! $product->price !!}
                            {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-default']) !!}
                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>
            <hr>
    @endforeach
</div>

@stop