@extends('admin_template')

@section('content')
<div class="row" style="margin-top: 70px;">
	<h4 class="center"> Clients </h4>
@forelse ($users->chunk(3) as $chunk)
	<div class="row">

		@foreach ($chunk as $user)
		<div class="col s12 m4 black-text">
		<div class="card">
			<div class="card-content">
				<ul class="collection with-header">
					<li class="collection-item"> <h6>{{ $user->name }}</h6></li>
					<li class="collection-item">
						<i class="fa fa-envelope"></i> {{ $user->email }}</li>
					<li class="collection-item">
						<i class="fa fa-phone"></i>  +254 {{ $user->phone_number }}</li>
					<li class="collection-item">
					<i class="fa fa-user"></i> {{ $user->user_type }}</li>
				</ul>
			</div>
			@if (Auth::check() and Auth::user()->user_type=='admin')
			<div class="card-action center">
				<a href="#!" class="btn-flat"> <i class="fa fa-folder-open"></i> </a>
				<a href="#delete_user_{{ $user->id }}" class="btn-flat"> <i class="fa fa-trash-o"></i> </a>
			</div>
			@endif
			
		</div>
	</div>
		@endforeach
	</div>
@empty
@endforelse
<div class="center">
			@include('pagination.paginator', ['paginator' =>$users])
		</div>
</div>
@foreach ($users as $user)
	{{-- @include('auth.deactivate') --}}
	@include('auth.delete_user')
@endforeach
@endsection