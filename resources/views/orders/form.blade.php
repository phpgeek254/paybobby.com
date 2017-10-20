<div class="input-field col s12">
    {!! Form::text('title',
     null,
     ['placeholder'=>'EG. I need help developing and android app']) !!}
    {!! Form::label('title', 'Enter Name') !!}

    @if ($errors)
        <span class="error">{{ $errors->first('title') }}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::select('category_id', \App\Category::all()->pluck('name', 'id'), null, ['class'=>'select', ] ) !!}
    {!! Form::label('category_id', 'Please Professionals you need') !!}
    @if ($errors)
        <span class="error animated slideInDown">{{ $errors->first('category_id') }}</span>
    @endif
</div>


<div class="input-field col s12">
    {!! Form::textarea('instructions',
     null,
     ['placeholder'=>'EG. I need help developing an android app to help my car renting business get accessed faster and more conveniently by my customers. It will entail the following features.
     1. Great user Interface.
     2. Fast loading time.
     ', 'class'=>'materialize-textarea']) !!}
    {!! Form::label('title', 'Enter Description and instructions') !!}

    @if ($errors)
        <span class="error">{{ $errors->first('instructions') }}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::text('expiry_date', null, ['class'=>'datepicker']) !!}
    {!! Form::label('expiry_date', 'Enter Expiry Date') !!}

    @if ($errors)
        <span class="error">{{ $errors->first('expiry_date') }}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::number('cost', null, ['placeholder'=>'Enter amount in dollars', 'step'=>'0.01']) !!}
    {!! Form::label('cost', 'Payment') !!}

    @if ($errors)
        <span class="error">{{ $errors->first('cost') }}</span>
    @endif
</div>
<div class="file-field input-field">
    <div class="btn">
        <span class="white-text">Upload Attachment if any</span>
        {!! Form::file('file') !!}
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" type="text"
               placeholder="Upload File (Formats, DOCX, PDF">
    </div>
</div>

