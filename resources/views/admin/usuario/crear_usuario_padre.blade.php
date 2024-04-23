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
         /*   height: 110vh; /* Altura total de la ventana */
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
    <p class="font_size">Crear Usuario para Padre de familia</p>
    <div style="text-align: center;">
        <div style="color: white; display: inline-block;">
            <a class="btn btn-warning" href="{{url('mostrar_usuario')}}">
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
                <form action="{{url('/crear_nuevo_usuario')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
          
                    <div class="div_design">
                        <label class="text-align:center;">Id</label>
                        <input class="text_color" type="text" name="id" 
                            placeholder="" required="">
                    </div>
                   
                    <div class="div_design">
                        <label class="text-align:center;">Nombre</label>
                        <select class="text_color" name="name" required="">
                            <option value="" selected>Seleccionar usuario...</option>
                            @foreach ($padre as $papa)
                                <option value="{{ $papa->Nombre}} {{ $papa->ApellidoPaterno }}">{{ $papa->Nombre}}
                                    ... {{ $papa->ApellidoPaterno }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Rol</label>
                        <select class="text_color" name="rol" required="">
                            <option value="" selected>Seleccionar usuario...</option>
                            @foreach ($rol as $rols)
                                <option value="{{ $rols->rol}}">{{ $rols->rol}}
                                    ...</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">tipo de usuario</label>
                        <select class="text_color" name="usertype" required="">
                            <option value="" selected>Seleccionar usuario...</option>
                            @foreach ($rol as $rols)
                                <option value="{{ $rols->id}}">{{ $rols->id}}
                                    ...{{ $rols->rol}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Correo</label>
                        <select class="text_color" name="email" required="">
                            <option value="" selected>Seleccionar usuario...</option>
                            @foreach ($padre as $papa)
                                <option value="{{ $papa->Correo }}">{{ $papa->Correo}}
                                    ... </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="div_design">
                        <label class="text-align:center;">Contraseña</label>
                        <input class="text_color" type="text" name="password" 
                            placeholder="" required="">
                    </div>
                   
                    <div class="div_design">
                        <input type="submit" value="Registrar Padre" class="btn btn-primary">                        
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>

@stop

