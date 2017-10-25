
{{-- Email Field --}}
<div class="input-field col s12">
	{!! Form::text('email', null) !!}
	{!! Form::label('email', 'Email') !!}
	@if ($errors->has('email'))
		<span class="error animated fadeInDown"> {{ $errors->first('email') }}</span>
	@endif
</div>
{{-- Password Field --}}
<div class="input-field col s12">
	{!! Form::password('password', null) !!}
	{!! Form::label('password', 'Password.') !!}
	@if ($errors->has('password'))
		<span class="error animated fadeInDown"> {{ $errors->first('password') }} </span>
	@endif
</div>
<div class="input-field col s12">
	{!! Form::submit($info ? : 'Submit', ['class'=>'btn']) !!}
	@if(isset($show_link) and $show_link == true)
		{!! link_to_route('register', 'Or Register', [], ['class'=>'btn']) !!}
	@endif
</div>

