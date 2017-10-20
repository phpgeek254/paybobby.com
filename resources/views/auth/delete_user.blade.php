<!-- Modal Structure -->
<div id="delete_user_{{ $user->id }}" class="modal animated slideInDown">
	<div class="modal-content">
		<h4> Delete User </h4>
		{!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'DELETE']) !!}
		<p class="center"> Are you sure you want to delete this user?</p>
	</div>
	<div class="modal-footer">
		{!! Form::submit('Delete User', ['class'=>'btn left']) !!}
		<a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
		{!! Form::close() !!}
	</div>
</div>