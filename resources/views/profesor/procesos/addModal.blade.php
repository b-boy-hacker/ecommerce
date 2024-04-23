<div class="modal fade" id="addModalNew" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header">  
                <center>
                    <h4 class="modal-title">Agregar Contacto</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>               
            </div>

            <div class="modal-body">    
                <div class="container-fluid">
                    <form action="#agregarContacto" method="POST" >
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label">Apellido:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="">
                                <span class="fa fa-close"></span>
                                cancelar
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-dismiss="" name="agregarContacto">
                                <span class="fa fa-save"></span>
                                guardar
                            </button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>