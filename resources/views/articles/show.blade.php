@extends('app')

@section('content')
	<article>
		<h2>
			{{ $article->title }}
		</h2>
		<h4>
			{{ $article->published_at->diffForHumans() }}
		</h4>
		@unless ($article->tags->isEmpty())
		<h4>Tags : </h4>
		<ul>
			@foreach ($article->tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
		@endunless
		<div>
			{{ $article->body }}
		</div>
	</article>
@stop