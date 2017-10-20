@extends('master')
@section('content')
<div class="row">
    <div class="parallax-container">
        <div class="row center">
            <div class="col m6">
                <h3 class="center">
                    Advertisement
                </h3>
            </div>
            <div class="col m6">
                <h3> 
                    Start with Paybobby, The worlds Premium Online Market Place.
                </h3>
                <a href="/register" class="btn">

                Get Started Now 
                <i class="fa fa-arrow-right white-text"></i>
                </a>
            </div>
            
        </div>
        <div class="parallax"><img src="images/sample1.jpg"></div>
    </div>
    <div class="section white">
        <h4 class="header center"> Its Simple </h4>
        <div class="row">
              @include('partials.how_it_works')
        </div>

        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax"><img src="images/sample1.jpg"></div>
    </div>
</div>
@endsection