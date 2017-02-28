@extends('theme')
@section('content')
    <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-male"></i>Add Items
                        </a>
                    </li>

                </ul>

                <div class="row">
                    <div class="container-fluid">
                    <div class="col-md-4">
                        <img src="{{ asset ('/' .$items->image) }}" width="350" height="350" alt="product">
                    </div>

                    <div class="col-md-8">
                        <h3>Rs. {{ $items->default_price }}</h3>
                        <form action="/client-profile/add-to-bucket" method="GET" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{ $items->part_no }}">
                            <input type="number" name="Qty" id="Qty" value="1">
                            <input type="hidden" name="name" value="{{ $items->name }}">
                            <input type="hidden" name="price" value="{{ $items->default_price }}">
                            <input type="submit" class="btn btn-success btn-lg" value="Add to Bucket">
                        </form>



                        {{ $items->description }}
                    </div>
                    </div><!-- end col-md-8 -->
                </div> <!-- end row -->


            </div>
@endsection