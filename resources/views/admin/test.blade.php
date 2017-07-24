@extends('admin.layouts.dashboard')
@section('page_heading','')
@section('section')
    <div class="container">
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <input placeholder="Search Your Product" type="text" class="form-control" id="search" name="search">
                </div>
            </div>

        </div>
        <div class="col-md-12" id="response">
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $("#search").on("change", function(){
           $.ajax(
               {
                   'type':'get',
                   'url':'/search/'+this.value,
                   success: function(response){
                      $("#response").html(response);
                   }
               }
           );
        });
    </script>
@stop