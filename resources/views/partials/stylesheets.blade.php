<!-- Application Styles -->
{{ Html::style('/css/materialize.css') }}
{{ Html::style('/css/animate.css') }}
{!! Html::style('css/materialize.clockpicker.css') !!}
{!! Html::style('/css/font_awesome/css/font_awesome.css') !!}
@if( Auth::check())
    {{ Html::style('/css/admin.css') }}
@else
    {{ Html::style('/css/style.css') }}
@endif
{{ Html::style('/css/print.css') }}