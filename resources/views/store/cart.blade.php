@extends('app')

@section('content')
    <div class="container">
        @if($total)
            {{--<div class="page-header well">--}}
                <h3 class="well">Items in Your Cart</h3>
            {{--</div>--}}
            @include('flash::message')
            <br/>
            <br/>
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
                        @foreach($products as $index => $product)
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#">{!!
                                            HTML::image($product->options->image, $product->title, ['width'=>'72',
                                            'height'=>'72'])!!}</a>

                                        <div class="media-body">
                                            <h4 class="media-heading" style="margin-left: 10px;"><a
                                                        href="#">{{$product->name}}</a></h4>
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
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                    {!! Form::open(['data-remote', 'method'=>'PATCH', 'route'=>['store.cart.update',
                                    $product->rowid]]) !!}
                                    {!! Form::input('number', 'qty', $product->qty, ['class'=>'form-control','min'=>'1']) !!}
                                </td>
                                {!! Form::close() !!}

                                <td class="col-sm-1 col-md-1 text-center"><strong>${{$product->price}}</strong></td>
                                <td class="col-sm-1 col-md-1 text-center">
                                    <strong id="{{ $product->rowid }}">${{$product->subtotal}}</strong>
                                </td>

                                <td class="col-sm-1 col-md-1">
                                    {!! Form::open(['method'=>'DELETE', 'route'=>['store.cart.destroy',
                                    $product->rowid]]) !!}
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
                            <td class="text-right"><h5><strong id="total">${{ $total }}</strong></h5></td>
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
                            <td class="text-right"><h3><strong>${{ $total }}</strong></h3></td>
                        </tr>
                        <tr>
                            <td>
                                {!! Form::open(['method'=>'post', 'route'=>'store.cart.saved_carts.store']) !!}
                                <button type="submit" class="btn btn-success"><span
                                            class="glyphicon glyphicon-save"></span> Save Cart
                                </button>
                                {!! Form::close() !!}
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
                                <a href="{{ route('store.index') }}" type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['route'=>'store.cart.checkout.index']) !!}
                                <button type="submit" class="btn btn-success">
                                    Checkout <span class="glyphicon glyphicon-play"></span>
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
@stop