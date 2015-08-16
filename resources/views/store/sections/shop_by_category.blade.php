<div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" id="dropdown-menu" data-toggle="dropdown">Shop By Category</button>
    <button type="button" class="btn btn-primary dropdown-toggle" id="dropdown-menu" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu">
        <li>{!! HTML::link('/store', 'Latest Products') !!}</li>

        @foreach($catnav as $cat)
            <li>{!! HTML::link('/store/category/'. $cat->id, $cat->name) !!}</li>
        @endforeach
    </ul>
</div>