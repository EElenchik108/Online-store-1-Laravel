@extends('layouts.app')
@section('content')
	<h1 class="text-center">Categories</h1>
	<div class="container">
		<div class="row">
			@foreach($categories as $category)
				<div class="col-4 text-center font-weight-bold mx-auto shadow p-3 mb-3 bg-white rounded">	
					<div class="text-uppercase">
						<a href="/category/{{$category->slug}}">
						<img src="{{$category->img}}"  alt="" class="img-fluid">	
							<p class="m-t-10">{{$category->name}} ( {{ $category->products->count() }} )</p>
						</a>	
					</div>			
				</div>
			@endforeach
		</div>
	</div>

	<h2 class="text-center mb-3">Recommended products</h2>
	<div class="container">
		<div class="row">
			@foreach($products as $product)
				<div class="col-3">	
					@include('shop._product')
				</div>
			@endforeach
		</div>
	</div>
	
	<h2 class="text-center mb-3">Product reviews</h2>
	<div class="container">
		<div class="row">
			@foreach($reviews as $review)
				<div class="row justify-content-between font-weight-bold mx-auto shadow p-3 mb-3 bg-white rounded ">
					<p><b>Product: {{$review->product->name}}</b></p>
					<p>{{$review->review}}</p>		
					<p class="col-4 text-center">{{$review->user->name}}</p>
					<p class="col-4 text-center">{{$review->created_at}}</p>
				</div>
			@endforeach
		</div>
	</div>
@endsection

