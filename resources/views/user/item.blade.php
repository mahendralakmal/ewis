@extends('theme')
@section('content')
    <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab"> Add Items </a>
                    </li>

                </ul>

                <div class="row">
                    <div class="container-fluid">
                    <div class="col-md-4">
                        <img src="{{ asset ('/' .$items->image) }}" width="350" height="350" alt="product">
                    </div>

                    <div class="col-md-8">
<br>
                        <br>
                        <h4>Item No:- {{ $items->part_no }}</h4>
                        <h4>Item Name:- {{ $items->name }}</h4>
                        <h4>Item Price:- {{ $items->default_price }}</h4>

                        {{ $items->description }}
                    </div>
                    </div><!-- end col-md-8 -->
                </div> <!-- end row -->


            </div>
@endsection