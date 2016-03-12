@extends('template')

@section('title')
	Categories
@stop
@section('content')
	<div class="container">
		<h1>Categories</h1>

		@if($errors->any())
			
			<ul class="alert-danger">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>

		@endif

		<a href="{{ route('admin.categories.create') }}" class="btn btn-default">New Category</a>
		<br>
		<br>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
			
			@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>{{$category->description}}</td>
					<td>
						<a href="{{ route('admin.categories.edit',['id' => $category->id]) }}" 
						class="btn btn-primary">Edit</a>
						<a href="{{ route('admin.categories.destroy',['id' => $category->id]) }}" 
						class="btn btn-danger">Delete</a>
					</td>
				</tr>	
			@endforeach			
		</table>

		{!! $categories->render() !!}	
		
	</div>		
@stop