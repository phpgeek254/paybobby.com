@extends('master')
@section('content')
<div class="row">
    <div class="col m3"></div>

    <div class="col col m6 s12 z-depth-3 center" style="padding: 20px;">
        <h4 class="center"> Login </h4>
        {!! Html::image(asset('images/avatar.jpg'), null, ['style'=>'width:200px;;']) !!}
        {!! Form::open(['route'=>['login']]) !!}
        @include('auth.login_form', ['info'=>'Login'])

        {!! Form::close() !!}
    </div>
    <div class="col m3"></div>
</div>  
@endsection
