<!-- Modal Structure -->
<div id="edit_{{ $q->id }}" class="modal animated slideInDown">
	<div class="modal-content">
		<h4> Edit Question </h4>
		{!! Form::model($q, ['route'=>['faqs.update', $q->id], 'method'=>'PATCH']) !!}
		@include('faqs.form')
	</div>
	<div class="modal-footer">
		{!! Form::submit('Save Question', ['class'=>'btn left']) !!}
		<a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>