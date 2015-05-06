@extends('app')

@section('content')
	<article>
		<h2>
			{{ $article->title }}
		</h2>
		<h4>
			{{ $article->published_at->diffForHumans() }}
		</h4>
		<div>
			{{ $article->body }}
		</div>
	</article>
@stop