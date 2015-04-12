@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>New Products</h1>
        </div>

        @include('store.sections.shop_by_category')
        @include('store.sections.display_products')

    </div>
@stop