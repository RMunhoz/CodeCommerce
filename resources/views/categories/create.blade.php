@extends('template')

@section('title')
	New Category
@stop
@section('content')
	<div class="container">
		<h1>Create Category</h1>
		
		@if($errors->any())
			
			<ul class="alert-danger">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>

		@endif		

		{!! Form::open(['route'=>'admin.categories.store', 'method'=>'post']) !!}

			@include('categories._form')

			{!! Form::submit('Add Category',['class'=>'btn btn-primary']) !!}

		{!! Form::close() !!}

	</div>		
@stop