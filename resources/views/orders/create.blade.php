<!-- Modal Structure -->
<div id="create_order" class="modal animated slideInDown">
	<div class="modal-content">
		<h4> Add New Order </h4>
		{!! Form::open(['route'=>['orders.store']]) !!}
		@include('orders.form')
	</div>
	<div class="modal-footer">
		{!! Form::submit('Save Order', ['class'=>'btn left']) !!}
		<a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>