@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Saved Cart</h1>
        </div>
        @include('flash::message')

        @if($carts)
            <div class="panel panel-default">
                @foreach($carts as $index => $cart)
                    <div class="row featurette" style="margin-top: 40px;">
                        <div class="col-md-5" style="width: 22.6%;">
                            {!! HTML::image($cart->product->image, $cart->product->title, ['width'=>'200'])!!}
                        </div>
                        <div class="col-md-7">
                            <h2 class="featurette-heading" style="margin-top: 0px;">{{ $cart->product->title }}</h2>

                            <p class="lead">{{ $cart->product->description }}</p>

                            <div class="caption">
                                <h4>Price:<small>${!! $cart->product->price !!}</small></h4>

                                @if($cart->product->availability)
                                    <h4>Availability:<small>In Stock</small></h4>
                                @else
                                    <h4>Availability:<small>Out of Stock</small></h4>
                                @endif
                                <p>
                                    {!! Form::open(['data-remote', 'method'=>'PATCH', 'route'=>['store.cart.saved_carts.update', $cart->id]]) !!}
                                    {!! Form::input('number', 'qty', $cart->qty, ['class'=>'form-control col-md-1 ', 'min'=>'1', 'style'=>'width: 10%;']) !!}
                                    {!! Form::close() !!}

                                    {!! Form::open(['method'=>'get', 'url'=>['store/cart/saved_carts/destroy_item', $cart->id]]) !!}
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
                    <h5 class="col-md-offset-10">Cart subtotal: ${!! $cart->total !!}</h5>
                    <h5 class="col-md-offset-10">Estimated Tax: $0.00</h5>
                    <h4 class="col-md-offset-10">Total: ${!! $cart->total !!}</h4>
                </div>
                <hr>
                <div class="row featurette" style="margin-left: 25px; margin-top: 0px; margin-bottom: 17px;">
                    <div class="form-group">
                        <div class="col-md-offset-">

                            {!! HTML::link(route('store.index'), 'Continue Shopping', ['class'=>'btn btn-default col-md-2' ]) !!}

                            {!! Form::open(['method'=>'get', 'url'=>['store/cart/saved_carts/addAllToCart', $cart->cart_id]]) !!}
                            {!! Form::submit('Add All to Cart', ['class'=>'btn btn-success col-md-2 col-md-offset-7']) !!}
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