@extends('adminlte::page')
@section('title', 'agenda-escolar')

@section('content_header')
    <style type="text/css">
        .div_center{
            color: black; 
            text-align: center;
            font-weight: bold;
            font-size: 25px;
        }

        table {
            max-width: 50%;
            border: 1px solid #000;
            margin: auto;
        }
        th, td {
            width: 30%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
        }
        caption {
            padding: 0.3em;
            color: #fff;
                background: #c84747;
        }
        th {
            background: #3A4546;
        }
        .th_deg{
            color: whitesmoke;
        }

        .th_degA{
            color: whitesmoke;
            text-align: center
        }
    </style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            @if (session()->has('message'))
                <div class="alert alert-success">
                                <button type="button" class="close"
                                          data-dismiss="alert" aria-hidden="true">
                                       X
                                  </button>
                                      {{session()->get('message')}}
                             </div>
            @endif


            {{-- <p class="font_size">CREAR PROFESOR</p>    --}}
            <div class="div_center">

                <form action="{{ url('/crear_materia_Profesor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="div_design">
                        <label class="text-align:center;">Nombre del Profesor</label>
                        <select class="text_color" name="profesor_id" required="">
                            <option value="" selected="">Seleccionar materia...</option>
                            @foreach ($profesor as $prof)
                                <option value="{{ $prof->id}}"> 
                                    id: {{ $prof->id }} - {{ $prof->Nombre }} {{ $prof->ApellidoPaterno }} 
                                </option>
                            @endforeach  
                        </select>
                    </div> 
                    <div class="div_design">
                        <label class="text-align:center;">Nombre de la Materia</label>
                        <select class="text_color" name="materia_id" required="">
                            <option value="" selected="">Seleccionar materia...</option>
                            @foreach ($materia as $mat)
                                <option value="{{ $mat->id }}"> 
                                    id: {{ $mat->id }} - {{ $mat->Nombre }} 
                                </option>
                            @endforeach  
                        </select>
                    </div>
                    
                    <div class="div_design">
                        <input type="submit" value="Registrar Materia del Profesor" class="btn btn-primary">                        
                    </div>
                </form>
                
                
            </div> 
        </div>
    </div>
</div>
    

@stop


@section('content')
<div class="div_center">
    <p>Lista de materias del profesor</p>
</div>
  
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="th_deg" scope="col">Nombre</th> 
                <th class="th_deg" scope="col">Materia</th>                             
                <th class="th_degA" scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($profesorMateria as $profeMate)
            <tr>
                 <td>{{$profeMate->profesor->Nombre}}
                     {{$profeMate->profesor->ApellidoPaterno}}
                 </td>
                 <td>{{$profeMate->materia->Nombre}}</td>
                <td>
                    <div style="display: flex; justify-content: space-between;">
                        <a class="btn btn-warning" href="">editar</a> 
                        {{-- {{url('actualizar_materia', $NombreMateria->id)}} --}}
                        <a class="btn btn-danger" onclick="return confirm('¿Estás seguro?')"
                           href="">eliminar</a>
                           {{-- {{url('borrar_materia', $NombreMateria->id)}} --}}
                    </div>
                </td>                      
            </tr>
            @endforeach   
        </tbody>
    </table>
</div>


            

@stop 