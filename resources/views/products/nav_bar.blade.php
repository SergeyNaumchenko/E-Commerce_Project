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
                    <li><a data-toggle="tooltip" data-placement="bottom" title="Login" href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
