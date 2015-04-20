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

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>

    {!! HTML::style('/css/metisMenu.min.css') !!}
    {!! HTML::style('/css/dataTables.bootstrap.css') !!}
    {!! HTML::style('/css/dataTables.responsive.css') !!}
    {!! HTML::style('/css/font-awesome.min.css') !!}
    {!! HTML::style('/css/font-awesome.min.css') !!}
    {!! HTML::style('/css/sb-admin-2.css') !!}
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Custom styles for this template -->

</head>
<body>

@include('products.nav_bar')

<div class="container col-md-10 col-md-offset-1" style="margin-top: 30px;">
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="#">Profile</a></li>
        <li role="presentation"><a href="#">Messages</a></li>
    </ul>
    <div  class="col-md-3">
        <ul id="myTab" class="nav nav-pills nav-stacked">
            <li role="presentation" class="active">{!! HTML::link('admin/products', 'Product List') !!}</li>
            <li>{!! HTML::link('admin/products/test', 'Home') !!}</li>
            {{--<li data-toggle="pill" role="presentation"><a href="http://localhost:8000/admin/products/test">Create Products</a></li>--}}
            {{--<li data-toggle="pill" role="presentation"><a href="#">Categories</a></li>--}}

            {{--<li role="presentation" class="active">{!! HTML::link('admin/products', 'Product List') !!}</li>--}}
            {{--<li>{!! HTML::link('admin/products/test', 'Create Products') !!}</li>--}}
            {{--<li>{!! HTML::link('admin/categories', 'Categories') !!}</li>--}}
            <li data-toggle="pill" role="presentation"><a  href="localhost:8000/admin/products">Messages</a></li>
        </ul>
    </div>
    <div class="col-md-9 panel panel-default">
        <div class="panel-body">
            @include('errors.show_errors')
            @yield('content')
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- Scripts -->

{!! HTML::script('js/metisMenu.min.js') !!}
{!! HTML::script('js/jquery.dataTables.min.js') !!}
{!! HTML::script('js/dataTables.bootstrap.min.js') !!}
{!! HTML::script('js/sb-admin-2.js') !!}
{!! HTML::script('js/main.js') !!}

<script>
    $(document).ready(function(){
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });


//    $('#myTab a[href="http://localhost:8000/admin/products/test"]').click(function (e) {
//        e.preventDefault()
//        $(this).tab('show')
//    })

//    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
//        e.target // newly activated tab
//    })

    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        document.write(e.target); // newly activated tab
        e.relatedTarget // previous active tab
        e.
        e.document.write('asdsa');
    })

//    $('#myTab a[href="http://localhost:8000/admin/products/test"]').tab('show') // Select tab by name
//    $('#myTab a:first').tab('show') // Select first tab
//    $('#myTab a:last').tab('show') // Select last tab
//    $('#myTab li:eq(2) a').tab('show') // Select third tab (0-indexed)
</script>

</body>
</html>
