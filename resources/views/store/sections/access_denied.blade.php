@extends('app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Sorry! Access Denied</h1>
            <p>
                You don't have permission to open this page. If you are new user or were recently assigned credentials,
                please wait 15 minutes and try again. If the problem persists, contact your administrator.
            </p>
            <p>
                {!! HTML::link(route('store.index'), 'Go Back', array('class'=>'btn btn-primary btn-lg')) !!}
            </p>
        </div>
    </div>
@stop
