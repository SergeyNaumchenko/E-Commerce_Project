@extends('products.master')

@section('content')
    <h2>Products Table</h2>
    <hr>
    <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Delete Products</th>
                <th>Availability</th>
                <th>Update</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <td>{!! ($index + 1) !!}</td>
                    <td>
                        {!! HTML::image($product->image, $product->title, ['width'=>'50'])!!}
                    </td>
                    <td>
                        {!! $product->title !!}
                    </td>
                    <td>
                        <p>${!! $product->price !!}

                        <p>
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'route'=>'admin.products.destroy', $product->id]) !!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-default col-md-offset-3']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['method'=>'PATCH', 'route'=>'admin.products.update', 'class' =>'form-horizontal'])!!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::select('availability', ['1' => 'In Stock', '0'=>'Out of Stock'], $product->availability, ['class'=>'form-control']) !!}
                    </td>

                    <td>
                        {!! Form::submit('Update', ['class'=> 'btn btn-default']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop