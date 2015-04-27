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
        <li class="active"><a href="/admin/products/">Home</a></li>
        <li class="{{ method('1') }}" role="presentation" ><a data-pjax="#profile" href="/admin/products/1">Profile</a></li>
        <li role="presentation"><a href="#">Messages</a></li>
    </ul>

    <div class="col-md-3" style="padding-left: 0px;">
        <ul class="nav nav-pills nav-stacked">
            <li class="{{ method('create2') }}" id="create2" onclick="selector('create2')"><a data-pjax="#main" href="create2">Create Product</a></li>
            <li class="{{ method('list') }}" id="list" onclick="selector('list')"><a data-pjax="#main" href="list">Products List</a></li>
            <li class="{{ method('categories') }}" id="categories" onclick="selector('categories')"><a data-pjax="#main" href="categories">Create Category</a></li>
        </ul>
    </div>

    <div class="col-md-9 panel panel-default">
        <div class="panel-body">
            @include('errors.show_errors')

                <div id="main">
                    @yield('create')
                    @yield('list')
                    @yield('categories')
                </div>

            <div id="profile">
                @yield('title')
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- Scripts -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/bower_components/jquery-pjax/jquery.pjax.js"></script>
{{--{!! HTML::script('js/metisMenu.min.js') !!}--}}
{{--{!! HTML::script('js/jquery.dataTables.min.js') !!}--}}
{{--{!! HTML::script('js/dataTables.bootstrap.min.js') !!}--}}
{{--{!! HTML::script('js/sb-admin-2.js') !!}--}}
{{--{!! HTML::script('js/main.js') !!}--}}

<script>

    $(function() {
        $(document).pjax('a');
    });

    function selector(id) {

        if ('create2' == id) {
            document.getElementById(id).className = "active";
            document.getElementById('list').className = "";
            document.getElementById('categories').className = "";
        }

        else if ('list' == id) {
            document.getElementById(id).className = "active";
            document.getElementById('create2').className = "";
            document.getElementById('categories').className = "";
        }

        else {
            document.getElementById(id).className = "active";
            document.getElementById('create2').className = "";
            document.getElementById('list').className = "";
        }
    }

//    $(document).ready(function(){
//        $('#dataTables-example').DataTable({
//            responsive: true
//        });
//    });

//    $(function(){
//        var hash =window.location.hash;
//        hash && $('ul.nav a[href="' + hash + '"]').tab('show');
//
//        $('#myTab a').click(function (e) {
//            var scrollmem = $('body').scrollTop();
//            var str = this.hash;
//            var res = str.replace(/#/g, '');
//            window.history.pushState(this.hash, 'asd', '/admin/products/' + res);
//            $('html,body').scrollTop(scrollmem);
//        });
//    });



</script>

</body>
</html>
