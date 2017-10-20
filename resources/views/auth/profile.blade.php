@extends('admin_template')
@if($user->user_type == 'employee')
    @include('profiles.create')
    @include('profiles.edit_profile')
@endif
@section('content')
    <div class="row center">
        <div class="col m6 s12">
            <h5 class="center">
                Basic info
            </h5>

            <div class="userView center">
                <a href="#!user" class="center">
                    @if($user->user_type == 'employee')
                    {{ Html::image(asset(Auth::user()->userInfo->profile_image),
                    null, ['class'=>'circle responsive-img',
                    'style'=>'width:150px; text-align:center'])
                    }}
                    @else
                        {{ Html::image(asset('/users/default.jpg'),
                    null, ['class'=>'circle responsive-img',
                    'style'=>'width:150px; text-align:center'])
                    }}
                    @endif
                </a>

            </div>
            <ul class="collection">
                <li class="collection-item">Name : {{ $user->name }}</li>
                <li class="collection-item">Email : {{ $user->email }}</li>
                <li class="collection-item">Phone Number: +254-{{ $user->phone_number }}</li>
            </ul>
            <a class="btn-flat">
                 <i class="fa fa-pencil"></i>
            </a>
            @if($user->completed_profile)
            <a class="btn-flat" href="#complete_profile">
                Complete Profile
            </a>
            @endif
           
        </div>
        <div class="col m6 s12">
            @if($user->user_type == 'employee')
        <h5 class="center">
            More Information
        </h5>
            <ul class="collection">
                <li class="collection-item">Description : <br> {{ $user->userInfo->bio }}</li>
                <li class="collection-item">University : <br>{{ $user->userInfo->graduated_from }}</li>
                <li class="collection-item">Skills: <br>{{ $user->userInfo->skills }}</li>
                <li class="collection-item">Profession: <br>{{ $user->userInfo->profession }}</li>
            </ul>
            <a class="btn-flat" href="#edit_info_{{ $user->userInfo->id }}">
                <i class="fa fa-pencil"></i>
            </a>
                @endif
        </div>
    </div>

    <div class="row">
        <div class="col m12 s12">
            <h5 class="center"> Summary </h5>
        </div>
    </div>
@endsection