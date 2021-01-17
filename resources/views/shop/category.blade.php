@extends('layouts.app')
@section('content')
	<h1 class="text-center text-uppercase">{{$category->name}}</h1>
	
	<div class="container">
		<div class="row text-center">
			@foreach($products as $product)
				<div class="col-3">	
					@include('shop._product')	
				</div>
			@endforeach
		</div>
		<div class="mt-5 d-flex justify-content-center">
			{{$products->links()}}
		</div>		
	</div>
	
@endsection