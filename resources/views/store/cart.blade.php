@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Items in Your Cart</h1>
        </div>
        @if($total)
            <div class="panel panel-default">
            @foreach($products as $index => $product)
                <div class="row featurette">
                    <div class="col-md-5" style="width: 22.6%;">
                        {!! HTML::image($product->options->image, $product->title, ['width'=>'200'])!!}
                    </div>
                    <div class="col-md-7">
                        <h2 class="featurette-heading" style="margin-top: 0px;">{{ $product->name }}</h2>

                        <p class="lead">{{ $product->options->description }}</p>

                        <div class="caption">
                            <h4>Price:<small>${!! $product->price !!}</small></h4>

                            @if($product->options->availability)
                                <h4>Availability:<small>In Stock</small></h4>
                            @else
                                <h4>Availability:<small>Out of Stock</small></h4>
                            @endif
                            <p>
                                {!! Form::open(['data-remote', 'method'=>'PATCH', 'route'=>['store.cart.update', $product->rowid]]) !!}
                                {!! Form::input('number', 'qty', $product->qty, ['class'=>'form-control col-md-1 ', 'min'=>'1', 'style'=>'width: 10%;']) !!}
                                {!! Form::close() !!}

                                {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-default col-md-2 col-md-offset-1', 'style'=>'margin-left: 5px;']) !!}
                                {!! Form::close() !!}
                            </p>
                        </div>
                    </div>
                </div>
                <br>
                <hr>

            @endforeach

                <div class="row featurette" style="margin-top: 0px;">
                    <h5 class="col-md-offset-10">Cart subtotal: ${!! $total !!}</h5>
                    <h5 class="col-md-offset-10">Estimated Tax: $0.00</h5>
                    <h4 class="col-md-offset-10">Total: ${!! $total !!}</h4>
                </div>
                <hr>
                <div class="row featurette" style="margin-left: 25px; margin-top: 0px; margin-bottom: 17px;">
                    <div class="form-group">
                        <div class="col-md-offset-">
                            {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}
                            {!! Form::submit('Continue Shopping', ['class'=>'btn btn-default col-md-2', 'style'=>'margin-left: 5px;']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}
                            {!! Form::submit('Save Cart', ['class'=>'btn btn-default col-md-2 ', 'style'=>'margin-left: 5px;']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}
                            {!! Form::submit('Empty Cart', ['class'=>'btn btn-default col-md-2 ', 'style'=>'margin-left: 5px;']) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}
                            {!! Form::submit('Check Out', ['class'=>'btn btn-success col-md-2 col-md-offset-3']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @else
                @include('store.sections.no_items_in_cart')
            @endif
        </div>
    </div>
@stop