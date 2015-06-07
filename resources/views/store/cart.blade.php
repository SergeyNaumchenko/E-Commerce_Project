@extends('app')

@section('content')
    <div class="container">
        @if($total)
            <div class="page-header well">
                <h3>Items in Your Cart</h3>
            </div>
            @include('flash::message')
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
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
                        <tr>
            @foreach($products as $index => $product)
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                <a class="thumbnail pull-left" href="#">{!! HTML::image($product->options->image, $product->title, ['width'=>'72', 'height'=>'72'])!!}</a>
                                    <div class="media-body" >
                                        <h4 class="media-heading" style="margin-left: 10px;"><a href="#">{{$product->name}}</a></h4>
                                        <h5 class="media-heading" style="margin-left: 10px;"><a href="#"></a></h5>
                                        <span style="margin-left: 10px;">Status: </span>
                                                @if($product->options->availability)
                                                    <span class="text-success"><strong>In Stock
                                                @else
                                                    <span class="text-danger"><strong>Out of Stock
                                                @endif
                                            </strong>
                                        </span>
                                    </div>
                                </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                {!! Form::open(['data-remote', 'method'=>'PATCH', 'route'=>['store.cart.update', $product->rowid]]) !!}
                                {!! Form::input('number', 'qty', $product->qty, ['class'=>'form-control', 'min'=>'1']) !!}
                                {!! Form::close() !!}
                            </td>

                            <td class="col-sm-1 col-md-1 text-center"><strong>${{$product->price}}</strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>${{$product->price * $product->qty}}</strong></td>
                            <td class="col-sm-1 col-md-1">
                                {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>

                {{--<div class="row featurette" style="margin-top: 40px;">--}}
                    {{--<div class="col-md-5" style="width: 22.6%;">--}}
                        {{--{!! HTML::image($product->options->image, $product->title, ['width'=>'200'])!!}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-7">--}}
                        {{--<h2 class="featurette-heading" style="margin-top: 0px;">{{ $product->name }}</h2>--}}

                        {{--<p class="lead">{{ $product->options->description }}</p>--}}

                        {{--<div class="caption">--}}
                            {{--<h4>Price:<small>${!! $product->price !!}</small></h4>--}}

                            {{--@if($product->options->availability)--}}
                                {{--<h4>Availability:<small>In Stock</small></h4>--}}
                            {{--@else--}}
                                {{--<h4>Availability:<small>Out of Stock</small></h4>--}}
                            {{--@endif--}}
                            {{--<p>--}}
                                {{--{!! Form::open(['data-remote', 'method'=>'PATCH', 'route'=>['store.cart.update', $product->rowid]]) !!}--}}
                                {{--{!! Form::input('number', 'qty', $product->qty, ['class'=>'form-control col-md-1 ', 'min'=>'1', 'style'=>'width: 10%;']) !!}--}}
                                {{--{!! Form::close() !!}--}}

                                {{--{!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy', $product->rowid]]) !!}--}}
                                {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger col-md-2 col-md-offset-1', 'style'=>'margin-left: 5px;']) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<br>--}}
                {{--<hr>--}}

            @endforeach
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Subtotal</h5></td>
                            <td class="text-right"><h5><strong>${{ $total }}</strong></h5></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h5>Estimated shipping</h5></td>
                            <td class="text-right"><h5><strong>$0.00</strong></h5></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                            <td><h3>Total</h3></td>
                            <td class="text-right"><h3><strong>${{ $total }}</strong></h3></td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::open(['method'=>'post', 'route'=>'store.cart.saved_carts.store']) !!}
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save Cart</button>
                                {!! Form::close() !!}
                            </td>
                            <td>   </td>
                            <td>
                                {!! Form::open(['method'=>'get', 'url'=>'store/cart/clearCart']) !!}
                                <button type="submit" class="btn btn-default btn-group"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button>
                                {!! Form::close() !!}
                            </td>
                            <td>
                                <a href="{{ route('store.index') }}" type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                </a>
                            </td>


                            <td>
                                <button type="button" class="btn btn-success">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
                                </button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>


    {{--<div class="row featurette" style="margin-top: 0px;">--}}
                    {{--<h5 class="col-md-offset-10">Cart subtotal: ${!! $total !!}</h5>--}}
                    {{--<h5 class="col-md-offset-10">Estimated Tax: $0.00</h5>--}}
                    {{--<h4 class="col-md-offset-10">Total: ${!! $total !!}</h4>--}}
                {{--</div>--}}
                {{--<hr>--}}
                {{--<div class="row featurette" style="margin-left: 25px; margin-top: 0px; margin-bottom: 17px;">--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-offset-">--}}

                            {{--{!! HTML::link(route('store.index'), 'Continue Shopping', ['class'=>'btn btn-default col-md-2' ]) !!}--}}

                            {{--{!! Form::open(['method'=>'post', 'route'=>'store.cart.saved_carts.store', 'style'=>'margin-left: 5px;']) !!}--}}
                            {{--{!! Form::submit('Save Cart', ['class'=>'btn btn-default col-md-2 ', 'style'=>'margin-left: 5px;']) !!}--}}
                            {{--{!! Form::close() !!}--}}

                            {{--{!! Form::open(['method'=>'get', 'url'=>'store/cart/clearCart']) !!}--}}
                            {{--{!! Form::submit('Empty Cart', ['class'=>'btn btn-default col-md-2 ', 'style'=>'margin-left: 5px;']) !!}--}}
                            {{--{!! Form::close() !!}--}}

                            {{--{!! Form::open(['route'=>'store.cart.checkout.index']) !!}--}}
                            {{--{!! Form::submit('Check Out', ['class'=>'btn btn-success col-md-2 col-md-offset-3']) !!}--}}
                            {{--{!! Form::close() !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            @else
                @include('store.sections.no_items_in_cart')
            @endif
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="container">--}}
        {{--<div class="page-header well">--}}
            {{--<h3>Items in Your Cart</h3>--}}
        {{--</div>--}}
        {{--@include('flash::message')--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 col-md-10 col-md-offset-1">--}}
                {{--<table class="table table-hover">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>Product</th>--}}
                        {{--<th>Quantity</th>--}}
                        {{--<th class="text-center">Price</th>--}}
                        {{--<th class="text-center">Total</th>--}}
                        {{--<th> </th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<td class="col-sm-8 col-md-6">--}}
                            {{--<div class="media">--}}
                                {{--<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>--}}
                                {{--<div class="media-body">--}}
                                    {{--<h4 class="media-heading"><a href="#">Product name</a></h4>--}}
                                    {{--<h5 class="media-heading"> by <a href="#">Brand name</a></h5>--}}
                                    {{--<span>Status: </span><span class="text-success"><strong>In Stock</strong></span>--}}
                                {{--</div>--}}
                            {{--</div></td>--}}
                        {{--<td class="col-sm-1 col-md-1" style="text-align: center">--}}
                            {{--<input type="email" class="form-control" id="exampleInputEmail1" value="3">--}}
                        {{--</td>--}}
                        {{--<td class="col-sm-1 col-md-1 text-center"><strong>$4.87</strong></td>--}}
                        {{--<td class="col-sm-1 col-md-1 text-center"><strong>$14.61</strong></td>--}}
                        {{--<td class="col-sm-1 col-md-1">--}}
                            {{--<button type="button" class="btn btn-danger">--}}
                                {{--<span class="glyphicon glyphicon-remove"></span> Remove--}}
                            {{--</button></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td class="col-md-6">--}}
                            {{--<div class="media">--}}
                                {{--<a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>--}}
                                {{--<div class="media-body">--}}
                                    {{--<h4 class="media-heading"><a href="#">Product name</a></h4>--}}
                                    {{--<h5 class="media-heading"> by <a href="#">Brand name</a></h5>--}}
                                    {{--<span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>--}}
                                {{--</div>--}}
                            {{--</div></td>--}}
                        {{--<td class="col-md-1" style="text-align: center">--}}
                            {{--<input type="email" class="form-control" id="exampleInputEmail1" value="2">--}}
                        {{--</td>--}}
                        {{--<td class="col-md-1 text-center"><strong>$4.99</strong></td>--}}
                        {{--<td class="col-md-1 text-center"><strong>$9.98</strong></td>--}}
                        {{--<td class="col-md-1">--}}
                            {{--<button type="button" class="btn btn-danger">--}}
                                {{--<span class="glyphicon glyphicon-remove"></span> Remove--}}
                            {{--</button></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td><h5>Subtotal</h5></td>--}}
                        {{--<td class="text-right"><h5><strong>$24.59</strong></h5></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td><h5>Estimated shipping</h5></td>--}}
                        {{--<td class="text-right"><h5><strong>$6.94</strong></h5></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td><h3>Total</h3></td>--}}
                        {{--<td class="text-right"><h3><strong>$31.53</strong></h3></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td>   </td>--}}
                        {{--<td>--}}
                            {{--<button type="button" class="btn btn-default">--}}
                                {{--<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping--}}
                            {{--</button></td>--}}
                        {{--<td>--}}
                            {{--<button type="button" class="btn btn-success">--}}
                                {{--Checkout <span class="glyphicon glyphicon-play"></span>--}}
                            {{--</button></td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}




@stop