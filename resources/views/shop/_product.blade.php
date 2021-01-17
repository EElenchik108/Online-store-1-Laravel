<div class="shadow-sm p-3 mb-5 bg-white rounded text-center">
	@if( $product->recommended )
		<div class="recommended">Recommended</div>
	@endif
	<div>Category: {{$product->category->name ?? '-'}}</div>
	<div>Reviews: {{$product->reviews->count() ?? '-'}}</div>
	<a href="/product/{{$product->slug}}">
		<img src="{{$product->img}}"  alt="{{$product->name}}" class="img-fluid">		
		{{$product->name}}
		<div class="border-top">
			Price: {{$product->price}}
		</div>
	</a>	
</div>