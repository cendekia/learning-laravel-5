@extends('app')

@section('content')
	<article>
		<h2>
				{{ $article->title }}
		</h2>
		<div>
			{{ $article->body }}
		</div>
	</article>
@stop