@extends('theme')
@section('content')
    <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab"> Item Details </a>
                    </li>

                </ul>

                <div class="row">
                    <div class="container-fluid">
                    <div class="col-md-4">
                        <img src="{{ asset ('/' .$items->image) }}" width="350" height="350" alt="product" class="img-responsive">
                    </div>

                    <div class="col-md-8">
<br>
                        <br>
                        <table class="table table-bordered">
                                <td>Part Number </td>
                                <td>{{ $items->part_no }}</td></tr>
                            <tr><td>Item Name </td>
                                <td>{{ $items->name }}</td></tr>

                            <tr><td>Description</td>
                                <td>{{ $items->description}}</td></tr>
                        </table>
                    </div>
                    </div><!-- end col-md-8 -->
                </div> <!-- end row -->


            </div>
@endsection