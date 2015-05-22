<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    {!! HTML::style('/css/app.css') !!}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    {{--<link rel="stylesheet" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css">--}}
    {{--<script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>--}}

    {!! HTML::style('/css/metisMenu.min.css') !!}
    {!! HTML::style('/css/dataTables.bootstrap.css') !!}
    {!! HTML::style('/css/dataTables.responsive.css') !!}
    {!! HTML::style('/css/font-awesome.min.css') !!}
    {!! HTML::style('/css/font-awesome.min.css') !!}
    {!! HTML::style('/css/sb-admin-2.css') !!}
    {!! HTML::style('/css/jquery.dataTables.css') !!}
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Custom styles for this template -->

</head>

<body>

@include('products.nav_bar')

<div class="container col-md-10 col-md-offset-1" style="margin-top: 30px;">
    @include('products.nav_tabs')
    @include('sidebar_links')
    <div class="col-md-9 panel panel-default">
        <div class="panel-body">
            <div id="main">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/bower_components/jquery-pjax/jquery.pjax.js"></script>
{!! HTML::script('js/metisMenu.min.js') !!}
{!! HTML::script('js/jquery.dataTables.min.js') !!}
{!! HTML::script('js/dataTables.bootstrap.min.js') !!}
{!! HTML::script('js/sb-admin-2.js') !!}
{!! HTML::script('js/main.js') !!}
{!! HTML::script('js/tabSelector.js') !!}


</body>
</html>
