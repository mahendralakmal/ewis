@extends('master')

@section('content')
    <div class="container-fluid profile-background" style="background-color: {{ \Illuminate\Support\Facades\Session::get('BaseColor') }}">
        <div class="container white-background gradiant-background">
            <div class=" col-md-12 profile-head">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <img alt="Sampath Bank" src="{{ elixir('img/sampath.jpg') }}" width="209" hight="67" class="img-responsive"/>
                </div><!--col-md-4 col-sm-4 col-xs-12 close-->


                <div class="col-md-5 col-sm-5 col-xs-12 profile-head">
                    <div class="description">
                        <div class="inner">
                            <h3>Saman Perera</h3>
                            <h5>Sales Agent</h5>
                            <ul>
                                <li><span class="glyphicon glyphicon-user"></span> Ewis Peripherals </li>
                                <li><span class="glyphicon glyphicon-map-marker"></span> No.123, Blah Street, Blah blah, Colombo45, Sri Lanka
                                </li>
                                <li><span class="glyphicon glyphicon-phone"></span><a href="#" title="Phone">+94 11 2
                                        30 30
                                        50</a>
                                </li>
                                <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="Email">saman.perera@ewis.lk</a>
                                </li>

                            </ul>
                        </div>
                    </div>


                </div><!--col-md-8 col-sm-8 col-xs-12 close-->


            </div>

            <!-- Nav tabs -->
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-user-secret"></i> Edit Details
                        </a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <div class="container">
                            <div class="col-sm-11" style="float:left;">
                                <br clear="all"/>
                                <img alt="agent" src="https://diasp.eu/assets/user/default.png" width="100"
                                     class="img-responsive"/><!--hve-pro close-->
                                <!--col-sm-12 close-->
                                <br clear="all"/>
                                <div class="row">
                                    <div class="col-md-8">
                                        <h4 class="pro-title"></h4><!--col-md-12 close-->
                                        {{--{{ $profile->address }}--}}
                                    <form method="POST" action="" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Contact Person</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" value="{{$client->cp_name}}" class="form-control" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Designation</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" value="{{$client->designation}}" class="form-control" name="designation" id="designation">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Branch Name</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" value="{{$client->cp_branch}}" class="form-control" name="branch" id="branch">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Contact Number</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" value="{{$client->cp_telephone}}" name="phone" id="phone" maxlength="12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Contact Email</label>
                                            </div>

                                            <div class="col-md-7">
                                                <button class="btn btn-primary btn-outline" type="submit">Submit</button>
                                                <button class="btn btn-primary btn-outline" type="clear">Clear</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div><!--col-md-6 close-->
                            </div><!--container close-->
                        </div>
                        </div><!--tab-pane close-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop