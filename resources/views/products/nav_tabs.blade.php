<ul class="nav nav-tabs">
    @if(Request::is('admin/products/*'))
        <li class="active"><a href="/admin/products/"><span class="glyphicon glyphicon-home"> Home</span></a></li>
    @else
        <li class="{{ method(url('/admin/products/')) }}"><a href="/admin/products/"><span class="glyphicon glyphicon-home"> Home</span></a></li>
    @endif

    @if(Request::is('admin/profile/*'))
        <li class="active" role="presentation"><a href="/admin/profile"><span class="glyphicon glyphicon-user"> Profile</span></a></li>
    @else
        <li class="{{ method(url('/admin/profile')) }}" role="presentation"><a href="/admin/profile"><span class="glyphicon glyphicon-user"> Profile</span></a></li>
    @endif

    @if(Request::is('admin/settings/*'))
        <li class="active" role="presentation"><a href="#"><span class="glyphicon glyphicon-edit"> Settings</span></a></li>
    @else
        <li class="{{ method(url('/admin/settings/')) }}" role="presentation"><a href="/admin/settings/"><span class="glyphicon glyphicon-edit"> Settings</span></a></li>
    @endif
</ul>
