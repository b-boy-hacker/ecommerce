@extends('adminlte::page')
@section('title', 'agenda-escolar')

@section('content_header')
    <style type="text/css">
        .div_center{
            text-align: center;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110vh; /* Altura total de la ventana */
        }
        .font_size{
            text-align: center; 
            font-size: 35px;  
            font-weight: bold; /* Ajuste de la posición vertical */
        }
        .text_color{
            color: black;
            width: 350px; /* Ancho de los campos de entrada */
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 180px;
        }
        .div_design{
            padding-bottom: 15px;
        }
    </style>
    <p class="font_size">Actualizar Padre de familia</p>
    <div style="text-align: center;">
        <div style="color: white; display: inline-block;">
            <a class="btn btn-info" href="{{url('mostrar_padre')}}">
                 regresar</a>
        </div>
    </div>
@stop

@section('content')

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
                <form action="{{url('/confirmar_padre', $papa->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="div_design">
                        <label class="text-align:center;">Cedula de Identidad</label>
                        <input class="text_color" type="number" min="0" name="CI" 
                            placeholder="Escribe tu cedula de identidad" required=""
                            value="{{$papa->CI}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Nombre</label>
                        <input class="text_color" type="text" name="Nombre" 
                            placeholder="Escribe tu nombre" required=""
                            value="{{$papa->Nombre}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Apellido Paterno</label>
                        <input class="text_color" type="text" name="ApellidoPaterno" 
                            placeholder="Escribe tu apellido paterno" required=""
                            value="{{$papa->ApellidoPaterno}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Apellido Materno</label>
                        <input class="text_color" type="text" name="ApellidoMaterno" 
                            placeholder="Escribe tu apellido materno" required=""
                            value="{{$papa->ApellidoMaterno}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Sexo</label>
                        <input class="text_color" type="text" name="Sexo" 
                            placeholder="" required="">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Direccion</label>
                        <input class="text_color" type="text" name="Direccion" 
                            placeholder="Escribe tu direccion" required=""
                            value="{{$papa->Direccion}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Telefono</label>
                        <input class="text_color" type="number" min="0" name="Telefono" 
                            placeholder="Escribe tu numero de telefono" required=""
                            value="{{$papa->Telefono}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Fecha de nacimiento</label>
                        <input class="text_color" type="date" name="FechaNacimiento" 
                            placeholder="Escribe tu fecha de nacimiento" required=""
                            value="{{$papa->FechaNacimiento}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Fecha de registro</label>
                        <input class="text_color" type="date" name="FechaRegistro" 
                            placeholder="Escribe tu fecha de registro" required=""
                            value="{{$papa->FechaRegistro}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Correo electrónico</label>
                        <input class="text_color" type="email" name="Correo" 
                            placeholder="Escribe tu correo" required=""
                            value="{{$papa->Correo}}">
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Parentesco</label>
                        <input class="text_color" type="text" name="Parentesco" 
                            placeholder="" required=""
                            value="{{$papa->Parentesco}}">
                    </div>
                    {{-- <div class="div_design">
                        <label class="text-align:center;">Foto del profesor</label>
                        <input type="file" name="photo" id="" required="">
                    </div> --}}
                    {{--<div class="div_design">
                        <label class="text-align:center;">Categoria del producto</label>
                        <select class="text_color" name="catagory" required="">
                             <option value="" selected="">seleccionar</option>
                            @foreach ($catagory as $catagory)
                                <option value="{{$catagory->catagory_name}}"> 
                                    {{$catagory->catagory_name}} </option>
                            @endforeach  
                            </select>
                    </div>--}}
                    <div class="div_design">
                        <input type="submit" value="Actualizar padre de familia" class="btn btn-primary">                        
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

@stop

