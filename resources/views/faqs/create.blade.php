<!-- Modal Structure -->
<div id="add_question" class="modal animated slideInDown">
	<div class="modal-content">
		<h4> Add Frequently Asked Question </h4>
		{!! Form::open(['route'=>['faqs.store']]) !!}
		@include('faqs.form')
	</div>
	<div class="modal-footer">
		{!! Form::submit('Save Question', ['class'=>'btn left']) !!}
		<a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>