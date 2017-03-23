@extends('theme')

@section('content')

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
                            {{--<img alt="agent" src="https://diasp.eu/assets/user/default.png" width="100"--}}
                                 {{--class="img-responsive"/><!--hve-pro close-->--}}
                            <!--col-sm-12 close-->
                            <br clear="all"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="pro-title"></h4>
                                </div><!--col-md-12 close-->


                                <div class="col-md-6">
                                    <form>
                                        <div class="table-responsive responsiv-table">
                                            <table class="table bio-table">
                                                <tbody>
                                                <tr>
                                                    <td>Contact Name</td>
                                                    <td>: {{ $id->cp_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Position</td>
                                                    <td>: {{ $id->cp_designation }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Branch</td>
                                                    <td>: {{ $id->cp_branch }}</td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div><!--table-responsive close-->
                                    </form>
                                </div><!--col-md-6 close-->

                                <div class="col-md-6">

                                    <div class="table-responsive responsiv-table">
                                        <table class="table bio-table">
                                            <tbody>
                                            <tr>
                                                <td>Email Id</td>
                                                <td>: {{ $id->cp_email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>: {{ $id->cp_telephone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>: (+94)73 4 567890</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div><!--table-responsive close-->

                                </div><!--col-md-6 close-->
                                <div class="col-md-10">
                                    <button class="btn btn-primary btn-outline"
                                            onclick="location.href = '{{ url( 'client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id.'/edit/' ) }}'"
                                    >
                                        Edit User Profile
                                    </button>
                                </div>
                            </div><!--row close-->
                        </div><!--container close-->
                    </div><!--tab-pane close-->
                </div>
            </div>
        </div>
@stop