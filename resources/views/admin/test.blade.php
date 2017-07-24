@extends('admin.layouts.dashboard')
@section('page_heading','')
@section('section')
    <div class="container">
        <div class="row">
            {{--<div class='col-sm-6'>--}}
                {{--<div class="form-group">--}}
                    {{--<div class='input-group date' id='datetimepicker1'>--}}
                        {{--<input type='text' class="form-control" />--}}
                        {{--<span class="input-group-addon">--}}
                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            @foreach($product as $prod)
                {{$prod}}
            @endforeach
        </div>
    </div>
@stop