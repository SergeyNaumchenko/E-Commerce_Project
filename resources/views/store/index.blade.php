@extends('app')

@section('content')
    <div class="container hero-spacer">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-feature">
            <h1>A Warm Welcome!</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus
                non
                incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam
                repellat.
            </p>
            {!! HTML::link(url('/auth/register'), 'Sign Up »', array('class'=>'btn btn-primary btn-large')) !!}
            @include('store.sections.shop_by_category')
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>

        @include('store.sections.display_products')
        @include('store.sections.footer')
    </div>
@stop