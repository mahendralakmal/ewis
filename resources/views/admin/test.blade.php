@extends('admin.layouts.dashboard')
@section('page_heading','')
@section('section')
    <div class="container">
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <input type='text' class="form-control" id="search" name="search"/>
                </div>
            </div>
        </div>
        <div class="row">
            <ul class="list-group response">

            </ul>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $("#search").on('keyup change', function () {
            $.ajax(
                {
                    type: 'get',
                    url: '/search/' + this.value,
                    success: function (response) {
                        var model = $(".response");
                        model.empty();
                        $.each(response, function (index, elem) {
                            model.append(
                                "<li>" +
                                "<div>"+elem.id+"</div>" +
                                "<div>"+elem.part_no+"</div>" +
                                "<div>"+elem.name+"</div>" +
                                "<div>"+elem.description+"</div>" +
                                "</li>"
                            );
                        });
                    }
                }
            );
        });
    </script>
@stop