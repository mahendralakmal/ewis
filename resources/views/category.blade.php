@extends('master')

@section('content')
	<div class="contatiner"> 
	@if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        <div class="jumbotron text-center clearfix">
            <!-- <h2>Ewis Computers</h2> -->
            <!-- <p>An Laravel App that demos the basic functionality of the e-commerce shopping cart.</p> -->
            <p> <img src="/img/3.jpg" width="1000" height="400"> </p>
        </div> <!-- end jumbotron -->

        <div class="container">
	        <div class="row">
	        @foreach ($categories as $category)
	        	<div class="col-md-3">
	        		<div class="thumbnail">
	        			<div class="caption text-center row">
		        				<a href="{{ url('category', [$category->title,$category->id]) }}">
		        					<img src="{{ asset('img/Categories/' . $category->image) }}" alt="category" class="img-responsive">	
		                            <p>{{ $category->description }}</p>
		                        </a>
	        			</div>
	        		</div>
	        	</div>
	        @endforeach
	        </div>
        </div>
    </div>
@stop