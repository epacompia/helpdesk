<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="usu_nom">Nombre</label>
                    <input type="text" class="form-control" id="usu_nom" placeholder="Ingrese el nombre" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="usu_ape">Apellido</label>
                    <input type="text" class="form-control" id="usu_ape" placeholder="Ingrese los apellidos" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="usu_correo">Correo</label>
                    <input type="email" class="form-control" id="usu_correo" placeholder="example@example.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="usu_pass">Contraseña</label>
                    <input type="text" class="form-control" id="usu_pass" placeholder="Ingrese la contraseña" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="rol_id">Rol</label>
                    <select class="select2" id="rol_id">
                        <option value="1">Usuario</option>
                        <option value="2">Soporte</option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label class="form-label" for="rol_id">Rol</label>
                    <select id="exampleSelect"  id="rol_id" class="form-control">
                        <option value="1" >Usuario</option>
                        <option value="2" >Soporte</option>
                    </select>
                </div> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-rounded btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>