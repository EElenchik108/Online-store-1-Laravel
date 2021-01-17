@extends('mainlayouts.main')
@section('title', $title)
@section('content')

<div class="container">
	<h1  class="text-center">{{$title}}</h1>
	<form action="/contacts" class="col=6" method="POST">
		<h2>Binder with us</h2>
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" name="name" class="form-control" value="">
		</div>
		<div class="form-group">
			<label for="">Phone</label>
			<input type="text" name="name" class="form-control" value="" placeholder="+38(0__) ___ __ __">
		</div>
		<div class="form-group">
			<label for="">Text</label>
			<textarea name="text" class="form-control"></textarea> 
		</div>	
		<button class="btn btn-primary">Submit</button>
	</form>
</div>
	
@endsection
