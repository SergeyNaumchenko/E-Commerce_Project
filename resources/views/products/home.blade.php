<div class="col-md-3" style="padding-left: 0px;">
    <ul class="nav nav-pills nav-stacked">
        <li class="{{ method('create2') }}" id="create2" onclick="selector('create2')"><a data-pjax="#main" href="create2">Create Product</a></li>
        <li class="{{ method('list') }}" id="list" onclick="selector('list')"><a data-pjax="#main" href="list">Products List</a></li>
        <li class="{{ method('categories') }}" id="categories" onclick="selector('categories')"><a data-pjax="#main" href="categories">Create Category</a></li>
    </ul>
</div>