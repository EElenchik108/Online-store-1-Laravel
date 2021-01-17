@extends('layouts.app')
@section('content')
	<h1 class="text-center text-uppercase  mb-4">{{$title}}</h1>
	
	<div class="container shadow-lg p-3 mb-5 bg-white rounded">
		<div class="row">			
				<div class=" ">	
					<div class="ml-5">		
						<img src="{{$product->img}}"  alt="{{$product->name}}" class="img-fluid">	
					</div>			
				</div>
				<div class="col-6 ml-5">	
					<div class="">
							<p class="mb-4"><b>Name: </b> {{$product->name}}</p>
							<p><b>Price: </b> {{$product->price}}</p>
							<p><b>Category: </b> {{$product->category ? $product->category->name : 'No category'}}</p>
							<div class=""></div>
							<form action="" class="add-to-cart">
								@csrf
								<input type="number" name="qty" value="1">
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<button class="btn btn-primary">Add to cart</button>								
							</form>
					</div>			
				</div>
				<div class="container">
					<h3>Add Review</h3>
					@guest
						Login or register
					@else	
					<form action="/product/{{$product->slug}}" method="POST">
						@csrf
						<div class="form-group">
							<textarea name="comment" id="" cols="20" rows="5" class="form-control"></textarea>
						</div>
						<input type="hidden" name="product" value="{{$product->id}}">
						<input type="hidden" name="user" value="{{Auth::user()->id}}">
						<button class="btn btn-primary">Send</button>			
					</form>
					@endguest
				</div>
				
		</div>
		<div class="mt-4">
			<p><b>Description: </b>{{$product->description}}</p>
		</div>
		<div class="mt-4">		
			<b>Reviews: {{$reviewsProduct->count() ?? 'Not reveiw' }}</b>			
				@if($reviewsProduct->count()>0) 
				@foreach($reviewsProduct as $review)
				<div class="row justify-content-between mx-auto p-3 mb-3 bg-white rounded border-top">	
					<p>{{$review->review}}</p>
					<p class="col-4 text-center">{{$review->user->name}}</p>
					<p class="col-4 text-center">{{$review->created_at}}</p>	
				</div>								
				@endforeach
				@endif			
		</div>		
	</div>

@endsection