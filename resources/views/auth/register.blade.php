@extends('master')
@section('content')
<div class="row" style="margin-top: 10px;">
    <div class="col m3"></div>

    <div class="col m6 s12 z-depth-3" style="padding: 20px;">
        <h4 class="center"> Register Here. </h4>
        {!! Form::open(['route'=>['register']]) !!}
        @include('auth.user_form', ['info'=>'Register'])
        {!! Form::close() !!}
    </div>
    <div class="col m3"></div>
</div>


@endsection
