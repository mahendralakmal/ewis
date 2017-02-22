@extends('theme')

@section('title')
    Ewis Peripherals Bucket
@endsection

@section('content')
    <div class="col-md-12">
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#agent" role="tab" data-toggle="tab">
                    <i class="fa fa-user-secret"></i> Checkout
                </a>
            </li>

        </ul>
    <div class="tab-content white-background">
        <div class="tab-pane fade active in" id="agent">
                <div class="col-sm-11" style="float:left;">
                    <br clear="all"/>
                    <div class="container">
                        @if (Session::has('bucket'))
                            <div class="col-md-offset-4">
                            <h3 class="pro-title">Complete Order</h3>
                            </div>
                                <ul class="list-group">
                                <form action="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->id.'/postCheckout') }}" method="POST" id="postCheckout" enctype="multipart/form-data" class="form-horizontal">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                    <h4>Contact Details</h4>

                                        <div class="col-md-12">
                                            <hr>


                                                <div class="form-group">
                                                    <input type="hidden" value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->id}}" name="user_id" id="user_id">
                                                    <div class="col-md-3">
                                                        <label>Contact Person</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text"  value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->cp_name}}" class="form-control" name="cp_name" id="cp_name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Branch Name</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->cp_branch}}" class="form-control" name="cp_designation" id="cp_designation">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Contact Number</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control" value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->cp_telephone}}" name="cp_telephone" id="cp_telephone" maxlength="12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Special Notes</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <textarea class="form-control" name="notes" id="notes" rows="10"></textarea>
                                                        {{--<input type="text" class="form-control" value="text_area" name="cp_email" id="cp_email" maxlength="120">--}}
                                                    </div>
                                                </div>

                                        </div>

                                </div>
                                    <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Contact Person</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text"  value="" class="form-control" name="del_cp" id="cp_name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Branch Name</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" value="" class="form-control" name="del_branch" id="del_branch">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Contact Number</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" value="" name="del_tp" id="del_telephone" maxlength="12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Special Notes</label>
                                            </div>
                                            <div class="col-md-7">
                                                <textarea class="form-control" name="notes" id="notes" rows="10"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </div>
                                                <h5>Your Total Items: {{ $total_qty }} </h5>
                                                <hr>
                                                <h5>Your Total Payment: Rs. {{ $total_price }} </h5>
                                                <hr>
                                                <br>
                                                <div class="form-group">
                                                    <div class="col-md-7">
                                                        <button class="btn btn-primary btn-outline" type="submit" value="save-form">Submit</button>
                                                        <button class="btn btn-primary btn-outline" type="reset" value="clear-form">Clear</button>
                                                    </div>
                                                </div>
                                </form>
                                </ul>

                            </div>
                    </div>
                </div>
        </div>
    </div>
    </div>


                            @else
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                    <h2>No Items in the Bucket! </h2>
                                </div>
                            </div>
                            @endif
                    </div>
@endsection
