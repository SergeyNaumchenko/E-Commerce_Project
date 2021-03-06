{{--@extends('app')--}}

{{--@section('')--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row">--}}
            {{--<div class="container col-md-10 col-md-offset-1" style="margin-top: 30px;">--}}
                {{--<ul class="nav nav-tabs">--}}
                    {{--<li role="presentation" class="active"><a href="#">Home</a></li>--}}
                    {{--<li role="presentation"><a href="#">Profile</a></li>--}}
                    {{--<li role="presentation"><a href="#">Messages</a></li>--}}
                {{--</ul>--}}
                {{--<div class="col-md-3 nav nav-pills nav-stacked">--}}
                    {{--<ul class="nav nav-pills nav-stacked">--}}
                        {{--<li role="presentation" class="active"><a href="#">Products List</a></li>--}}
                        {{--<li role="presentation"><a href="#">Profile</a></li>--}}
                        {{--<li role="presentation"><a href="#">Messages</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                <div class="col-md-9 panel panel-default">
                    {{--<div class="panel-heading">Categories</div>--}}
                    <div class="panel-body">
                        @include('errors.show_errors')
                        <h2>Products</h2>
                        <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                                <th>Status</th>
                                <th>Update</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{!! ($index + 1) !!}</td>
                                    <td>
                                        {!! HTML::image($product->image, $product->title, ['width'=>'50'])!!}
                                        {!! ucFirst($product->title) !!}
                                    </td>
                                    <td>
                                        {!! $product->title !!}
                                    </td>
                                    <td>
                                        <p>${!! $product->price !!}<p>
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=>'admin.products.destroy', $product->id]) !!}
                                        {!! Form::hidden('id', $product->id) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-default col-md-offset-3']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['method'=>'PATCH', 'route'=>'admin.products.update', 'class' => 'form-horizontal']) !!}
                                        {!! Form::hidden('id', $product->id) !!}
                                        {!! Form::select('availability', ['1' => 'In Stock', '0'=>'Out of Stock'], $product->availability, ['class'=>'form-control']) !!}
                                    </td>

                                    <td>
                                        {!! Form::submit('Update', ['class'=> 'btn btn-default']) !!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                        </div>
                        @include('products.create_product')
                        {{--<h2>Create new Product</h2>--}}
                        {{--<hr>--}}
                        {{--{!! Form::open(['route'=>'admin.products.store', 'files'=>'true', 'class'=>'form-horizontal', 'role'=>'form']) !!}--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('category_id', 'Category', ['class'=>'col-md-4 control-label']) !!}--}}
                            {{--<div class="col-md-6">--}}
                                {{--{!! Form::select('category_id', $categories, 'null', ['class'=>'form-control']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('title', 'Product name', ['class'=>'col-md-4 control-label']) !!}--}}
                            {{--<div class="col-md-6">--}}
                                {{--{!! Form::text('title', '', ['class'=>'form-control']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('description', '', ['class'=>'col-md-4 control-label']) !!}--}}
                            {{--<div class="col-md-6">--}}
                                {{--{!! Form::textarea('description', '', ['class'=>'form-control']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('quantity', '', ['class'=>'col-md-4 control-label', 'value'=>'category']) !!}--}}
                            {{--<div class="col-md-6">--}}
                                {{--{!! Form::input('number', 'quantity', '1', ['class'=>'form-control', 'min'=>'0']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('price', '', ['class'=>'col-md-4 control-label', 'value'=>'category']) !!}--}}
                            {{--<div class="col-md-6">--}}
                                {{--{!! Form::text('price', '', ['class'=>'form-control']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('image', 'Upload Image', ['class'=>'col-md-4 control-label']) !!}--}}
                            {{--<div class="col-md-6" style="margin-top: 6px;">--}}
                                {{--{!! Form::file('image', ['class'=>'']) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--{!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop