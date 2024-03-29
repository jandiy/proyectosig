<div class="modal modal-danger fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-delete-{{$ayudante->id}}"
     style="(display: block; padding-right: 17px;)">
    {{Form::Open(array('action'=>array('AyudanteController@destroy',$ayudante->id),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Ayudante</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea eliminar la ayudante</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="sumbit" class="btn btn-primary">Confirmar</button>
            </div>

        </div>

    </div>

    {{Form::Close()}}

</div>