<div class="input-field col s12">
	{!! Form::text('name', null) !!}
	{!! Form::label('name', 'Full Name') !!}
	@if ($errors->has('name'))
		<span class="error">{{ $errors->first('name') }}</span>
	@endif
</div>

<div class="input-field col s12">
	{!! Form::text('email', null) !!}
	{!! Form::label('email', 'Email') !!}
	@if ($errors->has('email'))
		<span class="error"> {{ $errors->first('email') }}</span>
	@endif
</div>

<div class="input-field col s12">
	{!! Form::select('user_type', (new App\User)->user_types, null, ['class'=>'select']) !!}
	{!! Form::label('user_type', 'User Type') !!}

</div>

<div class="input-field col s12">
	{!! Form::number('phone_number', null, ['placeholder'=>'+254-']) !!}
	{!! Form::label('phone_number', 'Phone Number') !!}
	@if ($errors->has('phone_number'))
		<span class="error">{{ $errors->first('phone_number') }}</span>
	@endif
</div>

<div class="input-field col s12">
	{!! Form::password('password', null) !!}
	{!! Form::label('password', 'Password') !!}
	@if ($errors->has('password'))
		<span class="error">
			{{ $errors->first('password') }}
		</span>
	@endif
</div>

<div class="input-field col s12">
	{!! Form::password('password_confirmation', null) !!}
	{!! Form::label('password_confirmation', 'Confirm Password') !!}

	@if ($errors->has('password_confirmation'))
		<span class="error">{{ $errors->first('password_confirm') }}</span>
	@endif
</div>


<div class="input-field col s12">
	{!! Form::submit('Register', ['class'=>'btn']) !!}

	@if( isset($show_link) and $show_link==true )
		{{ link_to_route('login', 'or Login', null, ['class'=>'btn right']) }}
	@endif
</div>



