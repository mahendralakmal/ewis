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

                                <form method="POST"
                                      action="{{ url('client-profile/'.App\User::find(Session::get('User'))->c_user->client_branch->client->id.'/postCheckout') }}"
                                      id="postCheckout" name="postCheckout" enctype="multipart/form-data"
                                      class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Contact Details</h4>

                                            <div class="col-md-12">
                                                <hr>


                                                <div class="form-group">
                                                    <input type="hidden"
                                                           value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id}}"
                                                           name="user_id" id="user_id">
                                                    <div class="col-md-3">
                                                        <label>Contact Person</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text"
                                                               value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->cp_name}}"
                                                               class="form-control" name="cp_name" id="cp_name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Branch Name</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text"
                                                               value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->name}}"
                                                               class="form-control" name="cp_designation"
                                                               id="cp_designation">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Contact Number</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control"
                                                               value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->cp_telephone}}"
                                                               name="cp_telephone" id="cp_telephone" maxlength="12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        {{--/  <textarea class="form-control" name="cp_notes" id="cp_notes" rows="10" placeholder="Enter any notes for delivery"></textarea>--}}
                                                        {{--<input type="text" class="form-control" value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->address}}" name="cp_email" id="cp_email" maxlength="400">--}}
                                                        <textarea class="form-control" name="cp_email" id="cp_email"
                                                                  rows="3">{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->address}}</textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group row">
                                                    <div class="col-md-3"><label>Attachment</label></div>
                                                    <div class="col-md-4">
                                                        <input type="file" name="file" id="file">
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
                                                        <input type="text"
                                                               value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->cp_name}}"
                                                               class="form-control" name="del_cp" id="cp_name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Branch Name</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text"
                                                               value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->name}}"
                                                               class="form-control" name="del_branch" id="del_branch">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Contact Number</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control"
                                                               value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->cp_telephone}}"
                                                               name="del_tp" id="del_telephone" maxlength="12">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        {{--/  <textarea class="form-control" name="cp_notes" id="cp_notes" rows="10" placeholder="Enter any notes for delivery"></textarea>--}}
                                                        {{--<input type="text" class="form-control" value="{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->address}}" name="cp_email" id="cp_email" maxlength="400">--}}
                                                        <textarea class="form-control" name="cp_email" id="cp_email"
                                                                  rows="3">{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->address}}</textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <label>Special Notes</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <textarea class="form-control"
                                                                  placeholder="Enter any notes for delivery"
                                                                  name="del_notes" id="del_notes" rows="7"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" align="center">
                                            <div class="form-group">
                                                {{--<div class="col-md-3">--}}
                                                <button class="btn btn-primary btn-outline" onclick="Success();" type="submit"
                                                        value="save-form" id="save-form">Submit
                                                </button>
                                                <button class="btn btn-primary btn-outline" type="reset" value="clear-form">
                                                    Clear
                                                </button>

                                                <script>
                                                    function Success() {

                                                        $('#postCheckout').submit(function () {
                                                            $('#save-form').prop('disabled', true);
                                                        });
                                                        document.getElementById("success").innerHTML = "<div class='alert alert-success'>Your Purchase Order Submitted Successfully</div>";
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-12" align="center">
                                            <div>
                                                <label id="success"></label>
                                            </div>
                                        </div>
                                    </div>





                                </form>
                            </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @else
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                <h2>Your Bucket is Empty.....! </h2>
            </div>
        </div>
        @endif
        </div>

@endsection
<script>
    var h1content = document.getElementById("value").Text();
    alert(h1content);
    function numberWithCommas(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

//    $('#postCheckout').preventDoubleSubmission();

//    jQuery.fn.preventDoubleSubmission = function () {
    $('#postCheckout').on('submit', function (e) {
        console.log('hihi');
//            var $form = $(this);
//
//            if ($form.data('submitted') === true) {
//                // Previously submitted - don't submit again
//                e.preventDefault();
//            } else {
//                // Mark it so that the next submit can be ignored
//                $form.data('submitted', true);
//            }
        });

         //Keep chainability
//        return this;
//    };
</script>
