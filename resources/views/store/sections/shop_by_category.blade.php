<div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        Shop By Category
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        @foreach($catnav as $cat)
            <li>{!! HTML::link('/store/category/'. $cat->id, $cat->name) !!}</li>
        @endforeach
    </ul>
</div>