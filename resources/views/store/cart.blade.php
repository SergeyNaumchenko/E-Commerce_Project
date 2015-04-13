@extends('app')


@section('content')

    <div class="container">
        <div class="page-header">
            <h1>Shopping Cart</h1>
        </div>

        <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        @foreach($products as $index => $product)
            <tr>
                {{--<td>{!! $product->id !!}</td>--}}
                <td>{!! $product->name !!}</td>
                <td>{!! $product->price !!}</td>
                <td>{!! $product->qty !!}</td>
                {{--<td>{!! $product->rowid !!}</td>--}}

                {{--<td>--}}
                    {{--<input type="button" href="/store/removeitem/{!! $product->identifier !!}" value="Remove">--}}
                {{--</td>--}}
                <td>
                    {!! Form::open(['method'=>'get', 'url'=>'/store/removeitem/' . $product->rowid])     !!}
                    {!! Form::submit('Delete', ['class'=>'btn btn-default']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    </div>
@stop