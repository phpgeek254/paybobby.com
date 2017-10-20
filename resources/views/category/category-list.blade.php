@extends('admin_template')
@section('content')
@include('category.create')
<div class="row" style="margin-top: 20px;">
	@if (Auth::check() and Auth::user()->user_type=='admin')
		<div class="col" style="padding: 20px;">
			<a href="#add_category" class="btn">
			<i class="fa fa-plus white-text"></i> Add Category
			</a>
		</div>
	@endif
	
	<div class="col m12 s12">
		<ul class="collection">
		@forelse ($categories as $cat)
			<li class="collection-item">{{ $cat->name }}</li>
		@empty
			{{-- empty expr --}}
		@endforelse
		</ul>
	</ul>
		<div class="center">
			@include('pagination.paginator', ['paginator' =>$categories])
		</div>

	</div>
</div>
@endsection