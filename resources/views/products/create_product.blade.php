@extends('products.master')

@section('content')
<h2>Create new Product</h2>

    <hr>
    @include('errors.show_errors')

    {!! Form::open(['route'=>'admin.store', 'files'=>'true', 'class'=>'form-horizontal', 'role'=>'form']) !!}
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
        {!! Form::label('quantity', '', ['class'=>'col-md-4 control-label', 'value'=>'category']) !!}
        <div class="col-md-6">
            {!! Form::input('number', 'quantity', '1', ['class'=>'form-control', 'min'=>'0']) !!}
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
@stop