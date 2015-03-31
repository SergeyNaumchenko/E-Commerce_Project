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
                                <th>Category</th>
                                <th>Delete Category</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{!! ($index + 1) !!}</td>
                                    <td>
                                        {!! HTML::image($product->image, $product->title, ['width'=>'50'])!!}
                                        {!! ucFirst($products->title) !!}
                                        {!! Form::open(['url'=>'admin/products/destroy']) !!}
                                        {!! Form::hidden('id', $product->id) !!}
                                    </td>
                                    <td>
                                        {!! Form::submit('Delete', ['class'=>'btn btn-default']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['url'=>'admin/products/toggle-availability', 'class' => 'form-horizontal']) !!}
                                        {!! Form::hidden('id', $product->id) !!}
                                        {!! Form::select('availability', ['1' => 'In Stock, '0' => 'Out of Stock'], $product->availability) !!}
                                        {!! Form::submit('Update') !!}
                                        {!! Form::close() !!}
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                        <h2>Create new Product</h2>
                        <hr>
                        {!! Form::open(['url'=>'admin/products/create', 'class'=>'form-horizontal', 'role'=>'form']) !!}
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category', ['class'=>'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('category_id', $categories, ['class'=>'form-control', 'value'=>'category']) !!}
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