@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h3 class="well">Product Details</h3>
        </div>
        <div class="row featurette">
                    <div class='col-md-4'>
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#quote-carousel" data-slide-to="1"></li>
                                <li data-target="#quote-carousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner">

                                <!-- Quote 1 -->
                                <div class="item active">
                                    {{--<blockquote>--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-sm-">--}}
                                    <a class="thumbnail" style="border: none; padding: none; display: inline;">
                                                {!! HTML::image($product->image, $product->title, ['class'=>'img-responsive'])!!}
                                    </a>
                                                <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</blockquote>--}}

                                </div>
                                <!-- Quote 2 -->
                                <div class="item">
                                    {!! HTML::image($product->image, $product->title, ['class'=>'img-responsive'])!!}
                                </div>
                            <!-- Carousel Buttons Next/Prev -->
                            {{--<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>--}}
                            {{--<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>--}}
                        </div>
                    </div>
                </div>
            {{--</div>--}}





            <style>
                /* carousel */
                #quote-carousel
                {
                    padding: 0 10px 30px 10px;
                    margin-top: 30px;
                }

                /* Control buttons  */
                #quote-carousel .carousel-control
                {
                    background: none;
                    color: #222;
                    font-size: 2.3em;
                    text-shadow: none;
                    margin-top: 100px;
                }
                /* Previous button  */
                #quote-carousel .carousel-control.left
                {
                    left: -12px;
                }
                /* Next button  */
                #quote-carousel .carousel-control.right
                {
                    right: -12px !important;
                }
                /* Changes the position of the indicators */
                #quote-carousel .carousel-indicators
                {
                    right: 50%;
                    top: auto;
                    bottom: 30px;
                    margin-right: -19px;
                }
                /* Changes the color of the indicators */
                #quote-carousel .carousel-indicators li
                {
                    background: #c0c0c0;
                }
                #quote-carousel .carousel-indicators .active
                {
                    background: #333333;
                }

                /* End carousel */

                .item blockquote {
                    border-left: none;
                    margin: 0;
                }

                .item blockquote img {
                    margin-bottom: 10px;
                }

                .item blockquote p:before {
                    content: "\f10d";
                    font-family: 'Fontawesome';
                    float: left;
                    margin-right: 10px;
                }



                /**
                  MEDIA QUERIES
                */

                /* Small devices (tablets, 768px and up) */
                @media (min-width: 768px) {
                    #quote-carousel
                    {
                        margin-bottom: 0;
                        padding: 0 40px 30px 40px;
                    }

                }

                /* Small devices (tablets, up to 768px) */
                @media (max-width: 768px) {

                    /* Make the indicators larger for easier clicking with fingers/thumb on mobile */

                    #quote-carousel .carousel-indicators {
                        bottom: -20px !important;
                    }
                    #quote-carousel .carousel-indicators li {
                        display: inline-block;
                        margin: 0px 5px;
                        width: 15px;
                        height: 15px;
                    }
                    #quote-carousel .carousel-indicators li.active {
                        margin: 0px 5px;
                        width: 20px;
                        height: 20px;
                    }
                }
            </style>


            <div class="col-md-7">
                <br/>
                <br/>
                <h2 class="featurette-heading">{{ $product->title }}</h2>
                <p class="lead">{{ $product->description }}</p>
                <div class="caption">
                    <h4>Price: <small>${!! $product->price !!}</small></h4>
                    @if($product->availability)
                        <h4>Availability: <small><span class="text-success"><strong>In Stock</strong></span></small> </h4>
                    @else
                        <h4>Availability: <small><span class="text-danger"><strong>Out of Stock</strong></span></small> </h4>

                    @endif
                    <p>
                        {!! Form::open(['route'=>'store.cart.store']) !!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::submit('« Go Back', ['class'=>'btn btn-warning', 'role'=>'button']) !!}
                        {!! Form::submit('Add to Cart', ['class'=>'btn btn-success', 'role'=>'button']) !!}
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
        @include('store.sections.footer')
    </div>
@stop