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
            <li class="{{ method(url('admin/products')) }}" id="create2"><a data-pjax="#main" href="/admin/products">Products List</a></li>
            <li class="{{ method(url('admin/products/list')) }}" id="list"><a data-pjax="#main" href="/admin/products/create2">Create Product</a></li>
            <li class="{{ method(url('admin/products/categories')) }}" id="categories"><a data-pjax="#main" href="/admin/products/categories">Create Category</a></li>
        @endif
    </ul>
</div>

