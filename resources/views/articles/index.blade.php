@extends('app')

@section('content')
	<h1>Articles</h1>

	@foreach ($articles as $article)
		<article>
			<h2>
				<a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a> <small>| {{ $article->published_at->diffForHumans() }}</small>
			</h2>
			<h4>
				article by {{ $article->user->name }}
			</h4>
			<div>
				{{ $article->body }}
			</div>
		</article>
	@endforeach
@stop