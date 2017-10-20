<div class="input-field col s12">
    {!! Form::text('graduated_from', null) !!}
    {!! Form::label('graduated_from', 'University/Collage') !!}
    @if ($errors->has('graduated_from'))
        <span class="error">{{ $errors->first('graduated_from') }}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::text('profession', null) !!}
    {!! Form::label('profession', 'Profession') !!}
    @if ($errors->has('profession'))
        <span class="error">{{ $errors->first('profession') }}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::textarea('skills', null, ['class'=>'materialize-textarea']) !!}
    {!! Form::label('skills', 'Skills') !!}
    @if ($errors->has('skills'))
        <span class="error">{{ $errors->first('skills') }}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::textarea('bio', null, ['class'=>'materialize-textarea']) !!}
    {!! Form::label('bio', 'Describe yourself') !!}
    @if ($errors->has('bio'))
        <span class="error">{{ $errors->first('bio') }}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::text('country', null) !!}
    {!! Form::label('country', 'Country') !!}
    @if ($errors->has('country'))
        <span class="error">{{ $errors->first('country') }}</span>
    @endif
</div>

<div class="input-field col s12">
        {!! Form::text('phone_number', null) !!}
        {!! Form::label('phone_number', 'Enter Phone Number') !!}
        @if ($errors->has('country'))
                <span class="error">{{ $errors->first('phone_number') }}</span>
        @endif
</div>

<div class="input-field col s12">
    {!! Form::file('profile_image', null) !!}
    {!! Form::label('profile_image', 'Upload Profile Image') !!}
    @if ($errors->has('profile_image'))
        <span class="error">{{ $errors->first('profile_image') }}</span>
    @endif
</div>




