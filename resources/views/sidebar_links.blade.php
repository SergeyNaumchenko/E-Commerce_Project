<div id="tabs" class="tabs col-md-3" style="padding-left: 0px;">
    <ul class="nav nav-pills nav-stacked">
        @if(Request::is('admin/profile') || Request::is('admin/profile/*'))
            <li class="{{ method(url('admin/profile/create2')) }}" id="create2"><a data-pjax="#main" href="products/create2">Test</a></li>
            <li class="{{ method(url('admin/profile/list')) }}" id="list"><a data-pjax="#main" href="list">Test</a></li>
            <li class="{{ method(url('admin/profile/categories')) }}" id="categories"><a data-pjax="#main" href="categories">Test</a></li>
       
        @elseif(Request::is('admin/settings') || Request::is('admin/settings/*'))
            <li class="{{ method(url('admin/settings/changePass')) }}" id="changePass"><a data-pjax="#main" href="changePass">Account Settings</a></li>
            <li class="{{ method(url('admin/settings/cun')) }}" id="cun"><a data-pjax="#main" href="cun">Change Username</a></li>
            <li class="{{ method(url('admin/settings/categories')) }}" id="categories"><a data-pjax="#main" href="categories">Change Email</a></li>
        @else
            <li class="{{ method(url('admin')) }}" id="create2"><a data-pjax="#main" href="/admin">Products List</a></li>
            <li class="{{ method(url('admin/create_product')) }}" id="list"><a data-pjax="#main" href="/admin/create_product">Create Product</a></li>
            <li class="{{ method(url('admin/categories')) }}" id="categories"><a data-pjax="#main" href="/admin/categories">Create Category</a></li>
            @if(Request::is('admin/*/edit'))
                <li class="{{ method(Request::url()) }}" id="edit"><a data-pjax="#main" href="">Edit Product</a></li>
            @endif
        @endif
    </ul>
</div>

