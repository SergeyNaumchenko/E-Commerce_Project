@extends('app')

@section('content')


    <div class="container">
    @if($keyword)

        <div class="page-header">
            <h1>Search Results For: {!! ucfirst($keyword) !!}</h1>
        </div>

        @include('store.sections.shop_by_category')
        @include('store.sections.display_products')

    </div>
    @else

    <div class="page-header">
        <h1>Search Results</h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="input-group">
                {!! Form::open(['url'=>'store/search/', 'method'=>'GET', 'class'=>' input-group input-group-btn']) !!}
                {!! Form::input('search', 'q' ,'', ['class'=>'form-control', 'placeholder'=>'Search for...']) !!}
                {!! Form::submit('Search', ['class'=>'btn btn-default', 'type'=>'button'])!!}
                {!! Form::close() !!}
            </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    @endif

@stop
