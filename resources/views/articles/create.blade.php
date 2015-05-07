@extends('app')

@section('content')

	<h1>Write a new article</h1>
	<br>
	{!! Form::open(['url' => 'articles']) !!}

		@include ('articles._form', ['submitBtnLabel' => 'Add new'])

	{!! Form::close() !!}

	@include ('errors.list')

@stop