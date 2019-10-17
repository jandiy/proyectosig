<div class="modal modal-warning fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-contrasena-{{$web->id}}"
     style="(display: block; padding-right: 17px;)">
   {!! Form::model($web, ['method' => 'POST','route' => ['perfiles.contrasena', $web->id],'files'=> 'true']) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Cambiar Contrasena</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <strong>Contrasena:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                <strong>Confirmar Contrasena:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Confirmar</button>
            </div>

        </div>

    </div>

    {!! Form::close() !!}  

</div>