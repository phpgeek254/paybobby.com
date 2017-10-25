<!-- Modal Structure -->
<div id="submit_job_{{ $order->id }}" class="modal">
	<div class="modal-content">
		<h4>Submit Job</h4>
		{!! Form::open(['route'=>['submit_job'], 'files'=>true]) !!}
        {!! Form::hidden('order_id', $order->id) !!}
		<div class="file-field input-field">
		  <div class="btn">
		  	<span class="white-text"> Upload File </span>
		    {!! Form::file('file') !!}
		  </div>
		  <div class="file-path-wrapper">
		    <input class="file-path validate" type="text" placeholder="Upload one or more files">
		  </div>
		</div>
	</div>
	<div class="modal-footer">
        {!! Form::submit('Submit', ['class'=>'btn left']) !!}
		<a href="#" class="waves-effect waves-green btn modal-action right modal-close">Cancel</a>
        {!! Form::close() !!}
	</div>
</div>

{!! Form::open(['route'=>['submit_job', $order->id]]) !!}