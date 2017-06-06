@extends('admin.layouts.dashboard')
@section('page_heading','Price List by Account Manager')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))

        <br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Price List by Account Manager</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" id="accmgrpricelist">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" name="agent" id="agent" data-parsley-required="true">
                                        <option value="n">Select Account Manager</option>
                                        @foreach($users as $user)
                                            @if(\App\ClientsBranch::where('agent_id', $user->id)->count() > 0)
                                                <option value="{{ \App\ClientsBranch::where('agent_id', $user->id)->first()->agent->id }}">{{ \App\ClientsBranch::where('agent_id', $user->id)->first()->agent->name }}</option>
                                            @elseif($user->designation_id === 4)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <button class="btn btn-primary"> Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="form-group">
                        @if($s_user != '')
                            <div><h1><strong>{{$s_user->name}}</strong></h1></div>@endif
                        @if($branchs != '')
                            <ul class="list-group">
                                @foreach($branchs as $branch)
                                    @if( $branch->activation  !== 1)
                                        <li class="list-group-item">
                                            <a href="#b{{ $branch->id }}" class="list-group-item active"
                                               data-toggle="collapse"><strong>{{ $branch->client->name.' - '.$branch->name }}</strong>
                                                @if($branch->cbrands->count() > 0)<span
                                                        class="badge">{{$branch->cbrands->count()}}</span>@endif
                                            </a>
                                            <div id="b{{$branch->id}}" class="collapse">
                                                @foreach($branch->cbrands as $cbrand)
                                                    @if( $cbrand->remove !== 1)
                                                    <a href="#c{{ $cbrand->id }}" class="list-group-sub-item active"
                                                       data-toggle="collapse"><strong>{{ $cbrand->brand->title }}</strong>
                                                        @if($cbrand->c_category->count() > 0)
                                                            <span class="badge">{{$cbrand->c_category->count()}}</span>
                                                        @endif
                                                    </a>
                                                    @endif
                                                    <div id="c{{$cbrand->id}}" class="collapse">
                                                        @foreach($cbrand->c_category as $ccategory)
                                                            <a href="#p{{ $ccategory->id }}"
                                                               class="list-group-sub-item item2 active"
                                                               data-toggle="collapse"><strong>{{ $ccategory->category->title }}</strong>
                                                                @if($ccategory->cproduct->count() > 0)
                                                                    <span class="badge">{{$ccategory->cproduct->count()}}</span>
                                                                @endif
                                                            </a>
                                                            <div id="p{{$ccategory->id}}" class="collapse">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <td><h5>Part No</h5></td>
                                                                        <td><h5>Name</h5></td>
                                                                        <td class="text-right"><h5>Price</h5></td>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($ccategory->cproduct as $cproduct)
                                                                        <tr>
                                                                            <td>{{$cproduct->product->part_no}}</td>
                                                                            <td>{{$cproduct->product->name}}</td>
                                                                            <td class="text-right">{{$cproduct->special_price}}</td>
                                                                            <td></td>
                                                                        </tr>
                                                                    @endforeach

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                        <table class="table table-condensed">
                            <tbody class="tbody-completed">
                            <tr>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop