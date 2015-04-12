<div class="row">
    @foreach($products as $product)
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                {!! HTML::image($product->image, $product->title)!!}
                <div class="caption">
                    <h3><a href="/store/{!! $product->id !!}">{!! $product->title !!}</a></h3>
                    <p>{!! $product->description !!}</p>
                    <p><a href="#" class="btn btn-primary" role="button">View details »</a>
                        <a href="#" class="btn btn-default" role="button">${!! $product->price!!}</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>