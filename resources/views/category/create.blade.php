<!-- Modal Structure -->
<div id="add_category" class="modal animated slideInDown">
	<div class="modal-content">
		<h4> Add New Category </h4>
		{!! Form::open(['route'=>['categories.store']]) !!}
		<div class="input-field col s12">
			{!! Form::text('name', null) !!}
			{!! Form::label('name', 'Enter Category Name') !!}

			@if ($errors)
				<span class="error">{{ $errors->first('name') }}</span>
			@endif
		</div>
		
	</div>
	<div class="modal-footer">
		{!! Form::submit('Save Category', ['class'=>'btn left']) !!}
		<a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>