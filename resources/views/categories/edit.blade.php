@extends('template')

@section('title')
	Edit Category
@stop
@section('content')
	<div class="container">
		<h1>Edit Category: {{$category->name}}</h1>
		
		{!! Form::model($category, ['route'=>['admin.categories.update', $category->id],'method'=>'put']) !!}

		@include('categories._form')

		{!! Form::submit('Save category',['class'=>'btn btn-success']) !!}

		{!! Form::close() !!} 
	
	</div>		
@stop