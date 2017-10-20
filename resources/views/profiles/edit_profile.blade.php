<div id="edit_info_{{ $user->userInfo->id }}" class="modal animated slideInDown">
    <div class="modal-content">
        <h4> Complete Profile  </h4>
        {!! Form::model($user->userInfo, ['route'=>['profiles.update', $user->userInfo->id], 'files'=>true, 'method'=>'PATCH']) !!}
        {!! Form::hidden('user_id', Auth::id()) !!}
        @include('profiles.complete_profile')
    </div>
    <div class="modal-footer">
        {!! Form::submit('Save', ['class'=>'btn left']) !!}
        <a href="#" class="white-text btn right waves-effect waves-green btn-flat modal-action modal-close">Cancel</a>
        {!! Form::close() !!}
    </div>
</div>