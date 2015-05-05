@extends('app')

@section('content')
	<h1>About</h1>
	@if (count($people))
		<ul>
		@foreach ($people as $person)
			<li>{{ $person }}</li>
		@endforeach
		</ul>
	@endif

	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque temporibus commodi ad numquam recusandae consectetur odio! Commodi fuga repudiandae excepturi, ipsam numquam cumque, deleniti neque facilis quasi laudantium fugiat eius.
	</p>
@endsection