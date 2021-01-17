@extends('adminlte::page')

@section('title', 'Add product')

@section('content_header')
    <h1>Add product</h1>
@stop

@section('content')

    <form action="/admin/product" method="POST" enctype="multipart/form-data">
        
        @include('admin.product._form')

    </form>
@stop
