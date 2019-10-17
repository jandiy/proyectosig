<div class="modal modal-info fade in" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-mostrar-{{$web->id}}"
     style="(display: block; padding-right: 17px;)">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Detalle Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="form-group">
                    <img src="{{Storage::Url('upload/'.$web->foto) }}" alt="{{$web->foto}}" height="150vh" width="150vh" class="img-thumbnail">
                    </div>
                </div>
                
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" placeholder="{{$web->name}}" class="form-control" disabled/>
                    </div>
              
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        <input type="text" placeholder="{{$web->apellido}}" class="form-control" disabled/>
                    </div>
                   
                    <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" placeholder="{{$web->email}}" class="form-control" disabled/>
                    </div>
            
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>

        </div>

    </div>


</div>