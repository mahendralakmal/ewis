@extends('admin.layouts.dashboard')
@section('page_heading','Completion Time')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product))

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Completion Time</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 tbl_ori">
                        <ul class="list-group">
                        </ul>
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
@section('scripts')
    <script>
        $("#products").validate({
            rules: {
                part_no: "required",
                name: "required",
                brand_id: "required",
                category_id: "required",
                description: "required",
                default_price: "required"
            }
        });
        $("#brand_id").on('change', function () {
            $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-product-list/category/' + this.value,
                    success: function (response) {
                        var model = $('#category_id');
                        model.empty();
                        model.append("<option selected>Select Category</option>")
                        $.each(response, function (index, elem) {
                            if (elem.status == 1) {
                                model.append("<option value='" + elem.id + "'>" + elem.title + "</option>")
                            }
                        });
                    }
                }
            );
        });
    </script>
@stop