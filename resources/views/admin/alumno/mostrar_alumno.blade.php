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
            width: 10px;
            border: 1px solid #000;
            margin: auto;
        }
        th, td {
            width: 15%;
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

    <div style="text-align: center;">
        <div style="color: white; display: inline-block;">
            <a class="btn btn-primary" href="{{url('crear_alumno')}}">crear alumno</a>
        </div>
    </div>



@stop


@section('content')
<div class="div_center">
    <p>Lista de alumnos</p>
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
                <th class="th_deg" scope="col">Cedula de Identidad</th>
                <th class="th_deg" scope="col">Nombre</th>
                <th class="th_deg" scope="col">Apellido Paterno</th>
                <th class="th_deg" scope="col">Apellido Materno</th>
                <th class="th_deg" scope="col">Sexo</th>
                <th class="th_deg" scope="col">Direccion</th>
                <th class="th_deg" scope="col">Fecha de nacimiento</th>
                <th class="th_deg" scope="col">Fecha de registro</th>
                <th class="th_deg" scope="col">Correo Electronico</th>
                <th class="th_degA" scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiante as $alumno)
            <tr>
                <td>{{$alumno->CI}}</td>
                <td>{{$alumno->Nombre}}</td>
                <td>{{$alumno->ApellidoPaterno}}</td>
                <td>{{$alumno->ApellidoMaterno}}</td>
                <td>{{$alumno->Sexo}}</td>
                <td>{{$alumno->Direccion}}</td>
                <td>{{$alumno->FechaNacimiento}}</td>
                <td>{{$alumno->FechaRegistro}}</td>
                <td>{{$alumno->Correo}}</td>
                <td>
                    <div style="display: flex; justify-content: space-between;">
                        <a class="btn btn-warning" href="{{url('actualizar_alumno', $alumno->id)}}">editar</a>
                        <a class="btn btn-danger" onclick="return confirm('¿Estás seguro?')"
                         href="{{url('borrar_alumno', $alumno->id)}}">eliminar</a>
                    </div>
                </td>                        
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


            

@stop 