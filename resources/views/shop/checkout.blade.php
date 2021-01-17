@extends('layouts.app')
@section('content')
	<h1 class="text-center text-uppercase">Checkout</h1>
	
	<div class="container">
		@include('shop._cart')
		@guest 
			<p><a href="{{ route('login') }}"  class="btn btn-primary">Login</a> or <a href="{{ route('register') }}"  class="btn btn-primary">Register</a></p>
		@else
			<a href="/end-checkout" class="btn btn-primary">End checkoute</a>
		@endguest
	</div>
	
@endsection