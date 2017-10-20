<!-- Modal Structure -->
<div id="edit_order_{{$order->id}}" class="modal animated slideInDown">
    <div class="modal-content">
        <h4> Add New Order </h4>
        {!! Form::model($order,
        ['route'=>['orders.store', 'id'=> $order->id ], 'method'=>'patch', 'files'=>true ]) !!}
        @include('orders.form')
    </div>
    <div class="modal-footer">
        {!! Form::submit('Update Order', ['class'=>'btn left']) !!}
        <a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
        {!! Form::close() !!}
    </div>
</div>