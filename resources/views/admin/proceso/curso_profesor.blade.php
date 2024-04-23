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

                <form action="{{ url('/crear_curso_profesor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="div_design">
                        <label class="text-align:center;">Nombre del Curso</label>
                        <select class="text_color" name="curso_id" required="">
                            <option value="" selected="">Seleccionar curso...</option>
                            @foreach ($curso as $aula)
                                <option value="{{ $aula->id}}"> 
                                    id: {{ $aula->id }} - {{ $aula->Grado }}
                                </option>
                            @endforeach  
                        </select>
                    </div> 
                    <div class="div_design">
                        <label class="text-align:center;">Nombre del profesor</label>
                        <select class="text_color" name="profesor_id" required="">
                            <option value="" selected="">Seleccionar estudiante...</option>
                            @foreach ($profesor as $profe)
                                <option value="{{ $profe->id }}"> 
                                    id: {{ $profe->id }} - {{ $profe->Nombre }} {{$profe->ApellidoPaterno}}  
                                </option>
                            @endforeach  
                        </select>
                    </div>
                    
                    <div class="div_design">
                        <input type="submit" value="Registrar Curso del profesor" class="btn btn-primary">                        
                    </div>
                </form>
                
                
            </div> 
        </div>
    </div>
</div>
  

@stop


@section('content')
<div class="div_center">
    <p>Lista de cursos con los profesores</p>
</div>
   
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th class="th_deg" scope="col">Grado del Curso</th> 
                <th class="th_deg" scope="col">Nombre del profesor</th>                             
                <th class="th_degA" scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            
           @foreach ($cursoProfesor as $cursoProfe)
            <tr>
                <td>{{$cursoProfe->curso->Grado}}</td>
                <td>{{$cursoProfe->profesor->Nombre}}
                     {{$cursoProfe->profesor->ApellidoPaterno}}
                </td>
                <td>
                    <div style="display: flex; justify-content: space-between;">
                        <a class="btn btn-warning" href="">editar</a>
                        {{-- {{url('actualizar_materia', $mate->id)}} --}}
                        <a class="btn btn-danger" onclick="return confirm('¿Estás seguro?')"
                           href="">eliminar</a>
                           {{--{{url('borrar_materia', $mate->id)}}  --}}
                    </div>
                </td>                        
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>


            

@stop 