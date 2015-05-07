@extends('app')

@section('content')

	<h1>Edit : {!! $article->title !!}</h1>
	<br>
	{!! Form::model($article, ['method' => 'patch', 'url' => ['articles', $article->id]]) !!}

		@include ('articles._form', ['submitBtnLabel' => 'Update'])

	{!! Form::close() !!}

	@include ('errors.list')

@stop