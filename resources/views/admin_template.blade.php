<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Malewa West Water Project') }}</title>

    @include('partials.stylesheets')
    @include('partials.javascripts')
</head>
<body>
<header class="noPrint">
    <div class="col s12">
        <ul id="slide-out" class="side-nav fixed">
            <li>
                <div class="userView">
                    <div class="background">
                        <img src="/images/sample1.jpg" class="responsive-img">
                    </div>
                    <a href="#!user">
                    @if(Auth::check() and Auth::user()->user_type == 'employee')
                    {{
                        Html::image(asset(Auth::user()->userInfo->profile_image),
                         null, ['class'=>'circle'])
                    }}
                    @else
                    {{
                        Html::image(asset('users/default.jpg'),
                         null, ['class'=>'circle'])
                    }}
                    @endif
                    </a>
                    <a href="#!name">
                        <span class="white-text name">
                        {{ Auth::user()->name }}
                            -
                        {{
                            strtoupper(Auth::user()->user_type=='employer'? 'Client' : 'Free-Lancer')
                        }}
                        </span>
                    </a>
                    <a href="#!email">
                        <span class="white-text email">
                            {{ Auth::user()->email }}

                        </span>
                    </a>
                </div>
            </li>
            @include('partials.admin_nav')
        </ul>


    </div>
</header>
<main>
    <a href="#" data-activates="slide-out"
       style='padding:6px;
         background:#750080;
         font-size: 16px;
         width: 100%;
         color:white;'
       class="noPrint button-collapse top-nav waves-effect waves-light hide-on-large-only">
        <i class="fa fa-bars white-text"></i>
        Paybobby
    </a>


    </a>
    @if (Session::has('message'))
        <div class="message" style="display: none">
            {{ Session::get('message') }}
        </div>
    @endif

    @yield('content')
</main>
</body>
</html>