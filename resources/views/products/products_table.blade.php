@extends('products.master')

@section('content')
    <h2>Products Table</h2>
    <hr>
    <div class="dataTable_wrapper">
        <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
            <tr>
                {{--<th>#</th>--}}
                <th class="hidden-xs">Product</th>
                <th>Name</th>
                <th class="hidden-xs">Price</th>
                <th>Status</th>
                <th >Edit</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $index => $product)
                <tr>
                    {{--<td>{!! ($index + 1) !!}</td>--}}
                    <td class="hidden-xs col-sm-1">
                        <p class="thumbnail pull-left hidden-xs" href="#">
                            {!! HTML::image($product->image, $product->title, ['width'=>'45'])!!}

                        </p>
                    </td>
                    <td class="col-xs-4 col-md-3">
                        {!! $product->title !!}
                    </td>
                    <td class="hidden-xs col-md-1">
                        <p>${!! $product->price !!}

                        <p>
                    </td>

                    <td class="col-md-1">
                        {!! Form::open(['method'=>'PATCH', 'route'=>'admin.update', 'class' =>'form-horizontal'])!!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::select('availability', ['1' => 'In Stock', '0'=>'Out of Stock'], $product->availability, ['class'=>'form-control']) !!}
                    </td>

                    <td class="text-center col-md-1">
                        {{--{!! Form::submit('Update', ['class'=> 'btn btn-default']) !!}--}}
                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button type="submit" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                        {!! Form::close() !!}

                    </td>

                    <td class="text-center col-md-1">
                        {!! Form::open(['method'=>'DELETE', 'route'=>'admin.destroy', $product->id]) !!}
                        {!! Form::hidden('id', $product->id) !!}
                        {{--{!! Form::submit('Delete', ['class'=>'btn btn-default col-md-offset-3']) !!}--}}
                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop