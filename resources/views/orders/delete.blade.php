<!-- Modal Structure -->
<div id="delete_order_{{ $order->id }}" class="modal animated slideInDown">
    <div class="modal-content">
        <h4> Delete Order </h4>
        {!! Form::open(['route'=>['orders.destroy', $order->id], 'method'=>'DELETE']) !!}
        <p class="center"> Are you sure you want to delete this Order?</p>
    </div>
    <div class="modal-footer">
        {!! Form::submit('Delete Order', ['class'=>'btn left']) !!}
        <a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
        {!! Form::close() !!}
    </div>
</div>