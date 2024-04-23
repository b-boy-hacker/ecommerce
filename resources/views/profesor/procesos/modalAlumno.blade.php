<div class="modal fade" id="modalAlumno" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header">  
                <center>
                    <h4 class="modal-title">Lista de alumnos</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>               
            </div>

            <div class="modal-body">    
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">           
                           {{-- <a href="#addModalNew" class="btn btn-success" data-toggle="modal">
                               {{-- <span class="fa fa-plus"></span>
                               <i class="fa-solid fa-user-plus"></i>
                               Crear
                           </a> --}}
                       
                           <table class="table table-bordered table-striped" 
                               style="margin-top: 20px; text-align: center">
                               <thead style="background-color: teal">
                                   <th style="color: white">Nombre</th>
                                   <th style="color: white; ">Apellido</th>
                               </thead>
                               <tbody >
                                   @foreach ($alumno as $estudiante)
                                   <tr>
                                       <td>{{ $estudiante->nombre_alumno }}</td>                         
                                       <td > 
                                           <div style="">
                                                   {{-- <a class="btn btn-secondary" 
                                                   href="{{url('ver_alumnos')}}">Ver Alumnos</a> --}}
           
                                                   <a href="#addModalNew" class="btn btn-secondary" data-toggle="modal">
                                                       {{-- <span class="fa fa-plus"></span> --}}
                                                       <i class="fa-solid fa-book"></i>
                                                        enviar tarea
                                                   </a>                                   
                                           </div>
                                       </td>                        
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
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