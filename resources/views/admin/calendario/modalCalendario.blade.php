<div class="modal fade" id="modalCalendario" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header">  
                <center>
                    <h4 class="modal-title">Agregar Calendario</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>               
            </div>
           
            <div class="modal-body">    
                <div class="container-fluid">
                    <form action="{{url('nuevo_calendario')}}" method="POST" >
                        @csrf
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="control-label">Descripcion: </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Descripcion"
                                required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-3">
                                <label class="control-label">Fecha: </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Fecha"
                                required="">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <span class="fa fa-close"></span>
                                cancelar
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-dismiss="" name="">
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