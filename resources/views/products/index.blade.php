@extends('app')

@section('products')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categories</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h2>Products</h2>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Delete Products</th>
                                <th>Availability</th>
                                <th>Update</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{!! ($index + 1) !!}</td>
                                    <td>
                                        {!! HTML::image($product->image, $product->title, ['width'=>'50'])!!}
                                        {{--{!! ucFirst($product->title) !!}--}}
                                    </td>
                                    <td>
                                        {!! $product->title !!}
                                    </td>
                                    <td>
                                        {!! $product->description !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['url'=>'admin/products/destroy']) !!}
                                        {!! Form::hidden('id', $product->id) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-default']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['url'=>'admin/products/toggle-availability', 'class' => 'form-horizontal']) !!}
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
                        <h2>Create new Product</h2>
                        <hr>
                        {!! Form::open(['url'=>'admin/products/create', 'files'=>'true', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('category_id', $categories, 'null', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('title', 'Product name', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('title', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', '', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('description', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('price', '', ['class'=>'col-md-4 control-label', 'value'=>'category']) !!}
                            <div class="col-md-6">
                                {!! Form::text('price', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('image', 'Upload Image', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6" style="margin-top: 6px;">
                                {!! Form::file('image', ['class'=>'']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop