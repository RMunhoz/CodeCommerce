<div class="form-group">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('price', 'Price:') !!}
	{!! Form::text('price', null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('featured', 'Featured:') !!}
    {!! Form::checkbox('featured') !!}
</div>

<div class="form-group">
    {!! Form::label('recommend', 'Recommend:') !!}
    {!! Form::checkbox('recommend') !!}
</div>