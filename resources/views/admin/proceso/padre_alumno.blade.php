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
            max-width: 650px;
            border: 1px solid #000;
            margin: auto;
        }
        th, td {
            max-width: 20%;
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

                <form action="{{ url('/crear_padre_alumno') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="div_design">
                        <label class="text-align:center;">Nombre del Padre o Tutor</label>
                        <select class="text_color" name="padre_id" required="">
                            <option value="" selected="">Seleccionar tutor...</option>
                            @foreach ($papa as $padre)
                                <option value="{{ $padre->id}}"> 
                                    id: {{ $padre->id }} - {{ $padre->Nombre }} {{ $padre->ApellidoPaterno }} 
                                </option>
                            @endforeach  
                        </select>
                    </div> 
                    <div class="div_design">
                        <label class="text-align:center;">Nombre del Alumno</label>
                        <select class="text_color" name="hijo_id" required="">
                            <option value="" selected="">Seleccionar estudiante...</option>
                            @foreach ($estudiante as $alumno)
                                <option value="{{ $alumno->id }}"> 
                                    id: {{ $alumno->id }} - {{ $alumno->Nombre }} 
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
    <p>Lista de padres de familias y sus hijos</p>
</div>

    @if (session()->has('message'))
                <div class="alert alert-success">
                                <button type="button" class="close"
                                          data-dismiss="alert" aria-hidden="true">
                                       X
                                  </button>
                                      {{session()->get('message')}}
                </div>
    @endif


<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="th_deg" scope="col">Nombre del padre o tutor</th> 
                <th class="th_deg" scope="col">Nombre del estudiante</th>                             
                <th class="th_degA" scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($padreEstudiante as $padreAlumno)
            <tr>
                 <td>{{$padreAlumno->padre->Nombre}}
                     {{$padreAlumno->padre->ApellidoPaterno}}
                 </td>
                 <td>{{$padreAlumno->hijo->Nombre}}
                    {{$padreAlumno->hijo->ApellidoPaterno}}
                </td>                <td>
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