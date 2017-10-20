@extends('master')
@section('content')
<div class="row">
    <div class="parallax-container">
        <div class="parallax">
        	<img src="images/sample1.jpg">
        </div>
    </div>
    <div class="section white">
        <h4 class="header center">How It Works </h4>
        <div class="row">
            @include('partials.how_it_works')
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="images/sample1.jpg"></div>
    </div>
</div>
    
@stop
