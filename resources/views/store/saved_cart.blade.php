@extends('app')

@section('content')
    <div class="container">
        <h3 class="well">Saved Cart</h3>
        <div>
            <table class="table well">
                <tbody>
                <tr>
                    <td>Cart Name: {{ $cart }} | <a href="#">Edit</a></td>
                    <td>ID Number: {{ $cart }}</td>
                    <td>Date added: {{ $cart }} </td>
                </tr>
                </tbody>
            </table>
        </div>

        @include('flash::message')

        @if($carts)
            {{--<div class="panel panel-default">--}}
                {{--@foreach($carts as $index => $cart)--}}
                    {{--<div class="row featurette" style="margin-top: 40px;">--}}

                        {{--<div class="col-md-5" style="width: 22.6%;">--}}
                            {{--{!! HTML::image($cart->product->image, $cart->product->title, ['width'=>'200'])!!}--}}
                        {{--</div>--}}
                        {{--<div class="col-md-7">--}}

                            {{--<h2 class="featurette-heading" style="margin-top: 0px;">{{ $cart->product->title }}</h2>--}}

                            {{--<p class="lead">{{ $cart->product->description }}</p>--}}

                            {{--<div class="caption">--}}
                                {{--<h4>Price:<small>${!! $cart->product->price !!}</small></h4>--}}

                                {{--@if($cart->product->availability)--}}
                                    {{--<h4>Availability:<small>In Stock</small></h4>--}}
                                {{--@else--}}
                                    {{--<h4>Availability:<small>Out of Stock</small></h4>--}}
                                {{--@endif--}}
                                {{--<p>--}}
                                    {{--{!! Form::open(['data-remote', 'method'=>'PATCH', 'route'=>['store.cart.saved_carts.update', $cart->id]]) !!}--}}
                                    {{--{!! Form::input('number', 'qty', $cart->qty, ['class'=>'form-control col-md-1 ', 'min'=>'1', 'style'=>'width: 10%;']) !!}--}}
                                    {{--{!! Form::close() !!}--}}

                                    {{--{!! Form::open(['method'=>'get', 'url'=>['store/cart/saved_carts/destroy_item', $cart->id]]) !!}--}}
                                    {{--{!! Form::submit('Delete', ['class'=>'btn btn-default col-md-2 col-md-offset-1', 'style'=>'margin-left: 5px;']) !!}--}}
                                    {{--{!! Form::close() !!}--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<br>--}}
                    {{--<hr>--}}

                {{--@endforeach--}}

                {{--<div class="row featurette" style="margin-top: 0px;">--}}
                    {{--<h5 class="col-md-offset-10">Cart subtotal: ${!! $cart->total !!}</h5>--}}
                    {{--<h5 class="col-md-offset-10">Estimated Tax: $0.00</h5>--}}
                    {{--<h4 class="col-md-offset-10">Total: ${!! $cart->total !!}</h4>--}}
                {{--</div>--}}
                {{--<hr>--}}
                {{--<div class="row featurette" style="margin-left: 25px; margin-top: 0px; margin-bottom: 17px;">--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-offset-">--}}

                            {{--{!! HTML::link(route('store.index'), 'Continue Shopping', ['class'=>'btn btn-default col-md-2' ]) !!}--}}

                            {{--{!! Form::open(['method'=>'get', 'url'=>['store/cart/saved_carts/addAllToCart', $cart->cart_id]]) !!}--}}
                            {{--{!! Form::submit('Add All to Cart', ['class'=>'btn btn-success col-md-2 col-md-offset-7']) !!}--}}
                            {{--{!! Form::close() !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}




            <br/>
            <br/>
            <div class="row">
                <div class="col-xs-4 col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $index => $cart)
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left hidden-xs" href="#">{!! HTML::image($cart->product->image, $cart->product->title, ['width'=>'72'])!!}</a>

                                        <div style="padding-left: 10px;" class="media-body">
                                            <h4 class="media-heading"><a
                                                        href="#">{{$cart->product->title}}</a></h4>
                                            <span class=" hidden-xs">Status: </span>
                                            @if($cart->product->availability)
                                                <span class="text-success"><strong>In Stock</strong></span>
                                            @else
                                                <span class="text-danger"><strong>Out of Stock</strong></span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    {!! Form::open(['data-remote', 'method'=>'PATCH', 'route'=>['store.cart.saved_carts.update',
                                    $cart->rowid]]) !!}
                                    {!! Form::input('number', 'qty', $cart->qty, ['class'=>'form-control','min'=>'1']) !!}
                                </td>
                                {!! Form::close() !!}

                                <td class="col-sm-1 col-md-1 text-center"><strong>${{$cart->product->price}}</strong></td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <strong id="{{ $cart->rowid }}">${{$cart->total}}</strong>
                                </td>

                                <td class="col-sm-1 col-md-1 text-right">
                                    {!! Form::open(['method'=>'get','url'=>['store/cart/saved_carts/destroy_item', $cart->id]])!!}
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span> Remove
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td><h5>Subtotal</h5></td>
                            <td class="text-right"><h5><strong id="subtotal">${{ $cart->total }}</strong></h5></td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td><h5>Estimated shipping</h5></td>
                            <td class="text-right"><h5><strong>$0.00</strong></h5></td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>  </td>
                            <td>  </td>
                            <td><h3>Total</h3></td>
                            <td class="text-right"><h3><strong id="total">${{ $cart->total }}</strong></h3></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('store/cart/saved_carts') }}" type="submit" class="btn btn-success"><span
                                            class="glyphicon glyphicon-save"></span> Go Back
                                </a>
                            </td>
                            <td>  </td>
                            <td>
                                {!! Form::open(['method'=>'get', 'url'=>'store/cart/clearCart']) !!}
                                <button type="submit" class="btn btn-default btn-group"><span
                                            class="glyphicon glyphicon-trash"></span> Empty Cart
                                </button>
                                {!! Form::close() !!}
                            </td>
                            <td>
                                <a href="{{ route('store.index') }}" type="button" class="btn btn-default btn-block">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['method'=>'get', 'url'=>['store/cart/saved_carts/addAllToCart', $cart->cart_id]]) !!}
                                <button type="submit" class="btn btn-success btn-block">
                                    Add All to Cart <span class="glyphicon glyphicon-play"></span>
                                </button>
                                {!! Form::close() !!}

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer>
                @include('store.sections.footer')
            </footer>

                @else
                    @include('store.sections.no_items_in_cart')
                @endif
            </div>
    </div>
@stop