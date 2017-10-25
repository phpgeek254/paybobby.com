@extends(Auth::check() ? 'admin_template' : 'master')
@section('content')
<div class="row" style="margin-top: 10px;">
	@if (Auth::check() and Auth::user()->user_type == 'admin')
	<div class="col s12">
		<a class="btn" href="#add_question"> <i class="fa fa-plus white-text"></i> Add New Faq
		</a>
	</div>
	@endif
</div>
<div class="row">
	<div class="col m12 s12">
	<ul class="collapsible" data-collapsible="expandable"">
	@foreach ($faqs as $question)
	<li>
      <div class="collapsible-header">
      <h5>
      	{{ $question->title }}
      </h5>
  </div>
      <div class="collapsible-body">
      	<p> 

      		{!! nl2br($question->content) !!} 
      	</p>
      	@if (Auth::check() and Auth::user()->user_type == 'admin')
      	<a href="#edit_{{ $question->id }}" class="btn-flat">
      			<i class="fa fa-pencil"></i>
      		</a>
      		<a href="#delete_{{ $question->id }}" class="btn-flat">
      			<i class="fa fa-trash"></i>
      		</a>
      	@endif
      </div>
    </li>
	@endforeach
	</ul>
	</div>
</div>
@include('faqs.create')
@foreach ($faqs as $q)
	@include('faqs.edit')
	@include('faqs.delete')
@endforeach
@endsection