@extends('admin_template')
@if( Auth::check() and Auth::user()->user_type == 'employer')
	@include('orders.create')
	@foreach($orders as $order)
	@include('orders.delete')
	@include('orders.edit')
	@endforeach
@endif

@if( Auth::check() and Auth::user()->user_type == 'employee')
	@foreach($orders as $order)
		@include('orders.submit_job')
	@endforeach
@endif

@section('content')
@if (Auth::user()->user_type == 'employer')
	<div class="row container" style="margin-top: 10px;">
		<div class="col s12">
			<a class="btn" href="#create_order">
				<i class="fa fa-plus white-text"></i> Create New Order
			</a>
		</div>
	</div>
@endif
	
<div class="row">
	<div class="col m4 s12">
		<h5 class="center">
			{{
			 Auth::user()->user_type=='employer' ? 'Not Taken' : 'Available'
			 }}
			{{ Auth::id() }}
		</h5>
		@forelse($orders as $order)
			@if($order->status == 'new')
			<ul class="collection with-header">
			<li class="collection-header"><h6>{{ strtoupper($order->title) }}</h6></li>
				<li class="collection-item">
					<div>
						{{ \Illuminate\Support\Str::words($order->category->name, 2) }}
						<a  class="secondary-content">
							<i class="fa fa-clock-o"></i> {{ $order->created_at->diffForHumans() }}
						</a>
					</div>
				</li>
				<li class="collection-item">
					<div>
						Cost : {{ $order->cost }}USD

					</div>
				</li>
				@if(Auth::user()->id == $order->client_id)
				<li class="collection-item">
					<div>
					{!! \Illuminate\Support\Str::words(nl2br($order->instructions), 20) !!}

					<a href="#edit_order_{{ $order->id }}" class="secondary-content btn-flat">
					<i class="fa fa-pencil"></i>
					</a>
					<a href="#delete_order_{{ $order->id }}" class="secondary-content btn-flat">
					<i class="fa fa-trash"></i>
					</a>

				</div>
			</li>
					@endif



			</ul>
			@endif
		@empty
			<p class="center"> You do not have any order records </p>
		@endforelse
	</div>

	<div class="col m4 s12">
		<h5 class="center"> On-Going </h5>

		@forelse($orders as $order)
		
			@if($order->status == 'taken')
				<ul class="collection with-header">
					<li class="collection-header"><h6>{{ strtoupper($order->title) }}</h6></li>
					<li class="collection-item">
						<div>
							{{ \Illuminate\Support\Str::words($order->category->name, 2) }}
							<a  class="secondary-content">
								<i class="fa fa-clock-o"></i> {{ $order->updated_at->diffForHumans() }}
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div>
							Cost : {{ $order->cost }}USD

						</div>
					</li>
					@if( Auth::check() and Auth::user()->user_type == 'employee')
					<li class="collection-item">
						<div>
							<a href="#submit_job_{{ $order->id }}" class="btn"> Submit Job </a>
						</div>
					</li>
					@endif


					@if(Auth::user()->id == $order->client_id)
						<li class="collection-item">
							<div>
								{!! \Illuminate\Support\Str::words(nl2br($order->instructions), 20) !!}

								<a href="#edit_order_{{ $order->id }}" class="secondary-content btn-flat">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="#delete_order_{{ $order->id }}" class="secondary-content btn-flat">
									<i class="fa fa-trash"></i>
								</a>

							</div>
						</li>
					@endif



				</ul>

		@endif
			@empty
				<p class="center"> You do not have any order records </p>
			@endforelse

	</div>

	<div class="col m4 s12">
		<h5 class="center"> Completed </h5>
		@forelse($orders as $order)
			@if($order->status == 'completed')
				<ul class="collection with-header">
					<li class="collection-header"><h6>{{ strtoupper($order->title) }}</h6></li>
					<li class="collection-item">
						<div>
							{{ \Illuminate\Support\Str::words($order->category->name, 2) }}
							<a  class="secondary-content">
								<i class="fa fa-clock-o"></i> {{ $order->created_at->diffForHumans() }}
							</a>
						</div>
					</li>
					<li class="collection-item">
						<div>
							Cost : {{ $order->cost }}USD

						</div>
					</li>
					@if(Auth::user()->id == $order->client_id)
						<li class="collection-item">
							<div>
								{!! \Illuminate\Support\Str::words(nl2br($order->instructions), 20) !!}

								<a href="#edit_order_{{ $order->id }}" class="secondary-content btn-flat">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="#delete_order_{{ $order->id }}" class="secondary-content btn-flat">
									<i class="fa fa-trash"></i>
								</a>

							</div>
						</li>
					@endif



				</ul>
				
			@endif
			@empty
				<p class="center"> You do not have any order records </p>
			@endforelse
	</div>

</div>
@endsection