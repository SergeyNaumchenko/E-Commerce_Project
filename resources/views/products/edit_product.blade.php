@extends('products.master')

@section('content')
    <h2>Edit Product</h2>

    <hr>
    @include('errors.show_errors')

    {!! Form::model($product, ['url'=>'admin/' . $product->id, 'method'=>'PATCH', 'class'=>'form-horizontal', 'role'=>'form'] ) !!}
    <div class="form-group">
        {!! Form::label('category_id', 'Category', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('title', 'Product name', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', '', ['class'=>'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('quantity', null, ['class'=>'col-md-4 control-label', 'value'=>'category']) !!}
        <div class="col-md-6">
            {!! Form::input('number', 'quantity', null, ['class'=>'form-control', 'min'=>'0']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('price', null, ['class'=>'col-md-4 control-label', 'value'=>'category']) !!}
        <div class="col-md-6">
            {!! Form::text('price', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::submit('Edit Product', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop