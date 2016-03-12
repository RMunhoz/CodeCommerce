@extends('template')

@section('title')
	Edit Product
@stop
@section('content')
	<div class="container">

		@if($errors->any())
			
			<ul class="alert-danger">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>

		@endif

	<h1>Edit Product {{$product->name}}</h1>
		
		{!! Form::model($product,['route'=>['admin.products.update',$product->id], 'method'=>'put']) !!}
			
			@include('products._form')

        {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
		<a href="{{ route('admin.products.index') }}" class="btn btn-default">Voltar</a>

		{!! Form::close() !!}	
	
	</div>
@stop

