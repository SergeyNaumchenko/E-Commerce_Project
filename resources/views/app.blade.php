<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

    {!! HTML::style('/css/app.css') !!}
    {{--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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
    {{--<link href="{{ asset('/css/carousel.css') }}" rel="stylesheet">--}}
    {!! HTML::style('/css/carousel.css') !!}

</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

                {!! HTML::image('img/icon.png') !!}
            </div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="true"><span
                                        class="glyphicon glyphicon-user"></span> {{ ucfirst(Auth::user()->name) }} <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
								<li><a href="{{ url('#') }}">View Account</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('#') }}">Favorites</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('#') }}">Check Order Status</a></li>
                            </ul>
						</li>
                        <li><a href="{{ url('#') }}"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                        <li><a href="{{ url('#') }}"><span class="glyphicon glyphicon-inbox"></span></a></li>
                        <li><a href="{{ url('#') }}"><span class="glyphicon glyphicon-cog"></span></a></li>
                        <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span></a></li>
                    @endif
				</ul>
                {!! Form::open(['url'=>'store/search/', 'method'=>'GET', 'class'=>'navbar-form navbar-right']) !!}
                {!! Form::input('search', 'q' ,'', ['class'=>'form-control', 'placeholder'=>'Search...']) !!}
                {!! Form::close() !!}
            </div>
		</div>
	</nav>

    @yield('content')

    <!-- Scripts -->

    {!! HTML::script('js/metisMenu.min.js') !!}
    {!! HTML::script('js/jquery.dataTables.min.js') !!}
    {!! HTML::script('js/dataTables.bootstrap.min.js') !!}
    {!! HTML::script('js/sb-admin-2.js') !!}

    <script>
        $(document).ready(function(){
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>
</html>
