<div class="row text-center">
    @foreach($products as $product)
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                {!! HTML::image($product->image, $product->title, ['class'=>'img-responsive'])!!}
                <div class="caption">
                    <h3>{!! $product->title !!}</h3>
                    <p>{!! $product->description !!}</p>
                    <p>
                        {!! Form::open(['route'=>'store.cart.store']) !!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::submit('Add to Cart', ['class'=>'btn btn-success', 'role'=>'']) !!}
                        <a href="/store/{!! $product->id !!}" class="btn btn-default">View Details</a>
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row text-center">
    {!! $products->render() !!}
</div>


