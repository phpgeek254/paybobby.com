<!-- Modal Structure -->
<div id="delete_{{ $q->id }}" class="modal animated slideInDown">
	<div class="modal-content">
		<h4> Delete Question </h4>
		{!! Form::open(['route'=>['faqs.destroy', $q->id], 'method'=>'DELETE']) !!}
		<p> Are you sure you want to delete this question?</p>
	</div>
	<div class="modal-footer">
		{!! Form::submit('Delete Question', ['class'=>'btn left']) !!}
		<a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>