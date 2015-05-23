@extends('app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Saved Carts</h1>
        </div>

        @if($saved_carts)
            <div class="panel panel-default">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last Modified</th>
                        <th>Item(s)</th>
                        <th>Delete Saved Cart</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($saved_carts as $cart)
                        <tr>
                            <td>
                                ID Number: {{ $cart->cart_id }}
                                <a href="#"><h4>{{ $cart->cart_id }}</h4></a>
                            </td>
                            <td>{{ date('F j, Y', strtotime($cart->updated_at)) }}</td>
                            <td>{{ $cart->qty_of_items }}</td>
                            <td>
                                <button type="submit" class="btn btn-danger col-md-5"> Delete</button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        @else
            @include('store.sections.no_saved_carts')
        @endif
    </div>
@stop