@extends('template')

@section('title')
	Edit Category
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

		<h1>Edit Category: {{$category->name}}</h1>
		
		{!! Form::model($category, ['route'=>['admin.categories.update', $category->id],'method'=>'put']) !!}

		@include('categories._form')

		{!! Form::submit('Save category',['class'=>'btn btn-success']) !!}

		<a href="{{ route('admin.categories.index') }}" class="btn btn-default">Voltar</a>

		{!! Form::close() !!} 		
	
	</div>		
@stop