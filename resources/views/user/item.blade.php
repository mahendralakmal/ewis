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
                        <img src="{{ asset ('/img/Products/' .$items->image) }}" alt="product">
                    </div>

                    <div class="col-md-8">
                        <h3>Rs. {{ $items->default_price }}</h3>
                        <form action="{{ route('product.AddToBucket', ['id' => $items->part_no]) }}" method="GET" class="side-by-side">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{ $items->part_no }}">
                            <input type="hidden" name="name" value="{{ $items->description }}">
                            <input type="hidden" name="price" value="{{ $items->default_price }}">
                            <input type="submit" class="btn btn-success btn-lg" value="Add to Bucket">
                        </form>



                        {{ $items->description }}
                    </div>
                    </div><!-- end col-md-8 -->
                </div> <!-- end row -->


            </div>
@endsection