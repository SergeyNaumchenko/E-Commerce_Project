@extends('app')

@section('content')
    <div class="container">
        @if($keyword)
            <div class="page-header ">
                <h3 class="well">Search: Enter your search terms</h3>
            </div>
            <div class="col-md-13">
                <div style="width: 100%;" class="input-group">
                    {!! Form::open(['url'=>'store/search/', 'method'=>'GET', 'class'=>'input-group', 'style'=>'width:100%;']) !!}
                    {!! Form::input('search', 'q' ,'', ['class'=>'form-control', 'placeholder'=>'Search for...']) !!}
                    {!! HTML::decode('<span class="input-group-btn">')!!}
                    {!! Form::submit('Search', ['class'=>'btn btn-default', 'type'=>'button'])!!}
                    {!! HTML::decode('</span>')!!}
                    {!! Form::close() !!}
                </div>
            </div>
            <br/>
            <div class="panel panel-default">
                <hgroup class="mb20">
                    <br/>

                    <h1>Search Results</h1>

                    <h2 class="lead"><strong class="text-danger">{{ count($products) }}</strong> results were found for
                        <strong class="text-danger">{!! ucfirst($keyword) !!}</strong></h2>
                    <br/>
                </hgroup>
                @foreach($products as $product)
                    <article class="search-result row">
                        <div class="col-xs-12 col-sm-12 col-md-3 text-center">
                            <a href="#" class="thumbnail" style="border: none; padding: none; display: inline;">
                                {!! HTML::image($product->image, $product->title, ['class'=>'img-responsive'])!!}
                            </a>
                        </div>
                        <br/>

                        <div class="col-xs-12 col-sm-12 col-md-7">
                            <h2 class="text-center"><a href="#" title="">{{ $product->title }}</a></h2>

                            <p class="text-center">{{ $product->description }}</p>
                            <div class="text-center">
                            <h4>Price:
                                <small>${!! $product->price !!}</small>
                            </h4>
                            @if($product->availability)
                                <h4>Availability:
                                    <small class="text-success">In Stock</small>
                                </h4>
                            @else
                                <h4>Availability:
                                    <small class="text-danger">Out of Stock</small>
                                </h4>
                            @endif
                            </div>
                            <div class="text-center">
                            {!! Form::open(['route'=>'store.cart.store']) !!}
                            {!! Form::hidden('id', $product->id) !!}
                            <a href="/store/{!! $product->id !!}" class="btn btn-default ">View Details</a>
                            {!! Form::submit('Add to Cart', ['class'=>'btn btn-success', 'role'=>'button']) !!}
                            {!! Form::close() !!}
                            </div>
                        </div>
                        <span class="clearfix borda"></span>
                    </article>
                    <hr/>
                @endforeach
            </div>
            <br/>
            @include('store.sections.footer')
    </div>
        @else
            <div class="page-header">
                <h1>Search: Enter your search terms</h1>
            </div>
            <div class="col-md-13">
                <div style="width: 100%;" class="input-group">
                    {!! Form::open(['url'=>'store/search/', 'method'=>'GET', 'class'=>'input-group', 'style'=>'width:100%;']) !!}
                    {!! Form::input('search', 'q' ,'', ['class'=>'form-control', 'placeholder'=>'Search for...']) !!}
                    {!! HTML::decode('<span class="input-group-btn">')!!}
                    {!! Form::submit('Search', ['class'=>'btn btn-default', 'type'=>'button'])!!}
                    {!! HTML::decode('</span>')!!}
                    {!! Form::close() !!}
                </div>
            </div>
        @endif
@stop
