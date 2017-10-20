<div class="input-field col s12">
{!! Form::text('title', null) !!}
{!! Form::label('title', 'Enter Question') !!}

@if ($errors)
	<span class="error">{{ $errors->first('title') }}</span>
@endif
</div>
<div class="input-field col s12">
{!! Form::textarea('content', null, ['class'=>'materialize-textarea']) !!}
{!! Form::label('content', 'Enter Answer') !!}

@if ($errors)
	<span class="error">{{ $errors->first('content') }}</span>
@endif
</div>