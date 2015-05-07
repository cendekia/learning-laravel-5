{{-- Temporary --}}
{!! Form::hidden('user_id', 1) !!}

<!-- Title Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Title : ') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Form Input -->
<div class="form-group">
	{!! Form::label('body', 'Body : ') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Published At Form Input -->
<div class="form-group">
	{!! Form::label('published_at', 'Published At : ') !!}
	{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Add Article Submit Button -->
<div class="form-group">
	{!! Form::submit($submitBtnLabel, ['class' => 'btn btn-primary form-control']) !!}
</div>