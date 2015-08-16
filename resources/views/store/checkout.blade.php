@extends('app')

@section('content')

    <br/>
    <br/>
    <br/>
<div class="container">
    <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">Shipping Address</p>
                    </a></li>
                <li class="disabled"><a href="#step-2">
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Payment</p>
                    </a></li>
                <li class="disabled"><a href="#step-3">
                        <h4 class="list-group-item-heading">Step 3</h4>
                        <p class="list-group-item-text">Confirmation</p>
                    </a></li>
            </ul>
        </div>
    </div>
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">

            <div class="jumbotron">
                <h1>Easy three step payment!</h1>
                <p>
                    If you are trying to save cart to your wish list and it remains empty, you may have cookies disabled
                    in your browser settings. If that's the case, please enable acceptance of cookies and try again.
                </p>
                <p>
                    {{--{!! Form::open(['route'=>'store.cart.checkout.index', 'files'=>'true', 'class'=>'form-horizontal', 'role'=>'form']) !!}--}}
                    {{--<div class="form-group">--}}
                    {{--{!! Form::label('', 'First Name', ['class'=>'col-md-4 control-label']) !!}--}}
                    {{--<div class="col-md-4">--}}
                    {{--{!! Form::text('title', '', ['class'=>'form-control col-md-4']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--{!! Form::close()!!}--}}
                            <form role="form">
                                <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                                <hr class="colorgraph">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Address" tabindex="3">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Phone Number" tabindex="5">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3">
                                <hr class="colorgraph">
                                        <p>
                                            <button id="activate-step-2" class="btn btn-primary btn-lg">Activate Step 2
                                            </button>
                                        </p>
                            </form>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                                </div>
            </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">


            {{--<div class="col-md-12 well">--}}
                {{--<h1 class="text-center"> STEP 2</h1>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well">
                <h1 class="text-center"> STEP 3</h1>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        var navListItems = $('ul.setup-panel li a'),
                allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function(e)
        {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                navListItems.closest('li').removeClass('active');
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        // DEMO ONLY //
        $('#activate-step-2').on('click', function(e) {
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            $(this).remove();
        })
    });


</script>
@stop