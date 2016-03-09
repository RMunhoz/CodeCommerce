@extends('template')

@section('title')
	Edit Product
@stop
@section('content')
	<div class="container">
	<h1>Edit Product {{$product->name}}</h1>
		
		{!! Form::model($product,['route'=>['admin.products.update',$product->id], 'method'=>'put']) !!}
			
			@include('products._form')

		{!! form::submit('Save Product',['class'=>'btn btn-success'])!!}	

		{!! Form::close() !!}	
	
	</div>
@stop

